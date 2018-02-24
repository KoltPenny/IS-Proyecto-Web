function loadView(id){
	view="index.php?view=".concat(id);
	window.location=view;
}

document.addEventListener("DOMContentLoaded", function() {
	if(document.getElementById("debug")) {
		document.getElementById("debug").innerHTML = "<button onclick='loadView(\"student\")'>Student View</button>  <button onclick='loadView(\"admin\")'>Admin View</button>  <button onclick='loadView(\"profesor\")'>Profesor View</button>";
	}
});

