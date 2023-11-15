<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string|null $customer_name ชื่อลูกค้า
 * @property string|null $customer_address ที่อยู่ลูกค้า
 * @property string|null $customer_phone เบอร์โทรลูกค้า
 *
 * @property Orders[] $orders
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_address'], 'string'],
            [['customer_name', 'customer_phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_name' => Yii::t('app', 'ชื่อลูกค้า'),
            'customer_address' => Yii::t('app', 'ที่อยู่ลูกค้า'),
            'customer_phone' => Yii::t('app', 'เบอร์โทรลูกค้า'),
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['customer_id' => 'id']);
    }
}
