<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleCustomer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sale-customer-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
               
                <div class="col-md-4">
                    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'active')->dropDownList([
                        1 => Yii::t('app', 'Active'),
                        2 => Yii::t('app', 'Inactive'),
                    ]) ?>
                </div>
                <div class="col-md-ๅ/">
                    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <div class="d-grid gap-2">
                    <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>