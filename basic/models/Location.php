<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property integer $locationID
 * @property integer $zipCode
 * @property string $locationName
 * @property string $locationCoordinates
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zipCode', 'locationName', 'locationCoordinates'], 'required'],
            [['zipCode'], 'integer'],
            [['locationName'], 'string', 'max' => 45],
            [['locationCoordinates'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'locationID' => 'Location ID',
            'zipCode' => 'Zip Code',
            'locationName' => 'Location Name',
            'locationCoordinates' => 'possibly to ip track, but for that we would need to get the ip location at every user login doctor or otherwise.',
        ];
    }

    /**
     * @inheritdoc
     * @return LocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocationQuery(get_called_class());
    }
}
