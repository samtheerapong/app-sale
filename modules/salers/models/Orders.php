<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string|null $po_no เลขที่ใบสั่งซื้อ
 * @property int|null $customer_id ชื่อลูกค้า
 * @property string|null $deadline_date กำหนดส่ง
 * @property string|null $deadline_new กำหนดส่งใหม่
 * @property string|null $gross_amount ยอดรวมก่อนหัก
 * @property string|null $vat_charge_rate เรทภาษี(%)
 * @property string|null $vat_charge จำนวนภาษีที่หัก
 * @property string|null $discount ส่วนลด
 * @property string|null $net_amount จำนวนเงินรวมสุทธิ
 * @property int|null $payment_term เงื่อนไขการชำระเงิน
 * @property int|null $paid_status สถานะการชำระเงิน
 * @property int|null $users_id พนักงานขาย
 *
 * @property Customers $customer
 * @property OrdersItem[] $ordersItems
 * @property PaidStatus $paidStatus
 * @property PaymentTerm $paymentTerm
 * @property Users $users
 */
class Orders extends \yii\db\ActiveRecord
{
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
            [['customer_id', 'payment_term', 'paid_status', 'users_id'], 'integer'],
            [['deadline_date', 'deadline_new'], 'safe'],
            [['po_no', 'gross_amount', 'vat_charge_rate', 'vat_charge'], 'string', 'max' => 255],
            [['discount', 'net_amount'], 'string', 'max' => 45],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['paid_status'], 'exist', 'skipOnError' => true, 'targetClass' => PaidStatus::class, 'targetAttribute' => ['paid_status' => 'id']],
            [['payment_term'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentTerm::class, 'targetAttribute' => ['payment_term' => 'id']],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['users_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'po_no' => Yii::t('app', 'เลขที่ใบสั่งซื้อ'),
            'customer_id' => Yii::t('app', 'ชื่อลูกค้า'),
            'deadline_date' => Yii::t('app', 'กำหนดส่ง'),
            'deadline_new' => Yii::t('app', 'กำหนดส่งใหม่'),
            'gross_amount' => Yii::t('app', 'ยอดรวมก่อนหัก'),
            'vat_charge_rate' => Yii::t('app', 'เรทภาษี(%)'),
            'vat_charge' => Yii::t('app', 'จำนวนภาษีที่หัก'),
            'discount' => Yii::t('app', 'ส่วนลด'),
            'net_amount' => Yii::t('app', 'จำนวนเงินรวมสุทธิ'),
            'payment_term' => Yii::t('app', 'เงื่อนไขการชำระเงิน'),
            'paid_status' => Yii::t('app', 'สถานะการชำระเงิน'),
            'users_id' => Yii::t('app', 'พนักงานขาย'),
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[OrdersItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersItems()
    {
        return $this->hasMany(OrdersItem::class, ['orders_id' => 'id']);
    }

    /**
     * Gets query for [[PaidStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaidStatus()
    {
        return $this->hasOne(PaidStatus::class, ['id' => 'paid_status']);
    }

    /**
     * Gets query for [[PaymentTerm]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentTerm()
    {
        return $this->hasOne(PaymentTerm::class, ['id' => 'payment_term']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id' => 'users_id']);
    }
}
