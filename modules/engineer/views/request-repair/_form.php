<?php

use app\modules\general\models\Departments;
use app\modules\general\models\Locations;
use app\modules\general\models\Priority;
use app\modules\general\models\Urgency;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepair $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-repair-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Record') ?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'repair_code')->hiddenInput()->label(false); ?>

                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'priority')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Priority::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'urgency')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Urgency::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-md-3">

                            <?= $form->field($model, 'created_date')->widget(
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
                        <div class="col-md-3">

                            <?= $form->field($model, 'request_department')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Departments::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'request_title')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'request_detail')->textarea(['rows' => 2]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'request_date')->widget(
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
                        <div class="col-md-4">
                            <?= $form->field($model, 'broken_date')->widget(
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
                        <div class="col-md-4">
                            <?= $form->field($model, 'locations_id')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Locations::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'remask')->textarea(['rows' => 2]) ?>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'images')->textarea(['rows' => 2]) ?>
                        </div>
                    </div> -->

                    <?= $form->field($model, 'ref')->hiddenInput()->label(false) ?>
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
