<?php
session_start();

$links = [];
if(isset($_COOKIE["links"])){
    $links = json_decode($_COOKIE["links"], true);
}



$pageName = $_POST["pageName"];
$url = $_POST["url"];

$link = [
    "name" => $pageName,
    "url" => $url,
];

$links[] = $link;

setcookie("links", json_encode($links), time()+3600*24*365);
//$_SESSION["links"] = $links;

header("location: index.php");
