<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string|null $name สถานะ
 * @property string|null $color สี
 *
 * @property OrdersItem[] $ordersItems
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'สถานะ'),
            'color' => Yii::t('app', 'สี'),
        ];
    }

    /**
     * Gets query for [[OrdersItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersItems()
    {
        return $this->hasMany(OrdersItem::class, ['status_id' => 'id']);
    }
}
