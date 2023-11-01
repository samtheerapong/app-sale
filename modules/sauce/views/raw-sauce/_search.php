<?php

use app\modules\sauce\models\RawSauce;
use app\modules\sauce\models\Tank;
use app\modules\sauce\models\Type;
use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauceSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="raw-sauce-search">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'data-pjax' => 12
                ],
            ]);
            ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'year')->dropDownList(
                        ArrayHelper::map(
                            RawSauce::find()
                                ->select('YEAR(reccord_date) AS year')
                                ->distinct()
                                ->orderBy(['year' => SORT_ASC])
                                ->asArray()
                                ->all(),
                            'year',
                            'year'
                        ),
                        ['prompt' => Yii::t('app', 'Select All')]
                    ) ?>


                </div>

                <div class="col-md-6">
                    <?php //echo $form->field($model, 'month')->textInput(['type' => 'number','placeholder' => Yii::t('app', 'Month')]) 
                    ?>
                    <?= $form->field($model, 'month')->dropDownList(
                        [
                            1 => 'มกราคม',
                            2 => 'กุมภาพันธ์',
                            3 => 'มีนาคม',
                            4 => 'เมษายน',
                            5 => 'พฤษภาคม',
                            6 => 'มิถุนายน',
                            7 => 'กรกฎาคม',
                            8 => 'สิงหาคม',
                            9 => 'กันยายน',
                            10 => 'ตุลาคม',
                            11 => 'พฤศจิกายน',
                            12 => 'ธันวาคม',
                        ],
                        ['prompt' => Yii::t('app', 'เลือกทั้งหมด')]
                    ) ?>

                </div>
                <div class="col-md-3">
                    <?php // echo $form->field($model, 'tank_id')->widget(Select2::class, ['language' => 'th','data' => ArrayHelper::map(Tank::find()->all(), 'id', 'code'),'options' => ['placeholder' => Yii::t('app', 'Select...')],'pluginOptions' => ['allowClear' => true],]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?php // echo $form->field($model, 'type_id')->widget(Select2::class, ['language' => 'th','data' => ArrayHelper::map(Type::find()->all(), 'id', 'code'),'options' => ['placeholder' => Yii::t('app', 'Select...')],'pluginOptions' => ['allowClear' => true],]);
                    ?>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton('<i class="fas fa-search"></i> ' . Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
                        <?= Html::resetButton('<i class="fas fa-refresh"></i> ' . Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>