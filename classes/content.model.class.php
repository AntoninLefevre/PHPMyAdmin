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

    public static function addContent($data){

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
