<?php

namespace app\modules\salers\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "salers".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $address
 * @property string|null $tel
 * @property string|null $avatar
 * @property int|null $active
 *
 * @property SaleOrder[] $saleOrders
 */
class Salers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'string'],
            [['active'], 'integer'],
            [['code', 'tel'], 'string', 'max' => 45],
            [['name', 'avatar'], 'string', 'max' => 255],
            // ['avatar', 'default', 'value' => 'images/avatar/no-avatar.jpg'],
            [['avatar'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'tel' => Yii::t('app', 'Tel'),
            'avatar' => Yii::t('app', 'avatar'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[SaleOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::class, ['salers_id' => 'id']);
    }

    public function uploadAvatar(UploadedFile $avatarFile)
{
    if ($avatarFile) {
        $uploadPath = 'images/avatar/';
        // $avatarFileName = $this->name . '_' . Yii::$app->security->generateRandomString() . '.' . $avatarFile->extension;
        $avatarFileName = $this->id . '_' . Yii::$app->security->generateRandomString() . '.' . $avatarFile->extension;

        if ($avatarFile->saveAs($uploadPath . $avatarFileName)) {
            $this->avatar = $uploadPath . $avatarFileName;
            return true;
        } else {
            Yii::error('Failed to upload avatar.');
        }
    }

    return false;
}

}
