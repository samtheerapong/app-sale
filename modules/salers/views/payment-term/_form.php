<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\PaymentTerm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="payment-term-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payment_term')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
