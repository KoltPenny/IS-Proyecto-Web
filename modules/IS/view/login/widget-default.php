<body>
	<div id="main-header" class="row-30 col-full">
		<!--img class="main-logo col-20" src="img/ipn_logo-slogan.png" style="margin-top:5vh;margin-left:3vw;"/>
		<img class="main-logo col-20" src="img/sep_logo-gob.png" style="float:right;margin-top:3vh;margin-right:3vw;"/-->
		<p>Unified Spy Repository</p>
	</div>
	<div class="filler row-30 col-25"></div>
	<span id="login_form" class="filler row-30 col-50 login-container">
		
		<input id="name" class="login-input col-90 row-25" type="text" placeholder="Usuario"/>
		<div id="infoblock"
				 class="col-10 row-25"
				 onclick="processNeutral('El usuario debe tener exactamente 10 caracteres')">
			<p>?</p>
		</div>
		<span class="col-full row-10"></span>
		<input id="pwd" class="login-input col-90 row-25" type="password" placeholder="Contraseña"/><br/>
		<div id="infoblock"
				 class="col-10 row-25"
				 onclick="processNeutral('La contraseña sólo puede contener letras, números y puntos.')">
			<p>?</p>
		</div>
		<span class="col-full row-10"></span>
		<select id="agency-select" class="w3-select col-20 row-25" name="Tipo">
		</select>
		<select id="type_select" class="w3-select col-50 row-25" name="Tipo">
			<option value="" disabled selected>--</option>
			<option value="0">Agente de Campo</option>
			<option value="1">Agente de Logística</option>
			<option value="2">Administrador</option>
		</select>
		<button id="ingresar" class="col-30 row-25" value="Ingresar" onclick="processPost()">Ingresar</button>
		<!-- p id="forgot" onclick="document.getElementById('login_form').style.display='none';document.getElementById('recover_form').style.display='inline';"><u>Olvidé mi contraseña</u></p-->
	</span>

	<span id="recover_form" class="row-30 col-50 login-container" hidden>
		<p>Escribe tu correo para recuperar contraseña:</p><br/>
		<input id="correo_rec" class="login-input col-full row-25" type="text" placeholder="correo"/>
		<span class="col-full row-10"></span>
		<button id="ingresar" class="col-30 row-25" value="Enviar" onclick="recoverPass()">Ingresar</button>
		<p id="forgot" onclick="document.getElementById('recover_form').style.display='none';document.getElementById('login_form').style.display='inline';"><u>Regresar</u></p>
	</span>
	
	<div class="filler col-25 row-30">
	</div>
	<div id="rest" class="col-full row-40"></div>
	</div>
	<div id="notification" hidden></div>
	<div id="debug" hidden></div>
</body>
<script>
 var xhttp = new XMLHttpRequest();
 
 xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
				 response = this.responseText;
				 var text = "<option value='' disabled selected>--</option>";
				 document.getElementById("agency-select").innerHTML = text+response;
				 if(response=="error") processError("Falló la creación del grupo.");
				 else if (response=="success") processSuccess("Éxito al crear horario.");
				 else if (response==1062) processError("El grupo ya tiene horario.");
		 }
 }

 xhttp.open("GET", "control.php?view=agencias", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send();
</script>
