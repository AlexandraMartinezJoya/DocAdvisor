<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Location;

/**
 * LocationQuery represents the model behind the search form about `app\models\Location`.
 */
class LocationQuery extends Location
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['locationID', 'zipCode'], 'integer'],
            [['locationName', 'locationCoordinates'], 'safe'],
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
        $query = Location::find();

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
            'locationID' => $this->locationID,
            'zipCode' => $this->zipCode,
        ]);

        $query->andFilterWhere(['like', 'locationName', $this->locationName])
            ->andFilterWhere(['like', 'locationCoordinates', $this->locationCoordinates]);

        return $dataProvider;
    }
}
