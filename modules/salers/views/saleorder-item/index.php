<?php

use app\modules\salers\models\SaleOrder;
use app\modules\salers\models\SaleorderItem;
use app\modules\salers\models\SaleProductUnit;
use app\modules\salers\models\SaleStatus;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Sales details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleorder-item-index">

    <!-- <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success btn-lg']) ?>
    </p> -->

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Sale Order') ?>
            <div class="float-end">
                <?php
                ?>
            </div>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        // 'class' => 'yii\grid\SerialColumn',
                        'class' => 'kartik\grid\SerialColumn',
                        'contentOptions' => ['class' => 'text-center','style' => 'width:45px;'], //กำหนด ความกว้างของ #
                    ],

                    // 'id',
                    // 'saleorder_id',
                    // 'due_date',
                    [
                        'attribute' => 'due_date',
                        'format' => 'date',
                        'contentOptions' => ['style' => 'width:130px;'],
                        'value' => function ($model) {
                            return $model->due_date ?? '';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'month',
                            'data' => ArrayHelper::map(
                                SaleorderItem::find()
                                    ->select('MONTH(due_date) AS month')
                                    ->distinct()
                                    ->orderBy('month')
                                    ->asArray()
                                    ->all(),
                                'month',
                                function ($model) {
                                    return Yii::$app->formatter->asDate("0000-{$model['month']}-01", 'MMMM');
                                }
                            ),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]),
                    ],
                    [
                        'attribute' => 'saleorder_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->saleorder_id && $model->saleoder ? $model->saleoder->po_number . ' - ' . $model->saleoder->customer->name : '';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'saleorder_id',
                            'data' => ArrayHelper::map(
                                SaleOrder::find()->all(),
                                'id',
                                function ($model) {
                                    return $model->po_number . ' - ' . $model->customer->name;
                                }
                            ),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    // 'product_id'
                    [
                        'attribute' => 'product_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->saleProduct0->code . ' - ' . $model->saleProduct0->name;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'product_id',
                            'data' => ArrayHelper::map(
                                SaleOrder::find()->all(),
                                'id',
                                function ($model) {
                                    return $model->po_number . ' - ' . $model->customer->name;
                                }
                            ),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    // 'price',
                    // 'quantity',
                    [
                        'attribute' => 'quantity',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'headerOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return Yii::$app->formatter->asDecimal($model->quantity, 0);
                        },
                    ],
                    // 'unit_id',
                    [
                        'attribute' => 'unit_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'headerOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return $model->saleUnit0->name;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'unit_id',
                            'data' => ArrayHelper::map(
                                SaleProductUnit::find()->all(),
                                'id',
                                function ($model) {
                                    return $model->name;
                                }
                            ),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    //'total_price',
                    // 'status_id',
                    [
                        'attribute' => 'status_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'headerOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return  '<h5><span class="badge" style="background-color:' . $model->saleStatus0->color . ';">' . $model->saleStatus0->name . '</span></h5>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'status_id',
                            'data' => ArrayHelper::map(
                                SaleStatus::find()->all(),
                                'id',
                                function ($model) {
                                    return $model->name;
                                }
                            ),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'headerOptions' => ['style' => 'width:250px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group">{view} {update} {delete}</div>',
                    ],
                ],
            ]); ?>

        </div>
    </div>
    <?php Pjax::end(); ?>
</div>