<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

Url::remember();
$this->title='Users';
?>
<h1>Users</h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li class="list-group-item">
            <a href="<?=Url::to(['site/user', 'id' => $user->id]) ?>">
                <?= Html::img("$user->photo") ?>
                <?= Html::encode("$user->firstName") ?>
                <?= Html::encode("$user->middleName") ?>
                <?= Html::encode("$user->lastName") ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
