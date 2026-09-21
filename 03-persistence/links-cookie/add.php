<?php
session_start();

$links = [];
if(isset($_SESSION["links"])){
    $links = $_SESSION["links"];
}

$pageName = $_POST["pageName"];
$url = $_POST["url"];

$link = [
    "name" => $pageName,
    "url" => $url,
];

$links[] = $link;

$_SESSION["links"] = $links;

header("location: index.php");
