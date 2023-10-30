<?php

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
                <div class="col-md-3">
                    <?= $form->field($model, 'year')->textInput([
                        'type' => 'number',
                        'placeholder' => Yii::t('app', 'Year')
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'month')->textInput([
                        'type' => 'number',
                        'placeholder' => Yii::t('app', 'Month')
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'tank_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Tank::find()->all(), 'id', 'code'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'type_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Type::find()->all(), 'id', 'code'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
                        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>