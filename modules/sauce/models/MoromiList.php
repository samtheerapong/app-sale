<?php

namespace app\modules\sauce\models;

use Yii;

/**
 * This is the model class for table "moromi_list".
 *
 * @property int $id
 * @property string|null $moromi_record
 * @property int|null $memo_list
 * @property float|null $ph
 * @property int|null $color
 * @property float|null $nacl
 * @property float|null $tn
 * @property float|null $alcohol
 * @property float|null $turbidity
 * @property string|null $note
 */
class MoromiList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moromi_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['moromi_record', 'note'], 'string'],
            [['memo_list', 'color'], 'integer'],
            [['ph', 'nacl', 'tn', 'alcohol', 'turbidity'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'moromi_record' => Yii::t('app', 'Moromi Record'),
            'memo_list' => Yii::t('app', 'Memo List'),
            'ph' => Yii::t('app', 'Ph'),
            'color' => Yii::t('app', 'Color'),
            'nacl' => Yii::t('app', 'Nacl'),
            'tn' => Yii::t('app', 'Tn'),
            'alcohol' => Yii::t('app', 'Alcohol'),
            'turbidity' => Yii::t('app', 'Turbidity'),
            'note' => Yii::t('app', 'Note'),
        ];
    }
}
