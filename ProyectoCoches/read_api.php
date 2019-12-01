<!DOCTYPE html>
<html lang="es">
    <head>
        <title>·Coches API ·</title>
        <meta charset="utf8" />
    </head>
    <body>

        <?php
        //error_reporting(0) ;	// ocultar cualquier mensaje de error de PHP
        echo "Coches API";
       

        // realizamos la primera solicitud
        // para buscar las series que están emitiéndose
        $datos = file_get_contents("http://www.carqueryapi.com/api/0.3/?callback=?&cmd=getMakes");
        $datos = ltrim($datos, "?(");
        $datos = rtrim($datos, ");");


        // si tengo información
        if ($datos):

            // conectamos con la base de datos
            $sqli = new mysqli("localhost", "root", "") or die("Se ha producido un error en la conexión.");
            $sqli->select_db("coches");
            $sqli->set_charset("utf8");

            // convertimos el JSON a un formato manejable por PHP
            $info = json_decode($datos);

            echo "<pre>" . print_r($info, true) . "</pre>";




            foreach ($info->Makes as $item):


                $datos = file_get_contents("http://www.carqueryapi.com/api/0.3/?callback=?&cmd=getMakes");

                if ($datos):
                    
                    $show = json_decode($datos);
                    
                    $marca = $show->make_id ?? "";
                    $aniofundacion = null;



                    $sql = "INSERT INTO marcas (NombreMarca,  AñoFundacion)";
                    $sql .= "VALUES ($marca,  null ) ;";

                   // echo "Insertando $marca....<br/>";
                    //$sqli->query($sql);
                 

                else :
                    echo "Sin información<br/>";

                endif;

            endforeach;



       
            $sqli->close();

        else:
            echo "No hay información.<br/>";
        endif;
        ?>

    </body>
</html>