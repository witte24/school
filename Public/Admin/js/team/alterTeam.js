var right=0;
$("#save").click(function(){
	//名字
	var name = $.trim($("#name").val());
	if(name==null || name==""){
		$("#namepro").html("不能为空");
		right=0;
	}else{
		right=1;
	}
	if(right){
		ajaxPost();
	}
});

//名字监听器：0	
function nameInput(){
	var name = $.trim($("#name").val());
	var regName = /^\S{2,20}$/;
	if(name==null || name==""){
		$("#namepro").html("不能为空");
		right=0;
	}else if(!regName.test(name) ){
		right=0;
		$("#namepro").html("应为2~20个字符");
	}else{
		$("#namepro").html("*");
		right=1;
	}
}

function ajaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "http://114.215.99.203/school/Admin/Team/alterTeam",
		data: {
			name:$("#name").val(), 
			teamid:$('#teamid').val(),
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
				location.href='http://114.215.99.203/school/Admin/Team/teamList';
			} else {
				$("#namepro").html(data.content.name);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	});
}
	
	