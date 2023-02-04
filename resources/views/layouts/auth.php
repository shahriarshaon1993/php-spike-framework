<?php
/** @var $this \Spike\core\View */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $this->title ?></title>
</head>

<body>
    <div class="container py-4 px-3 mx-auto">
        {{content}}
    </div>

    <script src="js/index.js"></script>
</body>

</html>