<?php

namespace app\modules\manage\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $role
 * @property int $rule
 * @property int $department
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Profile $profile
 */
class User extends ActiveRecord implements IdentityInterface
{
    // status
    const STATUS_ACTIVE     = 10;   // active
    const STATUS_INACTIVE   = 9;    // inactive
    const STATUS_DELETED    = 0;    // Disable

    // role
    const ROLE_ADMIN        = 10;   // Administrator
    const ROLE_USER         = 1;    // View + Create
    const ROLE_MANAGER      = 2;    // View + Create + Update + Delete
    const ROLE_APPROVER     = 3;    // View + Create + Update
    const ROLE_HEAD         = 4;    // View + Create + Update

    // rule
    const RULE_ALL          = 10;   // Administrator
    const RULE_USER         = 1;    // Download
    const RULE_APPROVE_ALL  = 2;    // Approve All
    const RULE_APPROVE_DEP  = 3;    // Approve + Download of Drpartment
    const RULE_APPROVE_SEC  = 4;    // Approve Download of Section


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [
                self::STATUS_ACTIVE,
                self::STATUS_INACTIVE,
                self::STATUS_DELETED
            ]],

            ['role', 'default', 'value' => self::ROLE_USER],
            ['role', 'in', 'range' => [
                self::ROLE_ADMIN,
                self::ROLE_USER,
                self::ROLE_MANAGER,
                self::ROLE_APPROVER,
                self::ROLE_HEAD
            ]],

            ['rule', 'default', 'value' => self::RULE_USER],
            ['rule', 'in', 'range' => [
                self::RULE_ALL,
                self::RULE_USER,
                self::RULE_APPROVE_ALL,
                self::RULE_APPROVE_DEP,
                self::RULE_APPROVE_SEC
            ]],

            [['username', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'role', 'rule', 'department'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username'], 'string', 'max' => 25],
            [['auth_key', 'password_hash', 'password_reset_token'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
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
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'role' => Yii::t('app', 'Role'),
            'rule' => Yii::t('app', 'Rule'),
            'department' => Yii::t('app', 'Department'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
