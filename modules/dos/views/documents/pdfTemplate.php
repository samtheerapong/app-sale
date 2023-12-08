<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="documents-view">

    <div class="header"><b>รายละเอียดข้อมูล : <?= $model->numbers; ?> - <?= $model->title; ?> </b></div>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tbody><tr><th style="width: 160px;">{label}</th><td> {value}</td></tr></tbody>',
        'attributes' => [
            // 'id',
            [
                'attribute' => 'status_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->status->name;
                },
            ],
            'status_details',
            [
                'attribute' => 'occupier_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->occupier->name;
                },
            ],

            'supplier_name',

            'numbers',
            'title',
            'description:ntext',

            [
                'attribute' => 'expiration_date',
                'format' => 'html',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->expiration_date, 'php:d M Y') .
                        '  : ' . $model->getDaysToExpiration() . ' days left';
                },
            ],

            [
                'attribute' => 'created_by',
                'format' => 'html',
                'value' => function ($model) {
                    $user = $model->createdBy->thai_name;
                    return $user ? $model->createdBy->thai_name : $model->createdBy->username;
                },
            ],
            [
                'attribute' => 'expiration_date',
                'label' => 'หมดอายุในอีก',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->getDaysToExpiration() . ' วัน';
                },
            ],

            [
                'attribute' => 'raw_material',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->rawMaterial->name;
                },
            ],


            [
                'attribute' => 'categories_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->categories->name;
                },
            ],


            [
                'attribute' => 'types_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->types->name;
                },
            ],

        ],
    ]) ?>

</div>



<br>
<div class="text-right">
    <div class="row">
        ผู้รายงาน___<?= Yii::$app->user->identity->thai_name ?>___
    </div>
    <br>
    <div class="row">
        วันที่___<?= Yii::$app->formatter->asDate(time(), 'php:d M Y') ?>___
    </div>
</div>