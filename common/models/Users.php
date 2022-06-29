<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 *
 */
class Users extends ActiveRecord implements IdentityInterface
{
    private static $user;

    public function rules()
    {
        return [
            [['firstName', 'middleName', 'lastName', ], 'string', 'max' => 255],
            [['about', ], 'string', 'max' => 600],
            [['dateBirthday'], 'default', 'value' => date('Y-m-d')],
            [['dateBirthday'], 'date', 'format' => 'php:Y-m-d'],
            [['isAdmin'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstName' => 'Имя',
            'middleName' => 'Отчество',
            'lastName' => 'Фамилия',
            'dateBirthday' => 'День рождения',
            'about' => 'О себе',
        ];
    }

    public static function tableName()
    {
        return '{{%users}}';
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findByUsername($login)
    {
        return static::findOne(['login' => $login]);
    }

    public static function isAdmin()
    {
        return Users::findOne(Yii::$app->user->getId())->isAdmin;
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
}
