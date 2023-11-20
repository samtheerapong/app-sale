<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleCustomerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sale-customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success btn-lg']) ?>
        </p>
        <p style="text-align: right;">

        <div class="form-inline">
            <div class="btn-group btn-group-xs" role="group">
                <div class="input-group mb-3">
                    <?= $form->field($model, 'name')->textInput([
                        'placeholder' => Yii::t('app', 'Search by name'),
                        // 'labelOptions' => ['class' => 'visually-hidden'],
                        'class' => 'form-control',
                    ])->label(false) ?>

                    <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-info']) ?>
                    <?= Html::a('<i class="fa fa-refresh"></i>', ['index'], ['class' => 'btn btn-danger']) ?>
                </div>

            </div>

            </p>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>