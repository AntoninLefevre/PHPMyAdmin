<?php

class Databases_View{

    private function __construct(){

    }

    public static function listDatabases($databases){
        $html = "";
        foreach ($databases as $database) {
            $html .= "<a href='?db=" . $database . "'>".$database."</a><br>";
        }

        return $html;
    }
}
