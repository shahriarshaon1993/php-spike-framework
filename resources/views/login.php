<?php
    /** @var $model \Spike\models\User */
    /** @var $this \Spike\core\View */
    $this->title = 'login';
?>

<h1>Login Page</h1>
<?php $form = \Spike\core\form\Form::begin('', 'post') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordField() ?>

    <button type="submit" class="btn btn-primary mt-2">Login</button>
<?php \Spike\core\form\Form::end() ?>