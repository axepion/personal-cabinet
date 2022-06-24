<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование профиля';

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    ])
?>

<?= $form->field($model, 'firstName') ?>
<?= $form->field($model, 'middleName') ?>
<?= $form->field($model, 'lastName') ?>
<?= $form->field($model, 'dateBirthday') ?>
<?= $form->field($model, 'about') ?>



<?php ActiveForm::end() ?>


