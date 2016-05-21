<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Doctor;

/**
 * DoctorQuery represents the model behind the search form about `app\models\Doctor`.
 */
class DoctorQuery extends Doctor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDoctor', 'idSpecialization', 'idAddress', 'cnas'], 'integer'],
            [['name', 'surname', 'emailAddress', 'photo'], 'safe'],
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
        $query = Doctor::find();

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
            'idDoctor' => $this->idDoctor,
            'idSpecialization' => $this->idSpecialization,
            'idAddress' => $this->idAddress,
            'cnas' => $this->cnas,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'emailAddress', $this->emailAddress])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'specialization.specName', $this->getIdSpecialization0()]);
        
        //$query->joinWith(['specialization(idSpecialization)']);

        return $dataProvider;
    }
}
