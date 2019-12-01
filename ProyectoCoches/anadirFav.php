<?php

// Fabio Benitez Ramirez
require_once 'libs/Database.php';
require_once "libs/Sesion.php";
require_once 'libs/Modelo.php';
require_once 'libs/Marca.php';
require_once 'libs/Usuario.php';




$ses = Sesion::getInstance();
$usr = $ses->getUsuario();
$idu = $usr->getIdUsu();

$idMod = $_GET["cod"];

$db = Database::getInstance("root", "", "coches");

$db->query("SELECT COUNT(favorito) as total FROM modelo_usuario  WHERE CodigoMod= $idMod and idUsu = $idu ; ");

$item = $db->getObject();

print_r($item);
print_r($idMod . " ");
print_r($idu . " ");

if ($item->total == 0) {
    echo "No existe ";
    $sql = "Insert into modelo_Usuario (idUsu, codigoMod, favorito, comentario) VALUES ($idu,$idMod,1, null)";
    $db->query($sql);
    //$sql = "UPDATE modelo_usuario SET favorito = 1 WHERE  CodigoMod=$idMod  and idUsu = $idu ";
    echo $sql;
} else if ($item->total == 1) {
    $Select = "Select favorito from modelo_usuario  WHERE CodigoMod= $idMod and idUsu = $idu ; ";
    $db->query($Select);
    if (favorito == 0) {
        $sql = "UPDATE modelo_usuario SET favorito = 1 WHERE  CodigoMod=$idMod  and idUsu = $idu ";
        $db->query($sql);
    }
}




header("Location: descripcion.php?id=$idMod");
