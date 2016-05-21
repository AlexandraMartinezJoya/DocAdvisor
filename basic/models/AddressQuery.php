<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Address;

/**
 * AddressQuery represents the model behind the search form about `app\models\Address`.
 */
class AddressQuery extends Address
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAddress'], 'integer'],
            [['streetName', 'streetNumber', 'locationPhoto'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Address::find();

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
            'idAddress' => $this->idAddress,
        ]);

        $query->andFilterWhere(['like', 'streetName', $this->streetName])
            ->andFilterWhere(['like', 'streetNumber', $this->streetNumber])
            ->andFilterWhere(['like', 'locationPhoto', $this->locationPhoto]);

        return $dataProvider;
    }
}
