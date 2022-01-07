<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viaje".
 *
 * @property int $id
 * @property string $destino
 * @property string $hora_salida
 * @property int $duracion_viaje
 * @property int $bus_id
 * @property string $hora_llegada
 *
 * @property Bus $bus
 */
class Viaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viaje';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['destino', 'hora_salida', 'duracion_viaje', 'bus_id', 'hora_llegada'], 'required','message'=>'Porfavor ingrese un valor'],
            [['hora_salida', 'hora_llegada'], 'safe'],
            [['duracion_viaje', 'bus_id'], 'integer'],
            [['destino'], 'string', 'max' => 45],
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
            'destino' => 'Destino',
            'hora_salida' => 'Hora Salida',
            'duracion_viaje' => 'Duracion Viaje',
            'bus_id' => 'Bus ID',
            'hora_llegada' => 'Hora Llegada',
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
}
