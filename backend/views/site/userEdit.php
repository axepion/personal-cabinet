<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование профиля';

$form = ActiveForm::begin([
    'id' => 'update-form',
    'options' => ['class' => 'form-horizontal'],
])
?>

<?= $form->field($user, "firstName") ?>
<?= $form->field($user, 'lastName') ?>
<?= $form->field($user, 'middleName') ?>
<?= $form->field($user, 'dateBirthday') ?>
<?= $form->field($user, 'about')->textarea() ?>
<?= $form->field($user, 'isAdmin') ?>

<?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>


