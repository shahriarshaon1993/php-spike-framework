<?php
    /** @var $exception \Exception */
    /** @var $this \Spike\core\View */
    $this->title = 'Error'
?>

<h3>
    <?php echo $exception->getCode() ?> - <?php echo $exception->getMessage(); ?>
</h3>