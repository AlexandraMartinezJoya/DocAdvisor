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
            'locationCoordinates' => 'Location Coordinates',
        ];
    }
}
