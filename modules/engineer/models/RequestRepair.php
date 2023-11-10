<?php

namespace app\modules\engineer\models;

use app\modules\general\models\Departments;
use app\modules\general\models\Locations;
use app\modules\general\models\Priority;
use app\modules\general\models\Uploads;
use app\modules\general\models\Urgency;
use app\models\User;
use kartik\helpers\Html;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use dosamigos\gallery\Gallery;
use yii\behaviors\BlameableBehavior;
use yii\bootstrap5\LinkPager;
use yii\db\BaseActiveRecord;

use chillerlan\QRCode\QRCode;
use yii\web\Response;

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
 * @property string|null $docs รูปภาพ
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

    const UPLOAD_FOLDER = 'uploads/request';

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at'],
                    self::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
            [
                'class' => BlameableBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
            ],
            // [
            //     'class' => 'mdm\autonumber\Behavior',
            //     'attribute' => 'repair_code', // required
            //     'value' => 'RP-' . (date('y') + 43) . date('m') . '-?',
            //     'digit' => 4
            // ],
        ];
    }

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
            [['request_detail', 'remask', 'approve_comment'], 'string'],
            [['repair_code'], 'autonumber', 'format' => 'RP-' . (date('y') + 43) . date('m') . '-????'],
            [['request_title', 'ref'], 'string', 'max' => 255],
            [['priority'], 'exist', 'skipOnError' => true, 'targetClass' => Priority::class, 'targetAttribute' => ['priority' => 'id']],
            [['urgency'], 'exist', 'skipOnError' => true, 'targetClass' => Urgency::class, 'targetAttribute' => ['urgency' => 'id']],
            [['request_department'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::class, 'targetAttribute' => ['request_department' => 'id']],
            [['job_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobStatus::class, 'targetAttribute' => ['job_status_id' => 'id']],
            [['locations_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::class, 'targetAttribute' => ['locations_id' => 'id']],
            // [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['docs'], 'file', 'maxFiles' => 10, 'skipOnEmpty' => true]
            // [['docs'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 10],
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
            'created_by' => Yii::t('app', 'Created Name'),
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
            'docs' => Yii::t('app', 'Documents'),
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
    public function getPriority0()
    {
        return $this->hasOne(Priority::class, ['id' => 'priority']);
    }

    /**
     * Gets query for [[Urgency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUrgency0()
    {
        return $this->hasOne(Urgency::class, ['id' => 'urgency']);
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasOne(Departments::class, ['id' => 'request_department']);
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

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApproveBy()
    {
        return $this->hasOne(User::class, ['id' => 'approver']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    public function getThumbnails($ref, $id)
    {
        $uploadFiles   = Uploads::find()->where(['ref' => $ref])->all();
        $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url' => self::getUploadUrl(true) . $ref . '/' . $file->real_filename,
                'src' => self::getUploadUrl(true) . $ref . '/thumbnail/' . $file->real_filename,
                'options' => [
                    'style' => 'width: 250px; margin: 2px;',
                ]

            ];
        }
        return $preview;
    }

    // Action Buttons
    public function generateActionButtons()
    {
        return '<div class="btn-group btn-group-xs" role="group">' .
            Html::a('<i class="fa-solid fa-thumbs-up"></i>', ['approve', 'id' => $this->id], [
                'class' => 'btn btn-outline-success btn-sm',
                'title' => Yii::t('app', 'Approve'),
                'aria-label' => Yii::t('app', 'Approve'),
            ]) .
            Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $this->id], [
                'class' => 'btn btn-outline-info btn-sm',
                'title' => Yii::t('app', 'View'),
                'aria-label' => Yii::t('app', 'View'),
            ]) .
            Html::a('<i class="fas fa-pencil"></i>', ['update', 'id' => $this->id], [
                'class' => 'btn btn-outline-warning btn-sm',
                'title' => Yii::t('app', 'Update'),
                'aria-label' => Yii::t('app', 'Update'),
            ]) .
            Html::a('<i class="fas fa-trash-can"></i>', ['delete', 'id' => $this->id], [
                'class' => 'btn btn-outline-danger btn-sm',
                'title' => Yii::t('app', 'Delete'),
                'aria-label' => Yii::t('app', 'Delete'),
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) .
            '</div>';
    }

    public function actionQr()
    {
        Yii::$app->response->format = Response::FORMAT_HTML;
        $data = $this->repair_code;
        $qr = new QRCode();
    
        // Generate the QR code image HTML
        $qrCodeHtml = '<img src="' . $qr->render($data) . '" />';
    
        // Wrap the QR code image in a container with a 2px border
        echo '<div style="border: 1px solid #000; padding: 5px;">' . $qrCodeHtml . $this->repair_code.'</div>';
    }
    
}
