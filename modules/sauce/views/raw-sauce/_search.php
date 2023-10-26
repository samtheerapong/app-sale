<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauceSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="raw-sauce-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'reccord_date') ?>

    <?= $form->field($model, 'tank_id') ?>

    <?= $form->field($model, 'simple_id') ?>

    <?php // echo $form->field($model, 'ph') ?>

    <?php // echo $form->field($model, 'nacl_t1') ?>

    <?php // echo $form->field($model, 'nacl_t2') ?>

    <?php // echo $form->field($model, 'nacl_t_avr') ?>

    <?php // echo $form->field($model, 'nacl_p1') ?>

    <?php // echo $form->field($model, 'nacl_p2') ?>

    <?php // echo $form->field($model, 'nacl_p_avr') ?>

    <?php // echo $form->field($model, 'tn_t1') ?>

    <?php // echo $form->field($model, 'th_t2') ?>

    <?php // echo $form->field($model, 'tn_t_avr') ?>

    <?php // echo $form->field($model, 'tn_p1') ?>

    <?php // echo $form->field($model, 'tn_p2') ?>

    <?php // echo $form->field($model, 'th_p_avr') ?>

    <?php // echo $form->field($model, 'cal') ?>

    <?php // echo $form->field($model, 'alc_t') ?>

    <?php // echo $form->field($model, 'alc_p') ?>

    <?php // echo $form->field($model, 'ppm') ?>

    <?php // echo $form->field($model, 'brix') ?>

    <?php // echo $form->field($model, 'remask') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
