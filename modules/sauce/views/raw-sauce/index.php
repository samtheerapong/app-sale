<?php

use app\modules\sauce\models\RawSauce;
use app\modules\sauce\models\Simple;
use app\modules\sauce\models\Tank;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Raw Soy Sauce Record');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-sauce-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Create Raw Sauce'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    // 'code',
                    // 'reccord_date',
                    [
                        'attribute' => 'reccord_date',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->reccord_date;
                        },

                    ],
                    // 'tank_id',
                    [
                        'attribute' => 'tank_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:100px;'],
                        'value' => function ($model) {
                            return '<h5><span class="badge" style="background-color:' . $model->tank->color . ';"><b>' . $model->tank->code . '</b></span></h5>';
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
                    // 'simple_id',
                    [
                        'attribute' => 'simple_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return '<h5><span class="badge" style="background-color:' . $model->simple->color . ';"><b>' . $model->simple->code . '</b></span></h5>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'simple_id',
                            'data' => ArrayHelper::map(Simple::find()->all(), 'id', 'code'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    // 'ph',
                    [
                        'attribute' => 'ph',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->ph;
                        },
                    ],
                    //'nacl_t1',
                    //'nacl_t2',
                    // 'nacl_t_avr',
                    [
                        'attribute' => 'nacl_t_avr',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->nacl_t_avr;
                        },
                    ],
                    //'nacl_p1',
                    //'nacl_p2',
                    // 'nacl_p_avr',
                    [
                        'attribute' => 'nacl_p_avr',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->nacl_p_avr;
                        },
                    ],
                    //'tn_t1',
                    //'th_t2',
                    // 'tn_t_avr',
                    [
                        'attribute' => 'tn_t_avr',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->tn_t_avr;
                        },
                    ],
                    //'tn_p1',
                    //'tn_p2',
                    // 'th_p_avr',
                    [
                        'attribute' => 'th_p_avr',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->th_p_avr;
                        },
                    ],
                    // 'cal',
                    [
                        'attribute' => 'cal',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->cal;
                        },
                    ],
                    // 'alc_t',
                    [
                        'attribute' => 'alc_t',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->alc_t;
                        },
                    ],
                    // 'alc_p',
                    [
                        'attribute' => 'alc_p',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->alc_p;
                        },
                    ],
                    // 'alc_t',
                    [
                        'attribute' => 'ppm',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->ppm;
                        },
                    ],
                    // 'brix',
                    [
                        'attribute' => 'brix',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->brix;
                        },
                    ],
                    //'remask',
                    //'created_at',
                    //'updated_at',
                    //'created_by',
                    //'updated_by',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'headerOptions' => ['style' => 'width: 150px;'],
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