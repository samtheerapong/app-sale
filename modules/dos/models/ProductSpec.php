<?php

namespace app\modules\dos\models;

use app\modules\dos\models\Status;
use app\models\User;
use Exception;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\bootstrap5\Html;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\UploadedFile;

class ProductSpec extends \yii\db\ActiveRecord
{

    const UPLOAD_FOLDER = 'products/specs';

    // public $uploadFolders = [
    //     'spec'              => 'products/specs',
    //     'process'           => 'products/process',
    //     'fda'               => 'products/fdas',
    //     'nutrition'         => 'products/nutritions',
    // ];

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            $this->getAttributeBehavior('iso'),
        ];
    }

    protected function getAttributeBehavior($attributeName)
    {
        return [
            'class' => AttributeBehavior::class,
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => $attributeName,
                ActiveRecord::EVENT_BEFORE_UPDATE => $attributeName,
            ],
            'value' => function ($event) use ($attributeName) {
                return implode(',', $this->{$attributeName});
            },
        ];
    }

    public static function tableName()
    {
        return 'product_spec';
    }

    public function rules()
    {
        return [
            [['iso'], 'required'],
            [['created_at', 'updated_at', 'revised_date', 'spec_expiration', 'process_expiration', 'fda_expiration', 'nutrition_expiration', 'iso'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['product_number', 'revision', 'title', 'description'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['product_number', 'revision'], 'string', 'max' => 50],
            [['product_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['product_status' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_number' => Yii::t('app', 'Product Number'),
            'revision' => Yii::t('app', 'Revision'),
            'revised_date' => Yii::t('app', 'Revised Date'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'spec' => Yii::t('app', 'Product Specification'),
            'spec_expiration' => Yii::t('app', 'Spec Expiration'),
            'process' => Yii::t('app', 'Process Flow'),
            'process_expiration' => Yii::t('app', 'Process Expiration'),
            'fda' => Yii::t('app', 'FDA'),
            'fda_expiration' => Yii::t('app', 'Fda Expiration'),
            'nutrition' => Yii::t('app', 'Nutrition Label'),
            'nutrition_expiration' => Yii::t('app', 'Nutrition Expiration'),
            'iso' => Yii::t('app', 'ISO Certificate'),
            'product_status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    //****** Relationship
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    public function getProductStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'product_status']);
    }

    //********** ISO Array **********//
    // Relationship Iso Model อย่าลืม Use Model ด้วย
    public function getIso()
    {
        return $this->hasOne(Iso::class, ['id' => 'iso']);
    }

    public function isoToArray()
    {
        return $this->iso = explode(',', $this->iso);
        /*  อย่าลืมไปใส่ที่ actionUpdate
            $model->isoToArray();
        */
    }

    public function getIsoNameArray()
    {
        return implode(', ', $this->getIsoNames('iso'));
    }

    protected function getIsoNames()
    {
        $datas = ArrayHelper::map(Iso::find()->all(), 'id', 'name');
        $explodeDatas = explode(',', $this->iso);
        $selectDataNames = [];

        foreach ($datas as $key => $data) {
            if (in_array((int) $key, $explodeDatas)) {
                $selectDataNames[] = $data;
            }
        }
        return $selectDataNames;
    }



    /**************** Upload docs ********************/
    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    public function listDownloadFiles($type)
    {
        $docs_file = '';
        if (in_array($type, ['spec'])) {
            $data = $type === 'spec' ? $this->spec : '';
            $files = Json::decode($data);
            if (is_array($files)) {
                $docs_file = '<ul>';
                foreach ($files as $key => $value) {
                    if (strpos($value, '.jpg') !== false || strpos($value, '.jpeg') !== false || strpos($value, '.png') !== false || strpos($value, '.gif') !== false) {
                        $thumbnail = Html::img(['/product/product-spec/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['class' => 'img-thumbnail', 'alt' => 'Image', 'style' => 'width: 150px']);
                        $fullSize = Html::a($thumbnail, ['/product/product-spec/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['target' => '_blank']);
                        $docs_file .= '<li>' . $fullSize . '</li>';
                    } else {
                        $docs_file .= '<li>' . Html::a($value, ['/product/product-spec/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value]) . '</li>';
                    }
                }
                $docs_file .= '</ul>';
            }
        }

        return $docs_file;
    }

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
                        'url'    => Url::to(['product-spec/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
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
}
