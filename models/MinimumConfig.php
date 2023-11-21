<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "minimum_config".
 *
 * @property int $id
 * @property string $tags
 * @property int $type_id
 * @property float $ph
 * @property int $color
 * @property float $nacl
 * @property float $tn
 * @property float $alcohol
 * @property float $turbidity
 */
class MinimumConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minimum_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['tags', 'type_id', 'ph', 'color', 'nacl', 'tn', 'alcohol', 'turbidity'], 'required'],
            [['type_id', 'color'], 'integer'],
            [['ph', 'nacl', 'tn', 'alcohol', 'turbidity'], 'number'],
            [['tags'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tags' => Yii::t('app', 'Tags'),
            'type_id' => Yii::t('app', 'Type ID'),
            'ph' => Yii::t('app', 'Ph'),
            'color' => Yii::t('app', 'Color'),
            'nacl' => Yii::t('app', 'Nacl'),
            'tn' => Yii::t('app', 'Tn'),
            'alcohol' => Yii::t('app', 'Alcohol'),
            'turbidity' => Yii::t('app', 'Turbidity'),
        ];
    }
}
