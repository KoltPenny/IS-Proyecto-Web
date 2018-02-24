<?php if(!Session::issetUID() || Session::getUT()!="admin") {
		Session::unsetUID();
		Session::unsetUNM();
		Session::unsetUT();
		Core::redir("index.php");
}?>
<body>
	<!-- Cabecera de Vista -->
	
  <div id="userinfo" class="col-15 row-full" style="background:#555555">
		<div id="main-header" class="row-10 col-full">
			<img class="main-logo row-90" src="img/ipn.svg" style="padding:0;"/>
			<span class="col-10 row-05"></span>
			<img class="main-logo row-80" src="img/saes-logo.svg" style="margin-top:0.5vh;align-text:center;"/>
		</div>
		<span class="col-full row-05"></span>
    <p id="username"><?php echo $_SESSION['user_name']."<input type='text' id='thingy' value='".Session::getUID()."' hidden/>";?></p>
    <br/>
		<span id="choices">
			<p id="regusr" onclick="changeView(0);populateContainerEmpleado('thingy','tablinf');" class="useroptions">Datos generales</p>
			<p id="regusr" onclick="changeView(1)" class="useroptions">Registrar usuarios</p>
			<p id="edtusr" onclick="changeView(2)" class="useroptions">Gestionar usuarios</p>
		</span>
		<br/>
		
		<p id="logout" class="useroptions" onclick="logoutUser()">Salir</p>
		
  </div>
	<!-- Menú de Información -->
	
	<!--EMPTY -->

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
		
		<span id="admin_content_register" class="col-full row-full" hidden>
			
			<!--EMPTY -->

			<p id="content-title" class="col-full row-10">Registrar usuarios</p>
			<select id="content-selector" class="col-full row-05" onchange="selectedElement(this);">
				<option value="" disabled selected>Tipo de Usuario</option>
				<option value="0">Estudiante</option>
				<option value="1">Empleado</option>
			</select>
			<span id="content-block" class="col-full row-85">
				<span id="student_register" class='col-full row-full' hidden>
					<span id="reference" class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'><p style="position:relative;top:calc(50% - 1ex);">Boleta:</p>
					</span>
					<input id='userid' class='login-input col-40 row-10' type='text' placeholder='Boleta' />
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('La boleta debe tener exactamente 10 caracteres (2 alfanuméricos, 8 numéricos).')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'><p style="position:relative;top:calc(50% - 1ex);">Nombre(s):</p>
					</span>
					<input id='nPila' class='login-input col-40 row-10' type='text' placeholder='Nombre(s)'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('Los nombres sólo pueden contener letras y espacios.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Apellido Paterno:</p>
					</span>
					<input id='aPater' class='login-input col-40 row-10' type='text' placeholder='Apellido Paterno'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('Los nombres sólo pueden contener letras y espacios.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Apellido Materno:</p>
					</span>
					<input id='aMater' class='login-input col-40 row-10' type='text' placeholder='Apellido Materno'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('Los nombres sólo pueden contener letras y espacios.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Contraseña:</p>
					</span>
					<input id='pass' class='login-input col-40 row-10' type='text' placeholder='Contraseña'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('La contraseña sólo puede contener letras, números y puntos.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Correo:</p>
					</span>
					<input id='email' class='login-input col-40 row-10' type='text' placeholder='Correo'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('El correo debe tener el formato \'<i>usuario@servidor.dominio</i>\'.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Status del alumno:</p>
					</span>
					<select id='type' class='col-50 row-10'>
						<option value='activo'>Activo</option>
						<option value='inactivo'>Inactivo</option>
					</select>
					<span class='col-full row-05'></span>
					<span class='col-30 row-10'></span>
					<button class='bottoms col-40 row-10' onclick='postUser("S");'>Guardar</button>
					<span class='col-full row-05'></span>
				</span>
				<!-- Registro de Estudiante -->
				<span id="empleado_register" class='col-full row-full' hidden>
					<span id="reference" class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Número de Empleado:</p>
					</span>
					<input id='euserid' class='login-input col-40 row-10' type='text' placeholder='Número de Empleado' />
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('El número de empleado debe tener exactamente 10 caracteres (2 alfanuméricos, 8 numéricos).')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'><p style="position:relative;top:calc(50% - 1ex);">Nombre(s):</p>
					</span>
					<input id='enPila' class='login-input col-40 row-10' type='text' placeholder='Nombre(s)'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('Los nombres sólo pueden contener letras y espacios.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Apellido Paterno:</p>
					</span>
					<input id='eaPater' class='login-input col-40 row-10' type='text' placeholder='Apellido Paterno'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('Los nombres sólo pueden contener letras y espacios.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Apellido Materno:</p>
					</span>
					<input id='eaMater' class='login-input col-40 row-10' type='text' placeholder='Apellido Materno'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('Los nombres sólo pueden contener letras y espacios.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Contraseña:</p>
					</span>
					<input id='epass' class='login-input col-40 row-10' type='text' placeholder='Contraseña'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('La contraseña sólo puede contener letras, números y puntos.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Correo:</p>
					</span>
					<input id='eemail' class='login-input col-40 row-10' type='text' placeholder='Correo'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('El correo debe tener el formato \'<i>usuario@servidor.dominio</i>\'.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Status del alumno:</p>
					</span>
					<select id='etype' class='col-50 row-10'>
						<option value='' disabled selected>Selecciona un tipo de empleado.</option>
						<option value='P'>Profesor (Docente)</option>
						<option value='A'>Académico (Docente)</option>
						<option value='G'>Gestión Escolar (Administrativo)</option>
					</select>
					<span class='col-full row-05'></span>
					<span class='col-30 row-10' style='line-height:200%;text-align:center;'></span>
					<button form='submit_emp' class='bottoms col-40 row-10' onclick="postUser('E')">Guardar</button>
					<span class='col-full row-05'></span>
				</span>
			</span>
			<!-- Contenido de Registro para Admin -->
			
			<input id="fileselect" type="file" hidden/>

		</span>
		<!-- Finaliza bloque "admin_content_register" -->
		
		<span id="admin_content_edit" hidden>
			
			<!--EMPTY -->

			<p id="content-title" class="col-full row-10">Gestionar usuarios</p>
			<select id="content-selector" class="col-full row-05" onchange="selectedElement(this)">
				<option value="" disabled selected>Tipo de Usuario</option>
				<option value="0">Estudiante</option>
				<option value="1">Empleado</option>
			</select>
			<span id="content-block" class="col-full row-85">
				<span id="student_edit" hidden>
					<span class='empty col-full row-05'></span><span class='col-20 row-10'></span>
					<input id='st_search' class='login-input col-20 row-10' type='text'/>
					<button class='bottoms col-10 row-10' onclick="populateContainerEstudiante('st_search','etablinf');">Buscar</button>
					<button class='bottoms col-10 row-10' onclick="editUser('s','etablinf');">Editar</button>
					<button class='bottoms col-10 row-10' onclick='deleteUser(0)'>Eliminar</button>
					<span class='empty col-full row-05'></span>
					<table id='etablinf' j  class='col-full' style='background:#333333;text-align:center;'>
						<tr>
							<th>Boleta</th>
							<th>Nombre(s)</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Activo</th>
							<th>e-mail</th>
						</tr>
					</table>
				</span>
				<span id="empleado_edit" hidden>
					<span class='empty col-full row-05'></span>
					<span class='col-20 row-10'></span>
					<input id='st_search' class='login-input col-20 row-10' type='text'/>
					<button class='bottoms col-10 row-10' onclick=\"populateContainerEmpleado('st_search','tablinf');\">Buscar</button>
					<button class='bottoms col-10 row-10' onclick=\"editUser('e','tablinf');\">Editar</button>
					<button class='bottoms col-10 row-10' onclick='deleteUser(1)'>Eliminar</button>
					<span class='empty col-full row-05'></span>
					<table id='tablinf' class='col-full' style='background:#333333'>
						<tr>
							<th>No. de Empleado</th>
							<th>Nombre(s)</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Tipo</th>
							<th>e-mail</th>
						</tr>
					</table>
				</span>
			</span>
				<!-- Contenido de Registro para Admin -->
			
			</span>
		<!-- Finaliza bloque "admin_content_edit" -->
		<span id="admin_user_edit" hidden>
			
			<!--EMPTY -->

			<p id="content-title" class="col-full row-10">Edición</p>
			<select id="content-selector" class="col-full row-05" onchange="selectedElement(this,search_info)">
				<option value="" disabled selected>Tipo de Usuario</option>
				<option value="0">Estudiante</option>
				<option value="1">Empleado</option>
			</select>
			<span id="content-block" class="col-full row-85">
				
			</span>
			<!-- Contenido de Registro para Admin -->
			
		</span>
		
  </div>

	<div id="edit-user"  class="col-50 row-full" hidden>
		<button class="bottoms col-15 row-05" style="top:0;" onclick="this.parentElement.style.display='none';">Cancelar</button>
		<p id="edit_id" class="col-85 row-10" style="font-size:1.2em;">##########</p><br/><p class="col-full row-05"></p>
		<p class="col-40 row-10">Nombre(s)</p><input id="edit_nPila" class="col-50 row-10"/><p class="col-full row-05"></p>
		<p class="col-40 row-10">Apellido Paterno</p><input id="edit_apPater" class="col-50 row-10"/><p class="col-full row-05"></p>
		<p class="col-40 row-10">Apellido Materno</p><input id="edit_apMater" class="col-50 row-10"/><p class="col-full row-05"></p>
		<p class="col-40 row-10">Correo</p><input id="edit_correo" class="col-50 row-10"/><p class="col-full row-05"></p>
		<p class="col-40 row-10">Status</p><select id="edit_status" class="col-50 row-10"></select>
		<p class="col-full row-05"></p>
		<button id="editbtn" class="bottoms col-full row-10">Actualizar</button>
	</div>
  <div id="notification" hidden></div>
	<div id="debug" hidden></div>
</body>
