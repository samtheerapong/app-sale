<?php

namespace app\modules\dos\models;

use Yii;

/**
 * This is the model class for table "types".
 *
 * @property int $id
 * @property string $name ประเภท
 * @property string|null $details รายละเอียด
 * @property string|null $color สี
 */
class Types extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'types';
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
            'name' => Yii::t('app', 'ประเภท'),
            'details' => Yii::t('app', 'รายละเอียด'),
            'color' => Yii::t('app', 'สี'),
        ];
    }
}
