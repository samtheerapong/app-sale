<?php

use app\models\User;
use app\models\UserRoles;
use app\models\UserRules;
use app\modules\general\models\Departments;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">

            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'password_hash')->passwordInput() ?>

            <?= $form->field($model, 'thai_name')->textInput() ?>

            <?= $form->field($model, 'email')->textInput() ?>

            <?= $form->field($model, 'role_id')->dropDownList(
                ArrayHelper::map(UserRoles::find()->all(), 'id', 'name'),
                [
                    'prompt' => Yii::t('app', 'Select...'),
                    'options' => ['' => ['disabled' => true]], // Optional: Disable the prompt option
                    'required' => true, // Make the field required
                ]
            ) ?>

            <?= $form->field($model, 'rule_id')->dropDownList(
                ArrayHelper::map(UserRules::find()->all(), 'id', 'name'),
                [
                    'prompt' => Yii::t('app', 'Select...'),
                    'options' => ['' => ['disabled' => true]], // Optional: Disable the prompt option
                    'required' => true, // Make the field required
                ]
            ) ?>

            <?= $form->field($model, 'department_id')->dropDownList(
                ArrayHelper::map(Departments::find()->all(), 'id', 'name'),
                [
                    'prompt' => Yii::t('app', 'Select...'),
                    'options' => ['' => ['disabled' => true]], // Optional: Disable the prompt option
                    'required' => true, // Make the field required
                ]
            ) ?>

            <?= $form->field($model, 'status')->dropDownList([
                User::STATUS_ACTIVE => Yii::t('app', 'Active'),
                User::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
                // User::STATUS_DELETED => Yii::t('app', 'Delete'),
            ]) ?>


        </div>
        <div class="card-footer">
            <div class="form-group">
                <div class="d-grid gap-2">
                    <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>