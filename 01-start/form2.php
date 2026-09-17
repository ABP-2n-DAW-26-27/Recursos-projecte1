<?php
session_start();
if(isset($_POST["nom"]) && !empty($_POST["nom"])){
    $nom = htmlspecialchars($_POST["nom"]) ;
} else {
    die("Falta el nom!");
}
$repetir = $_POST["repetir"] ?? 1;
$color = $_POST["color"];
$_SESSION["color"] = $color;
?>
<html>
    <style>
        .verd { color: green; }
        .vermell {color : red; }
    </style>
    <script>
        let nom = "<?= $nom ?>";
    </script>
<body data-nom="<?= $nom ?>">
    <ol>
        <?php for($i = 0; $i < $repetir; $i++){ ?>
         <li class="<?= $color ?> ?>"><?= $nom ?></li>
        <?php } ?>
    </ol>
</body>
</html>
