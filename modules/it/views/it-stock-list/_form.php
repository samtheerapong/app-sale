<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\it\models\ItStockList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="it-stock-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stock_id')->textInput() ?>

    <?= $form->field($model, 'action_date')->textInput() ?>

    <?= $form->field($model, 'operator')->textInput() ?>

    <?= $form->field($model, 'receive')->textInput() ?>

    <?= $form->field($model, 'pick_up')->textInput() ?>

    <?= $form->field($model, 'docs')->textInput() ?>

    <?= $form->field($model, 'remask')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
