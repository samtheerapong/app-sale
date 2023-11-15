<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleOrder $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sale-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'po_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <?= $form->field($model, 'salers_id')->textInput() ?>

    <?= $form->field($model, 'sale_ordercol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_deadline')->textInput() ?>

    <?= $form->field($model, 'payment_id')->textInput() ?>

    <?= $form->field($model, 'percent_vat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grand_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remask')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
