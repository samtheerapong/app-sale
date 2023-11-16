<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "sale_product".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $detail
 * @property int|null $unit_id
 * @property int|null $customer_id
 * @property string|null $note
 * @property int|null $active
 *
 * @property SaleItem[] $saleItems
 */
class SaleProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail', 'note'], 'string'],
            [['unit_id', 'customer_id', 'active'], 'integer'],
            [['code'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'detail' => Yii::t('app', 'Detail'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'note' => Yii::t('app', 'Note'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[SaleItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleItems()
    {
        return $this->hasMany(SaleItem::class, ['product_id' => 'id']);
    }

    public function getUnits()
    {
        return $this->hasOne(SaleProductUnit::class, ['id' => 'unit_id']);
    }

    public function getCustomers()
    {
        return $this->hasOne(SaleCustomer::class, ['id' => 'customer_id']);
    }
}
