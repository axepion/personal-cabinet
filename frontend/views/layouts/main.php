<?php
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

Yii::$app->name = "Личный кабинет"
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" >
<head>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems = [
                ['label' => 'Login', 'url' => ['/site/login']],
                ['label' => 'Register', 'url' => ['/site/signup']],
            ];
    }

    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Войти',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
        echo Html::tag('div',Html::a('Регистрация',['/site/signup'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::tag('div',Html::a('Мой профиль',['/profile'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->login . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<main role="main" class="flex-shrink-0">


    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>



</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
