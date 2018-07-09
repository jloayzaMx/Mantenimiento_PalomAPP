<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style>
            * {
  box-sizing: border-box;
}
            form {
  display: grid;
  padding: 1em;
  background: #f9f9f9;
  border: 1px solid #c1c1c1;
  margin: 2rem auto 0 auto;
  max-width: 600px;
  padding: 1em;
}
form input {
  background: #fff;
  border: 1px solid #9c9c9c;
}
form button {
  background: lightgrey;
  padding: 0.7em;
  width: 100%;
  border: 0;
}
form button:hover {
  background: gold;
}

label {
  padding: 0.5em 0.5em 0.5em 0;
}

input {
  padding: 0.7em;
  margin-bottom: 0.5rem;
}
input:focus {
  outline: 3px solid gold;
}

@media (min-width: 400px) {
  form {
    grid-template-columns: 200px 1fr;
    grid-gap: 16px;
  }

  label {
    text-align: right;
    grid-column: 1 / 2;
  }

  input,
  button {
    grid-column: 2 / 3;
  }
}
.error {color: #FF0000;}
        </style>
        <meta charset="UTF-8">
        <title>Insertar Platos</title>
                        
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
        <?php
// define variables and set to empty values
$v_descripcionErr = $v_nom_platoErr = $v_img_platoErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

  if (empty($_POST["desc"])) {
    $v_descripcionErr = "ingresa la descripción";
  } else {
    $v_descripcion = test_input($_POST["desc"]);
  }

  if (empty($_POST["nom_plato"])) {
    $v_nom_platoErr = "ingresa el plato";
  } else {
    $v_nom_plato = test_input($_POST["nom_plato"]);
  }
  if (empty($_POST["img_plato"])) {
    $v_img_platoErr = "ingresa la imagen";
  } else {
    $v_img_plato = test_input($_POST["img_plato"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
        <form  class="form1" action="" method="post">
        <label> Nombre del plato:</label> <input type="text" name="nom_plato" value=""><span class="error">* <?php echo $v_nom_platoErr;?></span>
<br/>
        <label>Imagen del plato[link]:</label> <input type="text" name="img_plato" value="primero sube la imagen"><span class="error">* <?php echo $v_img_platoErr;?></span>
<br/>
        <label>Descripcion:</label> <textarea name="desc" rows="5" cols="40"></textarea><span class="error">* <?php echo $v_descripcionErr;?></span>
<br/>  
        <input type="submit" name="mostrar" value="Insertar Plato"> <br/>
        </form>
        <?php
         function insertarPlato( $conexion, $descripcion, $nom_plato, $img_plato )
	{
            
		$sql = "insert into plato (descripcion,nom_plato,img_plato) values ('".$descripcion."', '".$nom_plato."','".$img_plato."')";

		// Ejecutamos la consulta (se devolver� true o false):
		return pg_query( $conexion, $sql );
            
	}
        
        if(isset($_POST['mostrar'])){
           $v_descripcion = $_POST['desc'];
           $v_nom_plato = $_POST['nom_plato'];
           $v_img_plato = $_POST['img_plato'];
           
           if ($v_descripcion<>"" or $v_nom_plato<>"" or $v_img_plato<>"") {
           $ok = insertarPlato( $conexion, $v_descripcion, $v_nom_plato,$v_img_plato);
            if( $ok == false )

                echo "Error al insertar los datos.<br/>";
             else
                echo "Datos insertados correctamente.<br/>";

           }else{
               
           }
        }
        
        ?>
        <br/>
    <center><a href="https://ibb.co/j88N7T"><img src="https://thumb.ibb.co/j88N7T/sube.jpg" alt="sube" border="0"></a><br/>
sube la imagen a esta paginaaaaaa
</center>

</iframe>
    </body>
</html>
