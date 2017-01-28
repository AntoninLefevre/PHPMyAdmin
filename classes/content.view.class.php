<?php
/*
class content_view(){

	public function __construct () { }

	public static function tableContent($table){

	}
}
*/

class Databases_View{

    private function __construct(){

    }

    public static function listDatabases($tab){
        $html = "<table border='1'> <tr>";

		$columns=$tab[0];
		$result=$tab[1];

        foreach($columns as $column){
        	$html .= "<td>".$column['Field']."</td>";
        }

        $html .= "</tr>";

        foreach($result as $data){
        	$html .= "<td>".$data['Field']."</td>";
        }

        return $html;
    }
}







?>