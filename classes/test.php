<?php
	require_once "../mypdo.include.php";
	require_once "content.model.class.php";
	$database = "cms";
	$table = "users";
	$idContent = 2;
	
	
	$col = "SHOW COLUMNS FROM $table";
	$cols = MyPDO::getInstance()->prepare($col);
	$cols->execute();
	$data = $cols->fetch();
	$champs = $data['Field'];
	
	$req = "DELETE FROM $table WHERE $champs = $idContent";
	var_dump($req);
	$res = MyPDO::getInstance()->prepare($req);
	$res->execute();
	var_dump($res);
?>