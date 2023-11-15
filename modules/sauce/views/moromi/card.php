<?php

use app\modules\sauce\models\Moromi;
use app\modules\sauce\models\MoromiStatus;
use app\modules\sauce\models\TankDestination;
use app\modules\sauce\models\TankSource;
use app\modules\sauce\models\Type;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Moromi Record Card');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moromi-card">

    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create Moromi Record'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fas fa-table"></i> ' . Yii::t('app', 'Moromi Record Table'),['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_searchcard', ['model' => $searchModel]);
    ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($dataProvider->getModels() as $model) : ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-3">
                            <div class="card-header" style="background-color: <?= $model->moromiStatus0->color ?>; color: #FFFFFF;">
                                <a href="<?= Url::toRoute(['view', 'id' => $model->id]); ?>" class="link-light">
                                    <h5>

                                        <?= Html::encode($model->batch_no) ?>
                                        |
                                        <span class=" badge" style="background-color: <?= $model->moromiType0->color ?>; color: #fff;">
                                            <?= Html::encode($model->moromiType0->code) ?>
                                        </span>
                                        |
                                        <span class="badge" style="background-color: <?= $model->tankSource0->color ?>; color: #fff;">
                                            <?= Html::encode($model->tankSource0->name) ?>
                                        </span>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <span class="badge" style="background-color: <?= $model->tankDestination0->color ?>; color: #fff;">
                                            <?= Html::encode($model->tankDestination0->name) ?>
                                        </span>


                                    </h5>
                                </a>

                            </div>
                            <div class="card-body">
                                <p class="card-text"><?= Yii::t('app', 'Code') ?>: <?= $model->code ?></p>
                                <p class="card-text"><?= Yii::t('app', 'Batch No') ?>: <?= $model->batch_no ?></p>
                                <p class="card-text"><?= Yii::t('app', 'Shikomi Date') ?>: <?= Yii::$app->formatter->asDate($model->shikomi_date) ?></p>
                                <p class="card-text"><?= Yii::t('app', 'Transfer Date') ?>: <?= Yii::$app->formatter->asDate($model->transfer_date) ?></p>
                                <p class="card-text"><?= Yii::t('app', 'Tank Source') ?>: <span class="text" style="color:<?= $model->tankSource0->color ?>;"><b><?= $model->tankSource0->name ?></b></span></p>
                                <p class="card-text"><?= Yii::t('app', 'Tank Destination') ?>: <span class="text" style="color:<?= $model->tankDestination0->color ?>;"><b><?= $model->tankDestination0->name ?></b></span></p>
                                <p class="card-text"><?= Yii::t('app', 'Type') ?>: <span class="text" style="color:<?= $model->moromiType0->color ?>;"><b><?= $model->moromiType0->name ?></b></span></p>
                                <p class="card-text"><?= Yii::t('app', 'Status') ?>: <span class="text" style="color:<?= $model->moromiStatus0->color ?>;"><b><?= $model->moromiStatus0->name ?></b></span></p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="btn-group btn-group-xs" role="group">
                                    <?= Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t('app', 'View'), 'aria-label' => Yii::t('app', 'View')]) ?>
                                    <?= Html::a('<i class="fas fa-list"></i>', ['item', 'id' => $model->id], ['class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t('app', 'Add Item'), 'aria-label' => Yii::t('app', 'Add Item')]) ?>
                                    <?= Html::a('<i class="fas fa-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t('app', 'Update'), 'aria-label' => Yii::t('app', 'Update')]) ?>
                                    <?= Html::a('<i class="fas fa-trash-can"></i>', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t('app', 'Delete'), 'aria-label' => Yii::t('app', 'Delete'),
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-12">
            <?php
            echo LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'maxButtonCount' => 5,
                'firstPageLabel' => Yii::t('app', 'First'),
                'lastPageLabel' => Yii::t('app', 'Last'),
                'options' => ['class' => 'pagination justify-content-center'],
                'linkContainerOptions' => ['class' => 'page-item'],
                'linkOptions' => ['class' => 'page-link'],
            ]);
            ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>