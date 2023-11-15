<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleReport $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sale-report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'month')->textInput() ?>

    <?= $form->field($model, 'domestic_sales')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sales_target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'variation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'achievement')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
