<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "payment_term".
 *
 * @property int $id
 * @property string|null $payment_term ประเภทการชำระ
 * @property string|null $color สี
 *
 * @property Orders[] $orders
 */
class PaymentTerm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_term';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_term'], 'string', 'max' => 255],
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
            'payment_term' => Yii::t('app', 'ประเภทการชำระ'),
            'color' => Yii::t('app', 'สี'),
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['payment_term' => 'id']);
    }
}
