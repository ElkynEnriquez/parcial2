<form class="row light-blue-text text-accent-3 center-align blue-grey darken-2" id="formBuscar" name="formBuscar" method="post" action="">
	<div class="row">			
		<div class="col s1 hide-on-small-only"></div><div class="col s11"><h3 class="light-blue-text text-darken-2">Buscar estudiante</h3></div>
	</div>
	<input type="hidden" name="pag" value="2">
	<div class="row light-blue-text text-accent-3 center-align">
		<div class="input-field col s12 m4">
          <input id="codigo" type="text" class="validate" name="cod_estudiante">
          <label for="codigo">Código estudiantil</label>
        </div>
        <div class="input-field col s12 m4">
          <input id="nombre" type="text" class="validate" name="nombre">
          <label for="nombre">Nombre</label>
        </div>
        <div class="input-field col s12 m4">
          <input id="apellidos" type="text" class="validate" name="apellidos">
          <label for="apellidos">Apellidos</label>
        </div>
   </div>
   <div class="row light-blue-text text-accent-3 center-align">
        <div class="col s6 m3">
        <div class="input-field">
		    <select name="cod_grado">
		      <option value="" disabled selected>Grado</option>
		      <option value="0">TRANSICIÓN</option>
		      <option value="1">PRIMERO</option>
		      <option value="2">SEGUNDO</option>
		      <option value="3">TERCERO</option>
		      <option value="4">CUARTO</option>
		      <option value="5">QUINTO</option>
				<option value="6">SEXTO</option>
				<option value="7">SÉPTIMO</option>
				<option value="8">OCTAVO</option>
				<option value="9">NOVENO</option>
				<option value="10">DÉCIMO</option>
				<option value="11">ONCE</option>
				<option value="103">CICLO 3</option>
				<option value="104">CICLO 4</option>
		    </select>
		    <label>Grado</label>
		  </div>
		  <br />
		  <label class="" for="fecha_nacimiento">Fecha de nacimiento</label>
          <input id="fecha_nacimiento" type="date" class="datepicker" name="fecha_nacimiento">
		  </div>
        <div class="col s6 m3 center-align">
        	<p>Sexo:</p>
			<p>
				<input name="cod_genero" type="radio" id="femenino" value="F" />
			  	<label for="femenino" class="light-blue-text text-accent-2">Femenino</label>
				<input name="cod_genero" type="radio" id="masculino" value="M" />
			  	<label for="masculino" class="light-blue-text text-accent-2">Masculino</label>
			</p>
			</div>
		<div class="col s6 m3 center-align">
			<p>Sede:</p>
			<p>
			<input name="cod_sede" type="radio" id="sede1" value="C" />
		  	<label for="sede1" class="light-blue-text text-accent-2">Central</label>
		  	<input name="cod_sede" type="radio" id="sede2" value="M" />
		  	<label for="sede2" class="light-blue-text text-accent-2">Miraflores</label>
		  	<input name="cod_sede" type="radio" id="sede3" value="L" />
		  	<label for="sede3" class="light-blue-text text-accent-2">Lorenzo</label>
		  	</p>
		</div>
		<div class="col s6 m3 center-align">
			<p>Jornada:</p>
			<p>
			<input name="cod_jornada" type="radio" id="jornada1" value="M" />
		  	<label for="jornada1" class="light-blue-text text-accent-2">Mañana</label>
		  	<input name="cod_jornada" type="radio" id="jornada2" value="T" />
		  	<label for="jornada2" class="light-blue-text text-accent-2">Tarde</label>
		  	<input name="cod_jornada" type="radio" id="jornada3" value="N" />
		  	<label for="jornada3" class="light-blue-text text-accent-2">Noche *Lorenzo</label>
		  	</p>
		</div>
		<div class="col s12">
			<button class="btn-floating right light-blue darken-4 btn-large" type="submit" name="action">
				<i class="material-icons">search</i></button>
		</div>
	</div>
</form>
<br><br>

<div class="row">
	<div class="col s12 center-align"><h3 class="blue-grey-text text-accent-1">Resultado de la búsqueda</h3></div>
</div>
<?php
$consulta=""; $contC=0;
foreach($_POST as $n =>$Valor){
	if($n<>"pag" && $n<>"action" && $Valor<>""){
		if($contC==0) $consulta=$consulta." where "; 
		elseif($contC>0) 
			$consulta=$consulta." AND ";
		if($n=="fecha_nacimiento") {
			$fecha= explode(" ", $Valor);
			switch($fecha[1]) {
				case "January,": $fecha[1]=1; break;
				case "February,": $fecha[1]=2; break;
				case "March,": $fecha[1]=3; break;
				case "April,": $fecha[1]=4; break;
				case "May,": $fecha[1]=5; break;
				case "June,": $fecha[1]=6; break;
				case "July,": $fecha[1]=7; break;
				case "August,": $fecha[1]=8; break;
				case "September,": $fecha[1]=9; break;
				case "October,": $fecha[1]=10; break;
				case "November,": $fecha[1]=11; break;
				case "December,": $fecha[1]=12; break;}
			$consulta=$consulta.$n."='".$fecha[2]."-".$fecha[1]."-".$fecha[0]."'";
		}
		elseif($n=="cod_grado") $consulta=$consulta."grado.".$n."=".$Valor;
		elseif($n=="cod_sede") $consulta=$consulta."sede.".$n."='".$Valor."'";
		elseif($n=="cod_jornada") $consulta=$consulta."jornada.".$n."='".$Valor."'";
		elseif(is_numeric($Valor))
		$consulta=$consulta.$n."=".$Valor;
		else $consulta=$consulta.$n."='".$Valor."'";
		$contC++;
	}
}
	if(isset($_POST["cod_grado"])) 
	$sql2="select estudiante.* from estudiante,curso,grado".$consulta." AND estudiante.cod_curso=curso.cod_curso AND curso.cod_grado=grado.cod_grado";
	elseif(isset($_POST["cod_sede"])) 
	$sql2="select estudiante.* from estudiante,curso,sede".$consulta." AND estudiante.cod_curso=curso.cod_curso AND curso.cod_sede=sede.cod_sede";
	elseif(isset($_POST["cod_jornada"])) 
	$sql2="select estudiante.* from estudiante,curso,jornada".$consulta." AND estudiante.cod_curso=curso.cod_curso AND curso.cod_jornada=jornada.cod_jornada";
	else $sql2="select * from estudiante".$consulta;
	echo $sql2;
	require("conexion.php");
	$r2=mysqli_query($conex,$sql2);
	if($r2!=null) {
		echo "<table class='responsive-table' width=100% border=1px><thead class='light-blue-text text-accent-2'><tr><th>Código</th><th>Nombre</th><th>Apellido</th><th>Fecha de Nacimiento</th><th>Sexo</th><th>Curso</th></tr></thead><tbody>";
		while ($d=mysqlI_fetch_row($r2)) {
	   	echo "<tr><td>$d[0]</td><td>$d[1]</td><td> $d[2]</td><td>$d[3]</td><td>$d[4]</td><td> $d[5]</td>";    
		}
	echo "</tbody></table>";
	}
	else echo "<center><h1>No hay resultados que mostrar</h1></center>";
?>
<script type="text/javascript">
	$('.datepicker').pickadate({
   	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 15 // Creates a dropdown of 15 years to control year
  	});
  	$(document).ready(function() {
    	$('select').material_select();
  	});
</script>
