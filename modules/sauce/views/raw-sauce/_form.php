<?php

use app\modules\sauce\models\type;
use app\modules\sauce\models\Tank;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauce $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="raw-sauce-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card border-secondary">
                        <div class="card-header text-white bg-secondary">
                            <?= Yii::t('app', 'Record') ?>
                        </div>
                        <div class="card-body">
                            <?= $form->field($model, 'batch')->hiddenInput()->label(false); ?>
                            <div class="row">

                                <div class="col-md-6">

                                    <?= $form->field($model, 'reccord_date')->widget(
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

                                <div class="col-md-6">
                                    <?= $form->field($model, 'batch')->textInput(['maxlength' => true]) ?>
                                </div>

                                <div class="col-md-4">
                                    <?= $form->field($model, 'tank_id')->widget(Select2::class, [
                                        'language' => 'th',
                                        'data' => ArrayHelper::map(Tank::find()->all(), 'id', 'code'),
                                        'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]);
                                    ?>
                                </div>

                                <div class="col-md-4">
                                    <?= $form->field($model, 'type_id')->widget(Select2::class, [
                                        'language' => 'th',
                                        'data' => ArrayHelper::map(type::find()->all(), 'id', 'code'),
                                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]);
                                    ?>
                                </div>

                                <div class="col-md-4">
                                    <?= $form->field($model, 'ph')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-secondary">
                                <div class="card-header text-white bg-secondary">
                                    <?= Yii::t('app', 'NaCl') ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'nacl_t1')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'nacl_t2')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'nacl_t_avr')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01', 'disabled' => true]) ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'nacl_p1')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'nacl_p2')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'nacl_p_avr')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01', 'disabled' => true]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-secondary">
                                <div class="card-header text-white bg-secondary">
                                    <?= Yii::t('app', 'TN') ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'tn_t1')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'th_t2')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'tn_t_avr')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01', 'disabled' => true]) ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'tn_p1')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'tn_p2')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?= $form->field($model, 'tn_p_avr')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01', 'disabled' => true]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="card border-secondary">
                                <div class="card-header text-white bg-secondary">
                                    <?= Yii::t('app', 'Color') ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= $form->field($model, 'col')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card border-secondary">
                                <div class="card-header text-white bg-secondary">
                                    <?= Yii::t('app', 'Alcohol') ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <?= $form->field($model, 'alc_t')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <?= $form->field($model, 'alc_p')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card border-secondary">
                                <div class="card-header text-white bg-secondary">
                                    <?= Yii::t('app', 'PPM') ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= $form->field($model, 'ppm')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card border-secondary">
                                <div class="card-header text-white bg-secondary">
                                    <?= Yii::t('app', 'Brix') ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= $form->field($model, 'brix')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '0.01']) ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'remask')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card-footer">
            <div class="row">
                <div class="d-grid gap-2">
                    <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>