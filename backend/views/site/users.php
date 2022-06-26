<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

Url::remember();

$this->title='Список пользователей';
?>
<h1 class="toast-header"> <?= $this->title ?> </h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li class="list-group-item">
                <?= Html::encode("$user->id") ?>
                <?= Html::encode("$user->login") ?>
                <?= Html::img("$user->photo") ?>
                <?= Html::encode("$user->firstName") ?>
                <?= Html::encode("$user->middleName") ?>
                <?= Html::encode("$user->lastName") ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
