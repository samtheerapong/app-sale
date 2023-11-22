<?php

use app\modules\sauce\models\MoromiListMemo;
use app\modules\sauce\models\MoromiStatus;
use app\modules\sauce\models\TankDestination;
use app\modules\sauce\models\TankSource;
use app\modules\sauce\models\Type;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Moromi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="moromi-form-addlist">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form',
    ]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Moromi Record') ?>
        </div>
        <div class="card-body">
            <div class="row">
                <?= $form->field($model, 'code')->hiddenInput()->label(false); ?>
                <div class="col-md-3">
                    <strong><?= Yii::t('app', 'Batch No') ?> : </strong> <?= $model->batch_no; ?>
                </div>
                <div class="col-md-3">
                    <strong><?= Yii::t('app', 'Shikomi Date') ?> : </strong> <?= Yii::$app->formatter->asDate($model->shikomi_date); ?>
                </div>
                <div class="col-md-3">
                    <strong><?= Yii::t('app', 'Type') ?> : </strong> <?= $model->moromiType0->name; ?>
                </div>
                <div class="col-md-3">
                    <strong><?= Yii::t('app', 'Status') ?> : </strong> <?= $model->moromiStatus0->name; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <strong><?= Yii::t('app', 'Transfer Date') ?> : </strong> <?= Yii::$app->formatter->asDate($model->transfer_date); ?>

                </div>

                <div class="col-md-3">
                    <strong><?= Yii::t('app', 'Tank') ?> : </strong> <?= $model->tankSource0->name; ?>
                    <i class="fa-solid fa-arrow-right-long"></i> <?= $model->tankDestination0->name; ?>

                </div>

                <div class="col-md-6">
                    <strong><?= Yii::t('app', 'Remask') ?> : </strong> <?= $model->remask; ?>
                </div>
            </div>
            <hr>
        </div>

        <div class="row">

            <?php
            DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper',
                'widgetBody' => '.container-items',
                'widgetItem' => '.item',
                'limit' => 20,
                'min' => 1,
                'insertButton' => '.add-item',
                'deleteButton' => '.remove-item',
                'model' => $modelsItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'moromi_id',
                    'record_date',
                    'memo_list',
                    'ph',
                    'color',
                    'nacl',
                    'tn',
                    'alcohol',
                    'turbidity',
                    'note',
                ],
            ]);
            ?>

            <div class="row">
                <div class="container-items">
                    <?php foreach ($modelsItem as $i => $modelitem) : ?>
                        <div class="item card">
                            <div class="card-header text-white bg-info">
                                <div class="card-title float-left">
                                    <div class="float-left">
                                        <?= $modelitem->id ? $modelitem->memo->name : ' ' ?>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="add-item btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?= Yii::t('app', 'Additional') ?></button>
                                    <button type="button" class="remove-item btn btn-danger btn-sm"><i class="fa fa-minus"></i> <?= Yii::t('app', 'Removed') ?></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body">
                                <?php
                                // necessary for update action.
                                if (!$modelitem->isNewRecord) {
                                    echo Html::activeHiddenInput($modelitem, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <?= $form->field($modelitem, "[{$i}]record_date")->textInput([
                                            'maxlength' => true,
                                            'type' => 'date', // set the input type to date
                                            // 'inputOptions' => ['step' => '1'], // set the step attribute
                                        ]) ?>
                                    </div>
                                    <div class="col-md-3">

                                        <?= $form->field($modelitem, "[{$i}]memo_list")->dropDownList(
                                            ArrayHelper::map(MoromiListMemo::find()->all(), 'id', 'name'),
                                            [
                                                'prompt' => Yii::t('app', 'Select...'),
                                                'options' => [
                                                    'required' => true,
                                                ],
                                            ]
                                        ) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?= $form->field($modelitem, "[{$i}]note")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]ph")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]color")->textInput(['maxlength' => true, 'type' => 'number']) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]nacl")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]tn")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]alcohol")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]turbidity")->textInput(['maxlength' => true, 'type' => 'number']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
            <?php DynamicFormWidget::end(); ?>
            <div class="card-footer">
                <div class="d-grid gap-2">
                    <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>