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

<div class="moromi-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="card border-secondary">
            <div class="card-header text-white bg-secondary">
                <?= Yii::t('app', 'Moromi Record') ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <?= $form->field($model, 'code')->hiddenInput()->label(false); ?>
                    <div class="col-md-3">

                        <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true, 'required' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'shikomi_date')->widget(
                            DatePicker::class,
                            [
                                'language' => 'th',
                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
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
                                'allowClear' => true
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
                                'allowClear' => true
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
                        <?= $form->field($model, 'tank_source')->widget(Select2::class, [
                            'language' => 'th',
                            'data' => ArrayHelper::map(TankSource::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
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
                                'allowClear' => true
                            ],
                        ]);
                        ?>
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
                    'model' => $modelItems[0],
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

                <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelItems as $i => $modelitem) : ?>
                        <div class="item card"><!-- widgetBody -->
                            <div class="card-header text-white bg-dark">
                                <div class="card-title float-left">
                                    <div class="float-left">
                                        <?= Yii::t('app', 'List of Memo') ?>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> <?= Yii::t('app', 'Additional') ?></button>
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i> <?= Yii::t('app', 'Remove') ?></button>
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
                                    <div class="col-md-6">
                                        <?= $form->field($modelitem, "[{$i}]record_date")->widget(
                                            DatePicker::class,
                                            [
                                                'language' => 'th',
                                                'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                                'pluginOptions' => [
                                                    'format' => 'yyyy-mm-dd',
                                                    'todayHighlight' => true,
                                                    'autoclose' => true,
                                                ]
                                            ]
                                        ); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?= $form->field($modelitem, "[{$i}]memo_list")->widget(Select2::class, [
                                            'language' => 'th',
                                            'data' => ArrayHelper::map(MoromiListMemo::find()->all(), 'id', 'name'),
                                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]);
                                        ?>
                                    </div>

                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]ph")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]color")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]nacl")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]tn")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]alcohol")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]turbidity")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-22">
                                        <?= $form->field($modelitem, "[{$i}]note")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div><!-- .row -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php DynamicFormWidget::end(); ?>


            </div>
            <div class="card-footer">
                <div class="d-grid gap-2">
                    <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php

$script = <<< JS
    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
        console.log("beforeInsert");
    });

    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        console.log("afterInsert");
    });

    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (!confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });
JS;

$this->registerJs($script);

?>