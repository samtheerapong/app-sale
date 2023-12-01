<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\it\models\ItStockListSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="it-stock-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'stock_id') ?>

    <?= $form->field($model, 'action_date') ?>

    <?= $form->field($model, 'operator') ?>

    <?= $form->field($model, 'receive') ?>

    <?php // echo $form->field($model, 'pick_up') ?>

    <?php // echo $form->field($model, 'docs') ?>

    <?php // echo $form->field($model, 'remask') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
