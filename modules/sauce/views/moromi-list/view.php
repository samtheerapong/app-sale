<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiList $model */

$this->title = $model->moromis->code . ' | ' . $model->moromis->batch_no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="moromi-list-view">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-home"></i> ' . Yii::t('app', 'Home'), ['index'], ['class' => 'btn btn-primary']) ?>
        </p>

        <p style="text-align: right;">
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
    <div class="row">
        <div class="col-md-4">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                <?= Yii::t('app', 'Moromi Record') ?>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 200px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            // 'id',
                            'moromis.code',

                            'moromis.batch_no',

                            'moromis.shikomi_date:date',

                            [
                                'label' => Yii::t('app', 'Type'),
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->moromi_id ? $model->moromis->moromiType0->name : '-';
                                },
                            ],

                            'moromis.transfer_date:date',

                            [
                                'label' => Yii::t('app', 'Tank Source'),
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->moromi_id ? $model->moromis->tankSource0->name : '-';
                                },
                            ],

                            [
                                'label' => Yii::t('app', 'Tank Destination'),
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->moromi_id ? $model->moromis->tankDestination0->name : '-';
                                },
                            ],

                        ],
                    ]) ?>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Moromi List') ?>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 200px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            
                            'record_date:date',
                            // 'memo_list',
                            [
                                'attribute' => 'memo_list',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->memo_list ? $model->memo->name : '-';
                                },
                            ],
                            [
                                'attribute' => 'ph',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->ph ? $model->ph : '-';
                                },
                            ],
                            [
                                'attribute' => 'color',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->color ? $model->color : '-';
                                },
                            ],
                            [
                                'attribute' => 'nacl',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->nacl ? $model->nacl : '-';
                                },
                            ],
                            [
                                'attribute' => 'tn',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->tn ? $model->tn : '-';
                                },
                            ],
                            [
                                'attribute' => 'alcohol',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->alcohol ? $model->alcohol : '-';
                                },
                            ],
                            [
                                'attribute' => 'turbidity',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->turbidity ? $model->turbidity : '-';
                                },
                            ],
                            [
                                'attribute' => 'note',
                                'format' => 'ntext',
                                'value' => function ($model) {
                                    return $model->note ? $model->note : '';
                                },
                            ],
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>