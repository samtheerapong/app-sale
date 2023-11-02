<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauce $model */

$this->title = $model->tank0->code . ' | ' . $model->type0->code . ' | ' . $model->batch;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Raw Sauces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="raw-sauce-view">

    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary']) ?>
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
        <div class="col-md-12 col-sm-12">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Record') ?>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 150px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            // 'id',
                            'reccord_date:date',
                            'batch',
                            // 'tank_id',
                            [
                                'attribute' => 'tank_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return '<span class="badge" style="background-color:' . $model->tank0->color . '; color:#fff;"><b>' . $model->tank0->code . '</b></span>';
                                },
                            ],

                            // 'type_id',
                            [
                                'attribute' => 'type_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return '<span class="badge" style="background-color:' . $model->type0->color . '; color:#fff;"><b>' . $model->type0->code . '</b></span>';
                                },
                            ],
                            // 'ph',
                            [
                                'attribute' => 'ph',
                                'format' => 'html',
                                'value' => function ($model) {
                                    if ($model->ph < 4.6) {
                                        return '<b><span class="text" style="color:#C70039">' . $model->ph . '</span><b>';
                                    } else {
                                        return '<b><span class="text" style="color:#748E63">' . $model->ph . '</span><b>';
                                    }
                                },
                            ],
                            'col',
                            // 'alc_t',
                            // 'alc_p',
                            'ppm',
                            'brix',
                            'remask',
                            // 'created_at',
                            // 'updated_at',
                            // 'created_by',
                            // 'updated_by',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'NaCl')  ?>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 150px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            'nacl_t1',
                            'nacl_t2',
                            // 'nacl_t_avr',
                            [
                                'attribute' => 'nacl_t_avr',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return '<i><b>' . $model->nacl_t_avr . '</b></i>';
                                },
                            ],
                            'nacl_p1',
                            'nacl_p2',
                            // 'nacl_p_avr',    
                            [
                                'attribute' => 'nacl_p_avr',
                                'format' => 'html',
                                'value' => function ($model) {
                                    if ($model->nacl_p_avr > 10) {
                                        return '<i><b><span class="text" style="color:#C70039">' . $model->nacl_p_avr . '</span><b></i>';
                                    } else {
                                        return '<i><b><span class="text" style="color:#748E63">' . $model->nacl_p_avr . '</span><b></i>';
                                    }
                                },
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'TN')  ?>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 150px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            'tn_t1',
                            'th_t2',
                            [
                                'attribute' => 'tn_t_avr',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return '<i><b>' . $model->tn_t_avr . '</b></i>';
                                },
                            ],
                            'tn_p1',
                            'tn_p2',
                            [
                                'attribute' => 'tn_p_avr',
                                'format' => 'html',
                                'value' => function ($model) {
                                    if ($model->tn_p_avr < 1.5) {
                                        return '<b><span class="text" style="color:#C70039">' . $model->tn_p_avr . '</span><b>';
                                    } else {
                                        return '<b><span class="text" style="color:#748E63">' . $model->tn_p_avr . '</span><b>';
                                    }
                                },
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Alcohol')  ?>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 150px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            'alc_t',
                            'alc_p',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>