function logIn(){
	var User = userCheck();
	if(User < 0)
		return;
	var ID = getID();
	var PW = getPW();
	var ID_DB = "LIFE_BEST";
	var PW_DB = "1234";
	if(ID == ID_DB && PW == PW_DB)
		alert("log in");
	else
		alert("incorrect!!");
}


function getID(){
	return document.getElementById('ID').value;
}

function getPW(){
	return document.getElementById('PassWord').value;
}

function userCheck(){
	var isAdmin = document.getElementsByName("check")[0].checked;
	var isClient = document.getElementsByName("check")[1].checked;
	if(isAdmin && isClient){
		alert("Please check one admin or client");
		return -1;
	}
	else{
		if(isAdmin){
			alert("Admin Checked!!");
			return 1;
		}
		else if(isClient){
			alert("Client Checked!!");
			return 0;
		}
	}
	alert("Please check");
	return -1;
}
