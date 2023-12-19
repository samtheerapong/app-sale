<?php

use kartik\grid\GridView;
use kartik\widgets\DatePicker;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\it\models\ItStockListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'It Stock Lists');
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="it-stock-list-index">
    <div class="card border-info">
        <div class="card-header text-white bg-info">
            <?= Yii::t('app', 'Stock List') ?>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination justify-content-center m-1'],
                    'maxButtonCount' => 5,
                    'firstPageLabel' => Yii::t('app', 'First'),
                    'lastPageLabel' => Yii::t('app', 'Last'),
                    'options' => ['class' => 'pagination justify-content-center'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:45px;'], //กำหนด ความกว้างของ #
                    ],
                    // 'id',
                    // 'stock_id',
                    // 'action_date',
                    [
                        'attribute' => 'action_date',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->action_date ? Yii::$app->formatter->asDate($model->action_date) : Yii::t('app', 'None');
                        },
                        'filter' => false

                    ],
                    // 'operator',
                    [
                        'attribute' => 'operator',
                        'format' => 'html',
                        // 'contentOptions' => ['style' => 'width:250px;'],
                        'value' => function ($model) {
                            return $model->operator ? $model->operator0->thai_name : '';
                        },
                    ],
                    // 'receive',
                    [
                        'attribute' => 'receive',
                        'format' => 'html',
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center','style' => 'width:100px;'],
                        'value' => function ($model) {
                            return $model->receive ? $model->receive : '-';
                        },
                    ],
                    // 'pick_up',
                    [
                        'attribute' => 'pick_up',
                        'format' => 'html',
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center','style' => 'width:100px;'],
                        'value' => function ($model) {
                            return $model->pick_up ? $model->pick_up : '-';
                        },
                    ],
                    //'docs',
                    // 'remask:ntext',
                    [
                        'attribute' => 'remask',
                        'format' => 'html',
                        'headerOptions' => ['style' => 'width:300;'],
                        'value' => function ($model) {
                            return $model->remask ? $model->remask : '';
                        },
                    ],
                    // [
                    //     'class' => 'kartik\grid\ActionColumn',
                    //     'headerOptions' => ['style' => 'width:250px;'],
                    //     'contentOptions' => ['class' => 'text-center'],
                    //     'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                    //     'template' => '<div class="btn-group btn-group-xs" role="group">{view} {update} {delete}</div>',
                    // ],
                ],
            ]); ?>
        </div>
    </div>
</div>