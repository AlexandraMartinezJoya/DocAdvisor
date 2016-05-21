<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Review;

/**
 * ReviewQuery represents the model behind the search form about `app\models\Review`.
 */
class ReviewQuery extends Review
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idReview', 'idDoctor', 'votesPositive', 'votesNegative', 'maxVotesPerIdDoctor'], 'integer'],
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
        $query = Review::find();

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
            'idReview' => $this->idReview,
            'idDoctor' => $this->idDoctor,
            'votesPositive' => $this->votesPositive,
            'votesNegative' => $this->votesNegative,
            'maxVotesPerIdDoctor' => $this->maxVotesPerIdDoctor,
        ]);

        return $dataProvider;
    }
}
