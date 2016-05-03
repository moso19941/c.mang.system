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




function makeCallPagePhp(whichPage) {
	xmlhttp = new XMLHttpRequest();
	var id = document.getElementById('editIDPatient').value;
	var url = whichPage + ".php?id="+id;
	//console.log(url);

	xmlhttp.onreadystatechange = displayPage;
	xmlhttp.open("GET", url ,true);
	xmlhttp.send();
	
}


function addHistoryToDb(){
	xmlhttp = new XMLHttpRequest();
	var id = document.getElementById('PaID').value;
	var Past = document.getElementById('pastHistory').value;
	var Medical = document.getElementById('Medical').value;
	var Family = document.getElementById('Family').value;
	
	var url = "addHistoryToDB.php?id="+id+"&pastHistory="+Past+"&Medical="+Medical+"&Family="+Family;
	console.log(url);

	xmlhttp.onreadystatechange = displayPageH;
	xmlhttp.open("GET", url ,true);
	xmlhttp.send();
}

function displayPageH() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

		var Response = xmlhttp.responseText;
		document.getElementById('result').innerHTML = Response;
	}
}



function makeCallReports(page){
	xmlhttp = new XMLHttpRequest();
	var id = document.getElementById('idPatient').value;
	var comment = document.getElementById('Comments').value;
	var type = document.getElementById('report').value;
	
	var url = page+".php?id="+id+"&comment="+comment+"&type="+type;
	console.log(url);
	
	xmlhttp.onreadystatechange = displayReports;
	xmlhttp.open("GET", url ,true);
	xmlhttp.send();
}

function displayReports() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

		var Response = xmlhttp.responseText;
		//console.log(Response);
		document.getElementById('result').innerHTML = Response;
	}
}
