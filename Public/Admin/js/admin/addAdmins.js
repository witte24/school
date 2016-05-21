var right = new Array(1,1,1,1,1,1,1);
var newpwd;
$("#save").click(function(){ 
	isEmpty();
	//判断信息正确性
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
	if(name==null || name==""){
		$("#namepro").html("不能为空");
		right[0]=0;
	}else if(!regName.test(name) ){
		right[0]=0;
		$("#namepro").html("应为2~30个字符");
	}else{
		$("#namepro").html("*");
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
		$("#newpwd2pro").html("两次密码不一致");
	}else{
		$("#newpwd2pro").html("*");
		right[2]=1;
	}
}

//姓名监听器：3
function rnameInput(){
	var rname = $.trim($("#rname").val());
	var regRname = /^\S{2,30}$/;
	if(rname==null || rname==""){
		$("#rnamepro").html("不能为空");
		right[3]=0;
	}else if(!regRname.test(rname) ){
		right[3]=0;
		$("#rnamepro").html("应为2~30个字符");
	}else{
		$("#rnamepro").html("*");
		right[3]=1;
	}
}

//手机长号监听器：4
function lphoneInput(){
	var lphone = $.trim($("#lphone").val());
	var regLphone = /^1[34578]\d{9}$/;
	if(!regLphone.test(lphone) ){
		right[4]=0;
		$("#lphonepro").html("请输入正确长号");
	}else{
		$("#lphonepro").html("");
		right[4]=1;
	}
}

//手机短号监听器：5	
function sphoneInput(){
	var sphone = $.trim($("#sphone").val());
	var regSphone = /^[^1]\d{3,7}$/;
	if(!regSphone.test(sphone) ){
		right[5]=0;
		$("#sphonepro").html("请输入正确短号");
	}else{
		$("#sphonepro").html("");
		right[5]=1;
	}
}

//邮箱地址监听器：6
function emailInput(){
	var email = $.trim($("#email").val());
	var regEmail = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
	if(!regEmail.test(email) ){
		right[6]=0;
		$("#emailpro").html("请输入正确邮箱地址");
	}else{
		$("#emailpro").html("");
		right[6]=1;
	}
}

function isEmpty(){
	$("#namepro").html("*");
	$("#rnamepro").html("*");
	$("#lphonepro").html("");
	$("#sphonepro").html("");
	$("#emailpro").html("");
	$("#newpwdpro").html("*");
	$("#newpwd2pro").html("*");
	
	//账号
	var name = $.trim($("#name").val());
	if(name==null || name==""){
		$("#namepro").html("不能为空");
		right[0]=0;
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
		$("#newpwd2pro").html("不能为空");
		right[2]=0;
		return;
	}
	//姓名
	var rname = $.trim($("#rname").val());
	if(rname==null || rname==""){
		$("#rnamepro").html("不能为空");
		right[3]=0;
	}
}

function ajaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "http://114.215.99.203/school/Admin/Admin/addAdmin",
		data: {
			name:$("#name").val(), 
			rname:$("#rname").val(), 
			lphone:$("#lphone").val(), 
			sphone:$("#sphone").val(), 
			email:$("#email").val(), 
			newpwd:$("#newpwd").val(),
			newpwd2:$("#newpwd2").val(),
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
					location.href='http://114.215.99.203/school/Admin/Admin/adminList';
			} else {
				$("#namepro").html(data.content.name);
				$("#rnamepro").html(data.content.rname);
				$("#lphonepro").html(data.content.lphone);
				$("#sphonepro").html(data.content.sphone);
				$("#emailpro").html(data.content.email);
				$("#newpwdpro").html(data.content.newpwd);
				$("#newpwd2pro").html(data.content.newpwd2);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	});
}