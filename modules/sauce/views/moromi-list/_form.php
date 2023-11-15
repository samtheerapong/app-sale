<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="moromi-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'moromi_id')->textInput() ?>

    <?= $form->field($model, 'record_date')->textInput() ?>

    <?= $form->field($model, 'memo_list')->textInput() ?>

    <?= $form->field($model, 'ph')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput() ?>

    <?= $form->field($model, 'nacl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alcohol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'turbidity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
