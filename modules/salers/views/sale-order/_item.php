<?php

use app\modules\salers\models\SaleProduct;
use app\modules\salers\models\SaleProductUnit;
use app\modules\salers\models\SaleStatus;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\DetailView;

?>

<div class="sale-item-form-item">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form',
    ]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Sale Order') ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'po_number')->textInput([
                        'maxlength' => true,
                        'disabled' => true
                    ]) ?>
                </div>
            </div>
        </div>

        <?php
        DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper',
            'widgetBody' => '.container-items',
            'widgetItem' => '.item',
            'limit' => 20,
            'min' => 1,
            'insertButton' => '.add-item',
            'deleteButton' => '.remove-item',
            'model' => $modelsItem[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'product_id',
                'price',
                'quantity',
                'unit',
                'total',
                'status_id',
            ],
        ]);
        ?>

        <div class="row">
            <div class="container-items">
                <?php foreach ($modelsItem as $i => $modelitem) : ?>
                    <div class="item card">
                        <div class="card-header text-white bg-info">
                            <div class="card-title float-left">
                                <div class="float-left">
                                    <?= $modelitem->id ? $modelitem->id : ' ' ?>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="button" class="add-item btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?= Yii::t('app', 'Additional') ?></button>
                                <button type="button" class="remove-item btn btn-danger btn-sm"><i class="fa fa-minus"></i> <?= Yii::t('app', 'Removed') ?></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">
                            <?php
                            // necessary for update action.
                            if (!$modelitem->isNewRecord) {
                                echo Html::activeHiddenInput($modelitem, "[{$i}]id");
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <?= $form->field($modelitem, "[{$i}]price")->textInput(['maxlength' => true]) ?>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <?php DynamicFormWidget::end(); ?>
        <div class="card-footer">
            <div class="d-grid gap-2">
                <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>