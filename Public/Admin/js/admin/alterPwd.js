var right = new Array(1,1,1);
var newpwd;
$("#update").click(function(){ 
	isEmpty()
	$("#oldpwdpro").html(right);
	//判断信息正确性
	for(var i=0;i<right.length;i++){
		if(right[i]==0){
			return;
		}
	}
	ajaxPost();
});

//原密码监听器：0	
function oldpwdInput(){
	var oldpwd = $.trim($("#oldpwd").val());
	var regOldpwd = /^\S{6,20}$/;
	if(oldpwd==null || oldpwd==""){
		$("#oldpwdpro").html("不能为空");
		right[0]=0;
	}else if(!regOldpwd.test(oldpwd) ){
		right[0]=0;
		$("#oldpwdpro").html("应为6~20个字符");
	}else{
		$("#oldpwdpro").html("*");
		right[0]=1;
	}
}

//新密码监听器：1	
function newpwdInput(){
	newpwd = $.trim($("#newpwd").val());
	var regNewpwd = /^\S{6,20}$/;
	if(newpwd==null || newpwd==""){
		$("#newpwdpro").html("不能为空");
		right[1]=0;
	}else if(!regNewpwd.test(newpwd) ){
		right[1]=0;
		$("#newpwdpro").html("应为6~20个字符");
	}else{
		$("#newpwdpro").html("*");
		right[1]=1;
	}
}

//新密码监听器：2
function newpwd2Input(){
	var newpwd2 = $.trim($("#newpwd2").val());
	var regNewpwd2 = /^\S{6,20}$/;
	if(newpwd2!=newpwd){
		right[2]=0;
		$("#newpwdpro2").html("两次密码不一致");
	}else{
		$("#newpwdpro2").html("*");
		right[2]=1;
	}
}

function isEmpty(){
	$("#oldpwdpro").html("*");
	$("#newpwdpro").html("*");
	$("#newpwdpro2").html("*");
	//原密码
	var oldpwd = $.trim($("#oldpwd").val());
	if(oldpwd==null || oldpwd==""){
		$("#oldpwdpro").html("不能为空");
		right[0]=0;
		return;
	}
	//新密码
	newpwd = $.trim($("#newpwd").val());
	if(newpwd==null || newpwd==""){
		$("#newpwdpro").html("不能为空");
		right[1]=0;
		return;
	}
	//旧密码
	newpwd2 = $.trim($("#newpwd2").val());
	if(newpwd2==null || newpwd2==""){
		$("#newpwdpro2").html("不能为空");
		right[2]=0;
		return;
	}
}

function ajaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "http://114.215.99.203/school/Admin/Admin/alterPwd",
		data: {
			pwd:$("#oldpwd").val(), 
			newpwd:$("#newpwd").val(), 
			newpwd2:$("#newpwd2").val(), 

			aid:$("#aid").val(), 
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
				location.href='http://114.215.99.203/school/Admin/Admin/alterPwd';
			} else {
				$("#oldpwdpro").html(data.content.oldpwd);
				$("#newpwdpro").html(data.content.newpwd);
				$("#newpwdpro2").html(data.content.newpwd2);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	});
}