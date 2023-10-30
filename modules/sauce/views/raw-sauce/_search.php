<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; // Make sure you've included the DatePicker widget if not already done

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

    <!-- Date Start Field -->
    <?= $form->field($model, 'reccord_date_start')->widget(DatePicker::class, [
        'options' => ['placeholder' => Yii::t('app', 'Select date...')],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
        ],
    ])->label('Date Start'); ?>

    <!-- Date End Field -->
    <?= $form->field($model, 'reccord_date_end')->widget(DatePicker::class, [
        'options' => ['placeholder' => Yii::t('app', 'Select date...')],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
        ],
    ])->label('Date End'); ?>

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
