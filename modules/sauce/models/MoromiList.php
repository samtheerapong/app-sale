<?php

namespace app\modules\sauce\models;

use Yii;

/**
 * This is the model class for table "moromi_list".
 *
 * @property int $id
 * @property int $moromi_id
 * @property string|null $record_date
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
            [['moromi_id'], 'required'],
            [['moromi_id', 'memo_list', 'color'], 'integer'],
            [['record_date'], 'safe'],
            [['ph', 'nacl', 'tn', 'alcohol', 'turbidity'], 'number'],
            [['note'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'moromi_id' => Yii::t('app', 'Moromi ID'),
            'record_date' => Yii::t('app', 'Record Date'),
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
