<?php

namespace app\modules\dos\models;

use Yii;

/**
 * This is the model class for table "rawmat_status".
 *
 * @property int $id
 * @property string|null $code รหัส
 * @property string $name สถานะ
 * @property string|null $details รายละเอียด
 * @property string|null $color สี
 */
class RawmatStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rawmat_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['details'], 'string'],
            [['code', 'color'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 255],
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
            'details' => Yii::t('app', 'Details'),
            'color' => Yii::t('app', 'Color'),
        ];
    }
}
