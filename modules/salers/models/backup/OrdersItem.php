<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "orders_item".
 *
 * @property int $id
 * @property int|null $orders_id ออเดอร์
 * @property int|null $products_id สินค้า
 * @property string|null $qty จำนวน
 * @property string|null $price ราคา
 * @property string|null $unit หน่วย
 * @property string|null $amount ราคารวม
 * @property int|null $status_id สถานะ
 *
 * @property Orders $orders
 * @property Products $products
 * @property Status $status
 */
class OrdersItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orders_id', 'products_id', 'status_id'], 'integer'],
            [['qty', 'price', 'unit', 'amount'], 'string', 'max' => 255],
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['orders_id' => 'id']],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['products_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'orders_id' => Yii::t('app', 'ออเดอร์'),
            'products_id' => Yii::t('app', 'สินค้า'),
            'qty' => Yii::t('app', 'จำนวน'),
            'price' => Yii::t('app', 'ราคา'),
            'unit' => Yii::t('app', 'หน่วย'),
            'amount' => Yii::t('app', 'ราคารวม'),
            'status_id' => Yii::t('app', 'สถานะ'),
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::class, ['id' => 'orders_id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::class, ['id' => 'products_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }
}
