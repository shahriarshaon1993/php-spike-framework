<?php
    /** @var $this \Spike\core\View */
    $this->title = 'Home';
?>

<div class="card">
    <h5 class="card-header">Joks <?= $name ?></h5>
    <div class="card-body">
        <p id="joke" class="card-text"></p>
        <button id="jokeBtn" class="btn btn-sm btn-info">Generate Jock</button>
    </div>
</div>