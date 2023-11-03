<?php

namespace app\modules\general\models;

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
            'username' => Yii::t('app', 'Username'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'email' => Yii::t('app', 'Email'),
            'english_name' => Yii::t('app', 'English Name'),
            'thai_name' => Yii::t('app', 'Thai Name'),
            'phone' => Yii::t('app', 'Phone'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['users_id' => 'id']);
    }
}
