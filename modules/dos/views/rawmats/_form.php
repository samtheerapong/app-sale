<?php

use app\modules\dos\models\RawmatCategory;
use app\modules\dos\models\RawmatStatus;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\dos\models\Rawmats $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rawmats-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'numbers')->hiddenInput()->label(false); ?>
            <div class="row">
                <div class="col-md-3 mt-2">
                    <?= $form->field($model, 'category')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(RawmatCategory::find()->all(), 'id', 'code'),
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
                        'data' => ArrayHelper::map(RawmatStatus::find()->all(), 'id', 'name'),
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
                <div class="col-md-4 mt-2">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
                
                <div class="col-md-4 mt-2">
                    <?= $form->field($model, 'rawmat_name')->textInput(['maxlength' => true]) ?>
                </div>
                
                <div class="col-md-4 mt-2">
                    <?= $form->field($model, 'supplier_name')->textInput(['maxlength' => true]) ?>
                </div>
                
                <div class="col-md-12 mt-2">
                    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
                </div>

                <div class="col-md-9 mt-2">

                    <?= $form->field($model, 'docs[]')->widget(FileInput::class, [
                        'options' => [
                            'multiple' => true
                        ],
                        'pluginOptions' => [
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