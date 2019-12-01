<?php
require_once "libs/Database.php";
require_once "libs/Sesion.php";
require_once "libs/Marca.php";
require_once "libs/Modelo.php";

define("MAX_COL", 4); // número de columnas
define("MAX_ITEM", 8); // ítems por página

/*
 * Modifica la puntuación de la serie en la base de datos
 */

function search() {
    // obtenemos el número de página
    // si no se nos pasa ninguna, fijamos la primera
    $pag = isset($_GET["p"]) ? $_GET["p"] : 1;

    // determinamos el punto de partida para la consulta
    $ini = ($pag - 1) * MAX_ITEM;

    // buscamos las series
    $db = Database::getInstance("root", "", "coches");

    // buscamos las series correspondientes a la página actual
    if ($db->query("SELECT * FROM marcas LIMIT $ini, " . MAX_ITEM . " ;")):

        do {

            echo "<div  id=\"columnas\" class=\"row mb-2\">";
            $col = 0;
            while (($col < MAX_COL) && ($item = $db->getObject("Marca"))):
                ?>
                <div class="col col-lg-3">
                    <div class="card mx-auto" style="width:13rem;">
                        <img src="<?= $item->getlogo() ?>" class="card-img-top" />
                        <div class="card-body text-center">
                            <a href="info.php?id=<?= $item->getcodigoMarca() ?>">
                                <h6 class="card-title"><?= $item->getnombreMarca() ?></h6>
                            </a>
                        </div>	<!-- end-card-body -->
                    </div>	<!-- end-card -->
                </div>	<!-- end-col -->

                <?php
                $col++;

            endwhile;

            echo "</div>";
        } while ($item);

    endif;
}

$cop = $_GET["cop"] ?? 0;

// determinamos qué operación hay que ejecutar
switch ($cop):
    case 1 : search();
        break;
    case 2 : rating();
        break;
    default:
        echo "Código de operación erróneo";
endswitch;

function favoritos() {

    // obtenemos la putuación
    $pto = $_GET["ptos"];
    $ids = $_GET["ids"];

    // 
    $ses = Sesion::getInstance();
    $usr = $ses->getUsuario();
    $idu = $usr->getIdUsu();

    // instanciamos la base de datos
    $db = Database::getInstance("root", "", "coches");

    $db->query("SELECT favorito FROM modelo   WHERE CodigoMod=$idMod;");
    $item = $db->getObject();
    if ($item->favorito == 0) {
        $sql = "UPDATE modelo SET favorito= 1 WHERE  AND CodigoMod=$idMod  ;";
        echo $sql;

    }


    // lanzamos la consulta
    if ($db->query($sql))
        echo "La serie ha sido añadida a favoritos";
    else
        echo "No se ha podido añadir a favoritos";
}
