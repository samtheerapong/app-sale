<?php

use app\modules\sauce\models\MoromiStatus;
use app\modules\sauce\models\TankDestination;
use app\modules\sauce\models\TankSource;
use app\modules\sauce\models\Type;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Moromi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="moromi-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="card border-secondary">
            <div class="card-header text-white bg-secondary">
                <?= Yii::t('app', 'Moromi Record') ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <?= $form->field($model, 'code')->hiddenInput()->label(false); ?>
                    <div class="col-md-3">

                        <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true, 'required' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'shikomi_date')->widget(
                            DatePicker::class,
                            [
                                'language' => 'th',
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true,
                                    'autoclose' => true,
                                ]
                            ]
                        ); ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'type_id')->widget(Select2::class, [
                            'language' => 'th',
                            'data' => ArrayHelper::map(Type::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'status_id')->widget(Select2::class, [
                            'language' => 'th',
                            'data' => ArrayHelper::map(MoromiStatus::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'transfer_date')->widget(
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
                        <?= $form->field($model, 'tank_source')->widget(Select2::class, [
                            'language' => 'th',
                            'data' => ArrayHelper::map(TankSource::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'tank_destination')->widget(Select2::class, [
                            'language' => 'th',
                            'data' => ArrayHelper::map(TankDestination::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
                    </div>
                   
                </div>
            </div>
            <div class="card-footer">
                <div class="d-grid gap-2">
                    <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>