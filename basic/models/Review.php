<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $idReview
 * @property integer $idDoctor
 * @property integer $votes
 * @property integer $maxVotesPerIdDoctor
 *
 * @property Doctor $idDoctor0
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDoctor'], 'required'],
            [['idDoctor', 'votes', 'maxVotesPerIdDoctor'], 'integer'],
            [['idDoctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['idDoctor' => 'idDoctor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idReview' => 'Id Review',
            'idDoctor' => 'Id Doctor',
            'votes' => 'Votes',
            'maxVotesPerIdDoctor' => 'Max Votes Per Id Doctor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoctor0()
    {
        return $this->hasOne(Doctor::className(), ['idDoctor' => 'idDoctor']);
    }
}
