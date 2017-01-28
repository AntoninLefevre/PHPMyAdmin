<?php

require_once('mypdo.include.php');

require_once("classes/tables.model.class.php");

$tables = Tables_Model::getTables("empire");

require_once("classes/tables.view.class.php");

$html = tables_View::listTables($tables, "empire");

/*$bdd = MyPDO::getInstance();

$pdo = $bdd->prepare("show databases");
$pdo->execute();

$res = $pdo->fetchAll();


$html = "";

foreach ($res as $dbname) {
    $html .= "<h1>" . $dbname['Database']. "</h1>";
    $pdo = $bdd->prepare("use " . $dbname['Database']);
    $pdo->execute();
    $pdo = $bdd->prepare("SHOW TABLES");
    $pdo->execute();
    $tables = $pdo->fetchAll();

    foreach ($tables as $table) {
        $html .= "<h4>" . $table['Tables_in_' . $dbname['Database']] . "</h4>";

        $pdo = $bdd->prepare("SHOW COLUMNS FROM " .$table['Tables_in_' . $dbname['Database']] );
        $pdo->execute();

        $columns = $pdo->fetchAll();

        foreach ($columns as $column) {
            $html .= "<h6>" . $column['Field'] . "</h6>";
        }
    }
}
*/

echo $html;

