<?php

namespace app\modules\salers\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $username USERNAME
 * @property string|null $password_hash PASSWORD
 * @property string|null $email EMAIL
 * @property string|null $english_name ชื่อ-สกุล (อังกฤษ)
 * @property string|null $thai_name ชื่อ-สกุล (ไทย)
 * @property string|null $phone เบอร์ติดต่อ
 * @property int|null $active Active
 *
 * @property Orders[] $orders
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['username', 'password_hash', 'email', 'english_name', 'thai_name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'USERNAME'),
            'password_hash' => Yii::t('app', 'PASSWORD'),
            'email' => Yii::t('app', 'EMAIL'),
            'english_name' => Yii::t('app', 'ชื่อ-สกุล (อังกฤษ)'),
            'thai_name' => Yii::t('app', 'ชื่อ-สกุล (ไทย)'),
            'phone' => Yii::t('app', 'เบอร์ติดต่อ'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['users_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
