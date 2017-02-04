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
        $html = "<a href='index.php?a=a'>Ajout</a><br /><table border='1'> <tr>";

		$columns=$tab[0];
		$result=$tab[1];

        foreach($columns as $column){
        	$html .= "<td>".$column['Field']."</td>";
        }
        $html .= "<td>Modifier</td>";
        $html .= "<td>Supprimer</td>";
        $html .= "</tr>";

        foreach($result as $data){
            $stock=$data[0];
        	$html .= "<tr>";
            foreach ($data as $key => $value) {
                $html .= "<td>".$value."</td>";

            }
            $html .= "<td><a href='index.php?t=".$tab[2]."&db=".$tab[3]."&a=e&id=$stock'>Modifier</a></td>";
            $html .= "<td><a href='index.php?t=".$tab[2]."&db=".$tab[3]."&a=d&id=$stock'>Supprimer</a></td>";
            $html .= "</tr>";
        }

        $html .= "</table>";
        return $html;
    }

    public static function formAddContent($database, $table){
        $bdd = MyPDO::getInstance();

        $pdo = $bdd->prepare("USE $database");
        $pdo->execute();

        $result = $bdd->prepare("select * from ".$table);
        $result->execute();

        $cols = $bdd->prepare("SHOW COLUMNS FROM " .$table);
        $cols->execute();

        $columns = $cols->fetchAll();

        $form = <<<HTML
        <form action="" method="post">
HTML;

        for ($i=0; $i < sizeof($columns); $i++) {
            $form .= <<<HTML
            <label>{$columns[$i]['Field']}:<input type="text" name="values[]"></label><br>
HTML;
        }

        $form .= <<<HTML
        <input type="submit" name="formAddContent">
        </form>
HTML;
        return $form;
    }

    public static function formEditContent($result){
        $html .= "<form action='#' method='POST'>";
        foreach($result as $data){
            foreach ($data as $key=>$value) {
                $html .= $key;
                $html .= " : ";
                $html .= "<input type='test' name='value[]' value='".$value."'><br />";
            }
        }
        $html .= "<input type='submit' value='OK' name='edit_btn'></form>";
    }

    public static function formDeleteContent($idContent){

    }
}







?>
