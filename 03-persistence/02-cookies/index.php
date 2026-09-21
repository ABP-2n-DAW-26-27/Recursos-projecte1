<?php
session_start();
$name = "World!!!!!!";
if(isset($_GET["name"])){
    $name = $_GET["name"];
    setcookie("name", $name, time()+ 3600);
} elseif(isset($_COOKIE["name"])){
    $name = $_COOKIE["name"];
}

echo "Hello $name!!!!!";

print_r($_COOKIE);
