<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepair $model */

$this->title = $model->repair_code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Repairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="request-repair-view">
    <div class="row">
        <div style="display: flex; justify-content: space-between;">
            <p>
                <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'),['index'], ['class' => 'btn btn-primary']) ?>
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
            <div class="col-md-6">
                <div class="card border-secondary">
                    <div class="card-header text-white bg-secondary">
                        <?= $this->title ?>
                    </div>
                    <div class="card-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<tr><th style="width: 200px;">{label}</th><td> {value}</td></tr>',
                            'attributes' => [
                                // 'id',
                                // 'repair_code',
                                [
                                    'attribute' => 'job_status_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return
                                            '<h5><span class="badge" style="background-color:' . $model->jobStatus->color . '; color: #FFFFFF;">' . $model->jobStatus->name . '</span></h5>';
                                    },
                                ],

                                [
                                    'attribute' => 'repair_code',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->repair_code;
                                    },
                                ],
                                [
                                    'attribute' => 'priority',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return
                                            '<h5><span class="badge" style="background-color:' . $model->priority0->color . '; color: #FFFFFF;">' . $model->priority0->name . '</span></h5>';
                                    },
                                ],
                                [
                                    'attribute' => 'urgency',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return
                                            '<h5><span class="badge" style="background-color:' . $model->urgency0->color . '; color: #FFFFFF;">' . $model->urgency0->name . '</span></h5>';
                                    },
                                ],
                                'request_title',
                                'request_detail:ntext',
                                [
                                    'attribute' => 'created_by',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->created_by ? $model->createdBy->thai_name : '';
                                    },
                                ],
                                [
                                    'attribute' => 'request_department',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return
                                            '<h5><span class="badge" style="background-color:#232D3F; color: #FFFFFF;">' . $model->departments->name . '</span></h5>';
                                    },
                                ],

                                [
                                    'attribute' => 'created_date',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->created_date ? Yii::$app->formatter->asDate($model->created_date, 'php:d M Y') : '';
                                    },
                                ],



                                [
                                    'attribute' => 'broken_date',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->broken_date ? Yii::$app->formatter->asDate($model->broken_date, 'php:d M Y') : '';
                                    },
                                ],

                                [
                                    'attribute' => 'locations_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->locations->name;
                                    },
                                ],
                                'remask:ntext',
                                // 'docs:ntext',

                                // 'ref',
                            ],
                        ]) ?>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-secondary">
                    <div class="card-header text-white bg-secondary">
                        <?= Yii::t('app', 'Docs') ?>
                    </div>
                    <div class="card-body">
                        <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref, $model->id)]); ?>
                    </div>
                </div>


                <!-- <div class="card border-secondary">
                    <div class="card-header text-white bg-secondary">
                        <?= Yii::t('app', 'Approver') ?>
                    </div>
                    <div class="card-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<tr><th style="width: 200px;">{label}</th><td> {value}</td></tr>',
                            'attributes' => [
                                [
                                    'label' => Yii::t('app', 'Approver'),
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->approver ? $model->createdBy->thai_name : Yii::t('app', 'Waiting for approval');
                                    },
                                ],
                                [
                                    'attribute' => 'approve_date',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->approve_date ? Yii::$app->formatter->asDate($model->approve_date, 'php:d M Y') : '';
                                    },
                                ],
                                [
                                    'attribute' => 'approve_comment',
                                    'format' => 'ntext',
                                    'value' => function ($model) {
                                        return $model->approve_comment ? $model->approve_comment : '';
                                    },
                                ],
                            ],
                        ]) ?>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</div>