<?php

use app\modules\it\models\ItStockCat;
use app\modules\it\models\ItStockListSearch;
use kartik\widgets\Select2;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;
use yii\bootstrap5\LinkPager;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\it\models\ItStockSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'It Stocks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="it-stock-index">

    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="bi bi-cart-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <p style="text-align: right;">
            <?= Html::a('<i class="bi bi-box-fill"></i> ' . Yii::t('app', 'Category'), ['/it/it-stock-cat/index'], ['class' => 'btn btn-warning btn-sm']) ?>
            <?= Html::a('<i class="bi bi-bar-chart-fill"></i> ' . Yii::t('app', 'Report'), ['/it/report'], ['class' => 'btn btn-info btn-sm']) ?>
        </p>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body table-responsive">

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
                    [
                        'class' => 'kartik\grid\ExpandRowColumn',
                        'value' => function ($model, $key, $index, $column) {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detail' => function ($model, $key, $index, $column) {
                            $searchModel = new ItStockListSearch();
                            $searchModel->stock_id = $model->id;
                            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                            return Yii::$app->controller->renderPartial('_items', [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                            ]);
                        },
                    ],

                    [
                        'class' => 'yii\grid\SerialColumn',
                        'contentOptions' => ['style' => 'width:45px;'], //กำหนด ความกว้างของ #
                    ],

                    // 'id',
                    [
                        'attribute' => 'photo',
                        'contentOptions' => ['style' => 'width:50px;'], //กำหนด ความกว้างของ #
                        'format' => ['image', ['height' => '50']],
                        'value' => function ($model) {
                            return ('@web/images/it/stock/' . $model->photo);
                        },
                        'filter' => false
                    ],
                    'name',
                    [
                        'attribute' => 'category',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->category0->name;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'category',
                            'data' => ArrayHelper::map(ItStockCat::find()->where(['active' => 1])->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'balance',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'value' => function ($model) {
                            $balance = $model->CalStock();
                            $minimum = $model->minimum;

                            if ($balance !== null && $balance < $minimum) {
                                // ถ้า $model->balance น้อยกว่า $model->minimum
                                $content = '<span style="color: red;">' . ($balance !== null ? $balance : '-') . '</span>';
                            } else {
                                // ถ้า $model->balance ไม่น้อยกว่า $model->minimum หรือ $model->balance เป็น null
                                $content = $balance !== null ? $balance : '-';
                            }

                            return $content;
                        },
                    ],

                    [
                        'attribute' => 'minimum',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->minimum ? $model->minimum : '-';
                        },
                    ],
                    //'photo:ntext',
                    //'created_at',
                    [
                        'attribute' => 'updated_at',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width:250px;'],
                        'value' => function ($model) {
                            return $model->updated_at ? Yii::$app->formatter->asDate($model->updated_at) : Yii::t('app', 'None');
                        },
                        'filter' => DatePicker::widget([
                            // 'language' => 'th',
                            'model' => $searchModel,
                            'attribute' => 'updated_at',
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'orientation' => 'bottom', // Set the orientation to bottom
                            ]
                        ]),

                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'headerOptions' => ['style' => 'width:250px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group">{item} {view} {update} {delete}</div>',
                        'buttons' => [
                            'item' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-list"></i>', ['item', 'id' => $model->id], [
                                    'title' => Yii::t('app', 'Add Item'),
                                    'class' => 'btn btn-outline-dark btn-sm',
                                ]);
                            },
                        ],
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>