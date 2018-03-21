<?php
if(!Session::issetUID() || (Session::getUT()!="logistica")) {
		Session::unsetUID();
		Session::unsetUNM();
		Session::unsetUT();
		Core::redir("index.php");
}
?>
<style>
 .tab_x {
		 border:none;
		 border:5px solid #333;
		 padding-top:5px;
		 border-collapse: collapse;
		 text-align: center;
 }
 .tab_x td {
		 border:none;
		 padding-top:10px;
		 padding-bottom:5px;
 }
 .tab_x th {
		 background: #333;
		 border:none;
		 padding-top:5px;
		 padding-bottom:5px;
 }
 .tab_x tr {
		 border:none;
		 border-bottom:1px solid #333;
 }
</style>
<body>
	<div id="userinfo" class="col-15 row-full" style="background:#555555">
		<div id="main-header" class="row-10 col-full">
			<img class="main-logo row-90" src="img/ipn.svg" style="padding:0;"/>
			<span class="col-10 row-05"></span>
			<img class="main-logo row-80" src="img/saes-logo.svg" style="margin-top:0.5vh;align-text:center;"/>
		</div>
		<span class="col-full row-05"></span>
    <br/><p id="username"><?php echo $_SESSION['user_name']."<input type='text' id='thingy' value='".Session::getUID()."' hidden/>";?></p><br/>
		
    <span id="choices">
			<p id="datusr" onclick="changeView(0);populateContainerEmpleado('thingy','tablinf');" class="useroptions">Datos Generales</p>
			<p id="hrsusr" onclick="changeView(1)" class="useroptions">Ver horarios</p>
			<?php
			
			/*
				 Aquí se definen los elementos de la lista lateral exclusivos para el usuario tipo Académico.
				 El login se hace como profesor pero el usuario que tenga tipo 'A' en la base de datos podrá
				 hacer uso de estos elementos.
			 */
			
			if( isset( $_SESSION['prof_type'] ) && $_SESSION['prof_type'] == "A") {
					echo "<p id='addmat' onclick='changeView(2);' class='useroptions'>Registrar asignaturas</p>";
					echo "<p id='editmat' onclick=\"changeView(3);populateContainerGET('getmateria','materia_selection','Seleccione asignatura');\" class='useroptions'>Editar asignaturas</p>";
					echo "<p id='addgrp' onclick=\"changeView(4);populateContainerGET('getgroup','clavegg','Seleccione grupo');\" class='useroptions'>Registrar grupo</p>";
					echo "<p id='addmat' onclick=\"changeView(5);populateContainerGET('getmateria','clave','Selecciona clave de materia');populateContainerGET('getgroup','claveg','Seleccione grupo');populateContainerGET('getprof','prof','Seleccione profesor');\" class='useroptions'>Registrar horario</p>";
			}?>
		</span>
		<br/>
		
		<p id="logout" class="useroptions" onclick="logoutUser()">Salir</p>
		
  </div>
	<!--div class="col-05 row-75" style="background:#e6e6e6"></div-->

	<div id="DISPLAY" class="col-85 row-full" style="background:#e6e6e6">

		<span id="data_view" hidden>
			<!-- span class="empty col-full row-05"></span-->
			<!--EMPTY -->
			<p id="content-title" class="col-full row-10">Datos generales</p>
			<div id="content-block" class="col-full row-90">
				<table id='tablinf' class='col-full' style='background:#333333'>
					<tr>
						<th>No. de Empleado</th>
						<th>Nombre(s)</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Tipo de Empleado</th>
						<th>e-mail</th>
					</tr>
				</table>
				<span class='col-full row-05'></span>
			</div>
		</span>
		
		<span id="horarios_view" hidden>
			
			<!-- span class="empty col-full row-05"></span-->
			
			<div id="content-block" class="col-full row-full">
			<table>
				<tr><th><input id="searchbar" class="col-full row-05" type="text" placeholder="Buscar grupo o materia..."/><th>
				<th><button class="col-full row-05" onclick="getHorario('control.php?view=gethorario','tableinfo')">Buscar</button><th></tr>
			</table>
				
				<table class="col-full" style="border:none;background:#333;border:none;border-top:1px solid #777;">
					<tr><th>Materia</th><th>Nivel</th><th>Grupo</th><th>L</th><th>M</th><th>Mi</th><th>J</th><th>V</th><th>Ocupabilidad</th></tr>
					
					<span id="tableinfo"></span>
					<!-- Contenido de la tabla -->
					
				</table>
				
			</div>
		</span>
		<!-- Finaliza bloque "admin_content_register" -->
		
		<span id="register_view" hidden>
			<!--span class="empty col-full row-05"></span-->
			<!--EMPTY -->
			<p id="content-title" class="col-full row-10">Registrar Asignatura</p>
			<div id="content-block" class="col-full row-90">
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Clave de la materia:</pre></span>
				<input id='UnidadAp' class='login-input col-40 row-10' type='text' placeholder='Clave de la materia' />
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Unidad académica::</pre></span>
				<input id='UnidadAcad' class='login-input col-40 row-10' type='text' placeholder='Unidad académica'/>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Nombre de la materia:</pre></span>
				<input id='nombreM' class='login-input col-40 row-10' type='text' placeholder='Nombre de la materia'/>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Horas prácticas:</pre></span>
				<input id='hrs_prac' class='login-input col-40 row-10' type='text' placeholder='Horas prácticas'/>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Horas teóricas:</pre></span>
				<input id='hrs_teo' class='login-input col-40 row-10' type='text' placeholder='Horas teóricas'/>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Tipo de asignatura:</pre></span>
				<select id='tipoAsig' class='col-40 row-10'>
					<option value='obligatoria'>Obligatoria</option><option value='optativa'>Optativa</option>
				</select>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Nivel:</pre></span>
				<select id='nivel' class='col-40 row-10'>
					<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>
					<option value='4'>4</option><option value='5'>5</option>
				</select>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Créditos:</pre></span>
				<input id='creditos' class='login-input col-40 row-10' type='text' placeholder='Créditos'/>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10'></span>
				<button class='bottoms col-40 row-10' onclick='postMateria()'>Guardar</button>
				<span class='col-full row-05'></span>
			</div>
		</span>
		<!-- Finaliza bloque "ocupabilidad view" -->

		<span id="edit_view" hidden>
			<!-- span class="empty col-full row-05"></span-->
			<!--EMPTY -->
			<p id="content-title" class="col-full row-10">Administrar materia</p>
			<div id="content-block" class="col-full row-90">
				
				<span class='col-full row-05'></span>
				<span class='col-25 row-10'></span>
				<select
					id='materia_selection'
							class='bottoms col-40 row-10'
							onchange="populateContainerPOST('control.php?view=fetchmateria','tablein',this.options[this.selectedIndex].text)">
				</select>
				<button class="bottoms col-10 row-10" onclick="editMateria('tablein');">Editar</button>
				<button class="bottoms col-10 row-10" onclick="deleteMateria();populateContainerPOST('control.php?view=fetchmateria','tablein',document.getElementById('materia_selection').options[document.getElementById('materia_selection').selectedIndex].text)">Eliminar</button>
				<span class='col-full row-05'></span>
				
				<table id="tablein" class="col-full">
					<tr><th>Tipo</th>
						<th>Nombre</th>
						<th>Unidad Académica</th>
						<th>Área</th>
						<th>Hrs. Prácticas</th>
						<th>Hrs. Teóricas</th>
						<th>Créditos</th>
						<th>Nivel</th>
					</tr>
					<!-- Contenido de la tabla -->
				</table>
				
				<span class='col-full row-05'></span>
			</div>
		</span>

		<!-- Finaliza bloque "ocupabilidad view" -->
		<span id="grupo_view" hidden>
			<!--span class="empty col-full row-05"></span-->
			<!--EMPTY -->
			<p id="content-title" class="col-full row-10">Administrar Grupo</p>
			<div id="content-block" class="col-full row-90">
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Nombre de grupo:</pre></span>
				<input id='nombreG' class='login-input col-40 row-10' type='text' placeholder='Nombre de grupo'/>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10'></span>
				<button class='bottoms col-40 row-10' onclick='postGrupo()'>Registrar</button>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Grupo:</pre></span>
				<select
					id='clavegg'
							class='bottoms col-40 row-10'
							>
				</select>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10'></span>
				<button class='bottoms col-40 row-10' onclick='deleteGrupo()'>Eliminar</button>
				<span class='col-05 row-05'></span>
			</div>

		</span>
		<!-- Finaliza bloque "ocupabilidad view" -->

		<span id="registerG_view" hidden>
			<!--span class="empty col-full row-05"></span-->
			<!--EMPTY -->
			<p id="content-title" class="col-full row-10">Registrar Horario</p>
			<div id="content-block" class="col-full row-90">
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Grupo:</pre></span>
				<select
					id='claveg'
							class='bottoms col-40 row-10'
							>
				</select>
				<span class='col-full row-05'></span>
				<span class='col-05 row-05'></span>
				<div style="text-align:center;">
				<table id="tableH" class="tab_x col-90">
					<tr><th>Horario</th>
						<th>Lunes</th>
						<th>Martes</th>
						<th>Miercoles</th>
						<th>Jueves</th>
						<th>Viernes</th>
					</tr>
					<tr>
					<td>7:00 - 8:30</td>
					<td id="00"></td>
					<td id="10"></td>
					<td id="20"></td>
					<td id="30"></td>
					<td id="40"></td>
					</tr>
					<tr>
					<td>8:30 - 10:00</td>
					<td id="01"></td>
					<td id="11"></td>
					<td id="21"></td>
					<td id="31"></td>
					<td id="41"></td>
					</tr>
					<tr>
					<td>10:30 - 12:00</td>
					<td id="02"></td>
					<td id="12"></td>
					<td id="22"></td>
					<td id="32"></td>
					<td id="42"></td>
					</tr>
					<tr>
					<td>12:00 - 13:30</td>
					<td id="03"></td>
					<td id="13"></td>
					<td id="23"></td>
					<td id="33"></td>
					<td id="43"></td>
					</tr>
					<tr>
					<td>13:30 - 15:00</td>
					<td id="04"></td>
					<td id="14"></td>
					<td id="24"></td>
					<td id="34"></td>
					<td id="44"></td>
					</tr>

				</table>
				</div>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Clave de la materia:</pre></span>
				<select
					id='clave'
							class='bottoms col-40 row-10'
							>
				</select>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10' style='line-height:200%;text-align:center;'><pre>Profesor:</pre></span>
				<select
					id='prof'
							class='bottoms col-40 row-10'
							>
				</select>
				<span class='col-full row-05'></span>
				<span class='col-05 row-05'></span>
				<div style="text-align:center;">
					<table id="table" class="tab_x col-90">
					<tr><th>Horario</th>
						<th>Lunes</th>
						<th>Martes</th>
						<th>Miercoles</th>
						<th>Jueves</th>
						<th>Viernes</th>
					</tr>
					<!-- Contenido de la tabla -->

					<tr>
					<td>7:00 - 8:30</td>
					<?php
						for($i=0;$i<5;$i++){
							echo "<td><input type='checkbox' name='tiempo".$i."' value='0'></td>";
						};
					?>
					</tr>
					<tr><td>8:30 - 10:00</td>
					<?php
						for($i=0;$i<5;$i++){
							echo "<td><input type='checkbox' name='tiempo".$i."' value='1'></td>";
						};
					?>
					</tr>
					<tr><td>10:30 - 12:00</td>
					<?php
						for($i=0;$i<5;$i++){
							echo "<td><input type='checkbox' name='tiempo".$i."' value='2'></td>";
						};
					?>
					</tr>
					<tr><td>12:00 - 13:30</td>
					<?php
						for($i=0;$i<5;$i++){
							echo "<td><input type='checkbox' name='tiempo".$i."' value='3'></td>";
						};
					?>
					</tr>
					<tr><td>13:30 - 15:00</td>
					<?php
						for($i=0;$i<5;$i++){
							echo "<td><input type='checkbox' name='tiempo".$i."' value='4'></td>";
						};
					?>
					</tr>	
				</table>
				</div>
				<span class='col-full row-05'></span>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10'></span>
				<button class='bottoms col-40 row-10' onclick='cartHorario()'>Agregar</button>

				<span class='col-full row-05'></span>
				<span class='col-full row-05'></span>
				<span class='col-30 row-10'></span>
				<button class='bottoms col-40 row-10' onclick='postHorario()'>Guardar</button>
				<span class='col-full row-05'></span>
			</div>
		</span>
		<!-- Finaliza bloque "ocupabilidad view" -->
  </div>

	<div id="edit-materia"  class="col-50 row-full" hidden>
		<button class="bottoms col-15 row-05" style="top:0;" onclick="this.parentElement.style.display='none';">Cancelar</button>
		<p id="edit_id" class="col-85 row-10" style="font-size:1.2em;">##########</p><br/><p class="col-full row-05"></p>
		<p class="col-40 row-05">Nombre</p><input id="edit_nom" class="col-50 row-05"/><p class="col-full row-05"></p>
		<p class="col-40 row-05">Unidad Académica</p><input id="edit_uacad" class="col-50 row-05"/><p class="col-full row-05"></p>
		<p class="col-40 row-05">Horas prácticas</p><input id="edit_hp" class="col-50 row-05"/><p class="col-full row-05"></p>
		<p class="col-40 row-05">Horas teóricas</p><input id="edit_ht" class="col-50 row-05"/><p class="col-full row-05"></p>
		<p class="col-40 row-05">Créditos</p><input id="edit_cr" class="col-50 row-05"/><p class="col-full row-05"></p>
		<p class="col-40 row-05">Nivel</p><select id="edit_lvl" class="col-50 row-05"></select><p class="col-full row-05"></p>
		<p class="col-40 row-05">Tipo</p><select id="edit_tas" class="col-50 row-05"></select>
		<p class="col-full row-05"></p>
		<button id="editbtn" class="bottoms col-full row-10">Actualizar</button>
	</div>
	
	<div id="notification" hidden></div>
	<div id="confirm" hidden>
		<p id="confirm-msg" class="col-full row-50">Test</p>
		<button class="col-50 row-50">Aceptar</button>
		<button class="col-50 row-50">Cancelar</button>
	</div>
	<div id="debug" hidden></div>
</body>


