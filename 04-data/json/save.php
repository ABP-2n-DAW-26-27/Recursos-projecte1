<?php
session_start();

$json = file_get_contents("dades.json");

$dades = json_decode($json, true);

if (!is_array($dades)) {
    $dades = [];
}

$error = false;
$descripcio = htmlspecialchars(trim($_POST["descripcio"] ?? ""));
$url = trim($_POST["url"] ?? "");

$error = $descripcio === "";
$error =  $error || ($url === "" or !filter_var($url, FILTER_VALIDATE_URL));

$_SESSION["descripcio"] = $descripcio;
$_SESSION["url"] = $url;

if($error){
    header("Location: index.php?error=1");
    exit();
}
$_SESSION["descripcio"] = "";
$_SESSION["url"] = "";

$dades[] = [
    "descripcio" => $descripcio,
    "url" => $url
];

$json = json_encode($dades);

//setcookie("dades", $json, time() + 3600 * 24 );

file_put_contents("dades.json", $json);
header("Location: index.php");