<?php

use kartik\form\ActiveForm;
use kartik\grid\GridView;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\Saleorder $model */

$this->title = $model->po_number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Order'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$totalPriceSum = $model->getSaleorderItems()->sum('total_price');
$formattedTotalPriceSum = Yii::$app->formatter->asDecimal($totalPriceSum, 2);
?>
<div class="saleorder-view">
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

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Sale Order') ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'PO Number') ?> : </strong> <?= $model->po_number; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'Customer') ?> : </strong> <?= $model->customer->name; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'Salers') ?> : </strong> <?= $model->salers->name; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'Deadline') ?> : </strong> <?= Yii::$app->formatter->asDate($model->deadline); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'New Deadline') ?> : </strong>
                        <?php
                        if ($model->new_deadline !== null) {
                            echo '<span style="color: red;">' . Yii::$app->formatter->asDate($model->new_deadline) . '</span>';
                        } else {
                            echo Yii::t('app', 'None');
                        }
                        ?>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'Payment ID') ?> : </strong> <?= $model->payment->name; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'Percent Vat') ?> : </strong>
                        <?php
                        if ($model->percent_vat !== null) {
                            echo Yii::$app->formatter->asDecimal($model->percent_vat, 2) . ' %';
                        } else {
                            echo Yii::t('app', 'ไม่กำหนด');
                        }
                        ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'Discount') ?> : </strong>
                        <?php
                        if ($model->discount !== null) {
                            echo Yii::$app->formatter->asDecimal($model->discount, 2) . ' ฿';
                        } else {
                            echo Yii::t('app', 'ไม่กำหนด');
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'Total') ?> : </strong>
                        <?php
                        if ($model->total !== null) {
                            echo Yii::$app->formatter->asDecimal($model->total, 2) . ' ฿';
                        } else {
                            echo Yii::t('app', 'ไม่กำหนด');
                        }
                        ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group text-blue">
                        <strong><?= Yii::t('app', 'Grand Total') ?> : </strong>
                        <?php
                        if ($model->grand_total !== null) {
                            echo Yii::$app->formatter->asDecimal($model->grand_total, 2) . ' ฿';
                        } else {
                            echo Yii::t('app', 'ไม่กำหนด');
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong><?= Yii::t('app', 'Status') ?> : </strong>
                        <span style="color: <?= $model->status0->color ?>;">
                            <?= $model->status0->name; ?>
                        </span>

                    </div>
                </div>
                <?php if ($model->remask !== null && trim($model->remask) !== '') : ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong><?= Yii::t('app', 'Remask') ?> : </strong> <?= $model->remask; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div class="card border-info">
        <div class="card-header text-white bg-info">
            <?= Yii::t('app', 'Items List') ?>
            <span class="float-right">
                <?php //echo Yii::t('app', 'Total Price : {total} ฿', ['total' => $formattedTotalPriceSum]) 
                ?>
            </span>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getSaleorderItems(),
                ]),
                'hover' => true,
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
                    [
                        'attribute' => 'due_date',
                        'format' => 'date',
                        'contentOptions' => ['class' => 'text-center'],
                        'headerOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return
                                $model->due_date;
                        },
                    ],
                    // [
                    //     'attribute' => 'saleProduct0.code',
                    //     'format' => 'html',
                    //     'value' => function ($model) {
                    //         return
                    //             $model->saleProduct0->code;
                    //     },
                    // ],
                    [
                        'attribute' => 'product_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return
                            $model->saleProduct0->code . ' : ' .$model->saleProduct0->name;
                        },
                    ],
                    // [
                    //     'attribute' => 'price',
                    //     'format' => 'html',
                    //     'value' => function ($model) {
                    //         return
                    //             Yii::$app->formatter->asDecimal($model->price, 2);
                    //     },
                    // ],
                    [
                        'attribute' => 'quantity',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'headerOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return Yii::$app->formatter->asDecimal($model->quantity, 0);
                        },
                    ],
                    [
                        'attribute' => 'unit_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'headerOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return
                                $model->saleProduct0->units->name;
                        },
                    ],
                    // [
                    //     'attribute' => 'total_price',
                    //     'format' => 'html',
                    //     'value' => function ($model) {
                    //         return
                    //             '<b>' . Yii::$app->formatter->asDecimal($model->total_price, 2) . '</b>';
                    //     },
                    // ],
                    [
                        'attribute' => 'status_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'headerOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return
                                $model->saleStatus0->name;
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>