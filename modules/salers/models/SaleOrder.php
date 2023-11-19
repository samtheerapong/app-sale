<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "saleorder".
 *
 * @property int $id
 * @property string|null $po_number
 * @property int|null $customer_id
 * @property int|null $salers_id
 * @property string|null $deadline
 * @property string|null $new_dateline
 * @property int|null $payment_id
 * @property float|null $percent_vat
 * @property float|null $discount
 * @property float|null $total
 * @property float|null $grand_total
 * @property string|null $remask
 * @property int|null $status
 */
class Saleorder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saleorder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'salers_id', 'payment_id', 'status_id'], 'integer'],
            [['deadline', 'new_deadline'], 'safe'],
            [['percent_vat', 'discount', 'total', 'grand_total'], 'number'],
            [['remask'], 'string'],
            [['po_number'], 'string', 'max' => 45],
            [['po_number', 'total', 'customer_id', 'salers_id', 'payment_id', 'status_id', 'deadline'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'po_number' => Yii::t('app', 'Po Number'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'salers_id' => Yii::t('app', 'Salers ID'),
            'deadline' => Yii::t('app', 'Deadline'),
            'new_deadline' => Yii::t('app', 'New Deadline'),
            'payment_id' => Yii::t('app', 'Payment ID'),
            'percent_vat' => Yii::t('app', 'Percent Vat'),
            'discount' => Yii::t('app', 'Discount'),
            'total' => Yii::t('app', 'Total'),
            'grand_total' => Yii::t('app', 'Grand Total'),
            'remask' => Yii::t('app', 'Remask'),
            'status_id' => Yii::t('app', 'Status'),
        ];
    }


    public function getCustomer()
    {
        return $this->hasOne(SaleCustomer::class, ['id' => 'customer_id']);
    }

    public function getPayment()
    {
        return $this->hasOne(SalePayment::class, ['id' => 'payment_id']);
    }

    public function getSalers()
    {
        return $this->hasOne(Salers::class, ['id' => 'salers_id']);
    }

    public function getStatus0()
    {
        return $this->hasOne(SaleStatus::class, ['id' => 'status_id']);
    }

    // hasmany
    public function getSaleorderItems()
    {
        return $this->hasMany(SaleorderItem::class, ['saleorder_id' => 'id']);
    }

    public function calculateTotal()
    {
        return $this->getSaleorderItems()->sum('total_price');
    }

    //คำนวนสุทธิ
    public function calculateGrandTotal()
    {
        if ($this->total !== null && $this->percent_vat !== null && $this->discount !== null) {
            return intval($this->total) + (intval($this->total) * (intval($this->percent_vat) / 100)) - intval($this->discount);
        } else {
            return null; // or return a default value, depending on your requirements
        }
    }
}
