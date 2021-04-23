$(document).ready(function () {

    $("#signin").click(function () {
        userid = $.trim($("#userid").val());
        pwd = $.trim($("#pwd").val());
		chkLoginUrl = "https://devapi.jto.co.id/taufanapp/v1/chkLogin";
		saveLoginUrl = "https://devapi.jto.co.id/taufanapp/v1/saveLogin";

        if (!userid){
            $("#userid").css("border-color","red");
        }else if (!pwd){
            $("#pwd").css("border-color","red");
        }else {
            //remove red bolor border
            $("#userid").css("border-color","");
            $("#pwd").css("border-color","");

            datasend = {
                userid:userid,
                pwd:pwd
            }

            $("#notify").html("Mohon menunggu...");

            $.ajax({
                url: chkLoginUrl, //cek ada datanya atau tidak
                type: 'post',
                data: JSON.stringify(datasend),
                headers: {
                    Authorization: 'Basic dGF1ZmFuOnNlcHRhdWZhbmk=',
                    'Content-Type': 'application/json'
                },
                dataType: 'json',
                success: function (data) {
                    $("#notify").html("");

                    //console.log(data.code);
                    if (data.code == 1){ //data ada di tabel
						$("#notify").html("Mengalihkan...");
						dUrl = data.directUrl;
						
						datasend = {
							userid:userid
						}

						$.ajax({
							url: saveLoginUrl, 
							type: 'post',
							data: JSON.stringify(datasend),
							headers: {
								Authorization: 'Basic dGF1ZmFuOnNlcHRhdWZhbmk=',
								'Content-Type': 'application/json'
							},
							dataType: 'json',
							success: function (data) {
								$("#notify").html("");

								
								if (data.code == 1){ 
									window.location.href = dUrl+"?sid="+userid;				
								   
								}else {
									
									 $("#notify").html("Gagal mengalihkan..");
								}
							}
						});
                       
                    }else {
                        //jika tidak ada datanya
                         $("#notify").html("Userid atau password salah!");
                    }
                }
            });
        }
    });
	
	$("#chsubmit").click(function(){
		userid = $.trim($("#userid").val());
		oldpass = $.trim($("#oldpass").val());
		newpass = $.trim($("#newpass").val());
		chpassUrl = "https://devapi.jto.co.id/taufanapp/v1/changePassword";

        if (!oldpass){
            $("#oldpass").css("border-color","red");
        }else if (!newpass){
            $("#newpass").css("border-color","red");
        }else {
            //remove red bolor border
            $("#oldpwd").css("border-color","");
            $("#newpass").css("border-color","");

            datasend = {
                userid:userid,
                oldpass:oldpass,
				newpass:newpass
            }
			
			$("#notify").html("Mohon menunggu...");
			
			$.ajax({
					url: chpassUrl,
					type: 'post',
					data: JSON.stringify(datasend),
					headers: {
						Authorization: 'Basic dGF1ZmFuOnNlcHRhdWZhbmk=',
						'Content-Type': 'application/json'
					},
					dataType: 'json',
					success: function (data) {
						$("#notify").html("");
						
						if (data.code == 1){ 
							$("#notify").html("Password berhasil diubah!");		
								   
						}else {
							$("#notify").html("Password gagal diubah!");
						}
					}
			});
		}
		
	});
	
	$("#chadd").click(function(){
		userid = $.trim($("#userid").val());
		newpass = $.trim($("#newpass").val());
		confpass = $.trim($("#confpass").val());
		level = $.trim($('#lvl :selected').text());
		addusrUrl = "https://devapi.jto.co.id/taufanapp/v1/addUSer";
		
		 if (!userid){
            $("#userid").css("border-color","red");
        }else if (!newpass){
            $("#newpass").css("border-color","red");
        }else if (!confpass){
            $("#confpass").css("border-color","red");
        }else if (newpass !== confpass){
            $("#notify").html("Confirm Password tidak sama dengan New Password!");
        }else {
            //remove red bolor border
            $("#userid").css("border-color","");
            $("#newpass").css("border-color","");
			$("#confpass").css("border-color","");
			
			datasend = {
                userid:userid,
				pass:newpass,
				level:level
            }
			
			$("#notify").html("Mohon menunggu...");
			
			$.ajax({
					url: addusrUrl,
					type: 'post',
					data: JSON.stringify(datasend),
					headers: {
						Authorization: 'Basic dGF1ZmFuOnNlcHRhdWZhbmk=',
						'Content-Type': 'application/json'
					},
					dataType: 'json',
					success: function (data) {
						$("#notify").html("");
						
						if (data.code == 1){ 
							$("#notify").html("Berhasil ditambahkan!");		
								   
						}else {
							$("#notify").html("Gagal menambahkan!");
						}
					}
			});
			
		}
	});
	
	$("#so").click(function () {
        userid = $.trim($("#userid").val());
		soUrl = "https://devapi.jto.co.id/taufanapp/v1/delSess";
		
		datasend = {
                userid:userid
            }
			
			$.ajax({
					url: soUrl,
					type: 'post',
					data: JSON.stringify(datasend),
					headers: {
						Authorization: 'Basic dGF1ZmFuOnNlcHRhdWZhbmk=',
						'Content-Type': 'application/json'
					},
					dataType: 'json',
					success: function (data) {
						$("#notify").html("");
						
						if (data.code == 1){ 
							dUrl = data.directUrl;
							window.location.href = dUrl;
								   
						}
					}
			});
	});
	
})