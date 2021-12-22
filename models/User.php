<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $accesToken
 *
 * @property Supervisor[] $supervisors
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['username','email'], 'string', 'max' => 80],
            [['password','authKey', 'accesToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password'

        ];
    }

    /**
     * Gets query for [[Supervisors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupervisors()
    {
        return $this->hasMany(Supervisor::className(), ['id_usuario' => 'id']);
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['accessToken'=>$token]);
    }
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }

    public function getId()
    {
        return $this ->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey == $authKey;
    }

    public function validatePassword($password){
        return password_verify($password, $this -> password);
    }
/*
    public function validatePassword($password){
        if (password_verify($password, $this -> password)) {
            return $this->password == $password;
        } else {
            return false;
        }
    }
    */
}