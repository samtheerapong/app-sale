<?php

use app\modules\salers\models\SaleCustomer;
use app\modules\salers\models\SaleOrder;
use app\modules\salers\models\Salers;
use app\modules\salers\models\SaleStatus;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleOrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Sale Order');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-order-index">
    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
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
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    [
                        'attribute' => 'po_number',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:160px;'],
                        'value' => function ($model) {
                            return $model->po_number ? $model->po_number : null;
                        },
                    ],
                    [
                        'attribute' => 'customer_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:auto;'],
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
                    // 'salers_id',
                    [
                        'attribute' => 'salers_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:180px;'],
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
                    // 'deadline:date',
                    [
                        'attribute' => 'deadline',
                        'format' => 'date',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                        'value' => function ($model) {
                            return $model->deadline ? $model->deadline : null;
                        },
                    ],
                    // 'new_deadline',
                    [
                        'attribute' => 'new_deadline',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                        'value' => function ($model) {
                            $formattedDate = $model->new_deadline ? Yii::$app->formatter->asDate($model->new_deadline) :  Yii::t('app', 'None');

                            return $model->new_deadline ? "<span style='color: red;'>$formattedDate</span>" : $formattedDate;
                        },
                    ],


                    //'payment_id',
                    //'percent_vat',
                    //'discount',
                    // 'grand_total',
                    [
                        'attribute' => 'grand_total',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-right', 'style' => 'width:80px;'],
                        'value' => function ($model) {
                            return $model->grand_total !== null ? Yii::$app->formatter->asDecimal($model->grand_total, 2) : null;
                        },
                    ],

                    //'remask:ntext',
                    // 'status',
                    [
                        'attribute' => 'status',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:180px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->status0->color . ';"><b>' . $model->status0->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'status',
                            'data' => ArrayHelper::map(SaleStatus::find()->where(['active' => 1])->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'contentOptions' => ['class' => 'text-center'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
    <?php Pjax::end(); ?>
</div>