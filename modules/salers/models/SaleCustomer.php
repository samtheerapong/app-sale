<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "sale_customer".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $address
 * @property string|null $tel
 * @property string|null $color
 * @property int|null $active
 *
 * @property SaleOrder[] $saleOrders
 */
class SaleCustomer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'string'],
            [['active'], 'integer'],
            [['code', 'tel', 'color'], 'string', 'max' => 45],
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
            'address' => Yii::t('app', 'Address'),
            'tel' => Yii::t('app', 'Tel'),
            'color' => Yii::t('app', 'Color'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[SaleOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::class, ['customer_id' => 'id']);
    }
}
