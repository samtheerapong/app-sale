<?php

use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AutoNumber $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auto-number-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'number')->textInput() ?>

            <?= $form->field($model, 'optimistic_lock')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>