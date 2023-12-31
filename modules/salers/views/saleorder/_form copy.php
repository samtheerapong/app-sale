<?php

use app\modules\salers\models\SaleCustomer;
use app\modules\salers\models\SalePayment;
use app\modules\salers\models\SaleProduct;
use app\modules\salers\models\SaleProductUnit;
use app\modules\salers\models\Salers;
use app\modules\salers\models\SaleStatus;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;


$totalPriceSum = $model->getSaleorderItems()->sum('total_price');
$formattedTotalPriceSum = Yii::$app->formatter->asDecimal($totalPriceSum, 2);

?>

<div class="saleorder-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="card card-secondary">
        <div class="card-header bg-secondary">
            <b>คำสั่งซื้อ</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'po_number')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
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
                <div class="col-md-2">
                    <?= $form->field($model, 'salers_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Salers::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'deadline')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'new_deadline')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'payment_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(SalePayment::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'percent_vat')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'grand_total')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'status_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(SaleStatus::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'remask')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
        </div>

        <div class="card card-secondary">
            <div class="card-header bg-secondary">
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
                        'due_date',
                        'product_id',
                        'price',
                        'quantity',
                        'unit_id',
                        'total_price',
                        'status_id',
                    ],
                ]); ?>

                <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsPoItem as $i => $modelPoItem) : ?>
                        <div class="item card"><!-- widgetBody -->
                            <div class="card-header bg-dark mb-3">
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
                                    <div class="col-md-2">
                                        <?= $form->field($modelPoItem, "[{$i}]due_date")->textInput([
                                            'maxlength' => true,
                                            'type' => 'date', // set the input type to date
                                            // 'inputOptions' => ['step' => '1'], // set the step attribute
                                        ]) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?= $form->field($modelPoItem, "[{$i}]product_id")->widget(Select2::class, [
                                            'data' => ArrayHelper::map(SaleProduct::find()->all(), 'id', 'name'),
                                            'options' => ['placeholder' => Yii::t('app', 'Search and Select...')],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>

                                        
                                    </div>

                                    <div class="col-md-2">
                                        <?= $form->field($modelPoItem, "[{$i}]quantity")->textInput(['maxlength' => true]) ?>
                                    </div>

                                    <div class="col-md-2">
                                        <?= $form->field($modelPoItem, "[{$i}]status_id")->dropDownList(
                                            ArrayHelper::map(SaleStatus::find()->all(), 'id', 'name'),
                                            [
                                                'prompt' => Yii::t('app', 'Select...'),
                                                'options' => [
                                                    'required' => true,
                                                ],
                                            ]
                                        ) ?>
                                    </div>
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