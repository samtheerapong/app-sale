<?php

use app\modules\sauce\models\Type;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="minimum-config-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Minimum Config') ?>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'type_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Type::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'ph')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'color')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00']) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'nacl')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'tn')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'alcohol')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'turbidity')->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
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