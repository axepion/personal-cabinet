<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title='Users';
?>
<h1>Users</h1>
<ul>
    <?php foreach ($users as $user): ?>
    <li class="list-group-item">
        <?= Html::encode("$user->login") ?>
        <?= Html::encode("$user->firstName") ?>
        <?= Html::encode("$user->middleName") ?>
        <?= Html::encode("$user->lastName") ?>
        <?= Html::encode("$user->dateBirthday") ?>
        <?= Html::encode("$user->photo") ?>
        <?= Html::encode("$user->about") ?>
        <?= Html::encode("$user->photo") ?>
    </li>
    <?php endforeach; ?>
</ul>


<?= LinkPager::widget(['pagination' => $pagination]) ?>

