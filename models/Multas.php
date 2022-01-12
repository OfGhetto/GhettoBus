<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "multas".
 *
 * @property int $id
 * @property int $valor
 * @property string $fecha
 * @property int $chofer_id
 * @property int $supervisor_id
 *
 * @property Chofer $chofer
 * @property Supervisor $supervisor
 */
class Multas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'multas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valor', 'fecha'], 'required','message'=>'Porfavor ingrese un valor'],
            [['chofer_id', 'supervisor_id'],'required','message' =>'Porfavor seleccione un valor en {attribute}'],
            [['valor', 'chofer_id', 'supervisor_id'], 'integer'],
            [['fecha'], 'safe'],
            [['chofer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chofer::className(), 'targetAttribute' => ['chofer_id' => 'id']],
            [['supervisor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supervisor::className(), 'targetAttribute' => ['supervisor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'valor' => 'Valor',
            'fecha' => 'Fecha',
            'chofer_id' => 'Rut del chofer',
            'supervisor_id' => 'Rut del supervisor',
        ];
    }

    /**
     * Gets query for [[Chofer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChofer()
    {
        return $this->hasOne(Chofer::className(), ['id' => 'chofer_id']);
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
