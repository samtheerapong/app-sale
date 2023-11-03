<?php

namespace app\modules\engineer\models;

use Yii;

/**
 * This is the model class for table "work_order".
 *
 * @property int $id
 * @property string|null $work_ordercol
 * @property string|null $work_code
 * @property int|null $request_repair_id
 * @property int|null $work_approver
 * @property string|null $work_approver_comment
 * @property string|null $work_approv_date
 * @property string|null $work_date
 * @property string|null $machine
 *
 * @property RequestRepair $requestRepair
 */
class WorkOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_repair_id', 'work_approver'], 'integer'],
            [['work_approver_comment', 'machine'], 'string'],
            [['work_approv_date', 'work_date'], 'safe'],
            [['work_ordercol'], 'string', 'max' => 45],
            [['work_code'], 'string', 'max' => 255],
            [['request_repair_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestRepair::class, 'targetAttribute' => ['request_repair_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'work_ordercol' => Yii::t('app', 'Work Ordercol'),
            'work_code' => Yii::t('app', 'Work Code'),
            'request_repair_id' => Yii::t('app', 'Request Repair ID'),
            'work_approver' => Yii::t('app', 'Work Approver'),
            'work_approver_comment' => Yii::t('app', 'Work Approver Comment'),
            'work_approv_date' => Yii::t('app', 'Work Approv Date'),
            'work_date' => Yii::t('app', 'Work Date'),
            'machine' => Yii::t('app', 'Machine'),
        ];
    }

    /**
     * Gets query for [[RequestRepair]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestRepair()
    {
        return $this->hasOne(RequestRepair::class, ['id' => 'request_repair_id']);
    }
}
