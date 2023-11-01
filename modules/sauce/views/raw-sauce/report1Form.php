<?php

use app\modules\sauce\models\RawSauce;
use app\modules\sauce\models\Tank;
use app\modules\sauce\models\Type;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\sauce\models\RawSauce */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="raw-sauce-form">

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Report Selector') ?>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'action' => ['raw-sauce/report1'], // ต้องเปลี่ยน controllerName เป็นชื่อของคอนโทรลเลอร์ที่เกี่ยวข้อง
            ]); ?>

            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'selectYear')->dropDownList(
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

                <div class="col-md-2">
                    <?= $form->field($model, 'selectType')->dropDownList(
                        ArrayHelper::map(Type::find()->all(), 'id', 'code'),
                        [
                            'prompt' => Yii::t('app', 'Select All'),
                            'options' => [
                                'required' => true,
                            ],
                        ]
                    ) ?>

                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-area-chart" aria-hidden="true"></i> ' . Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fas fa-refresh"></i> ' . Yii::t('app', 'Reset'), ['raw-sauce/report1'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
