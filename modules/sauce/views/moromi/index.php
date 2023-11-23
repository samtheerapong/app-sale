<?php

use app\modules\sauce\models\Moromi;
use app\modules\sauce\models\MoromiListSearch;
use app\modules\sauce\models\MoromiStatus;
use app\modules\sauce\models\TankDestination;
use app\modules\sauce\models\TankSource;
use app\modules\sauce\models\Type;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Moromi Record Table');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moromi-index">

    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create Moromi Record'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fas fa-calendar"></i> ' . Yii::t('app', 'Moromi Record Card'), ['card'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?php Pjax::begin(); ?>
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
                            $searchModel = new MoromiListSearch();
                            $searchModel->moromi_id = $model->id;
                            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                            return Yii::$app->controller->renderPartial('_moromiitem', [
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
                    // 'code',
                    // [
                    //     'attribute' => 'code',
                    //     'format' => 'html',
                    //     'contentOptions' => ['style' => 'width:170px;'],
                    //     'value' => function ($model) {
                    //         return $model->code;
                    //     },                      
                    // ],
                    // 'batch_no',
                    [
                        'attribute' => 'batch_no',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:200px;'],
                        'value' => function ($model) {
                            return $model->batch_no;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'batch_no',
                            'data' => ArrayHelper::map(Moromi::find()->all(), 'batch_no', 'batch_no'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]),
                    ],
                    [
                        'attribute' => 'shikomi_date',
                        'format' => 'date',
                        'contentOptions' => ['style' => 'width:150px;'],
                        'value' => function ($model) {
                            return $model->shikomi_date;
                        },
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'shikomi_date',
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'orientation' => 'bottom', // Set the orientation to bottom
                            ]
                        ]),
                    ],
                    // 'transfer_date:date',
                    [
                        'attribute' => 'transfer_date',
                        'format' => 'date',
                        'contentOptions' => ['style' => 'width:150px;'],
                        'value' => function ($model) {
                            return $model->transfer_date;
                        },
                        'filter' => DatePicker::widget([
                            // 'language' => 'th',
                            'model' => $searchModel,
                            'attribute' => 'transfer_date',
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'orientation' => 'bottom', // Set the orientation to bottom
                            ]
                        ]),

                    ],
                    [
                        'attribute' => 'tank_source',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'value' => function ($model) {
                            return '<span class="text" style="color:' . $model->tankSource0->color . ';"><b>' . $model->tankSource0->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'tank_source',
                            'data' => ArrayHelper::map(TankSource::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]),
                    ],
                    [
                        'attribute' => 'tank_destination',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'value' => function ($model) {
                            return '<span class="text" style="color:' . $model->tankDestination0->color . ';"><b>' . $model->tankDestination0->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'tank_destination',
                            'data' => ArrayHelper::map(TankDestination::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'attribute' => 'type_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="text" style="color:' . $model->moromiType0->color . ';"><b>' . $model->moromiType0->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'type_id',
                            'data' => ArrayHelper::map(Type::find()->all(), 'id', 'name'),
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
                        'contentOptions' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return '<span class="text" style="color:' . $model->moromiStatus0->color . ';"><b>' . $model->moromiStatus0->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'status_id',
                            'data' => ArrayHelper::map(MoromiStatus::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    //'created_at',
                    //'updated_at',
                    //'created_by',
                    //'updated_by',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'headerOptions' => ['style' => 'width:250px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group">{item} {view} {update} {delete}</div>',
                        'buttons' => [
                            'item' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-list"></i>', ['item', 'id' => $model->id], [
                                    'title' => Yii::t('app', 'Add List of Memo'),
                                    'class' => 'btn btn-outline-dark btn-sm',
                                ]);
                            },
                        ],
                    ],
                ],
            ]); ?>

        </div>
    </div>
    <?php Pjax::end(); ?>
</div>