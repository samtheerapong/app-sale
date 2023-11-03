<?php


use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Request Repair');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-sauce-index">
    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'New Request'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>

    <div class="row">
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
    </div>

    <div class="row">
        <?php
        foreach ($dataProvider->getModels() as $model) : ?>
            <div class="col-lg-3 col-md-4 ol-sm-6">
                <div class="card mb-2">
                    <div class="card-header" style="background-color: <?= $model->jobStatus->color ?>; color: #fff;">
                        <a href="<?= Url::toRoute(['view', 'id' => $model->id]); ?>" class="link-light">
                            <h5>
                                <?= Html::encode($model->repair_code) ?>
                                <?php if ($model->urgency == 3) : ?>
                                    <span class="badge badge-blink" style="background-color: <?= $model->urgency0->color ?>; color: #fff;">
                                        <?= Html::encode($model->urgency0->name) ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ($model->priority == 3) : ?>
                                    <span class="badge" style="background-color: <?= $model->priority0->color ?>; color: #fff;">
                                        <?= Html::encode($model->priority0->name) ?>
                                    </span>
                                <?php endif; ?>
                            </h5>
                        </a>

                    </div>
                    <div class="card-body">
                        <!-- <p class="card-text"><b><?= Yii::t('app', 'Date') ?></b> : <?= Html::encode(Yii::$app->formatter->asDate($model->created_at, 'dd MMMM YYYY')) ?></p> -->
                        <p class="card-text"><b><?= Yii::t('app', 'Request Date') ?></b> : <?= Html::encode(Yii::$app->formatter->asDate($model->request_date, 'dd MMMM YYYY')) ?></p>
                        <p class="card-text"><b><?= Yii::t('app', 'Title') ?></b> : <?= Html::encode(substr($model->request_title, 0, 30)) ?></p>
                        <p class="card-text"><b><?= Yii::t('app', 'Request By') ?></b> : <?= Html::encode($model->createdBy->thai_name) ?></p>
                        <p class="card-text"><b><?= Yii::t('app', 'Department') ?></b> : <?= Html::encode($model->departments->name) ?></p>
                        <p class="card-text"><b><?= Yii::t('app', 'Location') ?></b> : <?= Html::encode($model->locations->name) ?></p>
                        <p class="card-text"><b><?= Yii::t('app', 'Status') ?></b> : <?= Html::encode($model->jobStatus->name) ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group btn-group-xs" role="group">
                            <?= Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t('app', 'View'), 'aria-label' => Yii::t('app', 'View')]) ?>
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



    <?php Pjax::end(); ?>

</div>