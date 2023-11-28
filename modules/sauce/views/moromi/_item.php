<?php

use app\modules\sauce\models\MoromiListMemo;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;



?>

<div class="moromi-form-addlist">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form',
    ]); ?>

    <div class="card border-secondary">
        <div class="card-header" style="background-color: <?= $model->moromiStatus0->color ?>; color: #fff;">
            <?= Yii::t('app', 'Moromi Record') ?>
        </div>
        <div class="card-body">
            <div class="row">
                <?= $form->field($model, 'code')->hiddenInput()->label(false); ?>
                <div class="col-md-3 mb-2">
                    <strong><?= Yii::t('app', 'Batch No') ?> : </strong> <?= $model->batch_no; ?>
                </div>
                <div class="col-md-3 mb-2">
                    <strong><?= Yii::t('app', 'Shikomi Date') ?> : </strong> <?= Yii::$app->formatter->asDate($model->shikomi_date); ?>
                </div>
                <div class="col-md-3 mb-2">
                    <strong><?= Yii::t('app', 'Type') ?> : </strong>
                    <?= '<span class="text" style="color:' . $model->moromiType0->color . ';"><b>' . $model->moromiType0->name . '</b> </span>'; ?>
                </div>
                <div class="col-md-3 mb-2">
                    <strong><?= Yii::t('app', 'Status') ?> : </strong>
                    <?= '<span class="text" style="color:' . $model->moromiStatus0->color . ';"><b>' . $model->moromiStatus0->name . '</b> </span>'; ?>
                </div>
                <div class="col-md-3 mb-2">
                    <strong><?= Yii::t('app', 'Transfer Date') ?> : </strong> <?= $model->transfer_date ? Yii::$app->formatter->asDate($model->transfer_date) : Yii::t('app', 'None'); ?>
                </div>
                <div class="col-md-3 mb-2">
                    <strong><?= Yii::t('app', 'Tank') ?> : </strong>
                    <?= '<span class="text" style="color:' . $model->tankSource0->color . ';"><b>' . $model->tankSource0->name . '</b> </span>'; ?>
                    <i class="fa-solid fa-arrow-right-long"></i> <?= $model->tankDestination0->name; ?>
                </div>
                <div class="col-md-6 mb-2">
                    <strong><?= Yii::t('app', 'Remask') ?> : </strong> <?= $model->remask; ?>
                </div>
            </div>
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
                                    <div class="col-md-2">
                                        <?php echo $form->field($modelitem, "[{$i}]record_date")->textInput(['maxlength' => true, 'type' => 'date'])
                                        ?>
                                        <?php //echo $form->field($modelitem, "[{$i}]record_date")->widget(DatePicker::class, ['options' => ['class' => 'reqItem form-control'],'pluginOptions' => ['format' => 'dd/mm/yyyy','autoclose' => false,'todayHighlight' => true,],]); 
                                        ?>

                                    </div>
                                    <div class="col-md-2">
                                        <?php //echo $form->field($modelitem, "[{$i}]memo_list")->dropDownList(ArrayHelper::map(MoromiListMemo::find()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Select...'), 'options' => ['required' => true,],])
                                        ?>
                                        <?php echo $form->field($modelitem, "[{$i}]memo_list")->widget(Select2::class, ['language' => 'th', 'data' => ArrayHelper::map(MoromiListMemo::find()->all(), 'id', 'name'), 'options' => ['placeholder' => Yii::t('app', 'Select...'), 'class' => 'form-control'], 'pluginOptions' => ['allowClear' => true],]);
                                        ?>
                                    </div>

                                    <div class="col-md-1">
                                        <?= $form->field($modelitem, "[{$i}]ph")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-1">
                                        <?= $form->field($modelitem, "[{$i}]color")->textInput(['maxlength' => true, 'type' => 'number']) ?>
                                    </div>
                                    <div class="col-md-1">
                                        <?= $form->field($modelitem, "[{$i}]nacl")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-1">
                                        <?= $form->field($modelitem, "[{$i}]tn")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-1">
                                        <?= $form->field($modelitem, "[{$i}]alcohol")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-1">
                                        <?= $form->field($modelitem, "[{$i}]turbidity")->textInput(['maxlength' => true, 'type' => 'number', 'step' => '00.01']) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelitem, "[{$i}]note")->textInput(['maxlength' => true]) ?>
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
                    <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>