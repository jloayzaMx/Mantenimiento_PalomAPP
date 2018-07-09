<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
 
        <title>PHP Customerdb - Dashboard Template for Bootstrap</title>
 
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
 
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">PHP Customerdb</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>             
                        <li><a href="#">Ayuda</a></li>
                        <li><a href="http://www.codigoxules.org" target="blanck">Código Xules</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>
 
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Idiomas <span class="sr-only">(current)</span></a></li>
                        <li><a href="">Monedas</a></li>
                        <li><a href="">Países</a></li>          
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li><a href="">Empresa</a></li>
                        <li><a href="">Clientes</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li><a href="#">Informes</a></li>
                        <li><a href="#">Análisis</a></li>  
                        <li><a href="">Ayuda</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Dashboard</h1>
 
                    <div class="row placeholders">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Empresas</h4>
                            <span class="text-muted">Empresas definidas</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Clientes</h4>
                            <span class="text-muted">Clientes por empresa</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Administración</h4>
                            <span class="text-muted">Administración de tablas auxiliares</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Ayuda</h4>
                            <span class="text-muted">Documentación de ayuda</span>
                        </div>
                    </div>
                     <form  role="form" name="formListCbLanguage"
    method="post" action="index.php">
                    <h2 class="sub-header">Idiomas</h2>                
                     
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
        
                ?>
                    <table>   <tr>    <th>ID</th> <th>Nombre del Plato</th> <th>descripcion</th> <th>IMG</th> </tr>
		<?php
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
				//echo "<p/>LISTADO DE Platos<br/>";
				//echo "===================<p />";

				// Recorrer el resource y mostrar los datos:
                                
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
                   echo "</table>";  
                     ?>
                
                </div>
            </div>
        </div>
 
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
         
    </body>
</html>
