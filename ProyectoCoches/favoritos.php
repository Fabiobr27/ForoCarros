
<html>
    <!--Fabio Benitez Ramirez-->
    <title>ForoCarros</title>
</html>
<style>


    h6{color: black}
    #prueba{padding: 3%;}

</style>

<?php
require_once 'libs/Marca.php';
require_once "libs/Sesion.php";
require_once "libs/Database.php";

require_once "libs/libreria.php";

define("MAX_COL", 4);
define("MAX_ITEM", 8);

$ses = Sesion::getInstance();


if (!$ses->checkActiveSession())
    $ses->redirect("index.php");


$usr = $ses->getUsuario();
$idu = $usr->getIdUsu();

?>
<body class="card text-white bg-dark mb-3">
    <?PHP
    include_once "libs/navbar.php";
    ?>

    <div class="content">

        <?php

        $db = Database::getInstance("root", "", "coches");


        $db->query("SELECT COUNT(*) AS total FROM modelo mo, usuario us, Modelo_Usuario mu where mu.favorito = 0 and  mo.codigoMod = mu.CodigoMod and us.idUsu = mu.idUsu ;");
        $item = $db->getObject();
        $total = $item->total;


        $pag = isset($_GET["p"]) ? $_GET["p"] : 1;


        $ini = ($pag - 1) * MAX_ITEM;


        if (!$db->query("SELECT DISTINCT * FROM modelo mo , Modelo_Usuario mu , marcas ma "
                        . "where mu.favorito = 1 and mu.idUsu= $idu and mo.CodigoMod = mu.codigoMod and mo.CodigoMarca=ma.CodigoMarca"
                        . "  Order by NombreMarca")):
            mostrarAlerta("No tienes coches como favoritos", "danger");
        else:

            do {

                echo "<div class=\"row mb-2\">";
                $col = 0;
                while (($col < MAX_COL) && ($item = $db->getObject("Marca"))):
                    ?>
                    <div id="prueba" class="col  col-lg-3">
                        <div class="card mx-auto" style="width:12rem;">
                            <img src="<?= $item->imagen ?>" class="card-img-top" />
                            <div class="card-body text-center">
                                <h6 class="card-title"><?= $item->getnombreMarca() ?></h6>
                                <h6 class="card-title"><?= $item->NombreMod ?></h6>

                            </div>	
                        </div>	
                    </div>	

                    <?php
                    $col++;

                endwhile;

                echo "</div>";
            } while ($item);


            ?>




        <?php
        endif;
        ?>

    </div>	

</div>	

</body>
</html>