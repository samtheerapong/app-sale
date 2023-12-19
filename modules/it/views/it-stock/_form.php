<?php

use app\modules\it\models\ItStockCat;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\it\models\ItStock $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="it-stock-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'category')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(ItStockCat::find()->all(), 'id', 'name'),
                        'options' => ['multiple' => false, 'placeholder' => Yii::t('app', 'Please Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'balance')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'minimum')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'photo')->widget(FileInput::class, [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showUpload' => false,
                            'initialPreview' => $model->photo ? [Html::img($moel->getPhotoViewer(), ['class' => 'file-preview-image', 'alt' => $model->name, 'title' => $model->name])] : '',
                            'initialCaption' => $model->photo ? basename($model->photo) : '',
                            'overwriteInitial' => false,
                        ],
                    ]) ?>
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