<?php

namespace app\modules\general\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property int $id
 * @property string $code รหัส
 * @property string $name ชื่อ
 * @property string|null $detail รายละเอียด
 * @property string|null $color สี
 *
 * @property RequestRepair[] $requestRepairs
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['detail'], 'string'],
            [['code', 'name', 'color'], 'string', 'max' => 255],
            [['code'], 'unique'],
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
            'detail' => Yii::t('app', 'Detail'),
            'color' => Yii::t('app', 'Color'),
        ];
    }

    /**
     * Gets query for [[RequestRepairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestRepairs()
    {
        return $this->hasMany(RequestRepair::class, ['locations_id' => 'id']);
    }
}
