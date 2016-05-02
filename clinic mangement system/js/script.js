var xmlhttp;

function makeCallPage(whichPage) {
	xmlhttp = new XMLHttpRequest();
	var id = document.getElementById('idPatient').value;
	var url = whichPage + ".php?id="+id;
	//console.log(url);

	xmlhttp.onreadystatechange = displayPage;
	xmlhttp.open("GET", url ,true);
	xmlhttp.send();
}


function displayPage() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

		var Response = xmlhttp.responseText;
		document.getElementById('result').innerHTML = Response;
	}
}

function addViToDb(){
	xmlhttp = new XMLHttpRequest();
	var id = document.getElementById('PaID').value;
	var comp = document.getElementById('comp').value;
	var dia = document.getElementById('dia').value;
	var comm = document.getElementById('comment').value;
	var url = "addVisitToDB.php?id="+id+"&comp="+comp+"&dia="+dia+"&comm="+comm;
	console.log(url);

	xmlhttp.onreadystatechange = displayPage;
	xmlhttp.open("GET", url ,true);
	xmlhttp.send();
}

function displayPageVi() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

		var Response = xmlhttp.responseText;
		document.getElementById('AddResult').innerHTML = Response;
	}
}

function changePage(page){
	xmlhttp = new XMLHttpRequest();
	var url = page+".html";
	xmlhttp.onreadystatechange = displayChangePage;
	xmlhttp.open("GET", url ,true);
	xmlhttp.send();
}

function displayChangePage(){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

		var Response = xmlhttp.responseText;
		document.getElementById('ChangePage').innerHTML = Response;
	}
}