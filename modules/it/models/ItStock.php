<?php

namespace app\modules\it\models;

use Yii;

/**
 * This is the model class for table "it_stock".
 *
 * @property int $id
 * @property string|null $name ชื่ออะไหล่
 * @property int|null $category หมวดหมู่
 * @property int|null $balance ยอดคงเหลือ
 * @property int|null $minimum จำนวนต่ำสุด
 * @property string|null $photo รูปภาพ
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ItStockCat $category0
 */
class ItStock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'it_stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'balance', 'minimum'], 'integer'],
            [['photo'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => ItStockCat::class, 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ชื่ออะไหล่'),
            'category' => Yii::t('app', 'หมวดหมู่'),
            'balance' => Yii::t('app', 'ยอดคงเหลือ'),
            'minimum' => Yii::t('app', 'จำนวนต่ำสุด'),
            'photo' => Yii::t('app', 'รูปภาพ'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(ItStockCat::class, ['id' => 'category']);
    }

    public function CalStock()
    {
        $lastRecive = 3;
        $lastPick = 1;

        $totalStock = $lastRecive - $lastPick;

        return $totalStock;
    }
}
