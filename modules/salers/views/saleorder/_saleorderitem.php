<?php

use app\modules\salers\models\Saleorder;
use app\modules\salers\models\SaleorderItem;
use app\modules\salers\models\SaleProduct;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="saleorder-item-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'saleorder_id',
            [
                'attribute' => 'due_date',
                'format' => 'date',
                'contentOptions' => ['style' => 'width:120px;'],
                'value' => function ($model) {
                    return $model->due_date;
                },
            ],
            // 'due_date',
            // 'product_id',
            [
                'attribute' => 'product_id',
                'format' => 'html',
                // 'contentOptions' => ['style' => 'width:300px;'],
                'value' => function ($model) {
                    return $model->saleProduct0->name;
                },
            ],
            // 'price',
            // 'quantity',
            [
                'attribute' => 'quantity',
                'format' => 'html',
                'contentOptions' => ['style' => 'width:100px;'],
                'value' => function ($model) {
                    return $model->quantity;
                },
            ],
            // 'unit_id',
            [
                'attribute' => 'unit_id',
                'format' => 'html',
                'contentOptions' => ['style' => 'width:100px;'],
                'value' => function ($model) {
                    return $model->saleUnit0->name;
                },
            ],
            // 'total_price',
            // 'status_id',
            [
                'attribute' => 'status_id',
                'format' => 'html',
                'contentOptions' => ['style' => 'width:100px;'],
                'value' => function ($model) {
                    return $model->saleStatus0->name;
                },
            ],
          
        ],
    ]); ?>
</div>
