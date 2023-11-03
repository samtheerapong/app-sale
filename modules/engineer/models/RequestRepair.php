<?php

namespace app\modules\engineer\models;

use app\modules\general\models\Departments;
use app\modules\general\models\Locations;
use app\modules\general\models\Priority;
use app\modules\general\models\Urgency;
use Yii;

/**
 * This is the model class for table "request_repair".
 *
 * @property int $id
 * @property string|null $repair_code เลขที่เอกสาร
 * @property string|null $created_at สร้างเมื่อ
 * @property string|null $updated_at ปรับปรุงเมื่อ
 * @property int|null $created_by สร้างโดย
 * @property int|null $updated_by ปรับปรุงโดย
 * @property int|null $priority ความสำคัญ
 * @property int|null $urgency ความเร่งด่วน
 * @property string|null $created_date วันที่แจ้ง
 * @property string|null $request_department แผนก
 * @property string|null $request_title หัวเรื่อง
 * @property string|null $request_detail รายละเอียด
 * @property string|null $request_date วันที่ต้องการ
 * @property string|null $broken_date วันที่เสีย
 * @property int|null $locations_id สถานที่
 * @property string|null $remask หมายเหตุ
 * @property string|null $images รูปภาพ
 * @property int|null $approver ผู้อนุมัติ
 * @property string|null $approve_date วันที่อนุมัติ
 * @property string|null $approve_comment ความคิดเห็นผู้อนุมัติ
 * @property int|null $job_status_id สถานะงาน
 * @property string|null $ref อ้างอิง
 *
 * @property JobStatus $jobStatus
 * @property Locations $locations
 * @property WorkOrder[] $workOrders
 */
class RequestRepair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_repair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'created_date', 'request_date', 'broken_date', 'approve_date'], 'safe'],
            [['created_by', 'updated_by', 'priority', 'urgency', 'locations_id', 'approver', 'job_status_id'], 'integer'],
            [['request_detail', 'remask', 'images', 'approve_comment'], 'string'],
            [['repair_code'], 'string', 'max' => 45],
            [['request_department', 'request_title', 'ref'], 'string', 'max' => 255],
            [['priority'], 'exist', 'skipOnError' => true, 'targetClass' => Priority::class, 'targetAttribute' => ['priority' => 'id']],
            [['urgency'], 'exist', 'skipOnError' => true, 'targetClass' => Urgency::class, 'targetAttribute' => ['urgency' => 'id']],
            [['request_department'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::class, 'targetAttribute' => ['request_department' => 'id']],
            [['job_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobStatus::class, 'targetAttribute' => ['job_status_id' => 'id']],
            [['locations_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::class, 'targetAttribute' => ['locations_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'repair_code' => Yii::t('app', 'Repair Code'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'priority' => Yii::t('app', 'Priority'),
            'urgency' => Yii::t('app', 'Urgency'),
            'created_date' => Yii::t('app', 'Created Date'),
            'request_department' => Yii::t('app', 'Request Department'),
            'request_title' => Yii::t('app', 'Request Title'),
            'request_detail' => Yii::t('app', 'Request Detail'),
            'request_date' => Yii::t('app', 'Request Date'),
            'broken_date' => Yii::t('app', 'Broken Date'),
            'locations_id' => Yii::t('app', 'Locations ID'),
            'remask' => Yii::t('app', 'Remask'),
            'images' => Yii::t('app', 'Images'),
            'approver' => Yii::t('app', 'Approver'),
            'approve_date' => Yii::t('app', 'Approve Date'),
            'approve_comment' => Yii::t('app', 'Approve Comment'),
            'job_status_id' => Yii::t('app', 'Job Status ID'),
            'ref' => Yii::t('app', 'Ref'),
        ];
    }

    /**
     * Gets query for [[Priority]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPriority()
    {
        return $this->hasOne(Priority::class, ['id' => 'priority']);
    }

    /**
     * Gets query for [[Urgency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUrgency()
    {
        return $this->hasOne(Urgency::class, ['id' => 'urgency']);
    }

    /**
     * Gets query for [[JobStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobStatus()
    {
        return $this->hasOne(JobStatus::class, ['id' => 'job_status_id']);
    }

    /**
     * Gets query for [[Locations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasOne(Locations::class, ['id' => 'locations_id']);
    }

    /**
     * Gets query for [[WorkOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOrders()
    {
        return $this->hasMany(WorkOrder::class, ['request_repair_id' => 'id']);
    }
    
}
