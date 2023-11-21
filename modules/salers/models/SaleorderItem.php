<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "saleorder_item".
 *
 * @property int $id
 * @property int|null $saleorder_id
 * @property string|null $due_date
 * @property int|null $product_id
 * @property float|null $price
 * @property int|null $quantity
 * @property int|null $unit_id
 * @property float|null $total_price
 * @property int|null $status_id
 */
class SaleorderItem extends \yii\db\ActiveRecord
{

    // public $year;
    // public $month;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saleorder_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['saleorder_id', 'product_id', 'quantity', 'unit_id', 'status_id'], 'integer'],
            [['due_date'], 'safe'],
            [['price', 'total_price'], 'number'],
            [['due_date', 'product_id', 'quantity', 'status_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'saleorder_id' => Yii::t('app', 'Saleorder ID'),
            'due_date' => Yii::t('app', 'Due Date'),
            'product_id' => Yii::t('app', 'Product ID'),
            'price' => Yii::t('app', 'Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'total_price' => Yii::t('app', 'Total Price'),
            'status_id' => Yii::t('app', 'Status ID'),
            // 'year' => Yii::t('app', 'Select Year'),
        ];
    }

    public function getSaleoder()
    {
        return $this->hasOne(SaleOrder::class, ['id' => 'saleorder_id']);
    }

    public function getSaleProduct0()
    {
        return $this->hasOne(SaleProduct::class, ['id' => 'product_id']);
    }

    public function getSaleStatus0()
    {
        return $this->hasOne(SaleStatus::class, ['id' => 'status_id']);
    }
    public function getSaleUnit0()
    {
        return $this->hasOne(SaleProductUnit::class, ['id' => 'unit_id']);
    }
}
