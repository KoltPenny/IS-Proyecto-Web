<!DOCTYPE html>
<html>
	<title>James Bond</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="/js/control.js"></script>
	<style>
	 html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}

	 table {
			 font-family: arial, sans-serif;
			 border-collapse: collapse;
			 width: 100%;
	 }

	 td, th {
			 border: 1px solid #dddddd;
			 text-align: left;
			 padding: 8px;
	 }

	 tr:nth-child(even) {
			 background-color: #dddddd;
	 }

	 #notification{position: fixed;bottom:0;width:100%;z-index:10;padding:15px;color:white;}
	 #notification p{font-weight:bold;font-size:1em; text-align:center; line-height:100%;}

	</style>
	<body class="w3-theme-l5">

		<!-- Navbar -->
		<div class="w3-top">
			<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
				<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
				<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Facebook">Bienvenido Agente James</a>
				<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"></a>
				<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"></a>
			</div>
		</div>

		<!-- Navbar on small screens -->
		<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
			<a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
			<a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
			<a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
			<a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
		</div>

		<!-- Page Container -->
		<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
			<!-- The Grid -->
			<div class="w3-row">
				<!-- Left Column -->
				<div class="w3-col m3">
					<!-- Profile -->
					<div class="w3-card w3-round w3-white">
						<div class="w3-container">
							<h4 class="w3-center">James Bond</h4>
							<p class="w3-center"><img src="avatar.png" style="height:250px;" alt="Avatar"></p>
							<hr>
							<p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Super Espía Secreto</p>
							<p><i class="fa fa-address-card-o fa-fw w3-margin-right w3-text-theme"></i>Id: 007</p>
							<p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>Vive en: Londres</p>
							<p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> 1953</p>
							<p><i class="fa fa-futbol-o fa-fw w3-margin-right w3-text-theme"></i>Hobby: espiar</p>
							<p><i class="fa fa-glass fa-fw w3-margin-right w3-text-theme"></i>Bebida favorita: martini</p>
						</div>
					</div>
					<br>

					<div class="w3-card w3-round w3-white w3-center">
						<div class="w3-container">
							<p>Habilidades</p>
							<p>
								<span class="w3-tag w3-small w3-theme">Es Guapo</span>
								<span class="w3-tag w3-small w3-theme-l1">Resistencia al alcohol</span>
								<span class="w3-tag w3-small w3-theme-l2">Es Guapo</span>
								<span class="w3-tag w3-small w3-theme-l3">Le gusta a las chicas</span>
								<span class="w3-tag w3-small w3-theme-l4">... Y a los chicos</span>
								<span class="w3-tag w3-small w3-theme-l5">Maneja en persecuciones</span>
							</p>
						</div>
						<br>
					</div><br>

					<div class="w3-card w3-round w3-white w3-center">
						<div class="w3-container">
							<h4>Cursos</h4>
							<p><strong>Francotirador</strong></p>
							<p><strong>Manejar en persecuciones</strong></p>
						</div>
						<br>
					</div><br>

					<!-- Interests -->
					<div class="w3-card w3-round w3-white w3-hide-small">
						<div class="w3-container">
							<p>Intereses</p>
							<p>
								<span class="w3-tag w3-small w3-theme-d5">Martinis</span>
								<span class="w3-tag w3-small w3-theme-d4">Martinis</span>
								<span class="w3-tag w3-small w3-theme-d3">Martinis</span>
								<span class="w3-tag w3-small w3-theme-d2">Martinis</span>
								<span class="w3-tag w3-small w3-theme-d1">Martinis</span>
								<span class="w3-tag w3-small w3-theme">Martinis</span>
								<span class="w3-tag w3-small w3-theme-l1">Martinis</span>
								<span class="w3-tag w3-small w3-theme-l2">Martinis</span>
								<span class="w3-tag w3-small w3-theme-l3">Martinis</span>
								<span class="w3-tag w3-small w3-theme-l4">Martinis</span>
								<span class="w3-tag w3-small w3-theme-l5">Martinis</span>
							</p>
						</div>
					</div>
					<br>

					<!-- End Left Column -->
				</div>

				<!-- Middle Column -->
				<div class="w3-col m7">

					<div class="w3-row-padding">
						<div class="w3-col m12">
							<div class="w3-card w3-round w3-white">
								<div class="w3-container w3-padding">
									<h3 class="w3-border w3-padding">Definir condiciones de fragmentación</h3>
								</div>
							</div>
						</div>
					</div>

					<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
						<h4>Relaciones</h4>
						<hr class="w3-clear">
						<div class="w3-row-padding" style="margin:0 -16px">
							<select
								id="relacion"
										class="w3-select"
										name="option"
										onchange="attrFill('getattrs2',this,'tabInicial')">
							</select>
							<br/><br/>
						</div>
					</div>

					<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
						<h4 id="tab">Tabla seleccionada</h4>
						<hr class="w3-clear">
						<div class="w3-row-padding" style="margin:0 -16px">

							<table id="tabInicial"></table>

							<br/><br/>
						</div>
					</div>
					
					<div class="w3-row-padding">
						<div class="w3-col m12">
							<div class="w3-card w3-round w3-white">
								<h3 class=" w3-padding">
									<button class="w3-button w3-dark-gray w3-block" onclick="projectionTable('tabInicial')">
										Generar </button>
								</h3>
							</div>
						</div>
					</div>
					
					<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
						<h5></h5>
						<hr class="w3-clear">
						<div class="w3-row-padding" style="margin:0 -16px">

							<table id="predicados"></table>
							<button class="w3-button w3-light-gray" onclick="clearTable('predicados')">Limpiar</button>
							<br/><br/>

							<br/><br/>
						</div>
					</div>


					<div class="w3-row-padding">
						<div class="w3-col m12">
							<div class="w3-card w3-round w3-white">
								<h3 class=" w3-padding">
									<button class="w3-button w3-dark-gray w3-block" onclick="sendToQuery()">Generar fragmentos</button>
								</h3>
							</div>
						</div>
					</div>


					<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
						<h5></h5>
						<hr class="w3-clear">
						<div class="w3-row-padding" style="margin:0 -16px">

							<table id="fragmentos"></table>
							<button class="w3-button w3-light-gray" onclick="clearTable('fragmentos')">Limpiar</button>

							<br/><br/>
							<!-- select	id="destino" class="w3-select">
									 <option value="192.168.43.168">Destino 1</option>
									 <option value="192.168.43.13">Destino 2</option>
							</select-->
							<input id="ip_dest" class="w3-input" placeholder="Dirección destino" />
							<input id="usr_dest" class="w3-input" placeholder="Usuario" />
							<input id="pwd_dest" class="w3-input" placeholder="Contraseña" />
							<br/><br/>
						</div>
					</div>

					<div class="w3-row-padding">
						<div class="w3-col m12">
							<div class="w3-card w3-round w3-white">
								<h3 class=" w3-padding">
									<button class="w3-button w3-teal w3-block" onclick="distributeToDB()">Enviar fragmentos</button>
								</h3>
							</div>
						</div>
					</div>

					<!-- End Middle Column -->
				</div>

				<!-- Right Column -->
				<div class="w3-col m2">
					<div class="w3-card w3-round w3-white w3-center">
						<div class="w3-container">
							<h3>Languages</h3>
							<p><strong>English (B2)</strong></p>
							<p><strong>Italiano (B1)</strong></p>
							<p><strong>Español (Native)</strong></p>
						</div>
					</div>
					<br>

					<div class="w3-card w3-round w3-white w3-center">
						<div class="w3-container">
							<p>Actores que lo interpretan</p>
							<img src="avatar2.jpg" alt="Avatar" style="width:50%"><br><br>
							<span class="w3-tag w3-small w3-theme-d5">Barry Nelson</span>
							<span class="w3-tag w3-small w3-theme-d4">Sean Connery</span>
							<span class="w3-tag w3-small w3-theme-d3">Roger Moore</span>
							<span class="w3-tag w3-small w3-theme-d2">George Lazenby</span>
							<span class="w3-tag w3-small w3-theme-d1">Tomothy Dalton</span>
							<span class="w3-tag w3-small w3-theme">Pierce Brosnan</span>
							<span class="w3-tag w3-small w3-theme-l1">Daniel Craig</span>
							<span class="w3-tag w3-small w3-theme-l2">George Baker</span>
							<span class="w3-tag w3-small w3-theme-l3">Bob Holness</span>
							<span class="w3-tag w3-small w3-theme-l4">Michael Jayston</span>
							<span class="w3-tag w3-small w3-theme-l5">David Niven</span>
						</div>
						<br>
					</div>

					<br>

					<div class="w3-card w3-round w3-white w3-center">
						<div class="w3-container">
							<p>Otras habilidades</p>
							<span class="w3-tag w3-small w3-theme">Tomar en</span>
							<span class="w3-tag w3-small w3-theme-l1">Exceso</span>
							<span class="w3-tag w3-small w3-theme-l2">Y no</span>
							<span class="w3-tag w3-small w3-theme-l3">morir</span>
							<span class="w3-tag w3-small w3-theme-l4">de un coma</span>
							<span class="w3-tag w3-small w3-theme-l5">etílico</span>
						</div>
						<br>
					</div><br>


					<br>

					<!-- End Right Column -->
				</div>

				<!-- End Grid -->
			</div>

			<!-- End Page Container -->
		</div>
		<br>

		<!-- Footer -->
		<footer class="w3-container w3-theme-d3 w3-padding-16">
			<h5>.</h5>
		</footer>

		<footer class="w3-container w3-theme-d5">
			<p> .</p>
		</footer>
		
		<div id="notification" class="w3-container w3-pink" hidden>
			<h5>Error:</h5>
			<p id="msg"></p>
		</div>

		<script>

		 //Globales
		 var attr_collection = [];
		 // Accordion
		 function myFunction(id) {
				 let x = document.getElementById(id);
				 if (x.className.indexOf("w3-show") == -1) {
						 x.className += " w3-show";
						 x.previousElementSibling.className += " w3-theme-d1";
				 } else {
						 x.className = x.className.replace("w3-show", "");
						 x.previousElementSibling.className =
								 x.previousElementSibling.className.replace(" w3-theme-d1", "");
				 }
		 }

		 // Used to toggle the menu on smaller screens when clicking on the menu button
		 function openNav() {
				 var x = document.getElementById("navDemo");
				 if (x.className.indexOf("w3-show") == -1) {
						 x.className += " w3-show";
				 } else {
						 x.className = x.className.replace(" w3-show", "");
				 }
		 }

		 /* FUNCIONES DE USUARIO */

		 //Llenar mensaje
		 function errormsg(msg) {
				 _error = document.getElementById("notification");
				 _msg = document.getElementById("msg");
				 _msg.innerHTML = msg;
				 _error.style.display = "block";
				 msg_timeout = setTimeout(function(){_error.style.display = "none";},2000);
		 }
		 //Llenado del selector de Agencia
		 populateContainerGET("gettables","relacion","Escoge una relación");
		 
		 //llenado de atributos
		 function attrFill(getter,sel,tab) {
				 populateContainerGETandTable2(getter,sel,tab);
				 document.getElementById("tab").innerHTML = sel.options[sel.selectedIndex].value;
		 }

		 //Generación de fragmentos a partir de la elección de atributos
		 function projectionTable(tab) {
				 let rows = document.getElementById(tab).rows;
				 let result_table = document.getElementById("predicados");
				 let list = [];

				 let row = result_table.insertRow(-1);
				 
				 for(let i = 0, cell; cell = rows[0].cells[i]; i++) {
						 if(cell.childNodes[1].checked == true) {
								 
								 list.push(cell.childNodes[0].innerHTML);
						 };
				 }
				 
				 let celldesc = row.insertCell(0)
				 let cellnum = row.insertCell(0);
				 celldesc.innerHTML = "∏( "+list.join()+" )";
				 celldesc.style.textAlign = "center";
				 cellnum.innerHTML = cellnum.parentNode.rowIndex+1;
				 cellnum.style.textAlign = "center";

				 attr_collection.push(list);
				 console.log(attr_collection);
		 }

		 //Llenado de tabla de predicados
		 function fillPredTable(tab) {
				 var attr = document.getElementById("atributos");
				 var op = document.getElementById("operador");
				 var val = document.getElementById("valor");
				 var table = document.getElementById(tab);
				 var boo = true;
				 var attrs = attr.options[attr.selectedIndex];
				 var ops = op.options[op.selectedIndex];
				 
				 [attr,op,val].forEach(function(elem) {
						 if (elem.value=="") {
								 boo = false;
								 console.log(elem);
								 selectIncorrect(elem);
						 }
				 });
				 if (boo == false) { processError("Hay algún elemento vacío."); return;}

				 
				 var row = table.insertRow(-1);
				 row.insertCell(0).innerHTML = val.value;
				 row.insertCell(0).innerHTML = op.value;
				 row.insertCell(0).innerHTML = attrs.value;
				 row.insertCell(0).innerHTML = "P"+row.rowIndex;
				 row.insertCell(0).innerHTML = "<input type='checkbox'/>";
				 
		 }

		 function htmlDecode(input){
				 var e = document.createElement('div');
				 e.innerHTML = input;
				 return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
		 }

		 function sendToQuery() {
				 let tab = document.getElementById("predicados");
				 let sel = document.getElementById("relacion");
				 let rel = sel.options[sel.selectedIndex].value;
				 let lst = {"name":rel,"body":[]};
				 for(let i = 0, row; row = tab.rows[i] ; i++) {
						 
						 let cells = row.cells;
						 
						 if(cells[0].firstElementChild.checked == true) {
								 lst.body.push({
										 "pNum":cells[1].innerHTML,
										 "attr":cells[2].innerHTML,
										 "op":htmlDecode(cells[3].innerHTML),
										 "val":cells[4].innerHTML
								 });
						 }
						 console.log(lst.body);
				 }

				 let xhttp = new XMLHttpRequest();
				 tab = document.getElementById("fragmentos");
				 xhttp.onreadystatechange = function() {
						 if (this.readyState == 4 && this.status == 200) {
								 let r = this.responseText;
								 if(r=="100") {
										 console.log("Es necesario elegir exactamente dos elementos.");
								 }
								 else if(r=="101") {
										 errormsg("No hay elementos en la relación.");
								 }
								 else {
										 let json = JSON.parse(r);
										 let row = null;
										 clearTable('fragmentos');
										 console.log(json);
										 json.forEach((element) =>{
												 row = tab.insertRow(-1);
												 for(let i = element.length-1; i>=0; i--) {
														 row.insertCell(0).innerHTML = element[i];
												 }
										 });
								 }
						 }
				 }
				 xhttp.open("POST","control.php?view=jsonQuery", true);
				 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				 xhttp.send("json="+JSON.stringify(lst))
		 }

		 function distributeToDB()
		 {
				 let tab = document.getElementById("fragmentos");
				 let eel = document.getElementById("relacion");
				 let ele = eel.options[eel.selectedIndex].text;
				 let ipd = document.getElementById("ip_dest");
				 let usd = document.getElementById("usr_dest");
				 let pwd = document.getElementById("pwd_dest");

				 //Verificar elementos vacíos
				 [ipd,usd,pwd].forEach(function(elem) {
						 if (elem.value=="") {
								 boo = false;
								 console.log(elem);
								 selectIncorrect(elem);
						 }
				 });
				 if (boo == false) { processError("Hay algún elemento vacío."); return;}
				 
				 let lst = {"name":ele,"ip":ipd.value,"usr":usd.value,"pwd":pwd.value,"body":[]};
				 
				 for(let i = 0, row; row = tab.rows[i] ; i++) {
						 
						 lst.body.push([]);
						 for(let j = 0, cell; cell = row.cells[j] ; j++)
								 {
										 if(Number.isInteger(cell.innerHTML)) lst.body[i].push(cell.innerHTML);
										 else lst.body[i].push("'"+cell.innerHTML+"'");
								 }
				 }
				 console.log(lst);
				 
				 let xhttp = new XMLHttpRequest();
				 tab = document.getElementById("fragmentos");
				 xhttp.onreadystatechange = function() {
						 if (this.readyState == 4 && this.status == 200) {
								 let r = this.responseText;
								 if(r=="100") {
										 console.log("Es necesario elegir exactamente dos elementos.");
								 }
								 else if(r=="101") {
										 errormsg("No hay elementos en la relación.");
								 }
								 else {
										 let json = JSON.parse(r);
										 let row = null;
										 clearTable('fragmentos');
										 console.log(json);
										 json.forEach((element) =>{
												 row = tab.insertRow(-1);
												 for(let i = element.length-1; i>=0; i--) {
														 row.insertCell(0).innerHTML = element[i];
												 }
										 });
								 }
						 }
				 }
				 xhttp.open("POST","control.php?view=serverSend", true);
				 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				 xhttp.send("json="+JSON.stringify(lst))
		 }
		</script>
		
	</body>
</html>
