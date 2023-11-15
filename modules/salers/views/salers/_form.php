<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\Salers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salers-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
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
                    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'active')->dropDownList([
                        1 => Yii::t('app', 'Active'),
                        2 => Yii::t('app', 'Inactive'),
                    ]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'address')->textarea(['rows' => 2]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'avatar')->widget(FileInput::class, [
                        'name' => 'avatar',
                        'language' => Yii::$app->language == 'th-TH' ? 'th' : 'en',
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'initialPreview' => [
                                Html::img(Yii::getAlias('@web/') . $model->avatar, ['class' => 'file-preview-image', 'alt' => 'Avatar']),
                            ],
                            'initialPreviewConfig' => [
                                ['caption' => 'Current Avatar'],
                            ],
                            'browseIcon' => '<i class="fas fa-camera"></i> ',
                            'browseLabel' =>   Yii::t('app', 'Select Photo'),
                            'showUpload' => false,
                            'showRemove' => false,
                            'showCancel' => false,
                            'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                        ],
                    ])->label(false) ?>
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