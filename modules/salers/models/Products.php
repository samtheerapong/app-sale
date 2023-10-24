<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $sku รหัสสินค้า
 * @property string|null $name ชื่อสินค้า
 * @property string|null $unit หน่วยนับ
 * @property string|null $image รูปภาพ
 * @property string|null $description รายละเอียด
 * @property int|null $active Active
 *
 * @property OrdersItem[] $ordersItems
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'description'], 'string'],
            [['active'], 'integer'],
            [['sku', 'name', 'unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sku' => Yii::t('app', 'รหัสสินค้า'),
            'name' => Yii::t('app', 'ชื่อสินค้า'),
            'unit' => Yii::t('app', 'หน่วยนับ'),
            'image' => Yii::t('app', 'รูปภาพ'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[OrdersItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersItems()
    {
        return $this->hasMany(OrdersItem::class, ['products_id' => 'id']);
    }
}
