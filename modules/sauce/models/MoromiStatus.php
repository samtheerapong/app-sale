<?php

namespace app\modules\sauce\models;

use Yii;

/**
 * This is the model class for table "moromi_status".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $detail
 * @property string|null $color
 * @property int|null $active
 */
class MoromiStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moromi_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['active'], 'integer'],
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
            'name' => Yii::t('app', 'Name'),
            'detail' => Yii::t('app', 'Detail'),
            'color' => Yii::t('app', 'Color'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
