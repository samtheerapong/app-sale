<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderItem $model */

$this->title = $model->saleoder->po_number . ' : ' . Yii::$app->formatter->asDate($model->saleoder->deadline);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="saleorder-item-view">
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
        <div class="col-4">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Sale Order') ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<tr><th style="width: 200px;">{label}</th><td> {value}</td></tr>',
                            'attributes' => [

                                [
                                    'attribute' => 'saleoder.po_number',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->saleoder->po_number;
                                    },
                                ],

                                [
                                    'attribute' => 'saleoder.customer_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->saleoder->customer->name;
                                    },
                                ],

                                [
                                    'attribute' => 'saleoder.salers_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->saleoder->salers->name;
                                    },
                                ],

                                [
                                    'attribute' => 'saleoder.deadline',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        $formattedDate = $model->saleoder->new_deadline ? Yii::t('app', 'Postponed') .' : '.Yii::$app->formatter->asDate($model->saleoder->new_deadline) : Yii::$app->formatter->asDate($model->saleoder->deadline);
                                        return $model->saleoder->new_deadline ? "<span style='color: red;'>$formattedDate</span>" : $formattedDate;
                                    },
                                ],

                                [
                                    'attribute' => 'saleoder.payment_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->saleoder->payment->name;
                                    },
                                ],

                                [
                                    'attribute' => 'saleoder.status_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return '<span class="text" style="color:' . $model->saleoder->status0->color . ';">' . $model->saleoder->status0->name . '</span>';
                                    },
                                ],

                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-8">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Sales details') ?>
                </div>
                <div class="card-body">
                    <div class="row">

                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<tr><th style="width: 200px;">{label}</th><td> {value}</td></tr>',
                            'attributes' => [
                                // 'id',
                                // 'saleorder_id',

                                [
                                    'attribute' => 'due_date',
                                    'format' => 'date',
                                    'value' => function ($model) {
                                        return $model->due_date;
                                    },
                                ],
                                // 'due_date',
                                // 'product_id',
                                [
                                    'attribute' => 'product_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->saleProduct0->code . ' : ' . $model->saleProduct0->name;
                                    },
                                ],
                                // 'price',
                                // 'quantity',
                                [
                                    'attribute' => 'quantity',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return Yii::$app->formatter->asDecimal($model->quantity, 0);
                                    },
                                ],
                                // 'unit_id',
                                [
                                    'attribute' => 'unit_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->saleUnit0->name;
                                    },
                                ],
                                // 'total_price',
                                // 'status_id',
                                [
                                    'attribute' => 'status_id',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return '<span class="text" style="color:' . $model->saleStatus0->color . ';">' . $model->saleStatus0->name . '</span>';
                                    },
                                ],
                            ],
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
