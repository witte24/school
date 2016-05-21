var uploadImgUrl = new Array(); //所有上传图片的url数组
var oldImgUrl = new Array(); //编译器原有图片的url数组
var saveImgUrl = new Array(); //需保持上传图片的url数组
var delImgUrl = new Array(); //需删除的无用图片的url数组
KindEditor.ready(
	function(K){
			//页面一打开的图片
			var oldimgsrc=[];
			//最后保存下来的图片
			var saveimgsrc=[];
			//创建编辑器对象
			K.create('#editor_id', {
				allowFileManager : false, //true时显示浏览远程服务器按钮
			// items:['bold','italic','justifyleft','justifycenter','justifyright','image','fontsize','forecolor','hilitecolor','fontname','fullscreen'],
				afterUpload:function(url){
					uploadImgUrl.push(url);
				},
/* 				afterFocus:function(){
					oldImgUrl = getImgUrl();
					 
				}, */
				afterBlur:function(){
					 saveImgUrl	= getImgUrl();
					 delImgUrl = getArrDif(uploadImgUrl,saveImgUrl);
					 ajaxDelPost();
					 // alert(delImgUrl);
				},
			});
		 
});

$("#submit").click(function(){
		 saveImgUrl	= getImgUrl();
		 ajaxPost();
		 // alert(saveImgUrl);
		
}); 

//窗口关闭前事件
window.onbeforeunload = function(event) {
					 delImgUrl = uploadImgUrl,saveImgUrl;
					 ajaxDelPost();
}

//得到html文档中的img地址
//思想：先得到img在配对src
function getImgUrl(){
	var imgArr= new Array();
	var srcArr= new Array();
	var content= KindEditor.instances[0].html();
	var imgReg = /<img\b[^>]*src\s*=\s*"[^>"]*\.(?:png|jpg|bmp|gif)"[^>]*>/gi;
	var srcReg = /src=[\'\"]?([^\'\"]*)[\'\"]?/i;
	imgArr = content.match(imgReg);
	for(var index in imgArr)
	{
		srcArr[index] = imgArr[index].match(srcReg )[1];
	}
	return srcArr;
}

//返回两个数组中的不相同元素
function getArrDif(arr1,arr2){
	var target = new Array();
	//增加多一个元素，巧妙解决下面算法无法判断最后一个元素问题
	var arr12 = arr1.concat(arr2).concat("last"); 
    for(var i=0; i < arr12.length; i++){
  		for(var j=0; j < arr12.length; j++){
			if(i==j){
				continue;
			}else if(arr12[i]==arr12[j] ){
				break;
			}else if(j==arr12.length-1 ){
				target.push(arr12[i] );
			} 
		} 
	} 
	return target;
}

//编辑器失去焦点调用：删除无用图片
function ajaxDelPost(){
	$.ajax({ 
		type: "POST", 	
		url: "/school/Admin/Teacher/delUselsPic",
		data: {
			delImgUrl: delImgUrl, 
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
				// alert(data.content);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	}); 
}

function ajaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "/school/Admin/Teacher/demo",
		data: {
			saveImgUrl: saveImgUrl, 
			content: KindEditor.instances[0].html(),
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
				$("#lab").html(data.content);
				KindEditor.instances[0].html("");
				alert("afafas");
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	}); 
}
