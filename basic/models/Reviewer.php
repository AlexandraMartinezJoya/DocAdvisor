<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviewer".
 *
 * @property integer $idUser
 * @property string $authLogin
 * @property string $password
 * @property string $email
 *
 * @property Booking[] $bookings
 */
class Reviewer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviewer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['authLogin', 'password', 'email'], 'required'],
            [['authLogin', 'password', 'email'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'authLogin' => 'Auth Login',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['fkUser' => 'idUser']);
    }
}
