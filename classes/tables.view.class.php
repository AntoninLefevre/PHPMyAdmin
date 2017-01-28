<?php

class Tables_View{
	private function __construct(){

    }

    public static function listTables($tables, $database){
        $html = "";
        foreach ($tables as $table) {
            $html .= "<a href='?t=" . $table['Tables_in_'.$database] . "'>".$table['Tables_in_'.$database]."</a><br>";
        }

        return $html;
    }
}
