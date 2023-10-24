<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "paid_status".
 *
 * @property int $id
 * @property string|null $paid_status การชำระเงิน
 * @property string|null $color สี
 *
 * @property Orders[] $orders
 */
class PaidStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paid_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paid_status'], 'string', 'max' => 200],
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
            'paid_status' => Yii::t('app', 'การชำระเงิน'),
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
        return $this->hasMany(Orders::class, ['paid_status' => 'id']);
    }
}
