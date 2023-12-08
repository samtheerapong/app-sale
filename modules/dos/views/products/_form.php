<?php

use app\modules\dos\models\ProductCategory;
use app\modules\dos\models\ProductIso;
use app\modules\dos\models\ProductStatus;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\dos\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>
            <div class="row">

                <div style="display: none;">
                    <?= $form->field($model, 'numbers')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'category')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(ProductCategory::find()->all(), 'id', 'code'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'status')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(ProductStatus::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-6 mt-2">
                    <?= $form->field($model, 'status_details')->textInput(['maxlength' => 255]) ?>
                </div>
                <div class="col-md-12 mt-2">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-12 mt-2">
                    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
                </div>

                <div class="col-md-8 mt-2">
                    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-1 mt-2">
                    <?= $form->field($model, 'revision')->textInput() ?>
                </div>

                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'reviesed_date')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => [
                                'placeholder' => Yii::t('app', 'Select...'),
                                // 'required' => true,
                            ],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>

                <div class="col-md-12 mt-2">
                    <?= $form->field($model, 'product_iso')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(ProductIso::find()->all(), 'id', 'code'),
                        'options' => ['multiple' => true, 'placeholder' => Yii::t('app', 'Please Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-9 mt-2">

                    <?= $form->field($model, 'docs[]')->widget(FileInput::class, [
                        'options' => [
                            'multiple' => true
                        ],
                        'pluginOptions' => [
                            // 'initialPreview' => $model->listDownloadFiles('docs'),
                            'initialPreview' => $model->initialPreview($model->docs, 'docs', 'file'),
                            'initialPreviewConfig' => $model->initialPreview($model->docs, 'docs', 'config'),
                            'allowedFileExtensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'odt', 'ods', 'jpg', 'png', 'jpeg'],
                            'showPreview' => true,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                            'overwriteInitial' => false,
                        ],
                    ]); ?>
                </div>

                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'expiration_date')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => [
                                'placeholder' => Yii::t('app', 'Default 10 years'),
                                // 'required' => true,
                            ],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="form-group">
                    <div class="d-grid gap-2">
                        <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>