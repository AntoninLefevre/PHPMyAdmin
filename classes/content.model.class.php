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
        $tab[2]=$table;
        $tab[3]=$database;

        return $tab;
    }

    public static function selectContent($database, $table, $idContent){
        $pdo = $bdd->prepare("USE $database");
        $pdo->execute();
        $cols = $bdd->prepare("SHOW COLUMNS FROM " .$table);
        $cols->execute();
        $columns = $cols->fetchAll(PDO::FETCH_NUM);
        $result = $bdd->prepare("select * from ".$table." where ".$columns[0][0]."=".$id);
        $result->execute();
        return $result;
    }

    public static function addContent($data){

    }

    public static function editContent($database,$table,$value){
        $pdo = $bdd->prepare("USE $database");
        $pdo->execute();
        $cols = $bdd->prepare("SHOW COLUMNS FROM " .$table);
        $cols->execute();
        $columns = $cols->fetchAll(PDO::FETCH_NUM);
        $i=0;
        $req = 'UPDATE '.$table.' SET ';
        foreach ($columns as $data) {
            $tab[]=$data[0].'="'.$value[$i].'"';
            $i++;
        }
        $req.=implode(",", $tab);
        $req.=" where ".$columns[0][0]." = ".$value[0];
    
        $sql=$bdd->prepare($req);
        $sql->execute();
    }

    public static function deleteContent($idContent){

    }
}


?>
