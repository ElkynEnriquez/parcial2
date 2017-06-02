<html>
<head>
	<title>Parcial 2: Bases de datos</title>
   <!--Import Google Icon Font-->
   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!--Import materialize.css-->
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="indigo darken-4" style="display: flex; min-height: 100vh; flex-direction: column;">
<header>  <!-- Menú superior -->
	<div class="navbar-fixed">
		<nav class="nav-extended blue-grey darken-2">
			<div class="nav-wrapper">
		   	<h4 class="center-align light-blue-text">Programa de Psicología</h4>
		   </div>
		   <div class="nav-content"> <!-- menú de botones circulares -->
	      	<div class="row">
		        	<form  method="post" name="formm" id="formm" action="">
		            <div class="col s3 right-align">
		            	<button class="btn-floating btn-large tooltipped blue darken-1" data-tooltip="Listar" type="submit" name="pag" value="1">
		            		<i class="material-icons">view_list</i></button>
		            	<a class="hide-on-small-only blue-text"> Listar</a>
		            </div>
		            <div class="col s3 center-align">
		            	<button class="btn-floating btn-large tooltipped blue darken-1" data-tooltip="Asignaturas" type="submit" name="pag" value="2">
		            		<i class="material-icons">class</i></button>
		            	<a class="hide-on-small-only blue-text"> Asignaturas</a>
		            </div>
		            <div class="col s3 center-align">
		            	<button class="btn-floating btn-large tooltipped blue darken-1" data-tooltip="Eliminar docente" type="submit" name="pag" value="3">
		            		<i class="material-icons">delete</i></button>
		            	<a class="hide-on-small-only blue-text"> Eliminar</a>
		            </div>
		            <div class="col s3 left-align">
		            	<button class="btn-floating btn-large tooltipped blue darken-1" data-tooltip="Modificar" type="submit" name="pag" value="4">
		            		<i class="material-icons">mode_edit</i></button>
		            	<a class="hide-on-small-only blue-text"> Modificar</a>
		            </div>
		        	</form>
	         </div>
         </div>
		</nav>
	</div><br><br>
</header><br>
<!-- -------------------------------Fin menú
------------------------------------------------------------------------------------------------------------------------- -->
	
	<!--Importando jQuery y materialize.js-->
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script type="text/javascript" src="js/materialize.min.js"></script>

<!-- ----------------------------div para cargar paginas-->   
<main style="flex: 1 0 auto;"><div class="row">
	<br><br><br class='hide-on-med-and-up'><br class='hide-on-med-and-up'>
   	<?php
   		session_start();
   		if(isset($_GET['pag'])) $pag=$_GET['pag']; else $pag=2; 
	   	if(isset($_SESSION['Susuario'])) {
	     		if ($pag==1) require ("autenticar.php");
		   	elseif ($pag==2) require ("listar.php");
		   	elseif ($pag==3)require ("eliminar.php");
		   	elseif ($pag==4)require ("modificar.php");
		   	elseif ($pag==0)require ("login.php");
		  	}
		   else require ("login.php");
      ?>
</div></main>
<footer class="page-footer blue-grey darken-1">
	<div class="footer-copyright">
   	<div class="container">
      	Junio 2017 Elkyn Enriquez - Jair Arboleda
      </div>
   </div>
</footer>
</body>
</html>
