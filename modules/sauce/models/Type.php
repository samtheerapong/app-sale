<?php

namespace app\modules\sauce\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "type".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $description
 * @property string|null $color
 *
 * @property RawSauce[] $rawSauces
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'color'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
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
            'description' => Yii::t('app', 'Description'),
            'color' => Yii::t('app', 'Color'),
        ];
    }

    /**
     * Gets query for [[RawSauces]].
     *
     * @return \yii\db\ActiveQuery|RawSauceQuery
     */
    public function getRawSauces()
    {
        return $this->hasMany(RawSauce::class, ['type_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return typeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new typeQuery(get_called_class());
    }
}
