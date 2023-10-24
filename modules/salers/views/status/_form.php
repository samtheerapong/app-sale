<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\Status $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="status-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card card-secondary">
        <div class="card-header text-white bg-primary">
        <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
                'options' => ['placeholder' => 'Select color ...'],
            ]); ?>
        </div>
        <div class="card-footer">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-wide']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>