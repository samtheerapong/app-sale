<?php

use app\modules\salers\models\SaleOrder;
use app\modules\salers\models\SaleProduct;
use app\modules\salers\models\SaleStatus;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="saleorder-item-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card card-secondary">
        <div class="card-header bg-secondary">
            <b>คำสั่งซื้อ</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'saleorder_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(
                            SaleOrder::find()->all(),
                            'id',
                            function ($model) {
                                $deadline = is_null($model->new_deadline) ? Yii::$app->formatter->asDate($model->deadline) : Yii::$app->formatter->asDate($model->new_deadline);
                                $text = $model->po_number . ' - ' . $model->customer->name . ' - ' . $model->salers->name . ' -  ' . $deadline;
                                return $text;
                            }
                        ),
                        'options' => [
                            'class' => 'form-control',
                            'placeholder' => Yii::t('app', 'Select...')
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'initialize' => true,
                        ],
                    ]);
                    ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'due_date')->widget(
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
                <div class="col-md-6">
                    <?= $form->field($model, 'product_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(
                            SaleProduct::find()->all(),
                            'id',
                            function ($model) {
                                return $model->code . ' :: ' . $model->name . ' - ' . $model->units->name;
                            }
                        ),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'quantity')->textInput() ?>
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
            </div>
        </div>

        <div class="card-footer">
            <div class="d-grid gap-2">
                <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>