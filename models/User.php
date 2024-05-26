<?php

namespace app\models;

use app\assets\function\encrypt as FunctionEncrypt;
use Yii;
use yii\web\IdentityInterface;
use app\assets\thuvien\Encrypt;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property int|null $role_id
 *
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'username', 'password'], 'required'],
            [['user_id', 'role_id'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'role_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID người dùng',
            'username' => 'Tên tài khoản',
            'password' => 'Mật khẩu',
            'role_id' => 'Tên role',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['role_id' => 'role_id']);
    }


    public static function findIdentity($id)
    {
        return static::findOne(['user_id' => $id]);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findById($id)
    {
        return static::findOne(['user_id' => $id]);
    }

    public function getId()
    {
        return $this->user_id;
    }


    public function getAuthKey()
    {
        return "dmm";
    }

    public function validateAuthKey($authKey)
    {
        return "dmm";
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password){
        return Encrypt::encrypt($password) === $this->password;
    }

    // public function  beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         if ($insert){
    //         }
    //         else{
    //             $pass = $this->password;
    //             $this->password =$pass;
    //             return true;
    //         }
    //     }
    //     return false;
    // }
}
