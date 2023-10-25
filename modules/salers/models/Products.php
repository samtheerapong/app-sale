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
            [['sku', 'name', 'unit','active'], 'required'],
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
            'sku' => Yii::t('app', 'sku'),
            'name' => Yii::t('app', 'name'),
            'unit' => Yii::t('app', 'unit'),
            'image' => Yii::t('app', 'image'),
            'description' => Yii::t('app', 'description'),
            'active' => Yii::t('app', 'active'),
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

    function getStatusActive($active) {
        if ($active == 0) {
            return '<i class="glyphicon glyphicon-remove"></i> <span class="text-danger">' . Yii::t('app', 'Not Actived') . '</span>';
        } else {
            return '<i class="glyphicon glyphicon-ok"></i> <span class="text-success">' . Yii::t('app', 'Actived') . '</span>';
        }
    }
    
}
