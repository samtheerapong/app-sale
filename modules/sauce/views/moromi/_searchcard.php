<?php

use app\modules\sauce\models\MoromiStatus;
use app\modules\sauce\models\TankDestination;
use app\modules\sauce\models\TankSource;
use app\modules\sauce\models\Type;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="moromi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['card'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 2
        ],
    ]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Search') ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'code') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'batch_no') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'shikomi_date') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'transfer_date') ?>
                </div>
                <div class="col-md-3">

                    <?= $form->field($model, 'tank_source')->widget(Select2::class, [
                        'language' => 'th',
                        'attribute' => 'tank_source',
                        'data' => ArrayHelper::map(TankSource::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'tank_destination')->widget(Select2::class, [
                        'language' => 'th',
                        'attribute' => 'tank_destination',
                        'data' => ArrayHelper::map(TankDestination::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'type_id')->widget(Select2::class, [
                        'language' => 'th',
                        'attribute' => 'type_id',
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
                        'attribute' => 'status_id',
                        'data' => ArrayHelper::map(MoromiStatus::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton('<i class="fas fa-search"></i> ' . Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('<i class="fas fa-x"></i> ' . Yii::t('app', 'Reset'), ['card'], ['class' => 'btn btn-outline-secondary']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>