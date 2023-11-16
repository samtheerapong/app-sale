<?php

use app\modules\salers\models\SaleProduct;
use app\modules\salers\models\SaleProductUnit;
use app\modules\salers\models\SaleStatus;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Moromi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sale-item-form-item">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form-item',
    ]); ?>

    <div class="row">
        <div class="col-md-4">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Sale Order') ?>
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

        <div class="col-md-8">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Sale Item') ?>
                </div>
                <div class="card-body">

                    <?php
                    DynamicFormWidget::begin([
                        'widgetContainer' => 'dynamicform_wrapper',
                        'widgetBody' => '.container-items',
                        'widgetItem' => '.item',
                        'limit' => 20,
                        'min' => 1,
                        'insertButton' => '.add-item',
                        'deleteButton' => '.remove-item',
                        'model' => $modelsItem[0],
                        'formId' => 'dynamic-form-item',
                        'formFields' => [
                            'id',
                            'order_id',
                            'product_id',
                            'price',
                            'quantity',
                            'unit',
                            'total',
                            'status_id',
                        ],
                    ]);
                    ?>

                    <div class="row">
                        <div class="container-items">
                            <?php foreach ($modelsItem as $i => $modelitem) : ?>
                                <div class="item card">
                                    <div class="card-header text-white bg-info">
                                        <div class="card-title float-left">
                                            <div class="float-left">
                                                <?php //echo $modelitem->id ? $modelitem->memo->name : ' ' 
                                                ?>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="button" class="add-item btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?= Yii::t('app', 'Additional') ?></button>
                                            <button type="button" class="remove-item btn btn-danger btn-sm"><i class="fa fa-minus"></i> <?= Yii::t('app', 'Removed') ?></button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        // necessary for update action.
                                        if (!$modelitem->isNewRecord) {
                                            echo Html::activeHiddenInput($modelitem, "[{$i}]id");
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?= $form->field($modelitem, "[{$i}]product_id")->dropDownList(
                                                    ArrayHelper::map(SaleProduct::find()->all(), 'id', 'name'),
                                                    [
                                                        'prompt' => Yii::t('app', 'Select...'),
                                                        'options' => [
                                                            'required' => true,
                                                        ],
                                                    ]
                                                ) ?>

                                            </div>

                                            <div class="col-md-2">
                                                <?= $form->field($modelitem, "[{$i}]price")->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?= $form->field($modelitem, "[{$i}]quantity")->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?= $form->field($modelitem, "[{$i}]unit")->dropDownList(
                                                    ArrayHelper::map(SaleProductUnit::find()->all(), 'id', 'name'),
                                                    [
                                                        'prompt' => Yii::t('app', 'Select...'),
                                                        'options' => [
                                                            'required' => true,
                                                        ],
                                                    ]
                                                ) ?>
                                            </div>

                                            <div class="col-md-2">

                                                <?= $form->field($modelitem, "[{$i}]status_id")->dropDownList(
                                                    ArrayHelper::map(SaleStatus::find()->all(), 'id', 'name'),
                                                    [
                                                        'prompt' => Yii::t('app', 'Select...'),
                                                        'options' => [
                                                            'required' => true,
                                                        ],
                                                    ]
                                                ) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php DynamicFormWidget::end(); ?>
                    <div class="card-footer">
                        <div class="d-grid gap-2">
                            <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>