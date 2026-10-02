<?php

$json = file_get_contents("dades.json");

$dades = json_decode($json, true);

if (!is_array($dades)) {
    $dades = [];
}

$descripcio = htmlspecialchars(trim($_POST["descripcio"] ?? ""));
$url = trim($_POST["url"] ?? "");

if($descripcio === '') {
    $descripcio = $url;
}

if($url === "" or !filter_var($url, FILTER_VALIDATE_URL)) {
    header("Location: index.php?error=1");
    exit();
}

$dades[] = [
    "descripcio" => $descripcio,
    "url" => $url
];

$json = json_encode($dades);

//setcookie("dades", $json, time() + 3600 * 24 );

file_put_contents("dades.json", $json);
header("Location: index.php");