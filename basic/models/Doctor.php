<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $idDoctor
 * @property string $name
 * @property string $surname
 * @property integer $idSpecialization
 * @property integer $idAddress
 * @property string $emailAddress
 * @property resource $photo
 * @property integer $cnas
 *
 * @property Booking[] $bookings
 * @property Address $idAddress0
 * @property Specialization $idSpecialization0
 * @property Reviews[] $reviews
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'idSpecialization', 'idAddress', 'emailAddress', 'cnas'], 'required'],
            [['idSpecialization', 'idAddress', 'cnas'], 'integer'],
            [['photo'], 'string'],
            [['name', 'surname', 'emailAddress'], 'string', 'max' => 45],
            [['idAddress'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['idAddress' => 'idAddress']],
            [['idSpecialization'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['idSpecialization' => 'idSpecialization']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDoctor' => 'the default id in which the doctor is listed ',
            'name' => 'the name of the doctor',
            'surname' => 'the surname of the doctor ',
            'idSpecialization' => 'The current specialization of the doctor *** what if there are more than one?? ',
            'idAddress' => 'Id Address',
            'emailAddress' => 'the registered email address used to login perhaps to the website',
            'photo' => 'upload photo option',
            'cnas' => 'if the doctor is currently working with cnas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['fkDoctor' => 'idDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAddress0()
    {
        return $this->hasOne(Address::className(), ['idAddress' => 'idAddress']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSpecialization0()
    {
        return $this->hasOne(Specialization::className(), ['idSpecialization' => 'idSpecialization']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['idDoctor' => 'idDoctor']);
    }

    /**
     * @inheritdoc
     * @return DoctorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DoctorQuery(get_called_class());
    }
}
