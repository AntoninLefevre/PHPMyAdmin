<?php
/*
class content_view(){

	public function __construct () { }

	public static function tableContent($table){

	}
}
*/

class Content_View{

    private function __construct(){

    }

    public static function listContent($tab){
        $html = "<table border='1'> <tr>";

		$columns=$tab[0];
		$result=$tab[1];

        foreach($columns as $column){
        	$html .= "<td>".$column['Field']."</td>";
        }

        $html .= "</tr>";

        foreach($result as $data){

        	$html .= "<tr>";
            foreach ($data as $value) {
                $html .= "<td>".$value."</td>";
            }
            $html .= "</tr>";
        }

        $html .= "</table>";
        return $html;
    }

    public static function formAddContent($data){

    }

    public static function formEditContent($idContent){

    }

    public static function formDeleteContent($idContent){

    }
}







?>
