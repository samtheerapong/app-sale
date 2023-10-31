<?php

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
                <div class="col-md-6">
                    <?= $form->field($model, 'selectTank')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Tank::find()->all(), 'id', 'code'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'selectType')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Type::find()->all(), 'id', 'code'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-area-chart" aria-hidden="true"></i> ' . Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>


</div>