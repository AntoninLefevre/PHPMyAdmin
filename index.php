<?php

require_once('mypdo.include.php');



if (isset($_GET['a'])){
	require_once("classes/content.model.class.php");
	if ($_GET['a'] =='a'){
		if (isset($_POST['formAddContent'])){
			Content_Model::addContent($_GET['db'],$_GET['t'],$_POST);
		}
		require_once("classes/content.view.class.php");
		$html =  Content_View::formAddContent($_GET['db'], $_GET['t']);
	}
	else if ($_GET['a'] == 'e'){
		if (isset($_POST['edit_btn'])){
			Content_Model::editContent($_GET['db'],$_GET['t'],$_POST);
		}
		require_once("classes/content.model.class.php");
		$content = Content_Model::selectContent($_GET['db'], $_GET['t'], $_GET['id'])
		require_once("classes/content.view.class.php");
		$html =  Content_View::formEditContent($content);
	}
	else if ($_GET['a'] == 'd'){
		if (isset($_GET['delete'])){
			Content_Model::deleteContent($_GET['db'], $_GET['t'], $_GET['id']);
		}
		require_once("classes/content.view.class.php");
		$html =  Content_View::formDeleteContent($_GET['db'], $_GET['t'], $_GET['id']);
	}	
}


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

