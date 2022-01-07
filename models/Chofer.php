<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chofer".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $rut
 * @property int $bus_id
 *
 * @property Bus $bus
 * @property Multas[] $multas
 */
class Chofer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chofer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'rut', 'bus_id'], 'required','message'=>'Porfavor ingrese un valor'],
            [['bus_id'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 40],
            [['rut'], 'string', 'max' => 12],
            [['bus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['bus_id' => 'id']],
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
            'bus_id' => 'Bus ID',
        ];
    }

    /**
     * Gets query for [[Bus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(Bus::className(), ['id' => 'bus_id']);
    }

    /**
     * Gets query for [[Multas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMultas()
    {
        return $this->hasMany(Multas::className(), ['chofer_id' => 'id']);
    }
}
