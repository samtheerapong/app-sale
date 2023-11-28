<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Moromi $model */

$this->title = $model->batch_no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="moromi-view">

    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary btn-lg']) ?>
            <?php //echo Html::a('<i class="fas fa-calendar"></i> ' . Yii::t('app', 'Moromi Record Card'), ['card'], ['class' => 'btn btn-secondary btn-lg']) 
            ?>
        </p>

        <p style="text-align: right;">
            <?= Html::a('<i class="fas fa-list"></i> ' . Yii::t('app', 'Add List of Memo'), ['item', 'id' => $model->id], ['class' => 'btn btn-primary btn-lg']) ?>
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-info btn-lg']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-lg',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>

        </p>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-secondary">
                <div class="card-header" style="background-color: <?= $model->moromiStatus0->color ?>; color: #fff;">
                    <?= Yii::t('app', 'Moromi') ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <strong><?= Yii::t('app', 'Batch No') ?> : </strong> <?= $model->batch_no; ?>
                        </div>
                        <div class="col-md-3">
                            <strong><?= Yii::t('app', 'Shikomi Date') ?> : </strong> <?= Yii::$app->formatter->asDate($model->shikomi_date); ?>
                        </div>
                        <div class="col-md-3">
                            <strong><?= Yii::t('app', 'Type') ?> : </strong>
                            <?= '<span class="text" style="color:' . $model->moromiType0->color . ';"><b>' . $model->moromiType0->name . '</b> </span>'; ?>
                        </div>
                        <div class="col-md-3">
                            <strong><?= Yii::t('app', 'Status') ?> : </strong> 
                            <?= '<span class="text" style="color:' . $model->moromiStatus0->color . ';"><b>' . $model->moromiStatus0->name . '</b> </span>'; ?>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <strong><?= Yii::t('app', 'Transfer Date') ?> : </strong> <?= $model->transfer_date ? Yii::$app->formatter->asDate($model->transfer_date) : Yii::t('app', 'None'); ?>
                        </div>
                        <div class="col-md-3">
                            <strong><?= Yii::t('app', 'Tank') ?> : </strong> 
                            <?= '<span class="text" style="color:' . $model->tankSource0->color . ';"><b>' . $model->tankSource0->name . '</b> </span>'; ?>
                            <i class="fa-solid fa-arrow-right-long"></i> <?= $model->tankDestination0->name; ?>
                        </div>
                        <div class="col-md-6">
                            <strong><?= Yii::t('app', 'Remask') ?> : </strong> <?= $model->remask; ?>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="col-md-12">
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
                            [
                                'class' => 'yii\grid\SerialColumn',
                                'contentOptions' => ['class' => 'text-center', 'style' => 'width:45px;'], //กำหนด ความกว้างของ #
                            ],
                            // 'record_date:date',
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
                            // 'note',
                            // ... Add more columns if needed ...
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>