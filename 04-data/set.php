<?php
session_start();

//print_r($_POST);
$linea = json_decode($_POST["data"], true);

//print_r($linea);

$_SESSION["linea"] = $linea;

header("Location: form.php");