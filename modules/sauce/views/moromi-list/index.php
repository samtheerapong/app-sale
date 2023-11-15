<?php

use app\modules\sauce\models\Moromi;
use app\modules\sauce\models\MoromiList;
use app\modules\sauce\models\MoromiListMemo;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Moromi List');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moromi-list-index">
    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create Moromi Memo List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
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
                        // 'moromi_id',
                        [
                            'attribute' => 'moromis.batch_no',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center','style' => 'width:140px;'],
                            'value' => function ($model) {
                                return Html::a(
                                    $model->moromis->batch_no ? $model->moromis->batch_no : Yii::t('app', '-'),
                                    ['view', 'id' => $model->id],
                                );
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'moromi_id',
                                'data' => ArrayHelper::map(Moromi::find()->all(), 'id', 'batch_no'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]),
                        ],
                        [
                            'attribute' => 'record_date',
                            'format' => 'date',
                            'contentOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                            'value' => function ($model) {
                                return $model->record_date;
                            },
                        ],
                        [
                            'attribute' => 'memo_list',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center','style' => 'width:300px;'],
                            'value' => function ($model) {
                                $name = $model->memo->name;
                                $note = $model->note;
                                $badge = ($note !== null && $note !== '') ? '<span class="badge badge-warning">' . $note . '</span>' : '';
                                return $name . '<br>' . $badge;
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'memo_list',
                                'data' => ArrayHelper::map(MoromiListMemo::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]),
                        ],
                        [
                            'attribute' => 'ph',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                            'value' => function ($model) {
                                return $model->ph ? $model->ph : '-';
                            },
                        ],
                        [
                            'attribute' => 'color',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                            'value' => function ($model) {
                                return $model->color ? $model->color : '-';
                            },
                        ],
                        [
                            'attribute' => 'nacl',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                            'value' => function ($model) {
                                return $model->nacl ? $model->nacl : '-';
                            },
                        ],
                        [
                            'attribute' => 'tn',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                            'value' => function ($model) {
                                return $model->tn ? $model->tn : '-';
                            },
                        ],
                        [
                            'attribute' => 'alcohol',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                            'value' => function ($model) {
                                return $model->alcohol ? $model->alcohol : '-';
                            },
                        ],
                        [
                            'attribute' => 'turbidity',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                            'value' => function ($model) {
                                return $model->turbidity ? $model->turbidity : '-';
                            },
                        ],
                        //'note:ntext',
                        // [
                        //     'attribute' => 'note',
                        //     'format' => 'html',
                        //     'contentOptions' => ['class' => 'text-center', 'style' => 'width:250px;'],
                        //     'value' => function ($model) {
                        //         return $model->note ? $model->note : '';
                        //     },
                        // ],
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