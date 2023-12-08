<?php

namespace backend\modules\product\models;

use Yii;

/**
 * This is the model class for table "iso".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $files
 * @property string|null $exp
 * @property int|null $product_spec_id
 */
class Iso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'iso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['files'], 'string'],
            [['exp'], 'safe'],
            [['product_spec_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
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
            'files' => Yii::t('app', 'Files'),
            'exp' => Yii::t('app', 'Exp'),
            'product_spec_id' => Yii::t('app', 'Product Spec ID'),
        ];
    }
}
