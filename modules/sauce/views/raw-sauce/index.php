<?php

use app\modules\sauce\models\RawSauce;
use app\modules\sauce\models\type;
use app\modules\sauce\models\Tank;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Raw Sauce Table');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-sauce-index">
    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

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
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:60px;'], //กำหนด ความกว้างของ #
                    ],

                    [
                        'attribute' => 'reccord_date',
                        'format' => 'date',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:160px;'],
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
                                return Yii::$app->formatter->asDate("0000-{$model['month']}-01", 'MMMM');
                            }
                        ),
                    ],

                    [
                        'attribute' => 'tank_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
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
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
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
                        'value' => function ($model) {
                            return $model->batch ? $model->batch : '';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'batch',
                            'data' => ArrayHelper::map(RawSauce::find()->all(), 'batch', 'batch'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'ph',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            if ($model->ph < 4.6) {
                                return '<span class="text" style="color:#C70039">' . $model->ph . '</span>';
                            } else {
                                return $model->ph ? '<span class="text">' . $model->ph . '</span>' : '';
                            }
                        },
                    ],

                    // [
                    //     'attribute' => 'nacl_p_avr',
                    //     'format' => 'html',
                    //     'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                    //     'value' => function ($model) {
                    //         if ($model->nacl_p_avr > 18) {
                    //             return '<span class="text" style="color:#C70039">' . $model->nacl_p_avr . '</span>';
                    //         } else {
                    //             return $model->nacl_p_avr ? '<span class="text">' . $model->nacl_p_avr . '</span>' : '';
                    //         }
                    //     },
                    // ],

                    [
                        'attribute' => 'nacl_p_avr',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            if (in_array($model->type_id, [2, 4, 8, 9]) && $model->nacl_p_avr > 11) {
                                return '<span class="text" style="color:#C70039">' . $model->nacl_p_avr . '</span>';
                            } elseif (in_array($model->type_id, [1, 3, 5, 6, 7, 10]) && $model->nacl_p_avr > 18) {
                                return '<span class="text" style="color:#C70039">' . $model->nacl_p_avr . '</span>';
                            } else {
                                return $model->ph ? '<span class="text">' . $model->nacl_p_avr . '</span>' : '';
                            }
                        },
                    ],

                    [
                        'attribute' => 'tn_p_avr',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            if (in_array($model->type_id, [2, 4, 8, 9]) && $model->tn_p_avr < 1.8) {
                                return '<span class="text" style="color:#C70039">' . $model->tn_p_avr . '</span>';
                            } elseif (in_array($model->type_id, [1, 3, 5, 6, 7, 10]) && $model->tn_p_avr < 1.5) {
                                return '<span class="text" style="color:#C70039">' . $model->tn_p_avr . '</span>';
                            } else {
                                return $model->ph ? '<span class="text">' . $model->tn_p_avr . '</span>' : '';
                            }
                        },
                    ],





                    [
                        'attribute' => 'col',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            return $model->col ? $model->col : '';
                        },
                    ],

                    [
                        'attribute' => 'alc_p',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            return $model->alc_p ? $model->alc_p : '';
                        },
                    ],
                    // 'alc_t',
                    [
                        'attribute' => 'ppm',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            return $model->ppm ? $model->ppm : '';
                        },
                    ],
                    // 'brix',
                    [
                        'attribute' => 'brix',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            return $model->brix ? $model->brix : '';
                        },
                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:200px;'],
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