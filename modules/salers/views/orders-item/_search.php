<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\OrdersItemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'orders_id') ?>

    <?= $form->field($model, 'products_id') ?>

    <?= $form->field($model, 'qty') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
