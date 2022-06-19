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
    </li>
    <?php endforeach; ?>
</ul>


<?= LinkPager::widget(['pagination' => $pagination]) ?>

