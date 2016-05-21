<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Booking;

/**
 * BookingQuery represents the model behind the search form about `app\models\Booking`.
 */
class BookingQuery extends Booking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idBooking', 'fkUser', 'fkDoctor', 'fkSpecialization', 'confirmIdBooking', 'emergencyLevel'], 'integer'],
            [['desiredDate', 'bookingRemainder'], 'safe'],
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
        $query = Booking::find();

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
            'idBooking' => $this->idBooking,
            'fkUser' => $this->fkUser,
            'fkDoctor' => $this->fkDoctor,
            'fkSpecialization' => $this->fkSpecialization,
            'desiredDate' => $this->desiredDate,
            'confirmIdBooking' => $this->confirmIdBooking,
            'emergencyLevel' => $this->emergencyLevel,
        ]);

        $query->andFilterWhere(['like', 'bookingRemainder', $this->bookingRemainder]);

        return $dataProvider;
    }
}
