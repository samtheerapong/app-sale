<?php

use app\modules\general\models\Departments;
use app\modules\general\models\Locations;
use app\modules\general\models\Priority;
use app\modules\general\models\Urgency;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepair $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-repair-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= Yii::t('app', 'Request Repair') ?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'repair_code')->hiddenInput()->label(false); ?>

                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'priority')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Priority::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'urgency')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Urgency::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-md-3">

                            <?= $form->field($model, 'created_date')->widget(
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
                        <div class="col-md-3">

                            <?= $form->field($model, 'request_department')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Departments::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'request_title')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'request_detail')->textarea(['rows' => 2]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'request_date')->widget(
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
                        <div class="col-md-4">
                            <?= $form->field($model, 'broken_date')->widget(
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
                        <div class="col-md-4">
                            <?= $form->field($model, 'locations_id')->widget(Select2::class, [
                                'language' => 'th',
                                'data' => ArrayHelper::map(Locations::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'remask')->textarea(['rows' => 2]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group field-upload_files">
                                <label class="control-label" for="upload_files[]"> <?=  Yii::t('app', 'Images') ?> </label>
                                <div>
                                    <?= FileInput::widget([
                                        'name' => 'upload_ajax[]',
                                        'language' => Yii::$app->language == 'th-TH' ? 'th' : 'en',
                                        'options' => ['multiple' => true, 'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                                        'pluginOptions' => [
                                            'initialPreview' => $initialPreview,
                                            'initialPreviewConfig' => $initialPreviewConfig,
                                            // 'previewFileType' => 'any',
                                            'uploadUrl' => Url::to(['/engineer/request-repair/upload-ajax']),
                                            'showCancel' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseIcon' => '<i class="fas fa-camera"></i> ',
                                            'browseLabel' =>   Yii::t('app', 'Select Photo'),
                                            'overwriteInitial' => false,
                                            'initialPreviewShowDelete' => true,
                                            'uploadExtraData' => [
                                                'ref' => $model->ref,
                                            ],
                                            'maxFileCount' => 10
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= $form->field($model, 'ref')->hiddenInput()->label(false) ?>
                </div>


                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>