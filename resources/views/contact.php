<?php
/** @var $this \Spike\core\View */
/** @var $model \Spike\models\ContactForm */
$this->title = 'Contact';
?>

<h1>Contact</h1>

<?php $form = Spike\core\form\Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'subject'); ?>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo new \Spike\core\form\TextareaField($model, 'body'); ?>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
<?php Spike\core\form\Form::end() ?>