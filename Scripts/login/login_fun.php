<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
function createLoginData(){
	const ID = document.getElementById('ID').value;
	const PW = document.getElementById('PassWord').value;
	const Permission = userCheck();
	var sendData = {user:ID, password:PW, permission:Permission};
	return sendData;
}

function logIn(){
	$.ajax({
		type: "POST",
		url: "Scripts/login/login_server.php",
		data:createLoginData(),
		dataType:"json",
		success: function(data,status,xhr){
			if(data == 1){
				alert("admin log in success");
				location.replace("body/admin.php");
			}
			else if(data == 2){
				alert("client log in success");
				location.replace("body/client.php");			
			}
			else if(data == 0){
				alert("password wrong or no id");			
			}
			else{
				alert("please check one");			
			}
		},
		error:function(jqXHR,textStatus,errorThrown){
			console.log(jqXHR.responseText);		
		}
	});
}

function userCheck(){
	var isAdmin = document.getElementsByName("check")[0].checked;
	var isClient = document.getElementsByName("check")[1].checked;
	if(isAdmin && isClient){
		return "-1";
	}
	else{
		if(isAdmin){
			return "0";
		}
		else if(isClient){
			return "1";
		}
	}
	return "-1";
}
</script>
