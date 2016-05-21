var right = new Array(1,1);
$("#login").click(function(){ 
	isEmpty();
	for(var i=0;i<right.length;i++){
		if(right[i]==0){
			return;
		}
	}
	ajaxPost();
});

//账号监听器：0	
function nameInput(){
	var name = $.trim($("#name").val());
	var regName = /^\S{2,30}$/;
	if(!regName.test(name) ){
		right[0]=0;
		$("#error").html("账号为2~30个字符");
	}else{
		$("#error").html("");
		right[0]=1;
	}
}

//密码监听器：1	
function pwdInput(){
	pwd = $.trim($("#pwd").val());
	var regpwd = /^\S{6,20}$/;
	if(!regpwd.test(pwd) ){
		right[1]=0;
		$("#error").html("密码为6~20个字符");
	}else{
		$("#error").html("");
		right[1]=1;
	}
}

function isEmpty(){
	$("#error").html("");
	//账号
	var name = $.trim($("#name").val());
	if(name==null || name==""){
		$("#error").html("账号不能为空");
		right[0]=0;
		return;
	}
	//密码
	var pwd = $.trim($("#pwd").val());
	if(pwd==null || pwd==""){
		$("#error").html("密码不能为空");
		right[1]=0;
		return;
	}
}

function ajaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "http://114.215.99.203/school/Admin/Login/login",
		data: {
			name:$("#name").val(), 
			pwd:$("#pwd").val(), 
			remember: $("#remember").is(':checked'), 
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
				location.href='http://114.215.99.203/school/Admin/Index/index';
			} else {
				$("#error").html( data.content);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	});
}