<?php

use app\modules\sauce\models\Moromi;
use app\modules\sauce\models\MoromiStatus;
use app\modules\sauce\models\TankDestination;
use app\modules\sauce\models\TankSource;
use app\modules\sauce\models\Type;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Moromi');
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
                    // 'code',
                    [
                        'attribute' => 'tank_source',
                        'format' => 'html',
                        // 'headerOptions' => ['style' => 'width: 170px;'],
                        'contentOptions' => ['class' => 'text-center','style' => 'width:170px;'],
                        'value' => function ($model) {
                            return $model->code;
                        },                      
                    ],
                    // 'batch_no',
                    [
                        'attribute' => 'batch_no',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center','style' => 'width:150px;'],
                        'value' => function ($model) {
                            return $model->batch_no;
                        },                      
                    ],
                    [
                        'attribute' => 'shikomi_date',
                        'format' => 'date',
                        'contentOptions' => ['class' => 'text-center','style' => 'width:auto;'],
                        'value' => function ($model) {
                            return $model->shikomi_date;
                        },                      
                    ],
                    // 'transfer_date:date',
                    [
                        'attribute' => 'transfer_date',
                        'format' => 'date',
                        'contentOptions' => ['class' => 'text-center','style' => 'width:auto;'],
                        'value' => function ($model) {
                            return $model->transfer_date;
                        },                      
                    ],
                    [
                        'attribute' => 'tank_source',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center','style' => 'width:100px;'],
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
                        'contentOptions' => ['class' => 'text-center','style' => 'width:100px;'],
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
                        'contentOptions' => ['class' => 'text-center','style' => 'width:300px;'],
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
                        'contentOptions' => ['class' => 'text-center','style' => 'width:150px;'],
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
                        'template' => '<div class="btn-group btn-group-xs" role="group">{view} {item}  {update} {delete}</div>',
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