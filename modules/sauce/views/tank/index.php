<?php

use app\modules\sauce\models\Tank;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\TankSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Tank');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-index">

    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row ">
                <?php foreach ($dataProvider->getModels() as $model) : ?>
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-header" style="background-color: <?= $model->color ?>; color: #FFFFFF;">
                                <h5><?= Html::encode($model->code) ?></h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><b><?= Yii::t('app', 'Name') ?></b> : <?= Html::encode($model->name) ?></p>
                                <p class="card-text"><b><?= Yii::t('app', 'Description') ?> </b> : <?= Html::encode($model->description) ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="btn-group btn-group-xs" role="group">
                                    <?= Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t('app', 'View'), 'aria-label' => Yii::t('app', 'View')]) ?>
                                    <?= Html::a('<i class="fas fa-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t('app', 'Update'), 'aria-label' => Yii::t('app', 'Update')]) ?>
                                    <?= Html::a('<i class="fas fa-trash-can"></i>', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t('app', 'Delete'), 'aria-label' => Yii::t('app', 'Delete'),
                                        'data' => [
                                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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
    </div>
    <?php Pjax::end(); ?>
</div>