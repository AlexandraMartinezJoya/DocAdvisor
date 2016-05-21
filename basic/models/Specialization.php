<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialization".
 *
 * @property integer $idSpecialization
 * @property string $specName
 *
 * @property Booking[] $bookings
 * @property Doctor[] $doctors
 */
class Specialization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['specName'], 'required'],
            [['specName'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSpecialization' => 'Id Specialization',
            'specName' => 'Spec Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['fkSpecialization' => 'idSpecialization']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['idSpecialization' => 'idSpecialization']);
    }
}
