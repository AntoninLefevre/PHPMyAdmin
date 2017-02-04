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
        $columns = $cols->fetchAll(PDO::FETCH_NUM);
        $res = $result->fetchAll(PDO::FETCH_NUM);

        $tab[0]=$columns;
        $tab[1]=$res;
        $tab[2]=$table;
        $tab[3]=$database;

        return $tab;
    }

    public static function selectContent($database, $table, $idContent){
        $bdd = MyPDO::getInstance();
        $pdo = $bdd->prepare("USE $database");
        $pdo->execute();
        $cols = $bdd->prepare("SHOW COLUMNS FROM " .$table);
        $cols->execute();
        $columns = $cols->fetchAll(PDO::FETCH_NUM);
        $result = $bdd->prepare("select * from ".$table." where ".$columns[0][0]."=".$idContent);
        $result->execute();

        return $result;
    }

    public static function addContent($database, $table, $data){
        $bdd = MyPDO::getInstance();

        $pdo = $bdd->prepare("USE $database");
        $pdo->execute();

        $result = $bdd->prepare("select * from ".$table);
        $result->execute();

        $cols = $bdd->prepare("SHOW COLUMNS FROM " .$table);
        $cols->execute();

        $columns = $cols->fetchAll();

        for ($i=0; $i < sizeof($columns); $i++) {
            if($columns[$i]['Extra'] == 'auto_increment'){
                $data['values'][$i] = "Null";
            } else {
                if($columns[$i]['Type'] == "tinyint(1)" && ($data['values'][$i] != 0 || $data['values'][$i] != 1)){
                    $data['values'][$i] = 0;
                } else {
                    $data['values'][$i] = "'".$data['values'][$i]. "'";
                }
            }
        }


        $values = implode(",", $data['values']);

        $pdo = $bdd->prepare("INSERT INTO " .$table. " VALUES(". $values .")");
        $pdo->execute();
    }

    public static function editContent($database,$table,$value){
        $bdd = MyPDO::getInstance();
        $pdo = $bdd->prepare("USE $database");
        $pdo->execute();
        $cols = $bdd->prepare("SHOW COLUMNS FROM " .$table);
        $cols->execute();
        $columns = $cols->fetchAll(PDO::FETCH_NUM);
        $i=0;
        $req = 'UPDATE '.$table.' SET ';
        foreach ($columns as $data) {
            $tab[]=$data[0].'="'.$value['value'][$i].'"';
            $i++;
        }
        $req.=implode(",", $tab);
        //var_dump($value['value'][0]);
        $req.=" where ".$columns[0][0]." = ".$value['value'][0];

        $sql=$bdd->prepare($req);
        $sql->execute();
    }

    public static function deleteContent($db_name, $tb_name, $idContent){
        $bdd = MyPDO::getInstance();
        $pdo = $bdd->prepare("USE $db_name");
        $pdo->execute();
		$col = "SHOW COLUMNS FROM $tb_name";
		$cols = $bdd->prepare($col);
		$cols->execute();
		$data = $cols->fetch();
		$champs = $data['Field'];

		$req = "DELETE FROM $tb_name WHERE $champs = $idContent";
		$res = $bdd->prepare($req);
		$res->execute();

    }
}


?>
