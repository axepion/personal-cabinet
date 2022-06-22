<?php
namespace common\models;

use yii\db\ActiveRecord;

class LoginForm extends ActiveRecord
{
    public $login;
    public $password;
    public $rememberMe = false;

    public function rules() {
        return [

        ];
    }

}