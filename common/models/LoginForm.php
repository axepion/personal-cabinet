<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\base\Model;

class LoginForm extends Model
{
    public $login;
    public $password;

    public function rules() {
        return [

        ];
    }
}