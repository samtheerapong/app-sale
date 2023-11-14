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
                    <?= $form->field($model, 'batch_no')->textInput([
                        'disabled' => true,
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'shikomi_date')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Select...'), 'disabled' => true],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'type_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Type::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'disabled' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'status_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(MoromiStatus::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'disabled' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'transfer_date')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Select...'), 'disabled' => true],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,

                            ]
                        ]
                    ); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'tank_source')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(TankSource::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'disabled' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'tank_destination')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(TankDestination::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'disabled' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>

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
                        <div class="card-header text-white bg-dark">
                            <div class="card-title float-left">
                                <div class="float-left">
                                    <?= Yii::t('app', 'List of Memo') ?>
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

                                <div class="col-md-4">

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
                                <div class="col-md-8">
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

    <?php ActiveForm::end(); ?>

</div>