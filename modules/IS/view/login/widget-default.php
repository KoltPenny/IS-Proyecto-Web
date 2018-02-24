<body>
	<div id="main-header" class="row-20 col-full">
		<img class="main-logo col-20" src="img/ipn_logo-slogan.png" style="margin-top:5vh;margin-left:3vw;"/>
		<img class="main-logo col-20" src="img/sep_logo-gob.png" style="float:right;margin-top:3vh;margin-right:3vw;"/>
	</div>
	<div id="saes-container" class="row-30 col-25"><img class="col-50" src="img/saes-logo.png" style="left:25%;" /></div>
	<span id="login_form" class="row-30 col-50 login-container">
		
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
		<select id="type_select" class="w3-select col-70 row-25" name="Tipo">
			<option value="" disabled selected>--</option>
			<option value="0">Estudiante</option>
			<option value="1">Docente (académico/profesor)</option>
			<option value="2">Gestión Escolar</option>
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
	
	<div id="captcha" class="col-25 row-30">
	</div>
	<div id="rest" class="col-full row-50"></div>
	</div>
	<div id="notification" hidden></div>
	<div id="debug" hidden></div>
</body>
