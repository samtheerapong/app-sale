<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\TankSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="type-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'code') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'description') ?>
        </div>

    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-search"></i> ' . Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-x"></i> ' .Yii::t('app', 'Reset'), ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            <?php //echo Html::resetButton('<i class="fa fa-x"></i> ' . Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>