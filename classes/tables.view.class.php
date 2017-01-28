<?php

class Tables_View{
	private function __construct(){

    }

    public static function listTables($tables){
        $html = "";
        foreach ($tables as $table) {
            $html .= "<a href='?t=" . $table . "'>".$table."</a><br>";
        }

        return $html;
    }
}
