<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

?>

<div class="order-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'order_no')->textInput(['maxlength' => true]) ?>



    <div class="card card-primary">
        <div class="card-header bg-primary">
            <b>รายการ PO</b>
        </div>
        <div class="card-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsPoItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'price',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsPoItem as $i => $modelPoItem) : ?>
                    <div class="item card"><!-- widgetBody -->
                        <div class="card-header bg-secondary mb-3">
                            <div class="card-title float-left">
                                <div class="float-left">
                                    รายการ
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">
                            <?php
                            // necessary for update action.
                            if (!$modelPoItem->isNewRecord) {
                                echo Html::activeHiddenInput($modelPoItem, "[{$i}]id");
                            }
                            ?>
                            <div class="row">
                                <?= $form->field($modelPoItem, "[{$i}]price")->textInput(['maxlength' => true]) ?>
                            </div><!-- .row -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>