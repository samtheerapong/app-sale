<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string|null $items
 * @property int|null $order_detail
 */
class Orders extends \yii\db\ActiveRecord
{
    public $items;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['items'], 'string'],
            [['order_detail'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'items' => Yii::t('app', 'Items'),
            'order_detail' => Yii::t('app', 'Order Detail'),
        ];
    }
}
