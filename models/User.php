<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $supervisor_id
 *
 * @property Supervisor $supervisor
 */
class User extends \yii\db\ActiveRecord
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
            [['username', 'email', 'password', 'supervisor_id'], 'required'],
            [['supervisor_id'], 'integer'],
            [['username'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 32],
            [['supervisor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supervisor::className(), 'targetAttribute' => ['supervisor_id' => 'id']],
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
            'password' => 'Password',
            'supervisor_id' => 'Supervisor ID',
        ];
    }

    /**
     * Gets query for [[Supervisor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupervisor()
    {
        return $this->hasOne(Supervisor::className(), ['id' => 'supervisor_id']);
    }
}
