<?php

namespace app\modules\sauce\models;

use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "moromi".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $batch_no
 * @property string|null $shikomi_date
 * @property string|null $transfer_date
 * @property string|null $tank_source
 * @property string|null $tank_destination
 * @property int|null $type_id
 * @property int|null $status_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Moromi extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at'],
                    self::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
            [
                'class' => BlameableBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moromi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'autonumber', 'format' => 'MRM-' . (date('y') + 43) . date('m') . '-????'],
            [['shikomi_date', 'transfer_date', 'created_at', 'updated_at'], 'safe'],
            [['type_id', 'status_id', 'created_by', 'updated_by'], 'integer'],
            [['code', 'batch_no'], 'string', 'max' => 45],
            [['remask'], 'string'],
            [['batch_no', 'shikomi_date', 'transfer_date', 'status_id', 'type_id', 'tank_source', 'tank_destination'], 'required'],
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
            'batch_no' => Yii::t('app', 'Batch No'),
            'shikomi_date' => Yii::t('app', 'Shikomi Date'),
            'transfer_date' => Yii::t('app', 'Transfer Date'),
            'tank_source' => Yii::t('app', 'Tank Source'),
            'tank_destination' => Yii::t('app', 'Tank Destination'),
            'type_id' => Yii::t('app', 'Type ID'),
            'status_id' => Yii::t('app', 'Status ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'remask' => Yii::t('app', 'Remask'),
        ];
    }

    public function getTankSource0()
    {
        return $this->hasOne(TankSource::class, ['id' => 'tank_source']);
    }

    public function getTankDestination0()
    {
        return $this->hasOne(TankDestination::class, ['id' => 'tank_destination']);
    }

    public function getMoromiType0()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    public function getMoromiStatus0()
    {
        return $this->hasOne(MoromiStatus::class, ['id' => 'status_id']);
    }

    public function getCreatedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    public function getUpdatedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }


    // hasMany
    public function getMoromiLists()
    {
        return $this->hasMany(MoromiList::class, ['moromi_id' => 'id']);
    }
}
