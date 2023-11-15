<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "sale_item".
 *
 * @property int $id
 * @property int|null $product_id
 * @property float|null $price
 * @property int|null $quantity
 * @property int|null $unit
 * @property float|null $total
 *
 * @property SaleProduct $product
 * @property SaleOrder[] $saleOrders
 * @property SaleProductUnit $unit0
 */
class SaleItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'quantity', 'unit'], 'integer'],
            [['price', 'total'], 'number'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleProduct::class, 'targetAttribute' => ['product_id' => 'id']],
            [['unit'], 'exist', 'skipOnError' => true, 'targetClass' => SaleProductUnit::class, 'targetAttribute' => ['unit' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'price' => Yii::t('app', 'Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'unit' => Yii::t('app', 'Unit'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(SaleProduct::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[SaleOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::class, ['item_id' => 'id']);
    }

    /**
     * Gets query for [[Unit0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit0()
    {
        return $this->hasOne(SaleProductUnit::class, ['id' => 'unit']);
    }
}
