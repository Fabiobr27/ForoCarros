<!--Fabio Benitez Ramirez-->
<style>


    h6{color: black}
    #prueba{padding: 3%;}

</style>

<?php
require_once "libs/Sesion.php";
require_once "libs/Database.php";
require_once "libs/libreria.php";

$ses = Sesion::getInstance();



if (!$ses->checkActiveSession())
    $ses->redirect("index.php");


$usr = $ses->getUsuario();
?>
<html>
    <body class="card text-white bg-dark mb-3">
        <?php
        require_once "libs/navbar.php";
        ?>

        <div id="prueba" class="content">

            <?php
            ?>


        </div>



        <div style="position: relative; left: 500px;"class="col col-lg-3">
                <div class="card bg-light mb-3 mx-auto" style="width:23rem;">
                    <img src="<?= $usr->getFoto() ?>" class="card-img-top" />
                    <div class="card-body text-center">

                        <h6 class="card-title">Nombre Usuario: <?= $usr->getNombre() ?></h6>
                        <h6 class="card-title">Apellidos: <?= $usr->getApellidos() ?></h6>
                        <h6 class="card-title">Fecha Nacimiento: <?= $usr->getFecha() ?></h6>
                               <h6 class="card-title">Email: <?= $usr->getEmail() ?></h6>


                        <a class="btn btn-primary"  href="favoritos.php">Ver favoritos</a>

                    </div>	<!-- end-card-body -->
                </div>	<!-- end-card -->
            </div>	<!-- end-col -->
       










    </body>
</html>