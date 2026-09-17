<?php

//print_r($_GET);
$exemple1 = "No hem rebut cap valor!!!!!!!!!!!!!!!!";
if(isset($_POST["exemple1"])){
    $exemple1 = htmlspecialchars($_POST["exemple1"]);
}
//$hola = [[1,2,3], [1,2,3], [1, "*",7,3], [1,2,3, "hola" => "Món"]];
$hola[10] = ["hola", "Hello", "Bon jorno"];
print_r($hola);

echo $exemple1;