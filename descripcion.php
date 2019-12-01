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



$cop = $_GET["cop"] ?? null;


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
            h6{
                color: black;
            }
            /**
             * Oscuro: #283035
             * Azul: #03658c
             * Detalle: #c7cacb
             * Fondo: #dee1e3
             ----------------------------------*/
            * {
                margin: 0;
                padding: 0;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            a {
                color: #03658c;
                text-decoration: none;
            }

            ul {
                list-style-type: none;
            }

            body {
                font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
                background: #dee1e3;
            }

            /** ====================
             * Lista de Comentarios
             =======================*/
            .comments-container {
                margin: 60px auto 15px;
                width: 768px;
            }

            .comments-container h1 {
                font-size: 36px;
                color: #283035;
                font-weight: 400;
            }

            .comments-container h1 a {
                font-size: 18px;
                font-weight: 700;
            }

            .comments-list {
                margin-top: 30px;
                position: relative;
            }

            /**
             * Lineas / Detalles
             -----------------------*/
            .comments-list:before {
                content: '';
                width: 2px;
                height: 100%;
                background: #c7cacb;
                position: absolute;
                left: 32px;
                top: 0;
            }

            .comments-list:after {
                content: '';
                position: absolute;
                background: #c7cacb;
                bottom: 0;
                left: 27px;
                width: 7px;
                height: 7px;
                border: 3px solid #dee1e3;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                border-radius: 50%;
            }

            .reply-list:before, .reply-list:after {display: none;}
            .reply-list li:before {
                content: '';
                width: 60px;
                height: 2px;
                background: #c7cacb;
                position: absolute;
                top: 25px;
                left: -55px;
            }


            .comments-list li {
                margin-bottom: 15px;
                display: block;
                position: relative;
            }

            .comments-list li:after {
                content: '';
                display: block;
                clear: both;
                height: 0;
                width: 0;
            }

            .reply-list {
                padding-left: 88px;
                clear: both;
                margin-top: 15px;
            }
            /**
             * Avatar
             ---------------------------*/
            .comments-list .comment-avatar {
                width: 65px;
                height: 65px;
                position: relative;
                z-index: 99;
                float: left;
                border: 3px solid #FFF;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
                box-shadow: 0 1px 2px rgba(0,0,0,0.2);
                overflow: hidden;
            }

            .comments-list .comment-avatar img {
                width: 100%;
                height: 100%;
            }

            .reply-list .comment-avatar {
                width: 50px;
                height: 50px;
            }

            .comment-main-level:after {
                content: '';
                width: 0;
                height: 0;
                display: block;
                clear: both;
            }
            /**
             * Caja del Comentario
             ---------------------------*/
            .comments-list .comment-box {
                width: 680px;
                float: right;
                position: relative;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
                box-shadow: 0 1px 1px rgba(0,0,0,0.15);
            }

            .comments-list .comment-box:before, .comments-list .comment-box:after {
                content: '';
                height: 0;
                width: 0;
                position: absolute;
                display: block;
                border-width: 10px 12px 10px 0;
                border-style: solid;
                border-color: transparent #FCFCFC;
                top: 8px;
                left: -11px;
            }

            .comments-list .comment-box:before {
                border-width: 11px 13px 11px 0;
                border-color: transparent rgba(0,0,0,0.05);
                left: -12px;
            }

            .reply-list .comment-box {
                width: 610px;
            }
            .comment-box .comment-head {
                background: #FCFCFC;
                padding: 10px 12px;
                border-bottom: 1px solid #E5E5E5;
                overflow: hidden;
                -webkit-border-radius: 4px 4px 0 0;
                -moz-border-radius: 4px 4px 0 0;
                border-radius: 4px 4px 0 0;
            }

            .comment-box .comment-head i {
                float: right;
                margin-left: 14px;
                position: relative;
                top: 2px;
                color: #A6A6A6;
                cursor: pointer;
                -webkit-transition: color 0.3s ease;
                -o-transition: color 0.3s ease;
                transition: color 0.3s ease;
            }

            .comment-box .comment-head i:hover {
                color: #03658c;
            }

            .comment-box .comment-name {
                color: #283035;
                font-size: 14px;
                font-weight: 700;
                float: left;
                margin-right: 10px;
            }

            .comment-box .comment-name a {
                color: #283035;
            }

            .comment-box .comment-head span {
                float: left;
                color: #999;
                font-size: 13px;
                position: relative;
                top: 1px;
            }

            .comment-box .comment-content {
                background: #FFF;
                padding: 12px;
                font-size: 15px;
                color: #595959;
                -webkit-border-radius: 0 0 4px 4px;
                -moz-border-radius: 0 0 4px 4px;
                border-radius: 0 0 4px 4px;
            }

            .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
            .comment-box .comment-name.by-author:after {
                content: 'autor';
                background: #03658c;
                color: #FFF;
                font-size: 12px;
                padding: 3px 5px;
                font-weight: 700;
                margin-left: 10px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
            }

            /** =====================
             * Responsive
             ========================*/
            @media only screen and (max-width: 766px) {
                .comments-container {
                    width: 480px;
                }

                .comments-list .comment-box {
                    width: 390px;
                }

                .reply-list .comment-box {
                    width: 320px;
                }
            }
        </style>
    <body>
        <div class="card text-white bg-dark mb-3">
            <div class="content">
                <?php
// conectamos con la base de datos
                $db = Database::getInstance("root", "", "coches");



                if (!$db->query("SELECT *
FROM marcas ma , modelo mo , especificaciones es
WHERE ma.CodigoMarca=mo.CodigoMarca AND es.CodigoMod = mo.CodigoMod   AND mo.CodigoMod = $id;")):
                    mostrarAlerta("No se encuentra coche en la base de datos.", "danger");
                else:
                    // obtenemos info del modelo

                    $item = $db->getObject("Marca");



                    $result = $db->getObject("Marca");
                   // print_r($result);




                    echo "<div class=\"row mb-2\">";
                    $col = 0;
                    ?>
                    <div class="col col-lg-3">
                        <div class="card bg-light mb-3 mx-auto" style="width:23rem;">
                            <img src="<?= $item->imagen ?>" class="card-img-top" />
                            <div class="card-body text-center">

                                <h6 class="card-title">Nombre Modelo: <?= $item->NombreMod ?></h6>
                                <h6 class="card-title">Caballos: <?= $item->Caballos ?></h6>
                                <h6 class="card-title">Combustible: <?= $item->Combustible ?></h6>
                                <h6 class="card-title">Año: <?= $item->Año ?></h6>

                                <a class="btn btn-primary"   href="eliminarFav.php?cod=<?= $item->CodigoMod ?>">Eliminar de favoritos</a>
                                <a class="btn btn-primary"  href="anadirFav.php?cod=<?= $item->CodigoMod ?>">Añadir a favoritos</a>

                            </div>	<!-- end-card-body -->
                        </div>	<!-- end-card -->
                    </div>	<!-- end-col -->
                    
                    <?php
                    $col++;
                    $item = $db->getObject("Modelo");

                    echo "</div>";
                    ?>










                <?php
                endif;
                ?>


                <h1>Comentarios</h1>
                <?php
                $idu = $usr->getIdUsu();

                if ($db->query("SELECT * FROM Usuario us , Modelo_Usuario mu "
                                . "where mu.comentario is not null and mu.codigoMod = $id and mu.idUsu = us.idUsu"
                                . "  Order by Comentario")) {




                    $usr = $ses->getUsuario();

                
                    do {

                        while ($item = $db->getObject("Usuario")):
                            ?>

                                      
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name "><a href="http://creaticode.com/blog"><?= $item->getNombre() . " " . $item->getApellidos() ?></a></h6>

                                </div>
                                <div class="comment-content">
                                    <?= $item->Comentario ?>
                                </div>
                            </div>
                            <br>
                            <?php
                     
                        endwhile;
                        echo '</div>';
                    }while ($item);
                } else {
                    mostrarAlerta("No hay comentarios", "danger");
                }
                ?>



                <div class = "widget-area no-padding blank">
                    <div class = "status-upload">
                        <form style="padding:3%" action="comentarios.php" method="post">
                            <textarea name="comentario" type="text" placeholder = "Escribe un comentario" style="width:100%;height:150px;padding:1%;font-size:1.2em;"></textarea>
                            <input  name="cod" type="hidden" value="<?= $id ?>">
                            <button type = "submit" class = "btn btn-success green"><i class = "fa fa-share"></i> Enviar</button>
                        </form>
                    </div><!--Status Upload -->
                </div><!--Widget Area -->



            </div>


        </div>
        <!-- -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>




