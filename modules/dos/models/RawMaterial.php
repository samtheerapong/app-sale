<?php

namespace app\modules\dos\models;

use Yii;

/**
 * This is the model class for table "raw_material".
 *
 * @property int $id
 * @property string $name หมวดหมู่
 * @property string|null $details รายละเอียด
 * @property string|null $color สี
 */
class RawMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'raw_material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['details'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'หมวดหมู่'),
            'details' => Yii::t('app', 'รายละเอียด'),
            'color' => Yii::t('app', 'สี'),
        ];
    }
}
