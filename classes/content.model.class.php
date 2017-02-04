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

        return $tab;
    }

    public static function selectContent($idContent){

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
                $data[$i] = "Null";
            } else {
                if($columns[$i]['Type'] == "tinyint(1)" && ($data[$i] != 0 || $data[$i] != 1)){
                    $data[$i] = 0;
                } else {
                    $data[$i] = "'".$data[$i]. "'";
                }
            }
        }


        $values = implode(",", $data);
        var_dump("INSERT INTO " .$table. " VALUES(". $values .")");

        $pdo = $bdd->prepare("INSERT INTO " .$table. " VALUES(". $values .")");
        $pdo->execute();
    }

    public static function editContent($data){

    }

    public static function deleteContent($db_name, $tb_name, $idContent){
		$col = "SHOW COLUMNS FROM $table";
		$cols = MyPDO::getInstance()->prepare($col);
		$cols->execute();
		$data = $cols->fetch();
		$champs = $data['Field'];
		
		$req = "DELETE FROM $table WHERE $champs = $idContent";
		var_dump($req);
		$res = MyPDO::getInstance()->prepare($req);
		$res->execute();
	
    }
}


?>
