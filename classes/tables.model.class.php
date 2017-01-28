<?php

class Tables_Model{
	private function __construct(){

    }

    public static function getTables($databases){
        $bdd = MyPDO::getInstance();

        $pdo = $bdd->prepare("USE $databases" );
        $pdo->execute();
		
		$pdo = $bdd->prepare("SHOW TABLES");
		$pdo->execute();
        $res = $pdo->fetchAll();
		
        foreach ($res as $table) {
            $tables[] = $table;
        }

        return $tables;
    }
}
