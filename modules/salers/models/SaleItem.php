<?php

namespace app\modules\salers\models;

use Yii;

class SaleItem extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'sale_item';
    }

    public function rules()
    {
        return [
            [['price', 'total'], 'number'],
            [['order_id', 'product_id', 'unit', 'status_id', 'quantity'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'price' => Yii::t('app', 'Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'unit' => Yii::t('app', 'Unit'),
            'total' => Yii::t('app', 'Total'),
            'status_id' => Yii::t('app', 'Status ID'),
        ];
    }


    public function getProduct0()
    {
        return $this->hasOne(SaleProduct::class, ['id' => 'product_id']);
    }

    public function getUnits0()
    {
        return $this->hasOne(SaleProductUnit::class, ['id' => 'unit']);
    }

    public function getStatus0()
    {
        return $this->hasOne(SaleStatus::class, ['id' => 'status_id']);
    }

    public function getOrders0()
    {
        return $this->hasOne(SaleOrder::class, ['id' => 'order_id']);
    }
}
