<?php

use app\modules\salers\models\SaleCustomer;
use app\modules\salers\models\SalePayment;
use app\modules\salers\models\Salers;
use app\modules\salers\models\SaleStatus;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleOrder $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sale-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Request Repair') ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'po_number')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'customer_id')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(SaleCustomer::find()->where(['active' => 1])->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'salers_id')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Salers::find()->where(['active' => 1])->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'),],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'deadline')->widget(
                                DatePicker::class,
                                [
                                    'language' => 'th',
                                    'options' => ['placeholder' => Yii::t('app', 'Select...'),],
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true,
                                        'autoclose' => true,
                                    ]
                                ]
                            ); ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'new_deadline')->widget(
                                DatePicker::class,
                                [
                                    'language' => 'th',
                                    'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true,
                                        'autoclose' => true,
                                    ]
                                ]
                            ); ?>
                        </div>


                        <div class="col-md-2">
                            <?= $form->field($model, 'payment_id')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(SalePayment::find()->where(['active' => 1])->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'),],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'percent_vat')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-10">
                            <?= $form->field($model, 'remask')->textarea(['rows' => 1]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'status')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(SaleStatus::find()->where(['active' => 1])->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'),],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                        <?= $form->field($model, 'grand_total')->hiddenInput()->label(false) ?>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>