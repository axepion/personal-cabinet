<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title='Users';
?>
<h1>Users</h1>
<ul>
    <?php foreach ($users as $user): ?>
    <li class="list-group-item">
        <?= Html::encode("$user->photo") ?>
        <?= Html::encode("$user->firstName") ?>
        <?= Html::encode("$user->middleName") ?>
        <?= Html::encode("$user->lastName") ?>
        <?= Html::encode("$user->dateBirthday") ?>

    </li>
    <?php endforeach; ?>
</ul>


<?= LinkPager::widget(['pagination' => $pagination]) ?>

