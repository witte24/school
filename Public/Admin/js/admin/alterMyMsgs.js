var right = new Array(1,1,1,1,1);
$("#update").click(function(){ 
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

//姓名监听器：1	
function rnameInput(){
	var rname = $.trim($("#rname").val());
	var regRname = /^\S{2,30}$/;
	if(rname==null || rname==""){
		$("#rnamepro").html("不能为空");
		right[1]=0;
	}else if(!regRname.test(rname) ){
		right[1]=0;
		$("#rnamepro").html("应为2~30个字符");
	}else{
		$("#rnamepro").html("*");
		right[1]=1;
	}
}

//手机长号监听器：2	
function lphoneInput(){
	var lphone = $.trim($("#lphone").val());
	var regLphone = /^1[34578]\d{9}$/;
	if(!regLphone.test(lphone) ){
		right[2]=0;
		$("#lphonepro").html("请输入正确长号");
	}else{
		$("#lphonepro").html("");
		right[2]=1;
	}
}

//手机短号监听器：3	
function sphoneInput(){
	var sphone = $.trim($("#sphone").val());
	var regSphone = /^[^1]\d{3,7}$/;
	if(!regSphone.test(sphone) ){
		right[3]=0;
		$("#sphonepro").html("请输入正确短号");
	}else{
		$("#sphonepro").html("");
		right[3]=1;
	}
}

//邮箱地址监听器：4
function emailInput(){
	var email = $.trim($("#email").val());
	var regEmail = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
	if(!regEmail.test(email) ){
		right[4]=0;
		$("#emailpro").html("请输入正确邮箱地址");
	}else{
		$("#emailpro").html("");
		right[4]=1;
	}
}

function isEmpty(){
	$("#namepro").html("*");
	$("#rnamepro").html("*");
	$("#lphonepro").html("");
	$("#sphonepro").html("");
	$("#emailpro").html("");
	//账号
	var name = $.trim($("#name").val());
	if(name==null || name==""){
		$("#namepro").html("不能为空");
		right[0]=0;
	}
	//姓名
	var rname = $.trim($("#rname").val());
	if(rname==null || rname==""){
		$("#rnamepro").html("不能为空");
		right[1]=0;
	}
}

function ajaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "http://114.215.99.203/school/Admin/Admin/alterMyMsg",
		data: {
			name:$("#name").val(), 
			rname:$("#rname").val(), 
			lphone:$("#lphone").val(), 
			sphone:$("#sphone").val(), 
			email:$("#email").val(), 
			aid:$("#aid").val(), 
			issuper:$("#issuper").val(), 
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
				if(data.content.issuper){
					location.href='http://114.215.99.203/school/Admin/Admin/adminList';
				}else{
					location.href='http://114.215.99.203/school/Admin/Admin/adminMsg/aid/'+data.content.aid;
				}
				
			} else {
				$("#namepro").html(data.content.name);
				$("#rnamepro").html(data.content.rname);
				$("#lphonepro").html(data.content.lphone);
				$("#sphonepro").html(data.content.sphone);
				$("#emailpro").html(data.content.email);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	});

}