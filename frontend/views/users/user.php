<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title='User';
?>
<h1>User: <?= Html::encode("$user->login") ?></h1>
<p> <?= Html::img("$user->photo") ?> </p>
<p>id: <?= Html::encode("$user->id") ?> </p>
<p>Имя: <?= Html::encode("$user->firstName") ?> </p>
<p>Отчество: <?= Html::encode("$user->middleName") ?> </p>
<p>Фамилия: <?= Html::encode("$user->lastName") ?> </p>
<p>Дата рождения: <?= Html::encode("$user->dateBirthday") ?> </p>
<p>О себе: <?= Html::encode("$user->about") ?> </p>
<a href="<?= Url::previous() ?>"> К списку юзеров</a>

