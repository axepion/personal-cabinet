<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создание профиля';

$form = ActiveForm::begin([
    'id' => 'create-form',
    'options' => ['class' => 'form-horizontal'],
])
?>

<?= $form->field($user, "login")->textInput() ?>
<?= $form->field($user, "password")->passwordInput() ?>
<?= $form->field($user, "password_repeat")->passwordInput() ?>


<?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>


