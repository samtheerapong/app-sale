<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Moromi $model */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="moromi-view">
    <style>
        @media print {
            .print-area {
                display: block;
            }

            .non-printable {
                display: none;
            }
        }
    </style>
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-table"></i> ' . Yii::t('app', 'Moromi Record Table'), ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fas fa-calendar"></i> ' . Yii::t('app', 'Moromi Record Card'), ['card'], ['class' => 'btn btn-secondary']) ?>
        </p>

        <p style="text-align: right;">
            <?= Html::a('<i class="fas fa-list"></i> ' . Yii::t('app', 'Add List of Memo'), ['item', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>

        </p>
    </div>

    <div class="print-area">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-secondary">
                    <div class="card-header" style="background-color: <?= $model->moromiStatus0->color ?>; color: #fff;">
                        <?= Yii::t('app', 'Moromi') ?>
                    </div>
                    <div class="card-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                // 'id',
                                'code',
                                'batch_no',
                                'shikomi_date:date',
                                'transfer_date:date',
                                [
                                    'attribute' => 'tank_source',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return
                                            '<span class="text" style="color:' . $model->tankSource0->color . ';">' . $model->tankSource0->name . '</span>';
                                    },
                                ],
                                [
                                    'attribute' => 'tank_destination',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return
                                            '<span class="text" style="color:' . $model->tankDestination0->color . ';">' . $model->tankDestination0->name . '</span>';
                                    },
                                ],
                                [
                                    'attribute' => 'type_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return
                                            '<span class="text" style="color:' . $model->moromiType0->color . ';">' . $model->moromiType0->name . '</span>';
                                    },
                                ],
                                'created_at:date',
                                [
                                    'attribute' => 'created_by',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->created_by ? $model->createdBy0->thai_name : '';
                                    },
                                ],

                            ],
                        ]) ?>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border-secondary">
                    <div class="card-header" style="background-color: <?= $model->moromiStatus0->color ?>; color: #fff;">
                        <?= Yii::t('app', 'List of Memo') ?>
                    </div>
                    <div class="card-body">
                        <?= GridView::widget([
                            'dataProvider' => new \yii\data\ActiveDataProvider([
                                'query' => $model->getMoromiLists(),
                            ]),
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                // 'record_date:date',
                                [
                                    'attribute' => 'record_date',
                                    'format' => 'date',
                                    'contentOptions' => ['style' => 'text-align: center;'],
                                    'value' => function ($model) {
                                        return
                                            $model->record_date;
                                    },
                                ],
                                [
                                    'attribute' => 'memo_list',
                                    'format' => 'html',
                                    'contentOptions' => ['style' => 'text-align: center;'],
                                    'value' => function ($model) {
                                        return
                                            $model->memo->name;
                                    },
                                ],
                                // 'ph',
                                [
                                    'attribute' => 'ph',
                                    'format' => 'html',
                                    'contentOptions' => ['style' => 'text-align: center;'],
                                    'value' => function ($model) {
                                        return $model->ph ? $model->ph : Yii::t('app', '-');
                                    },
                                ],
                                // 'color',
                                [
                                    'attribute' => 'color',
                                    'format' => 'html',
                                    'contentOptions' => ['style' => 'text-align: center;'],
                                    'value' => function ($model) {
                                        return $model->color ? $model->color : Yii::t('app', '-');
                                    },
                                ],
                                // 'nacl',
                                [
                                    'attribute' => 'nacl',
                                    'format' => 'html',
                                    'contentOptions' => ['style' => 'text-align: center;'],
                                    'value' => function ($model) {
                                        return $model->nacl ? $model->nacl : Yii::t('app', '-');
                                    },
                                ],
                                // 'tn',
                                [
                                    'attribute' => 'tn',
                                    'format' => 'html',
                                    'contentOptions' => ['style' => 'text-align: center;'],
                                    'value' => function ($model) {
                                        return $model->tn ? $model->tn : Yii::t('app', '-');
                                    },
                                ],
                                // 'alcohol',
                                [
                                    'attribute' => 'alcohol',
                                    'format' => 'html',
                                    'contentOptions' => ['style' => 'text-align: center;'],
                                    'value' => function ($model) {
                                        return $model->alcohol ? $model->alcohol : Yii::t('app', '-');
                                    },
                                ],
                                // 'turbidity',
                                [
                                    'attribute' => 'turbidity',
                                    'format' => 'html',
                                    'contentOptions' => ['style' => 'text-align: center;'],
                                    'value' => function ($model) {
                                        return $model->turbidity ? $model->turbidity : Yii::t('app', '-');
                                    },
                                ],
                                'note',
                                // ... Add more columns if needed ...
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>