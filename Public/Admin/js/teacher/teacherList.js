$("#save").click(function(){ 
  	if( !isEmpty() ){
		ajaxPost();
	}  
});

//团队查询，监听器
function teamTypeChg(){
	teamAjaxPost();
}

function isEmpty(){
	$("#qrydata").attr("placeholder","请输入查询信息");
	var qrydata = $.trim($("#qrydata").val());
	if(qrydata==null || qrydata==""){
		$("#qrydata").attr("placeholder","查询信息不能为空");
		return false;
	}else{
		return true;
	}
}

//输入查询信息
function ajaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "/school/Admin/Teacher/teacherList/",
		data: {
			type: "content",
			qryData:$("#qrydata").val(), 
			teamType: $("#teamtype").val(),
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
					location.href='/school/Admin/Teacher/teacherList';
			} else {
				$("#qrydata").attr("placeholder",$data.content.qrydata);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	});
}

//团队查询
function teamAjaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "/school/Admin/Teacher/teacherList",
		data: {
			type: "team",
			teamType: $("#teamtype").val(),
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
					location.href='/school/Admin/Teacher/teacherList';
			} else {
				alert(data.content.name);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	});
}