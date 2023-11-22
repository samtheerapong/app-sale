<?php

use app\modules\sauce\models\MoromiListMemo;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

?>
<div class="moromi-list-index">
    <div class="card border-info">
        <div class="card-header text-white bg-info">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'contentOptions' => ['class' => 'text-center', 'style' => 'width:45px;'], //กำหนด ความกว้างของ #
                        ],

                        [
                            'attribute' => 'record_date',
                            'format' => 'date',
                            'headerOptions' => [
                                'style' => 'width:150px;'
                            ],
                            'value' => function ($model) {
                                return $model->record_date;
                            },
                        ],
                        [
                            'attribute' => 'memo_list',
                            'format' => 'html',
                            'value' => function ($model) {
                                $name = $model->memo->name;
                                $note = $model->note;
                                $badge = ($note !== null && $note !== '') ? '<span class="badge badge-warning">' . $note . '</span>' : '';
                                return $name . '   ' . $badge;
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
                            'headerOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                            'contentOptions' => ['class' => 'text-center'],
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
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>