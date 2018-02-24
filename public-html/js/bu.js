/*
function selectCell(element) {

	var this_row = element.parentNode;
	var this_table = this_row.parentNode;
	var is_selected = false;

	if(!element.classList.contains('cell_cant')) {

		for(i=1;i<this_table.rows.length;i++) {
			
			c_row = this_table.rows[i];
			c_icell = c_row.cells[0];
			
			if(c_row.cells[0].getAttribute('id')!=element.getAttribute('id')) {

				bool=(function(){
					bool = true;
					for(it=4;it<9;it++) {
						if(this_row.cells[it].innerHTML==c_row.cells[it].innerHTML && this_row.cells[it].innerHTML) {
							bool=false;
						}
					}return bool})();

				if(bool) {
					if(c_icell.classList.contains('cell_notselected')) {
						c_icell.classList.remove('cell_notselected');
						c_icell.classList.add('cell_available');
					}
				}
				else {
					c_icell.classList.remove('cell_notselected');
					c_icell.classList.remove('cell_available');
					if(c_icell.classList.contains('cell_cant')) {
						c_icell.classList.add('cell_cant_selected');
					}
					c_icell.classList.add('cell_cant');
					
					if(element.classList.contains('cell_selected')) {
						if(!c_icell.classList.contains('cell_cant_selected')) {
							c_icell.classList.remove('cell_cant');
							c_icell.classList.add('cell_available');
						}
					}}
			}}}
	
	if(element.classList.contains('cell_notselected')||element.classList.contains('cell_available')) {
		element.classList.remove('cell_notselected');
		element.classList.remove('cell_available');
		element.classList.add('cell_selected');
		selected_cells +=1;
	}
	else if(element.classList.contains('cell_selected')) {
		selected_cells -=1;
		element.classList.remove('cell_selected');
		if(selected_cells)element.classList.add('cell_available');
		else {
			
			element.classList.add('cell_notselected');
			
			for(i=1;i<this_table.rows.length;i++) {
				c_row = this_table.rows[i];
				c_icell = c_row.cells[0];				
				c_icell.classList.remove('cell_available');
				c_icell.classList.remove('cell_cant');
				c_icell.classList.add('cell_notselected');
			}}}

	if(element.classList.contains('cell_cant')) {	console.log("Classes: "+element.classList.length);}
	console.log(selected_cells);
	
}*/
/*
	function selectCell(element) {
	
	var this_row = element.parentNode;
	var this_table = this_row.parentNode;
	var hour_map = new Map();
	var is_selected = false;

	if(!element.classList.contains('cell_cant')) {
	//Selección de celda válida
	
	for(i=4;i<9;i++) if(/[^\s]/.test(this_row.cells[i].innerHTML))
	hour_map.set(this_table.rows[0].cells[i].innerHTML,this_row.cells[i].innerHTML);

	selected_cells.set(element.getAttribute("id"),hour_map);

	if(element.classList.contains('cell_selected')) {
	for(i=0;i<this_table.rows.length;i++) {
	
	if(this_table.rows[i].cells[0].getAttribute("id")!=element.getAttribute("id") &&
	!this_table.rows[i].cells[0].classList.contains('cell_selected')) {
	
	is_selected = true;
	
	var temp = new Map();
	var match = false;
	
	for(j=4;j<9;j++) if(/[^0-9]+/.test(this_table.rows[i].cells[j].innerHTML))
	temp.set(this_table.rows[0].cells[j].innerHTML,this_table.rows[i].cells[j].innerHTML);
	
	temp.forEach(function(t_value,t_key){
	
	if(t_value==hour_map.get(t_key)) {
	match = true;
	console.log(t_key+": "+t_value+" <> "+hour_map.get(t_key));
	}
	
	});

	if(match) {
	this_table.rows[i].cells[0].classList.remove('cell_cant');
	this_table.rows[i].cells[0].classList.add('cell_available');
	}
	
	}	/*Fin de selección de celda válida
	}
	}
	else {
	selected_cells.forEach(
	function(value,key) {

	for(i=0;i<this_table.rows.length;i++) {
	
	if(this_table.rows[i].cells[0].getAttribute("id")!=element.getAttribute("id") &&
	!this_table.rows[i].cells[0].classList.contains('cell_selected')) {

	//CELDA SIN SELECCIONAR
	is_selected = false;
	
	var temp = new Map();
	var match = false;
	
	for(j=4;j<9;j++) if(/[^0-9]+/.test(this_table.rows[i].cells[j].innerHTML))
	temp.set(this_table.rows[0].cells[j].innerHTML,this_table.rows[i].cells[j].innerHTML);
	
	temp.forEach(function(t_value,t_key){
	
	if(t_value==value.get(t_key)) match = true;
	
	});

	if(match) { this_table.rows[i].cells[0].classList.add('cell_cant'); }
	else { this_table.rows[i].cells[0].classList.add('cell_available'); }
	//--------------------
	
	}	/*Fin de selección de celda válida
	}
	});
	}		
	if(!is_selected) {
	element.classList.remove('cell_available');
	element.classList.add('cell_selected');
	}
	else {
	element.classList.remove('cell_selected');
	selected_cells.delete(element.getAttribute("id"));
	if(selected_cells.size>=1)element.classList.add('cell_available');
	else {
	for(i=0;i<this_table.rows.length;i++) {
	this_table.rows[i].cells[0].classList.remove('cell_cant');
	this_table.rows[i].cells[0].classList.remove('cell_available');
	this_table.rows[i].cells[0].classList.add('cell_notselected');
	}
	}
	}
	}
	}*/
/*
	function selectCell(element) {

	var this_row = element.parentNode;
	var this_table = this_row.parentNode;
	var hour_map = new Map();
	
	if(element.classList.contains('cell_notselected')) {
	element.classList.remove('cell_notselected');
	
	for(i=4;i<9;i++) {
	
	if(/[^\s]/.test(this_row.cells[i].innerHTML))hour_map.set(this_table.rows[0].cells[i].innerHTML,this_row.cells[i].innerHTML);
	
	}
	element.classList.add('cell_selected');
	selected_cells.set(element.getAttribute("id"),hour_map);

	for(i=1;i<this_table.rows.length;i++) {

	var validate = true;

	if(this_table.rows[i].cells[0].getAttribute("id")!=element.getAttribute("id")) {
	//console.log(this_table.rows[i].cells[0].getAttribute("id"));
	var temp = new Map();
	
	for(j=4;j<9;j++) {
	if(/[^0-9]+/.test(this_table.rows[i].cells[j].innerHTML))
	temp.set(this_table.rows[0].cells[j].innerHTML,this_table.rows[i].cells[j].innerHTML);
	}
	temp.forEach(function(value,key){
	//console.log(value);
	if(value==hour_map.get(key)) {
	validate = false;
	}
	});

	if(validate==false) {
	if(this_table.rows[i].cells[0].classList.contains('cell_selected')) {
	element.classList.remove('cell_selected');
	element.classList.add('cell_cant');
	return;
	}
	else if(this_table.rows[i].cells[0].classList.contains('cell_notselected')){
	this_table.rows[i].cells[0].classList.remove('cell_notselected');
	this_table.rows[i].cells[0].classList.add('cell_cant');
	}
	}
	else {
	if(this_table.rows[i].cells[0].classList.contains('cell_notselected')) {
	element.classList.add('cell_selected');
	this_table.rows[i].cells[0].classList.remove('cell_notselected');
	this_table.rows[i].cells[0].classList.add('cell_available');
	}
	}
	}
	}
	}
	
	else if(element.classList.contains('cell_selected')) {
	element.classList.remove('cell_selected');
	selected_cells.delete(element.getAttribute("id"));

	/*ELEMENTO ESTÁ SELECCIONADO --- BEGIN

	for(i=4;i<9;i++) {
	
	if(/[^\s]/.test(this_row.cells[i].innerHTML))hour_map.set(this_table.rows[0].cells[i].innerHTML,this_row.cells[i].innerHTML);
	
	}
	element.classList.add('cell_notselected');
	selected_cells.delete(element.getAttribute("id"));

	for(i=1;i<this_table.rows.length;i++) {

	var validate = true;

	if(this_table.rows[i].cells[0].getAttribute("id")!=element.getAttribute("id")/*&&
	(this_table.rows[i].cells[0].classList.contains('cell_available')||
	this_table.rows[i].cells[0].classList.contains('cell_cant'))) {
	//console.log(this_table.rows[i].cells[0].getAttribute("id"));
	var temp = new Map();
	
	for(j=4;j<9;j++) {
	if(/[^0-9]+/.test(this_table.rows[i].cells[j].innerHTML))
	temp.set(this_table.rows[0].cells[j].innerHTML,this_table.rows[i].cells[j].innerHTML);
	}
	temp.forEach(function(value,key){
	//console.log(value);
	if(value==hour_map.get(key)) {
	validate = false;
	}
	});

	if(validate==false) {
	this_table.rows[i].cells[0].classList.remove('cell_cant');
	this_table.rows[i].cells[0].classList.add('cell_notselected');
	}
	else if(validate==true&&this_table.rows[i].cells[0].classList.contains('cell_available')) {
	this_table.rows[i].cells[0].classList.remove('cell_available');
	this_table.rows[i].cells[0].classList.add('cell_notselected');
	}
	else if(this_table.rows[i].cells[0].classList.contains('cell_selected')) {
	element.classList.remove('cell_notselected');
	element.classList.add('cell_available');
	}
	}
	}
	/*ELEMENTO ESTÁ SELECCIONADO --- END
	}

	else if(element.classList.contains('cell_available')) {
	element.classList.remove('cell_available');

	/*ELEMENTO ESTÁ DISPONIBLE --- BEGIN
	
	for(i=4;i<9;i++) {
	
	if(/[^\s]/.test(this_row.cells[i].innerHTML))hour_map.set(this_table.rows[0].cells[i].innerHTML,this_row.cells[i].innerHTML);
	
	}
	element.classList.add('cell_selected');
	selected_cells.set(element.getAttribute("id"),hour_map);

	for(i=1;i<this_table.rows.length;i++) {

	var validate = true;

	if(this_table.rows[i].cells[0].getAttribute("id")!=element.getAttribute("id")&&
	this_table.rows[i].cells[0].classList.contains('cell_available')) {
	//console.log(this_table.rows[i].cells[0].getAttribute("id"));
	var temp = new Map();
	
	for(j=4;j<9;j++) {
	if(/[^0-9]+/.test(this_table.rows[i].cells[j].innerHTML))
	temp.set(this_table.rows[0].cells[j].innerHTML,this_table.rows[i].cells[j].innerHTML);
	}
	temp.forEach(function(value,key){
	//console.log(value);
	if(value==hour_map.get(key)) {
	validate = false;
	}
	});

	if(validate==false) {
	this_table.rows[i].cells[0].classList.remove('cell_notselected');
	if(this_table.rows[i].cells[0].classList.contains('cell_available'))
	this_table.rows[i].cells[0].classList.remove('cell_available');
	this_table.rows[i].cells[0].classList.add('cell_cant');
	}
	else {
	this_table.rows[i].cells[0].classList.remove('cell_notselected');
	this_table.rows[i].cells[0].classList.add('cell_available');
	}
	}
	}

	/*ELEMENTO ESTÁ SELECCIONADO --- END
	
	}
	else if(element.classList.contains('cell_cant')) {
	processError('La materia se traslapa con otra.');

	/*ELEMENTO ESTÁ PROHIBIDO --- BEGIN
	/*ELEMENTO ESTÁ PROHIBIDO --- END
	}
	//console.log(selected_cells.size);
	//console.log(selected_cells.has(element.getAttribute("id")));
	}
*/
