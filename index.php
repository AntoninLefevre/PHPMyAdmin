<?php

require_once('mypdo.include.php');

$bdd = MyPDO::getInstance();

$pdo = $bdd->prepare("show databases");
$pdo->execute();

$res = $pdo->fetchAll();

$html = "";

foreach ($res as $dbname) {
    $html .= "<h1>" . $dbname['Database']. "</h1>";
}


echo $html;
