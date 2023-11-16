<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pasienobat;

/**
 * PasienobatSearch represents the model behind the search form of `frontend\models\Pasienobat`.
 */
class PasienobatSearch extends Pasienobat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PasienId', 'ObatId'], 'integer'],
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
        $query = Pasienobat::find();

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
            'PasienId' => $this->PasienId,
            'ObatId' => $this->ObatId,
        ]);

        return $dataProvider;
    }
}
