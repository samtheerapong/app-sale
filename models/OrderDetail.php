<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $product_name
 * @property float|null $price
 * @property float|null $amount
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['price', 'amount'], 'number'],
            [['product_name'], 'string', 'max' => 255],
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
            'product_name' => Yii::t('app', 'Product Name'),
            'price' => Yii::t('app', 'Price'),
            'amount' => Yii::t('app', 'Amount'),
        ];
    }
}
