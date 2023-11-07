<?php

use app\models\User;
use app\modules\engineer\models\JobStatus;
use app\modules\engineer\models\RequestRepair;
use app\modules\general\models\Locations;
use app\modules\general\models\Priority;
use app\modules\general\models\Urgency;
use app\modules\salers\models\Status;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepairSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-repair-search">
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
                <div class="col-md-2">
                    <?= $form->field($model, 'repair_code')->textInput(['placeholder' => Yii::t('app', 'Select All')]) ?>

                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'created_by')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(User::find()->where(['status' => 10])->all(), 'id', 'thai_name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select All')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'priority')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Priority::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select All')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'urgency')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Urgency::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select All')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'locations_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Locations::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select All')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'job_status_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(JobStatus::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select All')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('<i class="fas fa-search"></i> ' . Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fas fa-refresh"></i> ' . Yii::t('app', 'Reset'), ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>