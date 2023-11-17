<?php

use app\models\Product;
// use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Orders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'items')->label(false)->widget(MultipleInput::class, [
        'allowEmptyList' => false,
        'cloneButton' => true,
        // 'theme' => self::THEME_BS,
        'addButtonOptions' => [
            'class' => 'btn btn-success',
            'label' => '<i class="fas fa-plus"></i>'
        ],
        'removeButtonOptions' => [
            'class' => 'btn btn-danger',
            'label' => '<i class="fas fa-minus"></i>'
        ],
        'cloneButtonOptions' => [
            'class' => 'btn btn-info',
            'label' => '<i class="fas fa-clone"></i>'
        ],
        'min' => 1,
        'max' => 10,
        'id' => Html::getInputId($model, 'items'),

        'columns' => [
            [
                'name' => 'id',
                'title' => 'ID',
                'enableError' => true,
                'type' => MultipleInputColumn::TYPE_HIDDEN_INPUT,
            ],
            [
                'name' => 'product_id',
                'title' => 'Name',
                'type' => MultipleInputColumn::TYPE_DROPDOWN,
                'value' => fn ($data) => $data['product_id'] ?? null,
                'items' => ArrayHelper::map(Product::find()->orderBy(['name' => SORT_ASC])->all(), 'id', fn ($model) => $model->code . '-' . $model->name),
                'enableError' => true,
                'options' => [
                    'class' => 'new_class',
                    'prompt' => 'เลือกสินค้า',
                    'onchange' => '$(this).init_change();',
                ],
            ],
            [
                'name' => 'product_name',
                'type' => MultipleInputColumn::TYPE_STATIC,
                'title' => 'Code',
                // 'value' => fn ($data) => $data['charge']['code'] ?? null,
                'value' => fn ($data) => $data['code'] ?? null,
                'enableError' => true,
            ],
            [
                'name' => 'price',
                'type' => MultipleInputColumn::TYPE_STATIC,
                'title' => 'Price',
                'value' => fn ($data) => isset($data['price']) ? number_format($data['price'], 2) : null,
                'enableError' => true,
            ],
            [
                'name' => 'amount',
                'title' => 'Amount',
                'enableError' => true,
                'type' => MultipleInputColumn::TYPE_TEXT_INPUT,
                'value' => fn ($data) => $data['amount'] ?? null,
            ],
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>


</div>