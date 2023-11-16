<?php

use app\modules\salers\models\SaleCustomer;
use app\modules\salers\models\SaleProductUnit;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleProduct $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sale-product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'unit_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(SaleProductUnit::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'customer_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(SaleCustomer::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'detail')->textarea(['rows' => 2]) ?>
                </div>

                <div class="col-md-9">
                    <?= $form->field($model, 'note')->textarea(['rows' => 1]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'active')->dropDownList([
                        1 => Yii::t('app', 'Active'),
                        2 => Yii::t('app', 'Inactive'),
                    ]) ?>
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