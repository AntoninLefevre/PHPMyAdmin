<?php
	require_once 'classes/mypdo.class.php';
    $host = "localhost";
    $username = "root";
    $password = "";

    myPDO::setConfiguration('mysql:host='. $host .';charset=utf8', $username, $password);

?>
