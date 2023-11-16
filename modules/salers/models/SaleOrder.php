<?php

namespace app\modules\salers\models;

use Yii;

class SaleOrder extends \yii\db\ActiveRecord
{
 
    public static function tableName()
    {
        return 'sale_order';
    }

    public function rules()
    {
        return [
            [['po_number', 'customer_id', 'salers_id', 'deadline', 'total'], 'required'],
            [['customer_id', 'salers_id', 'payment_id', 'status'], 'integer'],
            [['new_deadline', 'deadline'], 'safe'],
            [['percent_vat', 'discount', 'grand_total', 'total'], 'number'],
            [['remask'], 'string'],
            [['po_number'], 'string', 'max' => 45],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleCustomer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['payment_id'], 'exist', 'skipOnError' => true, 'targetClass' => SalePayment::class, 'targetAttribute' => ['payment_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => SaleStatus::class, 'targetAttribute' => ['status' => 'id']],
            [['salers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Salers::class, 'targetAttribute' => ['salers_id' => 'id']],
        ];
    }

   
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
            'status' => Yii::t('app', 'Status'),
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
        return $this->hasOne(SaleStatus::class, ['id' => 'status']);
    }

    // hasMany
    public function getOders0()
    {
        return $this->hasMany(SaleItem::class, ['order_id' => 'id']);
    }
}
