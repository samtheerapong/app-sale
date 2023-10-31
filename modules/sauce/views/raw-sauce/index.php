<?php

use app\modules\sauce\models\RawSauce;
use app\modules\sauce\models\type;
use app\modules\sauce\models\Tank;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Raw Soy Sauce Record');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-sauce-index">


    <p>
    <?= Html::a(Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

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
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //    'reccord_date:date',
                    // [
                    //     'attribute' => 'year',
                    //     'format' => 'html',
                    //     'options' => ['style' => 'width:60px'],
                    //     'value' => function ($model) {
                    //         return $model->year ?? '';
                    //     },
                    //     'filter' => ArrayHelper::map(RawSauce::find()->select('YEAR(reccord_date) AS year')->distinct()->asArray()->all(), 'year', 'year'),
                    // ],
                    [
                        'attribute' => 'month',
                        'format' => 'date',
                        'options' => ['style' => 'width:200px'],
                        'value' => function ($model) {
                            return $model->reccord_date ?? '';
                        },
                        'filter' => ArrayHelper::map(
                            RawSauce::find()
                                ->select('MONTH(reccord_date) AS month')
                                ->distinct()
                                ->orderBy('month')
                                ->asArray()
                                ->all(),
                            'month',
                            // 'month',
                            function ($model) {
                                return Yii::$app->formatter->asDate("2023-{$model['month']}-01", 'MMMM');
                            }
                        ),
                    ],

                    // [
                    //     'attribute' => 'reccord_date',
                    //     'options' => ['style' => 'width:150px'],
                    //     'contentOptions' => ['class' => 'text-center'], // จัดตรงกลาง
                    //     'format' => 'date',
                    //     'value' => function ($model) {
                    //         return $model->reccord_date ?? '';
                    //     },
                    //     'filter' => DatePicker::widget([
                    //         'model' => $searchModel,
                    //         'attribute' => 'reccord_date',
                    //         'options' => ['placeholder' => Yii::t('app', 'Select...')],
                    //         'pluginOptions' => [
                    //             'format' => 'yyyy-mm-dd',
                    //             'autoclose' => true,
                    //         ]
                    //     ]),
                    // ],
                    // [
                    //     'attribute' => 'year',
                    //     'value' => function ($model) {
                    //         return $model->year ?? '';
                    //     },
                    //     'filter' => ArrayHelper::map(RawSauce::find()->select('YEAR(reccord_date) AS year')->distinct()->asArray()->all(), 'year', 'year'),
                    // ],

                    // [
                    //     'attribute' => 'created_at',
                    //     'format' => 'date',
                    //     'filter' => DatePicker::widget([
                    //         'model' => $searchModel,
                    //         'attribute' => 'reccord_date_start',
                    //         'attribute2' => 'reccord_date_end',
                    //         'language' => 'th',
                    //         'pluginOptions' => [
                    //             'format' => 'yyyy-mm-dd',
                    //             'autoclose' => true,
                    //         ]
                    //     ]),
                    // ],

                    [
                        'attribute' => 'tank_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:130px;'],
                        'value' => function ($model) {
                            return '<h5><span class="badge" style="background-color:' . $model->tank0->color . ';"><b>' . $model->tank0->code . '</b></span></h5>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'tank_id',
                            'data' => ArrayHelper::map(Tank::find()->all(), 'id', 'code'),
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
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:130px;'],
                        'value' => function ($model) {
                            return '<h5><span class="badge" style="background-color:' . $model->type0->color . ';"><b>' . $model->type0->code . '</b></span></h5>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'type_id',
                            'data' => ArrayHelper::map(type::find()->all(), 'id', 'code'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'batch',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:200px;'],
                        'value' => function ($model) {
                            return $model->batch;
                        },
                    ],

                    [
                        'attribute' => 'ph',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        //'options' => ['style' => 'width:6%;'],
                        'value' => function ($model) {
                            if ($model->ph < 4.6) {
                                return '<span class="text" style="color:#C70039">' . $model->ph . '</span>';
                            } else {
                                return '<span class="text">' . $model->ph . '</span>';
                            }
                        },
                    ],

                    [
                        'attribute' => 'nacl_p_avr',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        //'options' => ['style' => 'width:6%;'],
                        'value' => function ($model) {
                            if ($model->nacl_p_avr > 18) {
                                return '<span class="text" style="color:#C70039">' . $model->nacl_p_avr . '</span>';
                            } else {
                                return '<span class="text">' . $model->nacl_p_avr . '</span>';
                            }
                        },
                    ],

                    [
                        'attribute' => 'tn_p_avr',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        //'options' => ['style' => 'width:6%;'],
                        'value' => function ($model) {
                            if ($model->tn_p_avr < 1.5) {
                                return '<span class="text" style="color:#C70039">' . $model->tn_p_avr . '</span>';
                            } else {
                                return '<span class="text">' . $model->tn_p_avr . '</span>';
                            }
                        },
                    ],

                    [
                        'attribute' => 'col',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        //'options' => ['style' => 'width:6%;'],
                        'value' => function ($model) {
                            return $model->col;
                        },
                    ],

                    [
                        'attribute' => 'alc_p',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        //'options' => ['style' => 'width:6%;'],
                        'value' => function ($model) {
                            return $model->alc_p;
                        },
                    ],
                    // 'alc_t',
                    [
                        'attribute' => 'ppm',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        //'options' => ['style' => 'width:6%;'],
                        'value' => function ($model) {
                            return $model->ppm;
                        },
                    ],
                    // 'brix',
                    [
                        'attribute' => 'brix',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        //'options' => ['style' => 'width:6%;'],
                        'value' => function ($model) {
                            return $model->brix;
                        },
                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'headerOptions' => ['style' => 'width: 120px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>

        </div>
    </div>
</div>