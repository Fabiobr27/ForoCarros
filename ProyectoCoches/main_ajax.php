
    <?php
//Fabio Benitez Ramirez
require_once "libs/Marca.php";
require_once "libs/Sesion.php";
require_once "libs/Database.php";

require_once "libs/libreria.php";


$ses = Sesion::getInstance();


if (!$ses->checkActiveSession())
    $ses->redirect("index.php");


$usr = $ses->getUsuario();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ForoCarros</title>
        <meta charset="utf8" />
        <link rel="stylesheet" type="text/css" href="css/forocarros.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

        <script>

            $(document).ready(function ()
            {

          
                function loadShows()
                {
                    $.ajax(
                            {
                                method: "GET",
                                url: "operaciones.php",
                                data: {"cop": 1, "p": pag},

                            }).done(function (data) {

                        $("#content").append(data);
                        pag++;

                    });
                }


                var pag = 1;
               

                $("#go").click(function ()
                {
                    loadShows();
                });

                $(window).scroll(function () {

                    if ($(window).scrollTop() + $(window).height() >=
                            $(document).height())
                        loadShows();

                });


            
                loadShows();

            });


        </script>

        <style>

            .content 	{ padding: 40px; }
            .pagination { margin-top: 40px !important; }
            #columnas{
                margin-top: 20px; 
            }
        </style>

    </head>
    <body>

        <div class="card text-white bg-dark mb-3">

            <?PHP include_once "libs/navbar.php"; ?>

            <div id="content"></div>


            <button id="go" type="button">Más Marcas</button>

        </div>
    </body>
</html>