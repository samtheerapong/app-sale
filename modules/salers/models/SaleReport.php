<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "sale_report".
 *
 * @property int $id
 * @property int|null $year
 * @property int|null $month
 * @property float|null $domestic_sales
 * @property float|null $sales_target
 * @property float|null $variation
 * @property float|null $achievement
 */
class SaleReport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'month'], 'integer'],
            [['domestic_sales', 'sales_target', 'variation', 'achievement'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'year' => Yii::t('app', 'Year'),
            'month' => Yii::t('app', 'Month'),
            'domestic_sales' => Yii::t('app', 'Domestic Sales'),
            'sales_target' => Yii::t('app', 'Sales Target'),
            'variation' => Yii::t('app', 'Variation'),
            'achievement' => Yii::t('app', 'Achievement'),
        ];
    }
}
