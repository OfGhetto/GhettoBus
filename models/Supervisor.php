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
 *
 * @property Multas[] $multas
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
            [['nombre', 'apellido', 'rut'], 'required'],
            [['nombre', 'apellido'], 'string', 'max' => 40],
            [['rut'], 'string', 'max' => 12],
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
}
