<?php

$images = glob("./uploads/*");

//print_r($images);
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria d'imatges</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include("head.php"); ?>
    <main class="main-content">
    <?php foreach ($images as $image) { ?>
        <img src="<?= $image; ?>" alt="" width="200">
    <?php } ?>
    </main>
    <?php include("footer.php"); ?>

</body>

</html>