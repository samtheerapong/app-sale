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
            [['product_id', 'quantity', 'unit'], 'integer'],
            [['price', 'total'], 'number'],
            // [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleOrder::class, 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleProduct::class, 'targetAttribute' => ['product_id' => 'id']],
            [['unit'], 'exist', 'skipOnError' => true, 'targetClass' => SaleProductUnit::class, 'targetAttribute' => ['unit' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleStatus::class, 'targetAttribute' => ['unit' => 'id']],
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

   
    public function getProduct()
    {
        return $this->hasOne(SaleProduct::class, ['id' => 'product_id']);
    }

    public function getUnit0()
    {
        return $this->hasOne(SaleProductUnit::class, ['id' => 'unit']);
    }

    public function getStatus0()
    {
        return $this->hasOne(SaleStatus::class, ['id' => 'status_id']);
    }

    public function getSaleOrders()
    {
        return $this->hasOne(SaleOrder::class, ['id' => 'order_id']);
    }
}
