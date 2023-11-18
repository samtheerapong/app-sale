<?php

use app\modules\salers\models\SaleCustomer;
use app\modules\salers\models\SaleOrder;
use app\modules\salers\models\SaleorderItemSearch;
use app\modules\salers\models\SalePayment;
use app\modules\salers\models\Salers;
use app\modules\salers\models\SaleStatus;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Sale Order');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleorder-index">
    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Sale Order') ?>
            <div class="float-end">
                <?php
                $totalGrand = $dataProvider->query->sum('grand_total');
                echo Yii::t('app', 'Grand total') . ' : ' . Yii::$app->formatter->asDecimal($totalGrand, 2) . ' บาท ';
                ?>
            </div>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'hover' => true,
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
                        'class' => 'kartik\grid\ExpandRowColumn',
                        'value' => function ($model, $key, $index, $column) {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detail' => function ($model, $key, $index, $column) {
                            $searchModel = new SaleorderItemSearch();
                            $searchModel->saleorder_id = $model->id;
                            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                            return Yii::$app->controller->renderPartial('_saleorderitem', [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                            ]);
                        },
                    ],
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    [
                        'attribute' => 'po_number',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width:160px;'],
                        'value' => function ($model) {
                            return $model->po_number ? $model->po_number : null;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'po_number',
                            'data' => ArrayHelper::map(SaleOrder::find()->all(), 'po_number', 'po_number'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'attribute' => 'customer_id',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width:300px;'],
                        'value' => function ($model) {
                            return $model->customer->name;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'customer_id',
                            'data' => ArrayHelper::map(SaleCustomer::find()->where(['active' => 1])->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'attribute' => 'salers_id',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width:180px;'],
                        'value' => function ($model) {
                            return $model->salers->name;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'salers_id',
                            'data' => ArrayHelper::map(Salers::find()->where(['active' => 1])->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'attribute' => 'deadline',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width:150px;'],
                        'value' => function ($model) {
                            $formattedDate = $model->new_deadline ? Yii::$app->formatter->asDate($model->new_deadline) : Yii::$app->formatter->asDate($model->deadline);

                            return $model->new_deadline ? "<span style='color: red;'>$formattedDate</span>" : $formattedDate;
                        },
                    ],
                    [
                        'attribute' => 'grand_total',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-right', 'style' => 'width:150px;'],
                        'value' => function ($model) {
                            return $model->grand_total !== null ? Yii::$app->formatter->asDecimal($model->grand_total, 2) : null;
                        },
                    ],
                    [
                        'attribute' => 'payment_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-right', 'style' => 'width:180px;'],
                        'value' => function ($model) {
                            return $model->payment->name;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'payment_id',
                            'data' => ArrayHelper::map(SalePayment::find()->where(['active' => 1])->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'attribute' => 'status_id',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width:150px;'],
                        'value' => function ($model) {
                            return '<h5><span class="badge" style="background-color:' . $model->status0->color . ';">' . $model->status0->name . '</span></h5>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'status_id',
                            'data' => ArrayHelper::map(SaleStatus::find()->where(['active' => 1])->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    //'remask:ntext',
                    // 'status_id',
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