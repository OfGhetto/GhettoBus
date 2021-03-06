<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Viaje;

/**
 * ViajeSearch represents the model behind the search form of `app\models\Viaje`.
 */
class ViajeSearch extends Viaje
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'duracion_viaje', 'bus_id'], 'integer'],
            [['destino', 'hora_salida', 'hora_llegada'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Viaje::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'hora_salida' => $this->hora_salida,
            'duracion_viaje' => $this->duracion_viaje,
            'bus_id' => $this->bus_id,
            'hora_llegada' => $this->hora_llegada,
        ]);

        $query->andFilterWhere(['like', 'destino', $this->destino]);

        return $dataProvider;
    }
}
