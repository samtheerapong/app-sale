<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepairSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-repair-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'repair_code') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'urgency') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'request_department') ?>

    <?php // echo $form->field($model, 'request_title') ?>

    <?php // echo $form->field($model, 'request_detail') ?>

    <?php // echo $form->field($model, 'request_date') ?>

    <?php // echo $form->field($model, 'broken_date') ?>

    <?php // echo $form->field($model, 'locations_id') ?>

    <?php // echo $form->field($model, 'remask') ?>

    <?php // echo $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'approver') ?>

    <?php // echo $form->field($model, 'approve_date') ?>

    <?php // echo $form->field($model, 'approve_comment') ?>

    <?php // echo $form->field($model, 'job_status_id') ?>

    <?php // echo $form->field($model, 'ref') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
