<?php

class Databases_Model{

    private function __construct(){

    }

    public static function getDatabases(){
        $bdd = MyPDO::getInstance();

        $pdo = $bdd->prepare("show databases");
        $pdo->execute();

        $res = $pdo->fetchAll();

        foreach ($res as $database) {
            $databases[] = $database['Database'];
        }

        return $databases;
    }
}
