<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string|null $order_no
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_no'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_no' => Yii::t('app', 'Order No'),
        ];
    }


    // hasmany
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }
}
