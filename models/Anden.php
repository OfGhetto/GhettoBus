<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anden".
 *
 * @property int $id
 * @property int|null $estado
 * @property int $numero
 *
 * @property Bus[] $buses
 */
class Anden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anden';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado', 'numero'], 'integer'],
            [['numero'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado' => 'Estado',
            'numero' => 'Numero',
        ];
    }

    /**
     * Gets query for [[Buses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuses()
    {
        return $this->hasMany(Bus::className(), ['anden_id' => 'id']);
    }
}
