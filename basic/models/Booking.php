<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property integer $idBooking
 * @property integer $fkUser
 * @property integer $fkDoctor
 * @property integer $fkSpecialization
 * @property string $desiredDate
 * @property integer $confirmIdBooking
 * @property integer $emergencyLevel
 * @property string $bookingRemainder
 *
 * @property Doctor $fkDoctor0
 * @property Specialization $fkSpecialization0
 * @property User $fkUser0
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkUser', 'fkDoctor', 'fkSpecialization', 'desiredDate', 'confirmIdBooking', 'emergencyLevel', 'bookingRemainder'], 'required'],
            [['fkUser', 'fkDoctor', 'fkSpecialization', 'confirmIdBooking', 'emergencyLevel'], 'integer'],
            [['desiredDate'], 'safe'],
            [['bookingRemainder'], 'string', 'max' => 45],
            [['fkDoctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['fkDoctor' => 'idDoctor']],
            [['fkSpecialization'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['fkSpecialization' => 'idSpecialization']],
            [['fkUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fkUser' => 'idUser']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBooking' => 'Id Booking',
            'fkUser' => 'Fk User',
            'fkDoctor' => 'Fk Doctor',
            'fkSpecialization' => 'Fk Specialization',
            'desiredDate' => 'Desired Date',
            'confirmIdBooking' => 'Confirm Id Booking',
            'emergencyLevel' => 'Emergency Level',
            'bookingRemainder' => 'Booking Remainder',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkDoctor0()
    {
        return $this->hasOne(Doctor::className(), ['idDoctor' => 'fkDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkSpecialization0()
    {
        return $this->hasOne(Specialization::className(), ['idSpecialization' => 'fkSpecialization']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkUser0()
    {
        return $this->hasOne(User::className(), ['idUser' => 'fkUser']);
    }
}
