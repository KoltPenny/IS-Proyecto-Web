<?php
if(!Session::issetUID() || Session::getUT()!="student") {
		Session::unsetUID();
		Session::unsetUNM();
		Session::unsetUT();
		Core::redir("index.php");
}


$base = new Database();	$con = $base->connect();

$sql = "select Inscrito from Estudiante where idEstudiante='".Session::getUID()."'";
$query = $con->query($sql);

$row = $query->fetch_array();

if(!isset($_SESSION['materias'])) {	$_SESSION['materias'] = array(); }
if(!isset($_SESSION['materias_str'])) {	$_SESSION['materias_str'] = array(); }
?>
<script src="js/student.js"></script>
<body>
	<div id="userinfo" class="col-15 row-full" style="background:#555555">
		<div id="main-header" class="row-10 col-full">
			<img class="main-logo row-90" src="img/ipn.svg" style="padding:0;"/>
			<span class="col-10 row-05"></span>
			<img class="main-logo row-80" src="img/saes-logo.svg" style="margin-top:0.5vh;align-text:center;"/>
		</div>
		<span class="col-full row-05"></span>
    <p id="username">
			<?php echo $_SESSION['user_name']."<input type='text' id='thingy' value='".Session::getUID()."' hidden/>";?>
		</p>
    <br/>
		<span id="choices">
			<p id="usr_data" onclick="changeView(0);populateContainerEstudiante('thingy','tablinf');"
				 class="useroptions">Datos generales</p>
			<p id="usr_insc" onclick="changeView(1);fillTable('GET')" class="useroptions">Reinscripción</p>
			<p id="usr_hour" onclick="changeView(2);fillHours()" class="useroptions">Horario Actual</p>
		</span>
		<br/>
		<!--p id="" class="useroptions" onclick="">Configuración</p-->
		<br/>
		<p id="logout" class="useroptions" onclick="logoutUser()">Salir</p>
  </div>

	<div id="DISPLAY" class="col-85 row-full" style="background:#e6e6e6">

		<span id="data_view" hidden>
			<!-- span class="empty col-full row-05"></span-->
			<!--EMPTY -->
			<p id="content-title" class="col-full row-10">Datos generales</p>
			<div id="content-block" class="col-full row-90">
				<table id='tablinf' class='col-full' style='background:#333333'>
					<tr>
						<th>Boleta</th>
						<th>Nombre(s)</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Status</th>
						<th>e-mail</th>
					</tr>
				</table>
				<span class='col-full row-05'></span>
			</div>
		</span>
		
		<span id="horarios_view" class="col-full row-full" hidden>
			
			<!-- span class="empty col-full row-05"></span-->			

			<div id="content-block" class="col-full row-90">
				<input id="searchbar"
							 class="col-full row-05"
							 type="text"
							 placeholder="Buscar grupo o materia..."
							 onkeypress="searchElement(event)" />
				
				<table id="studentable" class="col-full">
					<tr>
						<th style="width:5%;"><img src="img/squares.svg"/></th>
						<th style="width:10%;">Grupo</th>
						<th style="width:12.5%;">Materia</th>
						<th style="width:12.5%;">Profesor</th>
						<th>L</th><th>M</th><th>Mi</th><th>J</th><th>V</th>
						<th style="width:10%;">Cupo</th>
						<th style="width:10%;">Abiertos</th>
					</tr>
				</table>
				
				<span id="tableinfo"></span>
				<!-- Contenido de la tabla -->
				
				</table>
				
			</div>
			<span id="buttons" class="col-full row-10" style="background:#333333">
				<button class="row-full col-25 bottoms">Cargar lista</button>
				<button class="row-full col-25 bottoms" onclick="toggleList()">Ver selección</button>
				<button class="row-full col-50 bottoms" onclick="fillTable('GET')">Restaurar tabla</button>
			</span>
		</span>

		<span id="horario_view" class="col-full row-full" hidden>
			
			<!-- span class="empty col-full row-05"></span-->			
			
			<div id="content-block" class="col-full row-full">
				<p id="content-title" class="col-full row-10">Horario Actual</p>
				
				<table id="studentab" class="col-full" style="border-collapse:collapse;text-align:center">
					<tr style="background:#333333">
						<th style="width:10%;">Grupo</th>
						<th style="width:12.5%;">Materia</th>
						<th style="width:12.5%;">Profesor</th>
						<th>L</th><th>M</th><th>Mi</th><th>J</th><th>V</th>
					</tr>
				</table>
				
				<span id="tableinfo"></span>
				<!-- Contenido de la tabla -->
				
				</table>
				
			</div>
		</span>
		
  </div>
	
	<div id="materias">
		<p>Materias seleccionadas</p>
		<br/>
		<table id="materias_table" class="col-full">
			<tr>
				<th style="width:20%;">Grupo</th>
				<th style="width:40%;">Materia</th>
				<th style="width:40%;">Profesor</th>
			</tr>
		</table>
		<span class="col-full" style="height:10px"></span>
		<button class="bottoms col-30" style="height:30px;" onclick="cleanSel()">Limpiar todo</button>
		<button class="bottoms col-30" style="height:30px;">Descargar</button>
		<button class="bottoms col-40" style="height:30px;" onclick="registerStudent()">Inscribir</button>
		<span class="col-full" style="height:10px"></span>
	</div>
	<div id="notification" hidden></div>
	<div id="debug" hidden><button>x</button></div>
</body>
