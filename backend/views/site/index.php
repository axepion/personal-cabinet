<?php
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

$this->title = 'Админ панель';
VarDumper::dump($_SESSION, 10, true);
?>

<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
])
?>
<?= $form->field($model, 'login') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'rememberMe')->checkbox() ?>

<div class="form-group">
    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>
