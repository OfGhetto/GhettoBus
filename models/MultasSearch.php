<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Multas;

/**
 * MultasSearch represents the model behind the search form of `app\models\Multas`.
 */
class MultasSearch extends Multas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'valor', 'chofer_id', 'supervisor_id'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = Multas::find();

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
            'valor' => $this->valor,
            'fecha' => $this->fecha,
            'chofer_id' => $this->chofer_id,
            'supervisor_id' => $this->supervisor_id,
        ]);

        return $dataProvider;
    }
}
