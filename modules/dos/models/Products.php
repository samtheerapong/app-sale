<?php

namespace app\modules\dos\models;

use common\models\User;
use DateInterval;
use DateTime;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $numbers รหัสเอกสาร
 * @property string $title ชื่อเอกสาร
 * @property string|null $description รายละเอียด
 * @property int|null $category หมวดหมู่
 * @property string|null $product_name ชื่อสินค้า
 * @property int|null $revision ริวิชั่น
 * @property string|null $reviesed_date วันที่แก้ไขเอกสาร
 * @property string|null $product_iso ระบบที่รองรับ
 * @property string|null $docs ไฟล์เอกสาร
 * @property string|null $expiration_date วันที่หมดอายุ
 * @property int|null $status สถานะ
 * @property string|null $status_details รายละเอียดของสถานะ
 * @property string|null $ref อ้างอิง
 * @property string|null $created_at วันที่เอกสาร
 * @property string|null $updated_at วันที่ปรับปรุง
 * @property int|null $created_by ผู้สร้าง
 * @property int|null $updated_by ผู้ปรับปรุง
 */
class Products extends \yii\db\ActiveRecord
{

    const UPLOAD_FOLDER = 'products';

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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reviesed_date', 'expiration_date', 'created_at', 'updated_at', 'product_iso'], 'safe'],
            [['title',  'category', 'product_name', 'status', 'status_details'], 'required'],
            [['description', 'status_details'], 'string'],
            [['category', 'revision', 'status', 'created_by', 'updated_by'], 'integer'],
            [['numbers', 'title', 'product_name', 'ref'], 'string', 'max' => 255],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'numbers' => Yii::t('app', 'DocumentID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'category' => Yii::t('app', 'Category'),
            'product_name' => Yii::t('app', 'Product Name'),
            'revision' => Yii::t('app', 'Revision'),
            'reviesed_date' => Yii::t('app', 'Reviesed Date'),
            'product_iso' => Yii::t('app', 'ISO Support'),
            'docs' => Yii::t('app', 'Docs'),
            'expiration_date' => Yii::t('app', 'Expiration'),
            'status' => Yii::t('app', 'Statuses'),
            'status_details' => Yii::t('app', 'Status Details'),
            'ref' => Yii::t('app', 'อ้างอิง'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    //********** Relation database */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'category']);
    }
    public function getProductStatus()
    {
        return $this->hasOne(ProductStatus::class, ['id' => 'status']);
    }
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    //********** Upload Path*/
    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    //********** List Downloads */
    public function listDownloadFiles($type)
    {
        $docs_file = '';
        if (in_array($type, ['docs'])) {
            $data = $type === 'docs' ? $this->docs : '';
            $files = Json::decode($data);
            if (is_array($files)) {
                $docs_file = '<ul>';
                foreach ($files as $key => $value) {
                    if (strpos($value, '.jpg') !== false || strpos($value, '.jpeg') !== false || strpos($value, '.png') !== false || strpos($value, '.gif') !== false) {
                        $thumbnail = Html::img(['/qc/products/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['class' => 'img-thumbnail', 'alt' => 'Image', 'style' => 'width: 150px']);
                        $fullSize = Html::a($thumbnail, ['/qc/products/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['target' => '_blank']);
                        $docs_file .= '<li>' . $fullSize . '</li>';
                    } else {
                        $docs_file .= '<li>' . Html::a($value, ['/qc/products/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value]) . '</li>';
                    }
                }
                $docs_file .= '</ul>';
            }
        }

        return $docs_file;
    }

    //********** initialPreview */    
    public function isImage($filePath)
    {
        return @is_array(getimagesize($filePath)) ? true : false;
    }

    public function initialPreview($data, $field, $type = 'file')
    {
        $initial = [];
        $files = Json::decode($data);
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                $filePath = self::getUploadUrl() . $this->ref . '/' . $value;
                $filePathDownload = self::getUploadUrl() . $this->ref . '/' . $value;

                $isImage = $this->isImage($filePath);

                if ($type == 'file') {
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                } elseif ($type == 'config') {
                    $initial[] = [
                        'caption' => $value,
                        'width'  => '120px',
                        'url'    => Url::to(['products/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
                        'key'    => $key
                    ];
                } else {
                    if ($isImage) {
                        $file = Html::img($filePath, ['class' => 'file-preview-image', 'alt' => $this->file_name, 'title' => $this->file_name]);
                    } else {
                        $file = Html::a('View File', $filePathDownload, ['target' => '_blank']);
                    }
                    $initial[] = $file;
                }
            }
        }
        return $initial;
    }


    //**********  ฟังก์ชันคำนวณจำนวนวันหมดอายุ
    public function getDaysToExpiration()
    {
        $currentDate = new DateTime(); // วันปัจจุบัน
        $expiryDate = new DateTime($this->expiration_date); // วันหมดอายุ
        // $expiryDate = new DateTime('2023-08-08'); // test
        $interval = $currentDate->diff($expiryDate); // คำนวณความต่าง

        $daysToExpiration = $interval->format('%r%a');
        //%r%a เป็นรูปแบบการจัดรูปของตัวเลขที่ใช้ในฟังก์ชัน DateTime::format() ในภาษา PHP เพื่อแสดงผลลัพธ์จากการคำนวณระหว่างวันที่สองวัน โดย %r จะแสดงเครื่องหมายบวกหรือลบขึ้นอยู่กับว่าค่าที่คำนวณมาเป็นบวกหรือลบ และ %a จะแสดงจำนวนวันที่ผ่านมา.

        // เพิ่มวันที่ให้กับ $expiryDate
        $expiryDate->add(new DateInterval('P1D'));

        // คำนวณความต่างใหม่
        $newInterval = $currentDate->diff($expiryDate);
        $newDaysToExpiration = $newInterval->format('%r%a');

        return $newDaysToExpiration;
    }


    //********** กำหนดแจ้งเตือวันหมดอายุ
    public function getDaysToExpirationValue()
    {
        $daysToExpiration = $this->getDaysToExpiration();
        $badgeColor = '';
        $setClass = 'badge';

        if ($daysToExpiration < 1) {
            $badgeColor = '#FF1E00';
        } elseif ($daysToExpiration >= 0 && $daysToExpiration <= 30) {
            $badgeColor = '#FF8551';
            $setClass .= ' blink';
        } elseif ($daysToExpiration > 30 && $daysToExpiration <= 60) {
            $badgeColor = '#614BC3';
        } elseif ($daysToExpiration > 60) {
            $badgeColor = '#5BB318';
        }

        $options = ['class' => $setClass, 'style' => "text-align: center; color:#fff; background-color: $badgeColor;"];
        return Html::tag('div', $daysToExpiration, $options);
    }



    //********** Product ISO Array Selectd **********//
    public function getProductIso()
    {
        return $this->hasOne(ProductIso::class, ['id' => 'code']);
    }

    public function productIsoToArray()
    // ใส่  $model->product_iso = implode(',', $model->product_iso); ที่ Create และ update ด้วย
    {
        return $this->product_iso = explode(',', $this->product_iso);
    }

    public function getProductIsoName()
    {
        return implode(', ', $this->getProductIsoNames());
    }

    protected function getProductIsoNames()
    {
        $datas = ArrayHelper::map(ProductIso::find()->all(), 'id', 'code');
        $selectedDatas = explode(',', $this->product_iso);
        $selectedDataNames = [];

        foreach ($datas as $key => $data) {
            if (in_array((int) $key, $selectedDatas)) {
                $selectedDataNames[] = $data;
            }
        }

        return $selectedDataNames;
    }
}
