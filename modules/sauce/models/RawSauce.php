<?php

namespace app\modules\sauce\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "raw_sauce".
 *
 * @property int $id
 * @property string|null $batch
 * @property string|null $reccord_date
 * @property int|null $tank_id
 * @property int|null $type_id
 * @property float|null $ph
 * @property float|null $nacl_t1
 * @property float|null $nacl_t2
 * @property float|null $nacl_t_avr
 * @property float|null $nacl_p1
 * @property float|null $nacl_p2
 * @property float|null $nacl_p_avr
 * @property float|null $tn_t1
 * @property float|null $th_t2
 * @property float|null $tn_t_avr
 * @property float|null $tn_p1
 * @property float|null $tn_p2
 * @property float|null $tn_p_avr
 * @property float|null $col
 * @property float|null $alc_t
 * @property float|null $alc_p
 * @property float|null $ppm
 * @property float|null $brix
 * @property string|null $remask
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property type $type
 * @property Tank $tank
 */
class RawSauce extends \yii\db\ActiveRecord
{
    // public function behaviors()
    // {
    //     return [
    //         [
    //             'class' => TimestampBehavior::class,
    //             'attributes' => [
    //                 self::EVENT_BEFORE_INSERT => ['created_at'],
    //                 self::EVENT_BEFORE_UPDATE => ['updated_at'],
    //             ],
    //             'value' => function () {
    //                 return date('Y-m-d H:i:s');
    //             },
    //         ],
    //         [
    //             'class' => BlameableBehavior::class,
    //             'attributes' => [
    //                 BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
    //                 BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'raw_sauce';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reccord_date', 'created_at', 'updated_at'], 'safe'],
            [['tank_id', 'type_id', 'created_by', 'updated_by'], 'integer'],
            [['ph', 'nacl_t1', 'nacl_t2', 'nacl_t_avr', 'nacl_p1', 'nacl_p2', 'nacl_p_avr', 'tn_t1', 'th_t2', 'tn_t_avr', 'tn_p1', 'tn_p2', 'tn_p_avr', 'col', 'alc_t', 'alc_p', 'ppm', 'brix'], 'number'],
            [['remask','batch'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
            [['tank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tank::class, 'targetAttribute' => ['tank_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'batch' => Yii::t('app', 'Batch'),
            'reccord_date' => Yii::t('app', 'Reccord Date'),
            'tank_id' => Yii::t('app', 'Tank'),
            'type_id' => Yii::t('app', 'Type'),
            'ph' => Yii::t('app', 'PH'),
            'nacl_t1' => Yii::t('app', 'NaCL Time 1'),
            'nacl_t2' => Yii::t('app', 'NaCL Time 2'),
            'nacl_t_avr' => Yii::t('app', 'NaCl Average (T)'),
            'nacl_p1' => Yii::t('app', 'NaCl 1%'),
            'nacl_p2' => Yii::t('app', 'NaCl 2%'),
            'nacl_p_avr' => Yii::t('app', 'NaCl Average (P)'),
            'tn_t1' => Yii::t('app', 'TN Time 1'),
            'th_t2' => Yii::t('app', 'TN Time 2'),
            'tn_t_avr' => Yii::t('app', 'TN Average (T)'),
            'tn_p1' => Yii::t('app', 'TN 1%'),
            'tn_p2' => Yii::t('app', 'TN 2%'),
            'tn_p_avr' => Yii::t('app', 'TN Average (P)'),
            'col' => Yii::t('app', 'Color'),
            'alc_t' => Yii::t('app', 'Alcohol (T)'),
            'alc_p' => Yii::t('app', 'Alcohol (P)'),
            'ppm' => Yii::t('app', 'PPM'),
            'brix' => Yii::t('app', 'Brix'),
            'remask' => Yii::t('app', 'Remask'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[type]].
     *
     * @return \yii\db\ActiveQuery|typeQuery
     */
    public function getType()
    {
        return $this->hasOne(type::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Tank]].
     *
     * @return \yii\db\ActiveQuery|TankQuery
     */
    public function getTank()
    {
        return $this->hasOne(Tank::class, ['id' => 'tank_id']);
    }

    /**
     * {@inheritdoc}
     * @return RawSauceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RawSauceQuery(get_called_class());
    }

    public function calculateNaclAverages()
    {
        // $sumNaclT = $this->nacl_t1 + $this->nacl_t2;
        // $this->nacl_t_avr = $sumNaclT / 2;

        $sumNaclP = $this->nacl_p1 + $this->nacl_p2;
        $this->nacl_p_avr = $sumNaclP / 2;
    }

    public function calculateTnAverages()
    {
        // $sumTnT = $this->tn_t1 + $this->th_t2;
        // $this->tn_t_avr = $sumTnT / 2;

        $sumTnP = $this->tn_p1 + $this->tn_p2;
        $this->tn_p_avr = $sumTnP / 2;
    }

    public function shortdate($date) {
        return date('Y-m-d', strtotime($date));
    }
}
