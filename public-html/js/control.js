var msg_timeout;

function processError(error_msg) {
	clearTimeout(msg_timeout);
	_error = document.getElementById("notification");
	_error.style.background = "#ff7777";
	_error.innerHTML = "<p>".concat(error_msg,"</p>");
	_error.style.display = "block";
	msg_timeout = setTimeout(function(){_error.style.display = "none";},2000);
}

function processSuccess(success_msg) {
	clearTimeout(msg_timeout);
	_success = document.getElementById("notification");
	_success.style.background = "#77ff77";
	_success.innerHTML = "<p>".concat(success_msg,"</p>");
	_success.style.display = "block";
	msg_timeout = setTimeout(function(){_success.style.display = "none";},2000);
}

function processNeutral(neutral_msg) {
	clearTimeout(msg_timeout);
	_neutral = document.getElementById("notification");
	_neutral.style.background = "#88aaff";
	_neutral.innerHTML = "<p>".concat(neutral_msg,"</p>");
	_neutral.style.display = "block";
	msg_timeout = setTimeout(function(){_neutral.style.display = "none";},2000);
}

function selectIncorrect(element) {
	element.style.border="4px solid #ff7777";
	setTimeout(function(){element.style.border = "none";},6000);
}

function cleanInput() {
	regex='';
	
	if(arguments[0]=='email') regex = new RegExp('^([a-zA-Z0-9_\\-\\.]+)@([a-zA-Z0-9]+)\\.([a-zA-Z]{2,10})$');
	else if(arguments[0]=='name') regex = new RegExp('^[a-zA-Z0-9\\u00C0-\\u024F\\s]+$');
	else if(arguments[0]=='studentid') regex  = new RegExp('^([a-zA-Z0-9]{2})([0-9]{8}$)');
	else if(arguments[0]=='agent') regex  = new RegExp('^[a-zA-Z0-9]{1,10}');
	else if(arguments[0]=='empid') regex  = new RegExp('^([a-zA-Z0-9]{2})([0-9]{8}$)');
	else if(arguments[0]=='login') regex  = new RegExp('^[a-zA-Z0-9\\.]+$');
	else if(arguments[0]=='acad') regex  = new RegExp('^([A-Z]{1})([0-9]{3})$');
	else if(arguments[0]=='float') regex  = new RegExp('^([0-9]{1,2})\\.([0-9]{1,2})$');
	else if(arguments[0]=='group') regex  = new RegExp('^([0-9]{1,2})(CM|CV)([0-9]{1,2})$');
	if (!regex) { alert("Error"); return; }
	bool = true;
	for(i=1;i<arguments.length;i++) {	bool = bool && regex.test(arguments[i]);	}
	return bool;

}

function loginPost(usr,pwd,selected,selectag) {
	
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if(this.responseText=="failed")	processError("La contraseña, el identificador, agencia y/o el tipo es incorrecto.");
			//alert(this.responseText);
			else  window.location.reload();
			
		}
	};
	xhttp.open("POST", "control.php?view=processlogin",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("usr_id=".concat(usr,"&password=",pwd,"&type=",selected,"&agen=",selectag));
}

function processPost() {
	usrel = document.getElementById("name");
	pwdel = document.getElementById("pwd");
	selectedel = document.getElementById("type_select");
	selectagen = document.getElementById("agency-select");
	
	usr = usrel.value;
	pwd = pwdel.value;
	selected = selectedel.value;
	selectag = selectagen.value;
	
	if(usr=="" || pwd=="" || selected =="" || selectag=="") {
		
		processError("Llena los datos faltantes.");
		if(usr=="") selectIncorrect(usrel);
		if(pwd=="") selectIncorrect(pwdel);
		if(selected=="") selectIncorrect(selectedel);
		if(selectag=="") selectIncorrect(selectagen);
		
	}
	else if (usr!=="" && pwd!=="" && selected!=="") {
		
		if(!cleanInput('login',usr,pwd)){ processError("Los campos sólo puede contener letras o números."); return; }
		loginPost(usr,pwd,selected,selectag);
		
	}
}

/*Templates*/



function selectedElement(el) {
	//selector = el.parentElement.querySelector('#content-selector');
	if (el.selectedIndex == 1) {
		//el.parentElement.querySelector('#content-block').children[2].style.display="none";
		el.parentElement.querySelector('#content-block').children[1].style.display="none";
		el.parentElement.querySelector('#content-block').children[0].style.display="inline";
	}
	else if (el.selectedIndex == 2) {
		el.parentElement.querySelector('#content-block').children[1].style.display="inline";
		el.parentElement.querySelector('#content-block').children[0].style.display="none";
	}
}

function changeView(index) {
	element = document.getElementById('choices');
	display = document.getElementById('DISPLAY');
	count = element.children.length;
	for(i=0;i<count;i++) {
		if(i===index) {
			display.children[i].style.display="inline";
		}
		else {
			display.children[i].style.display="none";
		}
	}
}

function postUser() {
		var user={
			id:[document.getElementById('userid'),false],
			nPila:[document.getElementById('nomClave'),false],
			pass:[document.getElementById('userpass'),true],
			type:[document.getElementById('type').options[document.getElementById('type').selectedIndex],true],
			selA:[document.getElementById('selAg').options[document.getElementById('selAg').selectedIndex],true]};
	
	user.id[1] = cleanInput('agent',user.id[0].value);

	bool = (function() {
		B="i";for(x in user) {

			B=B&&user[x][0].value;
			if(user[x][0].value=="") {
				selectIncorrect(user[x][0]);
			}} return new Boolean(B);})();

	
	if(bool==false){ processError("Rellena los campos faltantes.");
									 document.getElementById('reference').parentNode.parentNode.scrollTop=0;return;
								 }

	user.nPila[1] = cleanInput('name',user.nPila[0].value);
	user.pass[1] = cleanInput('login',user.pass[0].value);
	
	bool = (function(){b=true; for(x in user) { if(user[x][1]==false) { b=false;selectIncorrect(user[x][0]); }}return b;})();

	if(bool==false){
		processError("Los datos en rojo no son válidos.");
		return;
	}
	
	var xhttp = new XMLHttpRequest();
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
			
			var response = this.responseText;
			
			if(response=="error") processError("Falló la creación del usuario.");
			else if (response=="success") processSuccess("Éxito al crear usuario.");
			else if (response==1062) processError("El usuario ya existe.");
		}
	}
	console.log(user.pass[0].value);
	xhttp.open("POST", "control.php?view=addagente", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("agen="+user.selA[0].text+
						 "&id="+user.id[0].value+
						 "&name="+user.nPila[0].value+
						 "&pass="+user.pass[0].value+
						 "&type="+user.type[0].value);
}

function postMateria() {

	var materia={
		unidadap:[document.getElementById('UnidadAp'),false],
		unidadacad:[document.getElementById('UnidadAcad'),false],
		nombrem:[document.getElementById('nombreM'),false],
		hrs_prac:[document.getElementById('hrs_prac'),false],
		hrs_teo:[document.getElementById('hrs_teo'),true],
		tipoasig:[document.getElementById('tipoAsig'),false],
		creditos:[document.getElementById('creditos'),false],
		nivel:[document.getElementById('nivel'),false]};
	
	materia.unidadap[1] = cleanInput('acad',materia.unidadap[0].value);

	bool = (function(){B="i";for(x in materia){
		B=B&&materia[x][0].value;
		if(materia[x][0].value=="") {
			selectIncorrect(materia[x][0]);
		}
	} return new Boolean(B);})();
	
	if(bool==false){
		processError("Rellena los campos faltantes.");
		document.getElementById('reference').parentNode.parentNode.scrollTop=0;
		return;
	}

	materia.unidadacad[1] = cleanInput('name',materia.unidadacad[0].value);
	materia.nombrem[1] = cleanInput('name',materia.nombrem[0].value);
	user.hrs_prac[1] = cleanInput('float',materia.hrs_prac[0].value);
	user.hrs_teo[1] = cleanInput('float',materia.hrs_teo[0].value);
	user.creditos[1] = cleanInput('creditos',materia.creditos[0].value);
	
	bool = (function(){b=true; for(x in materia) { if(materia[x][1]==false) { b=false;selectIncorrect(materia[x][0]); }}return b;})();

	if(bool==false){ processError("Los datos en rojo no son válidos.");document.getElementById('content-block').scrollTop=0;return; }
	
	var xhttp = new XMLHttpRequest();
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			var response = this.responseText;

			if(response=="error") processError("Falló la creación de la materia.");
			else if (response=="success") processSuccess("Éxito al crear la materia.");
			else if (response==1062) processError("La materia ya existe.");
		}
	}
	xhttp.open("POST", "control.php?view=addmateria", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("unidadap="+materia.unidadap+"&unidadacad="+materia.unidadacad+"&nombrem="+materia.nombrem+"&hrs_prac="+materia.hrs_prac+"&hrs_teo="+materia.hrs_teo+"&tipoasig="+materia.tipoasig+"&creditos="+materia.creditos+"&nivel="+materia.nivel);
}

function postGrupo() {
	
	var nombreG = document.getElementById('nombreG');	
	var xhttp = new XMLHttpRequest();

	if(nombreG.value==""){selectIncorrect(nombreG);processError("El campo está vacío.");return;}
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
			if(this.responseText=="error") {
				processError("Falló el registro de grupo.");
			} else if (this.responseText==1062){
				processError("Ya existe el grupo.");
			} else if (this.responseText=="success"){
				processSuccess("Éxito al registrar grupo.");
			}
		}
	}
	xhttp.open("POST", "control.php?view=addgrupo", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("nombreG=".concat(nombreG.value));
}


function populateContainerGET(getter,container,container_text) {
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
			if(this.responseText=="error") { processError("Hubo un error"); return;}
			var text = "<option value='' disabled selected>"+container_text+"</option>";
			document.getElementById(container).innerHTML = text+this.responseText;
			console.log(this.responseText);
		}
	}
	xhttp.open("GET","control.php?view="+getter, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
}
function populateContainerGETandTable(getter,container,container_text,sel,tab) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
			if(this.responseText=="error") { processError("Hubo un error"); return;}
			var table = document.getElementById(tab);
			var elements = document.getElementById(container);
			
			var text = "<option value='' disabled selected>"+container_text+"</option>";
			elements.innerHTML = text+this.responseText;
			console.log(this.responseText);

			if(table.rows.length>0)	table.deleteRow(0);
			console.log(elements.options.length);
			var row = table.insertRow(-1);
			for (i = 1; i <= elements.options.length-1; i++) {
				row.insertCell(0).innerHTML = elements.options[i].value;
				console.log(i);
			}
			
		}
	}
	xhttp.open("GET","control.php?view="+getter+"&id="+sel.options[sel.selectedIndex].innerHTML, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
}

function populateContainerPOST(getter,container,element) {
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
			var table = document.getElementById(container);
			var json = JSON.parse(this.responseText);
			
			if(table.rows.length>1)	table.deleteRow(1);
			
			for(i=0;i<json.row.length;i++) {
				var row = table.insertRow(-1);
				for(j=0;j<json.row[i].length;j++) {
					row.insertCell(j).innerHTML = json.row[i][j];
				}}}}
	
	xhttp.open("POST",getter, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("unidadap=".concat(element));
}

function populateContainerEstudiante(getter,container) {
	
	var xhttp = new XMLHttpRequest();
	var element = document.getElementById(getter).value;
	if(element==""){ selectIncorrect(document.getElementById(getter));processError("El campo está vacío"); return;}
	console.log(element);
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
			if(this.responseText=="failed") {
				processError("Falló la carga del estudiante. La boleta "+element+" no se encuentra en la base.");
				return;
			}
			else{
				
				var table = document.getElementById(container);
				var json = JSON.parse(this.responseText);
				console.log(table);

				if(table.rows.length>1)	table.deleteRow(1);

				for(i=0;i<json.row.length;i++) {
					var row = table.insertRow(-1);
					for(j=0;j<json.row[i].length;j++) {
						row.insertCell(j).innerHTML = json.row[i][j];
					}
				}
			}
		}
	}
	
	xhttp.open("POST","control.php?view=fetchstudent", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+element);
}

function populateContainerAgente(getter,select,container) {
	
	var xhttp = new XMLHttpRequest();
	var idAgente = document.getElementById(getter).value;
	var agencia='';
	if(select!='') {
		agencia = document.getElementById(select);
		agencia = agencia.options[agencia.selectedIndex].text;
	}
	
	if(idAgente==""){processError("El campo está vacío."); return;}
	if(agencia=="Agencias"){ processError("No has seleccionado ninguna agencia."); return;}
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			if(this.responseText=="failed") {
				processError("Falló la carga del agente.");
				return;
			}
			else{

				console.log(this.responseText);
				
				var table = document.getElementById(container);
				var json = JSON.parse(this.responseText);

				if(table.rows.length>1)	table.deleteRow(1);

				for(i=0;i<json.row.length;i++) {
					var row = table.insertRow(-1);
					for(j=0;j<json.row[i].length;j++) {
						
						if(json.row[i][j]=="2") row.insertCell(j).innerHTML = "Agente Administrativo";
						else if(json.row[i][j]=="1") row.insertCell(j).innerHTML = "Agente de logística";
						else if(json.row[i][j]=="0") row.insertCell(j).innerHTML = "Agente de campo";
						else row.insertCell(j).innerHTML = json.row[i][j];
						
					}
				}
			}
		}
	}
	
	xhttp.open("POST","control.php?view=fetchagente", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+idAgente+"&agencia="+agencia);
}

function deleteMateria() {
	var element = document.getElementById('materia_selection').options[document.getElementById('materia_selection').selectedIndex].text;

	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			if(this.responseText=="success") {
				processSuccess("Se ha eliminado la materia.");
				populateContainerGET('control.php?view=getmateria','materia_selection');
			}
			else if(this.responseText=="failed") processError("Error al eliminar materia.");
			
		}
	}
	xhttp.open("POST","control.php?view=deletemateria", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("unidadap=".concat(element));	
}

function deleteGrupo() {
	var element = document.getElementById('clavegg').options[document.getElementById('clavegg').selectedIndex].text;

	var verify = document.getElementById('clavegg').options[document.getElementById('clavegg').selectedIndex];
	var grupo = {	nombre:verify.value,	content:new Map()};

	var bool=true;

	if(grupo.nombre=="") {processError("Seleccione un grupo.");selectIncorrect(document.getElementById('clavegg')); bool=false;}

	if(!bool) return;

	if(confirm("Está seguro que quiere eliminar grupo: "+ element + "?")){
		var xhttp = new XMLHttpRequest();
		if(!(element)) { processError("Falta algún dato."); return;}

		xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {

				if(this.responseText=="success") {
					processSuccess("Se ha eliminado el grupo.");
					populateContainerGET('getgroup','clavegg','Seleccione grupo');
				}
				else if(this.responseText=="failed") processError("Error al eliminar grupo.");
				
			}
		}
		xhttp.open("POST","control.php?view=deletegrupo", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("nomGrupo=".concat(element));	
	}
}

function deleteUser(){
	
	table = document.getElementById('tablinfo');
	if(table.rows.length>1)	{
		
		var agen = table.rows[1].cells[0].innerHTML;
		var id = table.rows[1].cells[1].innerHTML;

		var xhttp = new XMLHttpRequest();
		
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				if(this.responseText=="success") {
					processSuccess("Se ha eliminado el usuario.");
					table.deleteRow(1);
				}
				else if(this.responseText=="failed") processError("Error al eliminar usuario.");
				else if(this.responseText=="denied") processError("No se puede eliminar al usuario propio.");
			}
		}
		xhttp.open("POST","control.php?view=deleteagente", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("agen="+agen+"&id="+id);
	}
	else { processError("No hay un agente seleccionado."); }
	
}
function editUser(usr,container) {

	var table = document.getElementById(container);
	var editwindow = document.getElementById('edit-user');
	var usr_t = null;

	if(table.rows.length==1){
		processError("No hay ningún agente seleccionado.");
		return;
	}
	for(opt in usr_t) {	select.appendChild(usr_t[opt]); }

	cells = table.rows[1].cells;

	editwindow.style.display="inline";
	document.getElementById('edit_id').innerHTML=cells[1].innerHTML;
	document.getElementById('edit_name').setAttribute("value",cells[2].innerHTML);
	document.getElementById('editbtn').setAttribute("onclick","updateUser();");
}

function editMateria(container) {

	var table = document.getElementById(container);
	var editwindow = document.getElementById('edit-materia');
	var select_t = document.getElementById('edit_tas');
	var select_l = document.getElementById('edit_lvl');
	var select_m = document.getElementById('materia_selection');
	var usr_t = null;
	
	if(table.rows.length==1){
		processError("No hay materias seleccionadas");
		return;
	}

	tas=[];lvl=[];
	
	for(i=0;i<2;i++)tas.push(document.createElement("option"));
	for(i=0;i<6;i++)lvl.push(document.createElement("option"));
	
	tas[0].appendChild(document.createTextNode("obligatoria"));
	tas[1].appendChild(document.createTextNode("optativa"));
	
	for(i=0;i<6;i++)lvl[i].appendChild(document.createTextNode(i+1));

	for(opt in tas) {	select_t.appendChild(tas[opt]); }
	for(opt in lvl) {	select_l.appendChild(lvl[opt]); }
	
	cells = table.rows[1].cells;

	editwindow.style.display="inline";
	document.getElementById('edit_id').innerHTML=cells[0].innerHTML;
	document.getElementById('edit_tas').setAttribute("value",cells[1].innerHTML);
	document.getElementById('edit_nom').setAttribute("value",cells[2].innerHTML);
	document.getElementById('edit_uacad').setAttribute("value",cells[3].innerHTML);
	document.getElementById('edit_hp').setAttribute("value",cells[4].innerHTML);
	document.getElementById('edit_ht').setAttribute("value",cells[5].innerHTML);
	document.getElementById('edit_cr').setAttribute("value",cells[6].innerHTML);
	document.getElementById('edit_lvl').setAttribute("value",cells[7].innerHTML);
	document.getElementById('editbtn').setAttribute("onclick","updateMateria();populateContainerPOST('control.php?view=fetchmateria','tablein',document.getElementById('materia_selection').options[document.getElementById('materia_selection').selectedIndex].text);");

}

function updateUser(usr) {

	id=document.getElementById('edit_id').innerHTML;
	ty=document.getElementById('edit_type').options[document.getElementById('edit_type').selectedIndex];
	ag=document.getElementById('tablinfo').rows[1].cells[0].innerHTML;

	if(ty.value=="") { selectIncorrect(ty); processError(""); }

	var xhttp = new XMLHttpRequest();
	var user={np:document.getElementById('edit_name')};
	
	if((function(){	b="i";	for(x in user) b=b&&user[x].value; return b; })() == "") {
		processError("Rellena los datos faltantes.");
		for(x in user) if(user[x].value=="") selectIncorrect(user[x]);
		return;
	}

	var bool = true;

	if(!cleanInput('name',user.np.value)){selectIncorrect(user.np);bool=false}

	if(!bool) { processError("Los datos en rojo no son válidos.");return; }


	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText=="success") {
				processSuccess("Usuario actualizado.");
				populateContainerAgente('st_search','agency_select','tablinfo');
			}
			else if(this.responseText=="failed") { processError("Hubo un error al actualizar al usuario."); }
		}
	}
	
	xhttp.open("POST","control.php?view=editagente", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("agen="+ag+"&id="+id+"&name="+user.np.value+"&type="+ty.value);
}

function updateMateria() {

	id=document.getElementById('edit_id').innerHTML;
	
	var xhttp = new XMLHttpRequest();
	var materia={
		ua:document.getElementById('edit_uacad'),
		nm:document.getElementById('edit_nom'),
		hp:document.getElementById('edit_hp'),
		ht:document.getElementById('edit_ht'),
		cr:document.getElementById('edit_cr'),
		ts:document.getElementById('edit_tas').options[document.getElementById('edit_tas').selectedIndex],
		lv:document.getElementById('edit_lvl').options[document.getElementById('edit_lvl').selectedIndex]};
	
	if((function(){	b="i";	for(x in materia) b=b&&materia[x].value; return b; })() == "") {
		processError("Falta llenar algún campo.");
		for(x in materia) if(materia[x].value=="") selectIncorrect(materia[x]);
		return;
	}

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText=="success") { processSuccess("Asignatura actualizada."); }
			else if(this.responseText=="failed") { processError("Hubo un error al actualizar la asignatura."); }
		}}
	
	xhttp.open("POST","control.php?view=editmateria", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("unidadap="+id+
						 "&unidadacad="+materia.ua.value+
						 "&hrs_prac="+materia.hp.value+
						 "&hrs_teo="+materia.ht.value+
						 "&tipoasig="+materia.ts.value+
						 "&nombrem="+materia.nm.value+
						 "&creditos="+materia.cr.value+
						 "&nivel="+materia.lv.value);
}

function recoverPass() {
	var xhttp = new XMLHttpRequest();
	var element = document.getElementById('correo_rec').value;

	if(element==""){processError("Campo vacío.");return;}

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			if(this.responseText=="success") {
				processSuccess("Se ha enviado el correo.");
			}
			else if(this.responseText=="failed") processError("El correo no pertenece a ningún usuario.");
		}
	}
	xhttp.open("POST","control.php?view=sendmail", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("email=".concat(element));
}

function logoutUser() {	window.location='control.php?view=logout'; }

/*OH DAE YOUNG -- BEGIN -- */

function asignar(i){
	if(i==0)
		return "07:00 - 08:30"; 
	else if(i==1)
		return "08:30 - 10:00"; 
	else if(i==2)
		return "10:30 - 12:00"; 
	else if(i==3)
		return "12:00 - 13:30"; 
	else if(i==4)
		return "13:30 - 15:00";
}

function postHorario(){
var xhttp = new XMLHttpRequest();
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

		//var response = this.responseText;
		//console.log(this.responseText);
		if (this.responseText=="success"){
				processSuccess("Éxito al crear horario.");
		}else if(this.responseText=="error"){
			processError("Falló la creación del grupo.");
		}else if (this.responseText==1062) 
			processError("El grupo ya tiene horario.");
	 	for(var i=0;i<5;i++){
			for(var k=0;k<5;k++){
				x[k][i]=null;
				document.getElementById("".concat(k,i)).innerHTML = "";
			}
		}
	}
  }
	xhttp.open("POST", "control.php?view=addHgrupo", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
}

var x = [];
for(var j=0; j<5; j++) {
  x[j] = [];
}

function cartHorario(){
  var UnidadAp = document.getElementById('clave').options[document.getElementById('clave').selectedIndex].text;
  var profesor = document.getElementById('prof').options[document.getElementById('prof').selectedIndex].text.split(" ")[0];
  var nomGrupo = document.getElementById('claveg').options[document.getElementById('claveg').selectedIndex].text;
  var lunes="";
  var martes="";
  var miercoles="";
  var jueves="";
  var viernes="";

	var sel_mat = document.getElementById('clave').options[document.getElementById('clave').selectedIndex];
	var sel_prof = document.getElementById('prof').options[document.getElementById('prof').selectedIndex];

	var materia = {	nombre:sel_mat.value,	content:new Map()};
	var prof = {nombre:sel_prof.value,content:new Map()};

	var bool=true;

	if(materia.nombre=="") {processError("Falta por seleccionar algún elemento.");selectIncorrect(document.getElementById('clave')); bool=false;}
	if(prof.nombre=="") {processError("Falta por seleccionar algún elemento.");selectIncorrect(document.getElementById('prof'));bool=false;}

	if(!bool) return;
	
	for(var i=0;i<5;i++){
		if(document.getElementsByName("tiempo0")[i].checked){
			if(x[0][i])
				processError("El horario se duplica.");
			else{
		    x[0][i]=document.getElementById('clave').options[document.getElementById('clave').selectedIndex].text;
		    document.getElementById("0".concat(i)).innerHTML = x[0][i];
		    lunes = asignar(i);
		    document.getElementsByName("tiempo0")[i].checked=false;
	    }
	  }
		if(document.getElementsByName("tiempo1")[i].checked){
			if(x[1][i])
				processError("El horario se duplica.");
			else{
		    x[1][i]=document.getElementById('clave').options[document.getElementById('clave').selectedIndex].text;
		    document.getElementById("1".concat(i)).innerHTML = x[1][i];
		    martes = asignar(i);
		    document.getElementsByName("tiempo1")[i].checked=false;
	    }
	  }
	  if(document.getElementsByName("tiempo2")[i].checked){
	    if(x[2][i])
				processError("El horario se duplica.");
			else{
		    x[2][i]=document.getElementById('clave').options[document.getElementById('clave').selectedIndex].text;
		    document.getElementById("2".concat(i)).innerHTML = x[2][i];
		    miercoles = asignar(i);
		    document.getElementsByName("tiempo2")[i].checked=false;
	    }
	  }
	  if(document.getElementsByName("tiempo3")[i].checked){
	    if(x[3][i])
				processError("El horario se duplica.");
			else{
		    x[3][i]=document.getElementById('clave').options[document.getElementById('clave').selectedIndex].text;
		    document.getElementById("3".concat(i)).innerHTML = x[3][i];
		    jueves = asignar(i);
		    document.getElementsByName("tiempo3")[i].checked=false;
	    }
	  }
	  if(document.getElementsByName("tiempo4")[i].checked){
	    if(x[4][i])
				processError("El horario se duplica.");
			else{
		    x[4][i]=document.getElementById('clave').options[document.getElementById('clave').selectedIndex].text;
		    document.getElementById("4".concat(i)).innerHTML = x[4][i];
		    viernes = asignar(i);
		    document.getElementsByName("tiempo4")[i].checked=false;
	    }
	  }
	}

	var xhttp = new XMLHttpRequest();
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			var response = this.responseText;

			if(response=="error") processError("Falló la creación del grupo.");
			else if (response=="success") processSuccess("Éxito al crear horario.");
			else if (response==1062) processError("El grupo ya tiene horario.");
		}
	}

	xhttp.open("POST", "control.php?view=cartH", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("nombreG=".concat(nomGrupo,"&UnidadAp=",UnidadAp,"&profesor=",profesor,"&lunes=",lunes,"&martes=",martes,"&miercoles=",miercoles,"&jueves=",jueves,"&viernes=",viernes));  
}

function postGrupo() {

	var grup =document.getElementById('nombreG');
	var nombreG = document.getElementById('nombreG').value;

	var nombreG_check = cleanInput('group',nombreG);
	
	if(!(nombreG)) {
		selectIncorrect(grup);
		processError("Ingresa un nombre de grupo."); return;}
	if(!nombreG_check)
	{
		processError("El formato de nombre es incorrecto.");
		return;
	}
	
	var xhttp = new XMLHttpRequest();
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			var response = this.responseText;

			if(response=="error") processError("Falló la creación de la grupo.");
			else if (response=="success") processSuccess("Éxito al crear grupo.");
			else if (response==1062) processError("El grupo ya existe.");
		}
	}
	xhttp.open("POST", "control.php?view=addgrupo", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("nombreG="+nombreG);
}
/*OH DAE YOUNG -- END -- */

document.addEventListener("DOMContentLoaded", function() {
		
});
