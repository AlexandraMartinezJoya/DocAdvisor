<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $idAddress
 * @property string $streetName
 * @property string $streetNumber
 * @property string $locationPhoto
 * @property integer $fk_city
 *
 * @property City $fkCity
 * @property Doctor[] $doctors
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['streetName', 'streetNumber'], 'required'],
            [['locationPhoto'], 'string'],
            [['fk_city'], 'integer'],
            [['streetName', 'streetNumber'], 'string', 'max' => 45],
            [['fk_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['fk_city' => 'id_city']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAddress' => 'Id Address',
            'streetName' => 'Street Name',
            'streetNumber' => 'Street Number',
            'locationPhoto' => 'Location Photo',
            'fk_city' => 'Fk City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCity()
    {
        return $this->hasOne(City::className(), ['id_city' => 'fk_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['idAddress' => 'idAddress']);
    }
}
