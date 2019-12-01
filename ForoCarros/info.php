 <!--Fabio Benitez Ramirez-->
<?php
require_once "libs/Marca.php";
require_once "libs/Modelo.php";
require_once "libs/Sesion.php";
require_once "libs/Database.php";

require_once "libs/libreria.php";


$ses = Sesion::getInstance();


if (!$ses->checkActiveSession())
    $ses->redirect("index.php");


$usr = $ses->getUsuario();



$id = $_GET["id"] ?? null;


include_once "libs/navbar.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ForoCarros</title>
        <meta charset="utf8" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <style>


            img{
                padding: 20px;
                width: 500px;
                height:300px;

            }

            .content{
                margin: 20px;
                padding: 20px;
            }
            .row mb-2{background-color: red;
                      margin: 20px;
                      padding: 20px;
            }
        </style>
       
    <body class="card text-white bg-dark mb-3">
        <div>
            <div class="content">
                <?php

                $db = Database::getInstance("root", "", "coches");



                if (!$db->query("SELECT *
            FROM marcas ma , modelo mo
        WHERE ma.CodigoMarca=mo.CodigoMarca AND ma.CodigoMarca = $id order by NombreMod;")):
                    mostrarAlerta("No se encuentra el modelo correspondiente en la base de datos.", "danger");
                else:
           

                    $item = $db->getObject("Marca");

                   
                    echo $item->getnombreMarca();
                    echo "<div class=\"row mb-2\">";
                    $col = 0;
                    while ($item != null):
                        ?>
                        <div class="col col-lg-3">
                            <div class="card mx-auto" style="width:20rem;">
                                <img src="<?= $item->imagen ?>" class="card-img-top" />
                                <div class="card-body text-center">

                                    <a href="descripcion.php?id=<?= $item->CodigoMod ?>">
                                        <h6 class="card-title"><?= $item->NombreMod ?></h6>
                                    </a>
                                </div>	
                            </div>	
                        </div>	

                       

                        <?php
                        $col++;
                        $item = $db->getObject("Marca");
                    endwhile;

                    echo "</div>";
                    ?>




                <?php
                endif;
                ?>

            </div>	
        </div>	


    </body>
</html>




