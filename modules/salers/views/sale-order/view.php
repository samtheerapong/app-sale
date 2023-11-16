<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleOrder $model */

$this->title = $model->po_number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Order'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sale-order-view">
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
                        [
                            'attribute' => 'po_number',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->po_number ? $model->po_number : null;
                            },
                        ],
                        // 'customer_id',
                        [
                            'attribute' => 'customer_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->customer->name;
                            },
                        ],
                        // 'salers_id',
                        [
                            'attribute' => 'salers_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->salers->name;
                            },
                        ],
                        [
                            'attribute' => 'deadline',
                            'format' => 'date',
                            'value' => function ($model) {
                                return $model->deadline ? $model->deadline : null;
                            },
                        ],
                        // 'new_deadline',
                        [
                            'attribute' => 'new_deadline',
                            'format' => 'html',
                            'value' => function ($model) {
                                $formattedDate = $model->new_deadline ? Yii::$app->formatter->asDate($model->new_deadline) : Yii::t('app', 'None');

                                return $model->new_deadline ? "<span style='color: red;'>$formattedDate</span>" : $formattedDate;
                            },
                        ],
                        // 'payment_id',
                        [
                            'attribute' => 'payment_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->payment_id ? $model->payment->name : null;
                            },
                        ],
                        [
                            'attribute' => 'total',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->total !== null ? Yii::$app->formatter->asDecimal($model->total, 2) : null;
                            },
                        ],
                        // 'percent_vat',
                        [
                            'attribute' => 'percent_vat',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->percent_vat !== null ? Yii::$app->formatter->asDecimal($model->percent_vat, 2) . ' %' : null;
                            },
                        ],
                        // 'discount',
                        [
                            'attribute' => 'discount',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->discount !== null ? Yii::$app->formatter->asDecimal($model->discount, 2) : null;
                            },
                        ],
                        // 'grand_total',
                        [
                            'attribute' => 'grand_total',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->grand_total !== null ? Yii::$app->formatter->asDecimal($model->grand_total, 2) : null;
                            },
                        ],
                        // 'status',
                        [
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->status0->color . ';"><b>' . $model->status0->name . '</b></span>';
                            },
                        ],
                        'remask:ntext',
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>