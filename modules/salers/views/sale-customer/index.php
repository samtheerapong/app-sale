<?php

use app\modules\salers\models\SaleCustomer;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleCustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Sale Customer');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-customer-index">

    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Total : {count} Record', ['count' => $dataProvider->totalCount]) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($dataProvider->getModels() as $model) : ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="card mb-3">
                            <div class="card-header" style="background-color: <?= $model->active === 1 ? '#1A5D1A' : '#FE0000' ?>; color: #FFFFFF;">
                                <h5><?= Html::a(Html::encode($model->name), ['view', 'id' => $model->id], ['style' => 'color: #FFFFFF;']) ?></h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?= Yii::t('app', 'Code') ?>: <?= $model->code ?></p>
                                <p class="card-text"><?= Yii::t('app', 'Name') ?>: <?= $model->name ?></p>
                                <p class="card-text"><?= Yii::t('app', 'Address') ?>: <?= $model->address ?></p>
                                <p class="card-text"><?= Yii::t('app', 'Tel') ?>: <?= $model->tel ?></p>
                                <span class="text" style="color: <?= $model->active === 1 ? '#1A5D1A' : '#FE0000' ?>;"><?= $model->active === 1 ? Yii::t('app', 'Active') : Yii::t('app', 'Inactive') ?></span>
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

            <div class="row">
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
    </div>

</div>