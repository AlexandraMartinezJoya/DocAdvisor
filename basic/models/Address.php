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
 *
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
            [['streetName', 'streetNumber'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['idAddress' => 'idAddress']);
    }

    /**
     * @inheritdoc
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }
}
