<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
        <meta charset="UTF-8">
        <title>Mantenimiento paloma APP</title>
    </head>
    <body>
        
        <a title="Mantenimiento" href="mantenimiento.php"><img src="img/base.jpg"></a>
        <?php
        
        ini_set("display_errors", "on");
//
//
//   $conexion = "dbname=dfip05gaio33q9 host=ec2-54-243-213-188.compute-1.amazonaws.com port=5432 user=yqghebejkgtyuk password=e4ec888ff29da9d31eeb4111990c441462a95d4087f8cb6230151767a51712b2 sslmode=require";
//
//
//   if (!$conexion) 
//   {
//     echo "Database connection failed.";
//   }
//   else 
//   {
//     echo "Database connection success.";
//   }

        	function conectar_PostgreSQL( $usuario, $pass, $host,$port,$ssl, $bd )
	{
		$conexion = pg_connect( "user=".$usuario." ".
				  		   "password=".$pass." ".
						   "host=".$host." ".
                                                   "port=".$port." ".
                                                   "sslmode=".$ssl." ".
						   "dbname=".$bd
						  ) or die( "Error al conectar: ".pg_last_error() );

		return $conexion;
	}
        $conexion = conectar_PostgreSQL( "yqghebejkgtyuk",
                "e4ec888ff29da9d31eeb4111990c441462a95d4087f8cb6230151767a51712b2",
                "ec2-54-243-213-188.compute-1.amazonaws.com",
                "5432",
                "require",
                "dfip05gaio33q9" );
                if (!$conexion) 
                {
                  echo "Database connection failed.";
                }
                else 
                {
                  //echo "Database connection success.";
                }
        
   function listarPlatos( $conexion )
	{
		$sql = "SELECT * FROM plato ORDER BY id_plato";
		$ok = true;

		// Ejecutar la consulta:
		$rs = pg_query( $conexion, $sql );

		if( $rs )
		{
			// Obtener el n�mero de filas:
			if( pg_num_rows($rs) > 0 )
			{
				echo "<p/>LISTADO DE Platos<br/>";
				echo "===================<p />";

				// Recorrer el resource y mostrar los datos:
                                echo "<table>
                                <tr>    <th>ID</th> <th>Nombre del Plato</th> <th>descripcion</th> <th>IMG</th> </tr>";
				while( $objFila = pg_fetch_object($rs) )
                                        
					echo "<tr><td>".$objFila->id_plato." </td><td> ".$objFila->nom_plato." </td><td> ".$objFila->descripcion." </td><td> ".$objFila->img_plato. "</td></tr>";
			}
			else
				echo "No se encontraron platos<br />";
		}
		else
			$ok = false;

		return $ok;
                
	}
        $ok = listarPlatos( $conexion );


	// ----------------------------------------------


?>
        
    </body>
</html>
