<?php


use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Raw Soy Sauce Record');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-sauce-index">
    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>

    <div class="row">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <div class="row">
        <?php
        foreach ($dataProvider->getModels() as $model) : ?>
            <div class="col-xl-2 col-lg-3 col-md-4 ol-sm-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5><?= Html::encode($model->repair_code) ?></h5>
                    </div>
                    <div class="card-body">
                       
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