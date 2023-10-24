<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\Orders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'po_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'deadline_date')->textInput() ?>

    <?= $form->field($model, 'deadline_new')->textInput() ?>

    <?= $form->field($model, 'gross_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vat_charge_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vat_charge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'net_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_term')->textInput() ?>

    <?= $form->field($model, 'paid_status')->textInput() ?>

    <?= $form->field($model, 'users_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
