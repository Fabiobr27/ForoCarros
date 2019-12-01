<?php
// Fabio Benitez Ramirez
$fechaActual = date('Y-d-m') ;
if (!empty($_POST)):

    setlocale(LC_TIME, "es_ES");

    $ema = $_POST["email"];
    $nom = $_POST["nombre"];
    $ape = $_POST["apellidos"];
    $pas = $_POST["pass"];
    $con = $_POST["conf"];
    $fec = !empty($_POST["fnac"]) ? $_POST["fnac"] : $fechaActual;


    if ($pas == $con):


        try {
            $pdo = new PDO("mysql:host=localhost;dbname=coches", "root", "");
        } catch (PDOException $e) {
            die("ERROR:: " . $e->getMessage());
        }


        $sql = "INSERT INTO usuario (email,pass,nombre,apellidos,fec_nac) ";
        $sql .= "VALUES (:ema, md5(:pas), :nom, :ape, :fec) ;";


        $sqlp = $pdo->prepare($sql);

        $sqlp->bindValue(":ema", $ema, PDO::PARAM_STR);
        $sqlp->bindValue(":pas", $pas, PDO::PARAM_STR);
        $sqlp->bindValue(":nom", $nom, PDO::PARAM_STR);
        $sqlp->bindValue(":ape", $ape, PDO::PARAM_STR);
        $sqlp->bindValue(":fec", $fec, PDO::PARAM_STR);


        if (!$sqlp->execute())
            $error = "Se ha producido un error en la creación del usuario";


        $pdo = null;

    else:
        $error = "Las contraseñas no coinciden";
    endif;

endif;

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>·ForoCarros ·</title>
        <meta charset="utf8" />
        <link rel="stylesheet" type="text/css" href="css/forocarro.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    </head>
    <body class="card text-white bg-dark mb-3">
        <div class="container">

            <!-- logotipo -->
            <div class="row">
                <div class="col-sd-12 mx-auto">
                    <img class="logo" src="imagenes/logo2.png" alt="forocarros" />
                </div>
            </div>

            <!-- nota -->
            <div class="row">
                <div class="col-sd-12 mx-auto mb-5">
                    <h4>Registro de Usuarios</h4>
                </div>
            </div>


            <?php
            if (isset($error)):
                echo "<div class=\"alert alert-danger w-50 mx-auto\">";
                echo $error;
                echo "</div>";
            endif;
            ?>


            <form method="post">


                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="email">Nombre de usuario:</label>
                        <input class="form-control" type="email" name="email" 
                               placeholder="email@foroCarros.com" required />
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="nombre">Nombre:</label>
                        <input class="form-control" type="text" name="nombre" required />
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="apellidos">Apellidos:</label>
                        <input class="form-control" type="text" name="apellidos" required />
                    </div>
                </div>

                <!-- contraseña -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="pass">Contraseña:</label>
                        <input class="form-control" type="password" name="pass" 
                               required />
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="conf">Confirmación contraseña:</label>
                        <input class="form-control" type="password" name="conf" 
                               required />
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="fnac">Fecha de Nacimiento:</label>
                        <input class="form-control" type="date" name="fnac" />
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <button class="btn btn-primary w-100" type="submit">Registrar</button>
                    </div>
                </div>
            </form>


            <div class="row">
                <div class="col-md-4 mx-auto text-center">
                    <a href="index.php" class="btn btn-link">volver atrás</a>
                </div>
            </div>


        </div>
<?PHP echo $fechaActual?>
        <br/>

    </body>
</html>