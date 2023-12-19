<?php

namespace app\modules\it\models;

use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "it_stock".
 *
 * @property int $id
 * @property string|null $name ชื่ออะไหล่
 * @property int|null $category หมวดหมู่
 * @property int|null $balance ยอดคงเหลือ
 * @property int|null $minimum จำนวนต่ำสุด
 * @property string|null $photo รูปภาพ
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ItStockCat $category0
 */
class ItStock extends \yii\db\ActiveRecord
{

    public $upload_foler = 'uploads/it';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'it_stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'balance', 'minimum'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => ItStockCat::class, 'targetAttribute' => ['category' => 'id']],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ชื่ออะไหล่'),
            'category' => Yii::t('app', 'หมวดหมู่'),
            'balance' => Yii::t('app', 'ยอดคงเหลือ'),
            'minimum' => Yii::t('app', 'จำนวนต่ำสุด'),
            'photo' => Yii::t('app', 'รูปภาพ'),
            'imageFile' => Yii::t('app', 'รูปภาพ'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(ItStockCat::class, ['id' => 'category']);
    }

    public function CalStock()
    {
        $lastRecive = 3;
        $lastPick = 1;
        $totalStock = $lastRecive - $lastPick;
        return $totalStock;
    }

    public function uploadPhoto($model, $attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName . time()) . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl()
    {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer()
    {
        return empty($this->photo) ? 'https://congtygiaphat104.com/template/Default/img/no.png' : $this->getUploadUrl() . $this->photo;
    }
}
