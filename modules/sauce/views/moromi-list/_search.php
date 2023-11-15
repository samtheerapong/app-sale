<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiListSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="moromi-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'moromi_id') ?>

    <?= $form->field($model, 'record_date') ?>

    <?= $form->field($model, 'memo_list') ?>

    <?= $form->field($model, 'ph') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'nacl') ?>

    <?php // echo $form->field($model, 'tn') ?>

    <?php // echo $form->field($model, 'alcohol') ?>

    <?php // echo $form->field($model, 'turbidity') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
