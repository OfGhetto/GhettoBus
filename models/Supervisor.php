<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supervisor".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $rut
 * @property int $id_usuario
 *
 * @property Multas[] $multas
 * @property User $usuario
 */
class Supervisor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supervisor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'rut'], 'required','message'=>'Porfavor ingrese un valor'],
            [['id_usuario'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 40],
            [['rut'], 'string', 'max' => 12],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'rut' => 'Rut',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * Gets query for [[Multas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMultas()
    {
        return $this->hasMany(Multas::className(), ['supervisor_id' => 'id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
    }
}
