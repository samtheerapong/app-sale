<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleOrderSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sale-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'po_number') ?>

    <?= $form->field($model, 'customer_id') ?>


    <?= $form->field($model, 'salers_id') ?>

    <?php // echo $form->field($model, 'sale_ordercol') ?>

    <?php // echo $form->field($model, 'new_deadline') ?>

    <?php // echo $form->field($model, 'payment_id') ?>

    <?php // echo $form->field($model, 'percent_vat') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'grand_total') ?>

    <?php // echo $form->field($model, 'remask') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
