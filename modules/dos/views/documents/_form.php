<?php

use app\modules\dos\models\Categories;
use app\modules\dos\models\Occupier;
use app\modules\dos\models\RawMaterial;
use app\modules\dos\models\Status;
use app\modules\dos\models\Types;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\pdf\PdfJsViewer;

/** @var yii\web\View $this */
/** @var app\modules\dos\models\Documents $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documents-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">

                <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>

                <div class="col-md-12 mt-2" style="display: none;">
                    <?= $form->field($model, 'numbers')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                </div>

                <div class="col-md-12 mt-2">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-12 mt-2">
                    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
                </div>


                <div class="col-md-4 mt-2">
                    <?= $form->field($model, 'expiration_date')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => [
                                'placeholder' => Yii::t('app', 'Select...'),
                                'required' => true,
                            ],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>


                <!-- <div class="col-md-6 mt-2">
                    <?= $form->field($model, 'document_date')->textInput(['maxlength' => true]) ?>
                </div> -->

                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'raw_material')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(RawMaterial::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-5 mt-2">
                    <?= $form->field($model, 'supplier_name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'categories_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Categories::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'occupier_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Occupier::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'types_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Types::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'status_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Status::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-12 mt-2">
                    <?= $form->field($model, 'status_details')->textarea(['rows' => 2]) ?>
                </div>

                <div class="col-md-12 mt-2">
                    <?= $form->field($model, 'docs[]')->widget(FileInput::class, [
                        'name' => 'docs[]',
                        'options' => [
                            'multiple' => true
                        ],
                        'pluginOptions' => [
                            // 'initialPreview' => $model->listDownloadFiles('docs'),
                            'initialPreview' => $model->initialPreview($model->docs, 'docs', 'file'),
                            'initialPreviewConfig' => $model->initialPreview($model->docs, 'docs', 'config'),
                            // 'allowedFileExtensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'odt', 'ods', 'jpg', 'png', 'jpeg'],
                            'showPreview' => true,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                            'overwriteInitial' => false,
                        ],
                    ]); ?>
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