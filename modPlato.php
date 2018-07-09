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
        <title>Modificar Plato</title>
                        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
  
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
 
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
 
        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">
 
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="css/ie-emulation-modes-warning.js.descarga"></script>
 
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="manPlato.php">Insertar Plato <span class="sr-only">(current)</span></a></li>
                        <li><a href="modPlato.php">Modificar Plato</a></li>
                        <li><a href="#">Eliminar Plato</a></li>          
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li><a href="">Empresa</a></li>
                        <li><a href="">Clientes</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li><a href="#">Informes</a></li>
                        <li><a href="#">Análisis</a></li>  
                        <li><a href="#">Ayuda</a></li>
                    </ul>
                </div>
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
                  echo "Database connection success.";
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

				echo "<table>
                                <tr>    <th>ID</th> <th>Nombre del Plato</th>  </tr>";
				while( $objFila = pg_fetch_object($rs) )
                                        
					echo "<tr><td>".$objFila->id_plato." </td><td> ".$objFila->nom_plato." </td></tr>";
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
        <?php
        // put your code here
        ?>
    </body>
</html>
