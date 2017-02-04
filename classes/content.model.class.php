<?php


class Content_Model{

    private function __construct(){

    }



    public static function getContent($table, $database){
        $bdd = MyPDO::getInstance();

        $pdo = $bdd->prepare("USE $database");
        $pdo->execute();

        $result = $bdd->prepare("select * from ".$table);
        $result->execute();

        $cols = $bdd->prepare("SHOW COLUMNS FROM " .$table);
        $cols->execute();

        // return
        $columns = $cols->fetchAll();
        $res = $result->fetchAll(PDO::FETCH_NUM);

        $tab[0]=$columns;
        $tab[1]=$res;

        return $tab;
    }
}


?>
