function login(type){
	var username=$("#username").val();
	var password=$("#password").val();
	var dataString = 'username='+username+'&password='+password;
	if($.trim(username).length>0 && $.trim(password).length>0)
	{
		$.ajax({
			type: "POST",
			url: "process.php?login",
			data: {
				username:username,
				password:password,
				type:type
			},
			cache: false,
			beforeSend: function(){ $("#login").val('Connecting...');},
			success: function(data){
				//alert(data)
				var datas = data.split('!')
				if(datas[0])
				{
					if( datas[1] == "student" )
						window.location.replace("../student");
					else if( datas[1] == "parent" )
						window.location.replace("../parent");
				}
				else
				{
					 $('.content').shake();
					 $("#error").html("<button class='close' data-close='alert'></button><span style='color:#cc0000'>Error:</span> Invalid username and password. ");
				}
			}
		});
	}
	else{
		$('.content').shake();
		 $("#erro").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
				
	}
	
}