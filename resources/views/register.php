<?php
    /** @var $model \Spike\models\User */
    /** @var $this \Spike\core\View */

    $this->title = 'Register'
?>

<h1>Register Page</h1>
<?php $form = Spike\core\form\Form::begin('', 'post') ?>
    <?= $form->field($model, 'firstname') ?>
    <?= $form->field($model, 'lastname') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <?= $form->field($model, 'confirmPassword')->passwordField() ?>

    <button type="submit" class="btn btn-primary mt-2">Register</button>
<?php Spike\core\form\Form::end() ?>