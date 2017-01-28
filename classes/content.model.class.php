<?php


class Content_Model{

    private function __construct(){

    }

   

    public static function getContent($table){
        $bdd = MyPDO::getInstance();

        $result = $bdd->prepare("select * from ".$table);
        $result->execute();

        $cols = $bdd->prepare("SHOW COLUMNS FROM " .$table);
        $cols->execute();

        // return
        $columns = $cols->fetchAll();
        $res = $result->fetchAll();

        $tab[0]=$columns;
        $tab[1]=$res;

        return $tab;
    }
}


?>