<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $idUser
 * @property string $authLogin
 * @property string $password
 * @property string $email
 *
 * @property Booking[] $bookings
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
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
            'email' => 'auth email for the user',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['fkUser' => 'idUser']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
