<?php
namespace common\models;

use yii\db\ActiveRecord;

class LoginForm extends ActiveRecord
{
    public $login;
    public $password;

    public function rules() {
        return [

        ];
    }
}