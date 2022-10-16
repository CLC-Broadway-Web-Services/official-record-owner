<?php
include "record@1357admin/config/functions.php";
$db = new dbClass();
$function = new record();
$idStatus = (isset($_GET["id"]) && !empty($_GET["id"])) ? 1 : 0;
$id = $idStatus  ? base64_decode($_GET["id"]) : NULL;

function data($table, $idStatus = null, $select = 1, $id = null, $limit = null)
{
    // print_r($limit);
    $function = new record();
    switch ($select) {
        case '1':
            return $function->allItemVisible($table);
            break;

        case '2':
            return $idStatus ? $function->getSingleItem($id, $table) : NULL;
            break;

        case '3':
            return $idStatus ? $function->allItemVisiblewithLimit($table, $limit) : NULL;
            break;
        case '4':
            return $function->getAllItems($table);
            break;

        default:
            return $function->allItemVisible($table);
            break;
    }
}
function ckc($data){
    echo "<pre>";
    print_r($data);
    die();
}