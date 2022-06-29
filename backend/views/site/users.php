<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

Url::remember();

$this->title='Список пользователей';
?>
<a href="<?=Url::to('/create') ?>" class="btn btn-success">Создать</a>
<h1 class="toast-header"> <?= $this->title ?> </h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li class="list-group-item">
                <a href="<?=Url::to("user-edit?id=$user->id")?>">
                <?= Html::encode("$user->id") ?>
                <?= Html::encode("$user->login") ?>
                <?= Html::img("$user->photo") ?>
                <?= Html::encode("$user->firstName") ?>
                <?= Html::encode("$user->middleName") ?>
                <?= Html::encode("$user->lastName") ?>
                </a>
                <a href="<?=Url::to("delete?id=$user->id")?>" class="btn btn-danger">Удалить</a>
        </li>

    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
