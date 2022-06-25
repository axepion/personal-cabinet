<?php
namespace frontend\models;

use common\models\Users;
use yii\base\Model;

class Profile extends Model
{
    public $firstName;
    public $middleName;
    public $lastName;
    public $dateBirthday;
    public $about;

}