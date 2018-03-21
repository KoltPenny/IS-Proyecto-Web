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
			<!-- img class="main-logo row-90" src="img/ipn.svg" style="padding:0;"/-->
			<span class="col-10 row-05"></span>
			<!-- img class="main-logo row-80" src="img/saes-logo.svg" style="margin-top:0.5vh;align-text:center;"/-->
		</div>
		<span class="col-full row-05"></span>
    <p id="username"><?php echo $_SESSION['user_name']."<input type='text' id='thingy' value='".Session::getUID()."' hidden/>";?></p>
    <br/>
		<span id="choices">
			<p id="regusr" onclick="changeView(0);populateContainerAgente('thingy','','tablinf');" class="useroptions">Datos generales</p>
			<p id="regusr" onclick="changeView(1);populateContainerGET('fetchagencia','selAg','Agencias');" class="useroptions">Registrar usuarios</p>
			<p id="edtusr"
				 onclick="changeView(2);populateContainerGET('fetchagencia','agency_select','Agencias');"
				 class="useroptions">Gestionar usuarios</p>
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
						<th>Agencia</th>
						<th>No. de Agente</th>
						<th>Nombre Clave</th>
						<th>Tipo de Agente</th>
					</tr>
				</table>
				<span class='col-full row-05'></span>
			</div>
		</span>
		
		<span id="admin_content_register" class="col-full row-full" hidden>
			<!--EMPTY -->
			<p id="content-title" class="col-full row-10">Registrar usuarios</p>
			<span id="content-block" class="col-full row-90">
				<span id="agent_register" class='col-full row-full'>
					<span id="reference" class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'><p style="position:relative;top:calc(50% - 1ex);">ID Agente:</p>
					</span>
					<input id='userid' class='login-input col-40 row-10' type='text' placeholder='ID Agente' />
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('El ID debe tener máximo 10 caracteres alfanuméricos')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'><p style="position:relative;top:calc(50% - 1ex);">Nombre Clave:</p>
					</span>
					<input id='nomClave' class='login-input col-40 row-10' type='text' placeholder='Nombre Clave'/>
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('Los nombres sólo pueden contener letras y espacios.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'><p style="position:relative;top:calc(50% - 1ex);">Contraseña:</p>
					</span>
					<input id='userpass' class='login-input col-40 row-10' type='text' placeholder='Contraseña' />
					<div id="infoblock"
							 class="col-10 row-10"
							 onclick="processNeutral('Ponle ahí lo que se te ocurra.')">
						<p>?</p>
					</div>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Tipo de Agente:</p>
					</span>
					<select id='type' class='col-50 row-10'>
						<option value='0'>Agente de Campo</option>
						<option value='1'>Agente de Logística</option>
						<option value='2'>Administrador</option>
					</select>
					<span class='col-full row-05'></span>
					<span class='col-25 row-10' style='text-align:center;'>
						<p style="position:relative;top:calc(50% - 1ex);">Agencia:</p>
					</span>
					<select id='selAg' class='col-50 row-10'>
					</select>
					<span class='col-full row-05'></span>
					<span class='col-30 row-10'></span>
					<button class='bottoms col-40 row-10' onclick='postUser();'>Guardar</button>
					<span class='col-full row-05'></span>
				</span>
				<!-- Registro de Agente -->
			</span>

		</span>
		<!-- Finaliza bloque "admin_content_register" -->
		
		<span id="admin_content_edit" hidden>
			<!--EMPTY -->
			<p id="content-title" class="col-full row-10">Gestionar usuarios</p>
			<span id="content-block" class="col-full row-90">
				<span id="agent_edit">
					<span class='empty col-full row-05'></span>
					<span class='col-20 row-10'></span>
					<input id='st_search' class='login-input col-20 row-10' type='text'/>
					<select id="agency_select" class="login-input col-10 row-10"></select>
					<button class='bottoms col-10 row-10'
									onclick="populateContainerAgente('st_search','agency_select','tablinfo')">
						Buscar
					</button>
					<button class='bottoms col-10 row-10' onclick="editUser('e','tablinfo');">Editar</button>
					<button class='bottoms col-10 row-10' onclick='deleteUser()'>Eliminar</button>
					<span class='empty col-full row-05'></span>
					<table id='tablinfo' class='col-full' style='background:#333333'>
						<tr>
							<th>Agencia</th>
							<th>ID de Agente</th>
							<th>Nombre Clave</th>
							<th>Tipo de Agente</th>
						</tr>
					</table>
				</span>
			</span>
				<!-- Contenido de Registro para Admin -->
			</span>		
  </div>

	<div id="edit-user"  class="col-50 row-full" hidden>
		<button class="bottoms col-15 row-05" style="top:0;" onclick="this.parentElement.style.display='none';">Cancelar</button>
		<p id="edit_id" class="col-85 row-10" style="font-size:1.2em;">##########</p><br/><p class="col-full row-05"></p>
		<p class="col-40 row-10">Nombre Clave</p><input id="edit_name" class="col-50 row-10"/><p class="col-full row-05"></p>
		<p class="col-40 row-10">Tipo</p>
		<select id="edit_type" class="login-input col-50 row-10">
			<option value="0">Agente de Campo</option>
			<option value="1">Agente de Logística</option>
			<option value="2">Agente Administrativo</option>
		</select><p class="col-full row-05"></p>
		<p class="col-full row-05"></p>
		<button id="editbtn" class="bottoms col-full row-10">Actualizar</button>
	</div>
  <div id="notification" hidden></div>
	<div id="debug" hidden></div>
</body>
<script>
// populateContainterGET("fetchagencia","agency_select","Agencias");
</script>
