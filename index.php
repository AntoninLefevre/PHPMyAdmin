<?php

require_once('mypdo.include.php');


if(isset($_GET['t'])){
    require_once("classes/content.model.class.php");

    $content = Content_Model::getContent($_GET['t'], $_GET['db']);

    require_once("classes/content.view.class.php");

    $html = Content_View::listContent($content);
}else if(isset($_GET['db'])){
    require_once("classes/tables.model.class.php");

    $tables = Tables_Model::getTables($_GET['db']);

    require_once("classes/tables.view.class.php");

    $html = Tables_View::listTables($tables, $_GET['db']);

}else{
    require_once("classes/databases.model.class.php");

    $databases = Databases_Model::getDatabases();

    require_once("classes/databases.view.class.php");

    $html = Databases_View::listDatabases($databases);
}


echo $html;

