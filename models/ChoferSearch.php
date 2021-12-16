<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Chofer;

/**
 * ChoferSearch represents the model behind the search form of `app\models\Chofer`.
 */
class ChoferSearch extends Chofer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bus_id'], 'integer'],
            [['nombre', 'apellido', 'rut'], 'safe'],
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
        $query = Chofer::find();

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
            'bus_id' => $this->bus_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'rut', $this->rut]);

        return $dataProvider;
    }
}
