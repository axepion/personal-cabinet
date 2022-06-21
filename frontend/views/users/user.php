<?php
use yii\helpers\Html;

$this->title='User';
?>
<h1>Only one user</h1>
<p> <?= Html::encode("$user->id") ?> </p>
<p> <?= Html::encode("$user->photo") ?> </p>
<p> <?= Html::encode("$user->firstName") ?> </p>
<p> <?= Html::encode("$user->middleName") ?> </p>
<p> <?= Html::encode("$user->lastName") ?> </p>
<p> <?= Html::encode("$user->dateBirthday") ?> </p>
<p> <?= Html::encode("$user->about") ?> </p>

