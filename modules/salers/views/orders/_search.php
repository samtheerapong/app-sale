<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\OrdersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'po_no') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'deadline_date') ?>

    <?= $form->field($model, 'deadline_new') ?>

    <?php // echo $form->field($model, 'gross_amount') ?>

    <?php // echo $form->field($model, 'vat_charge_rate') ?>

    <?php // echo $form->field($model, 'vat_charge') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'net_amount') ?>

    <?php // echo $form->field($model, 'payment_term') ?>

    <?php // echo $form->field($model, 'paid_status') ?>

    <?php // echo $form->field($model, 'users_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
