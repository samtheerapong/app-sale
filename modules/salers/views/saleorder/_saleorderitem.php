<?php

use kartik\grid\GridView;

?>
<div class="saleorder-item-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'hover' => true,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['class' => 'text-center','style' => 'width:45px;']
            ], //กำหนด ความกว้างของ #],

            // 'id',
            // 'saleorder_id',
            [
                'attribute' => 'due_date',
                'format' => 'date',
                'contentOptions' => ['style' => 'width:150px;'],
                'value' => function ($model) {
                    return $model->due_date;
                },
            ],
            // 'due_date',
            // 'product_id',
            [
                'attribute' => 'product_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->saleProduct0->code . ' : ' . $model->saleProduct0->name;
                },
            ],
            // 'price',
            // 'quantity',
            [
                'attribute' => 'quantity',
                'format' => 'html',
                'contentOptions' => ['class' => 'text-center', 'style' => 'width:130px;'],
                'headerOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Yii::$app->formatter->asDecimal($model->quantity, 0);
                },
            ],
            // 'unit_id',
            [
                'attribute' => 'unit_id',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center', 'style' => 'width:130px;'],
                'value' => function ($model) {
                    return $model->saleUnit0->name;
                },
            ],
            // 'total_price',
            // 'status_id',
            [
                'attribute' => 'status_id',
                'format' => 'html',
                'contentOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                'headerOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return '<span class="text" style="color:' . $model->saleStatus0->color . ';">' . $model->saleStatus0->name . '</span>';
                },
            ],

        ],
    ]); ?>
</div>