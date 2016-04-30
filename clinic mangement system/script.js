var xmlhttp;

function makeCallPage(whichPage) {
	xmlhttp = new XMLHttpRequest();

	var url = whichPage + ".html";
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

function makeCallInsdieHomePage(homepage) {
	xmlhttp = new XMLHttpRequest();

	var id = document.getElementById('id').value;
	//console.log("id :"+id);

	var url = homepage + ".php?patientID=" +id;
	//console.log("search :"+url);

	xmlhttp.onreadystatechange = displayInsdieHomePage;
	xmlhttp.open("GET", url ,true);
	xmlhttp.send();
}

function displayInsdieHomePage() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

		var Response = xmlhttp.responseText;
	//	console.log(Response);
		document.getElementById('insideResult').innerHTML = Response;
	}
}