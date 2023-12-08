<?php

namespace app\modules\it\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "it_stock_list".
 *
 * @property int $id
 * @property int|null $stock_id เลขที่สต๊อค
 * @property string|null $action_date วันที่
 * @property int|null $operator ผู้ดำเนินการ
 * @property int|null $receive รับเข้า
 * @property int|null $pick_up จ่ายออก
 * @property int|null $docs
 * @property string|null $remask หมายเหตุ
 */
class ItStockList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'it_stock_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock_id', 'operator', 'receive', 'pick_up', 'docs'], 'integer'],
            [['action_date'], 'safe'],
            [['remask'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'stock_id' => Yii::t('app', 'เลขที่สต๊อค'),
            'action_date' => Yii::t('app', 'วันที่'),
            'operator' => Yii::t('app', 'ผู้ดำเนินการ'),
            'receive' => Yii::t('app', 'รับเข้า'),
            'pick_up' => Yii::t('app', 'จ่ายออก'),
            'docs' => Yii::t('app', 'Docs'),
            'remask' => Yii::t('app', 'หมายเหตุ'),
        ];
    }

    
    public function getOperator0()
    {
        return $this->hasOne(User::class, ['id' => 'operator']);
    }
}
