var selected_cells = new Map();
var banned_cells = new Set()

function fillTable(type) {
	var table = document.getElementById('studentable');
	var xhttp = new XMLHttpRequest();
	var able=true;

	while(table.rows.length>1) table.deleteRow(1);

	//console.log(type);
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
			//console.log(this.responseText);
			if(this.responseText=="error") {
				processError("Hubo un problema en la base de datos.");
			}
			if(this.responseText==203) {
				processError("Ya no puedes inscribirte");
				document.getElementById('horarios_view').style.display="none";
				document.getElementById('usr_insc').style.display="none";
				
				return;
			}
			var json = JSON.parse(this.responseText);
			
			for(i=0;i<json.row.length;i++) {
				var row = table.insertRow(-1);
				for(j=0;j<json.row[i].length;j++) {
					row.insertCell(j).innerHTML = json.row[i][j];
					row.cells[j].position="relative";
				}
				onclick = document.createAttribute("onclick");
				onclick.value = "selectCell(this);";
				id = document.createAttribute("id");
				id.value = "cell"+(i+1);
				row.cells[0].classList.add('cell_notselected');
				row.cells[0].setAttributeNode(onclick);
				row.cells[0].setAttributeNode(id);
			}
		}
	}
	if(type=="GET") {
		xhttp.open("GET", "control.php?view=studenttable", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send();
	}
	else if (type=="POST") {
		var parameter = document.getElementById('searchbar').value;
		//console.log(parameter);
		xhttp.open("POST", "control.php?view=studentsearch", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send('parameter='+parameter);
	}
}

function fillHours() {
	var table = document.getElementById('studentab');
	var xhttp = new XMLHttpRequest();
	var able=true;

	while(table.rows.length>1) table.deleteRow(1);
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
			if(this.responseText=="error") {
				processError("Hubo un problema en la base de datos.");
			}
			var json = JSON.parse(this.responseText);
			
			for(i=0;i<json.row.length;i++) {
				var row = table.insertRow(-1);
				for(j=0;j<json.row[i].length;j++) {
					console.log(j);
					row.insertCell(j-1).innerHTML = json.row[i][j];
				}
			}
		}
	}
	xhttp.open("GET", "control.php?view=studenttableget", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
}

function savetoList(cell) {
	var table = document.getElementById('materias_table');
	var row = cell.parentNode;
	var elem_lst = [];
	for(i=1;i<row.cells.length;i++) {
		elem_lst.push(row.cells[i].innerHTML);
	}
	if(banned_cells.has(row.cells[1].innerHTML+row.cells[2].innerHTML)) {
		processError("Esa materia se traslapa con alguna de la lista.");
		return false;
	}
	if(selected_cells.has(row.cells[2].innerHTML)) {
		processError("Esa materia ya existe en la lista.");
		return false;
	}
	else if(!selected_cells.has(row.cells[2].innerHTML)) {
		selected_cells.set(row.cells[2].innerHTML,elem_lst);
		var row = table.insertRow(-1);
		for(i=0;i<3;i++) {
			row.insertCell(i).innerHTML = elem_lst[i];
		}
		return true;
	}
}

function selectCell(element) {
	var this_row = element.parentNode;
	var this_table = this_row.parentNode;
	var is_selected = false;
	var todelete = [];

	if(!savetoList(element)) return;

	if(!element.classList.contains('cell_cant')&&!element.classList.contains('cell_selected')) {
		for(i=1;i<this_table.rows.length;i++) {
			
			c_row = this_table.rows[i];
			c_icell = c_row.cells[0];
			
			if(c_icell.getAttribute('id')!=element.getAttribute('id')) {
				match=(function(){
					match = false;
					for(it=4;it<9;it++) {
						if(this_row.cells[it].innerHTML==c_row.cells[it].innerHTML && this_row.cells[it].innerHTML) {
							match=true;
						}
					} return match; })();

				if(match) {
					todelete.push(c_row);
					if(!banned_cells.has(c_row.cells[1].innerHTML+c_row.cells[2].innerHTML)) {
						banned_cells.add(c_row.cells[1].innerHTML+c_row.cells[2].innerHTML);
					}
					//console.log(banned_cells);
				}
			}
		}

		todelete.forEach(function(entry) {
			entry.parentNode.removeChild(entry);
		});
		
		element.classList.remove('cell_notselected');
		element.classList.remove('cell_available');
		element.classList.add('cell_selected');
	}	
}

function searchElement(event) {
	var table = document.getElementById('studentable');
	var search = document.getElementById('searchbar');
	if (event.key === 'Enter') {
		while(table.rows.length>1) table.deleteRow(1);
		//console.log(search.value);
		fillTable("POST");
	}
}

function cleanSel() {
	var table_sel = document.getElementById('materias_table');
	while(table_sel.rows.length>1) table_sel.deleteRow(1);
	selected_cells.forEach(function(value,key) {
		selected_cells.delete(key);
	});
	banned_cells.clear();
	fillTable('GET');
}

function toggleList() {
	var listamaterias = document.getElementById("materias");
	
	if(listamaterias.style.display!=="block")	listamaterias.style.display="block";
	else listamaterias.style.display="none";
}

function download(filename, text) {
  var element = document.createElement('a');
  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
  element.setAttribute('download', filename);

  element.style.display = 'none';

  document.body.appendChild(element);

  element.click();

  document.body.removeChild(element);
}


function registerStudent() {

	var materiaX = [];
	
	selected_cells.forEach(function(element,key) {

		
		var xhttp = new XMLHttpRequest();
		
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if(this.responseText==101) { processError("La asignatura está llena."); }
				//ERRORES DE CRÉDITOS
				else if(this.responseText==102) { processError("Excediste los créditos disponibles."); }
				else if(this.responseText==103) { processError("Tu selección no cubre los 24 créditos."); }
				//ERRORES DE MATERIAS
				else if(this.responseText==201) { processError("Alguna materia ya está en la lista."); }
				else if(this.responseText==202) { processError("Ya tienes materias apartadas.")}
				else if(this.responseText==203) { processError("Ya terminó tu turno de inscripción.")}
				//ERRORES
				else if(this.responseText==301) { processError(""); }
				//ERRORES DE VALIDACIÓN DE DATOS
				else if(this.responseText==401) { processError("Alguna materia es inválida."); }
				else if(this.responseText==402) { processError("Algún grupo es inválido."); }
				else if(this.responseText==404) { processError("Error en el servidor."); }
				//TRANSACCIÓN EXITOSA
			}
			console.log(this.responseText);
		}

		xhttp.open("POST", "control.php?view=registerstudent", false);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send('group='+element[0]+"&nom_mat="+element[1]+"&stage=0");
		
	});

	var xhttp = new XMLHttpRequest();
		
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText==777) { processSuccess("Tu inscripción ha finalizado exitosamente."); }
			else if(this.responseText==203) { processError("Ya terminó tu turno de inscripción.")}
		}
	}

	xhttp.open("POST", "control.php?view=registerstudent", false);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("stage=1");
}

document.addEventListener("DOMContentLoaded", function() {
	populateContainerEstudiante('thingy','tablinf');
});
