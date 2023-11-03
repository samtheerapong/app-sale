<?php

namespace app\modules\engineer\models;

use Yii;

/**
 * This is the model class for table "job_status".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $detail
 * @property string|null $color
 *
 * @property RequestRepair[] $requestRepairs
 */
class JobStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_status';
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
        return $this->hasMany(RequestRepair::class, ['job_status_id' => 'id']);
    }
}
