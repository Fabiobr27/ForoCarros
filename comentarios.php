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

$idMod = $_POST["cod"];

$comentar = $_POST["comentario"];

$comentario = "\"$comentar\"";
echo "Mensaje:" . $comentario . "</br>";
echo "ID MODELO:" . $idMod . "</br>";
echo "ID USUARIO:" . $idu . "</br>";

$db = Database::getInstance("root", "", "coches");

$db->query("SELECT COUNT(*) as total FROM modelo_usuario  WHERE CodigoMod= $idMod and idUsu = $idu ; ");

$item = $db->getObject();

print_r($item);


if ($item->total == 0) {
    $sql = "Insert into modelo_Usuario (idUsu, codigoMod, favorito, comentario) VALUES ($idu,$idMod,0, $comentario)";
    echo $sql;
    $db->query($sql);
} else if ($item->total == 1) {

    $sql = "UPDATE modelo_usuario SET comentario = " . $comentario . " WHERE  CodigoMod=$idMod  and idUsu = $idu ";
    echo $sql;
    $db->query($sql);
}


header("Location: descripcion.php?id=$idMod");
