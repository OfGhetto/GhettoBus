<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property int $id
 * @property string $patente
 * @property int $capacidad
 * @property int $anden_id
 *
 * @property Anden $anden
 * @property Chofer[] $chofers
 * @property Viaje[] $viajes
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patente', 'capacidad', 'anden_id'], 'required','message'=>'Porfavor ingrese un valor'],
            [['capacidad', 'anden_id'], 'integer'],
            [['patente'], 'string', 'max' => 10],
            [['anden_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anden::className(), 'targetAttribute' => ['anden_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patente' => 'Patente',
            'capacidad' => 'Capacidad',
            'anden_id' => 'Numero Anden',
        ];
    }

    /**
     * Gets query for [[Anden]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnden()
    {
        return $this->hasOne(Anden::className(), ['id' => 'anden_id']);
    }

    /**
     * Gets query for [[Chofers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChofers()
    {
        return $this->hasMany(Chofer::className(), ['bus_id' => 'id']);
    }

    /**
     * Gets query for [[Viajes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viaje::className(), ['bus_id' => 'id']);
    }
}
