var right = new Array(1,1,1,1,1,1,1,1);
var title,title2,titleEnd;
var teamArr = new Array();
 $("#save").click(function(){ 
 alert("hello");
	isEmpty();
	//判断信息正确性
	for(var i=0;i<right.length;i++){
		if(right[i]==0){
			return;
		}
	}
	ajaxPost();

}); 
//名字监听器：0	
function nameInput(){
	var name = $.trim($("#name").val());
	var regName = /^\S{2,20}$/;
	if(name==null || name==""){
		$("#namepro").html("不能为空");
		right[0]=0;
	}else if(!regName.test(name) ){
		right[0]=0;
		$("#namepro").html("应为2~20个字符");
	}else{
		$("#namepro").html("*");
		right[0]=1;
	}
}
 
//照片监听器:1
function pictureChg(){
	var file = $('#picture')[0].value;   
	if(!/.(gif|jpg|jpeg|png|bmp|tiff|pcx|tga|ico)$/.test(file) && file!="" && file!=null){   
		$("#picturepro").html("图片格式错误");
		right[1]=0;
	}else{
		$("#picturepro").html("*"+right[0]+"*");
		right[1]=1;
	}
}

//学历监听器：2
function edubgChg(){
	var edubg =  $("#edubg").val();
	if(edubg=="选择学历"){
		$("#edubgpro").html("请选择学历");
		right[2]=0;
	}else{
		right[2]=1;
	}
}

//职称监听器：3	
function titleChg(){
	title =  $("#title").val();
	if(title=="其它"){
		$("#titlepro").html("*");
		$("#litltle").removeAttr("hidden");
		right[3]=0;
	}else{
		right[3]=1;
		$("#titlepro").html("*");
		$("#litltle").prop("hidden",true);
	}
}

//职称监听器2：3	
function title2input(){
	title2 = $.trim($("#title2").val());
	var titleReg = /^\S{2,60}$/;
	if(title2==null || title2==""){
		$("#title2pro").html("不能为空");
		right[3]=0;
	}else if(!titleReg.test(title2) ){
		right[3]=0;
		$("#title2pro").html("应为2~60个字符");
	}else{
		right[3]=1;
		$("#title2pro").html("*");
	}
}

//办公室监听器：4
function officeInput(){
	var office = $.trim($("#office").val());
	var regOffice = /^\S{2,20}$/;
	if(!regOffice.test(office) ){
		right[4]=0;
		$("#officepro").html("应为2~20个字符");
	}else{
		right[4]=1;
		$("#officepro").html("");
	}
}

//网页监听器：5
function webpageInput(){
	// 
	var webpage = $.trim($("#webpage").val());
	var regWebpage = /^\S{5,100}$/;
	if(!regWebpage.test(webpage) ){
		right[5]=0;
		$("#webpagepro").html("应为5~100个字符");
	}else{
		right[5]=1;
		$("#webpagepro").html("");
	}
}

//研究领域监听器：6
function fieldInput(){
	var field = $.trim($("#field").val());
	var regField = /^\S{2,400}$/;
	if(!regField.test(field) ){
		right[6]=0;
		$("#fieldpro").html("应为2~400个字符");
	}else{
		right[6]=1;
		$("#fieldpro").html("");
	}
} 

//所属团队监听器：7
function teamChg(){
	if($(":checkbox:checked").size()==0){
		right[7]=0;
		$("#teampro").html("不能为空");
	}else{
		right[7]=1;
		$("#teampro").html("*");
	}
} 

//判断重要信息是否缺省
function isEmpty(){
	$("#namepro").html("*");
	$("#edubgpro").html("*");
	$("#titlepro").html("*");
	$("#teampro").html("*");
	//名字
	var name = $.trim($("#name").val());
	if(name==null || name==""){
		$("#namepro").html("不能为空");
		right[0]=0;
	}
	//学历
	var edubg =  $("#edubg").val();
	if(edubg=="选择学历"){
		$("#edubgpro").html("请选择学历");
		right[2]=0;
	}
	//职称
	title =  $("#title").val();
	if(title=="选择职称"){
		$("#titlepro").html("请选择职称");
		right[3]=0;
	}else if(title=="其它"){
		titleEnd = title2;
	}else{
		titleEnd = title;
	}
	//团队
	if($(":checkbox:checked").size()==0){
		right[7]=0;
		$("#teampro").html("不能为空");
	}else{
        $(':checkbox:checked').each(function() {
            teamArr.push($(this).val());
        });
	}
}

function ajaxPost(){
	$.ajax({ 
		type: "POST", 	
		url: "/school/Admin/Teacher/addTeacher",
		data: {
			name: $.trim($("#name").val() ), 
			edubg: $("#edubg").val(),
			office: $.trim($("#office").val()), 
			field: $.trim($("#field").val()),
			webpage : $.trim($("#webpage").val()),
			title: titleEnd,
			team: teamArr,
			picture:$("#hidImgName").val(),
		},
		dataType: "json",
		success: function(data){
			if (data.status) { 
				location.href='/school/Admin/Teacher/teacherList';
			} else {
				$("#namepro").html(data.content.name);
			}  
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	}); 
}

window.onload = function() {
    init();  //初始化
}

//初始化
function init() {
    //初始化图片上传
    var btnImg = document.getElementById("btnUploadImg");
    var img = document.getElementById("imgShow");
    var hidImgName = document.getElementById("hidImgName");
	ajaxUplodImg(btnImg, img, hidImgName);;
	document.getElementById("btnDeleteImg").onclick = function() {
		DelImgBtn(img, hidImgName);
		// hidPut.value = "";
		// img.src = ROOT+"Public/Admin/img/icon/head.jpg";
		};
	
}



//图片上传
function ajaxUplodImg(btn, img, hidPut) {
    var button = btn, interval;
    new AjaxUpload(button, {
        action: '/school/Admin/Teacher/upPic',
        data: {
		},
		type: "POST",
        name: 'pic',
        onSubmit: function(file, ext) {
            if (!(ext && /(jpg|JPG|png|PNG|gif|GIF|ico|ICO|jpeg|JPEG)$/.test(ext))) {
				$("#picturepro").html("图片格式错误");
                return false;
            }
        },
        onComplete: function(file, response) {//上传成功的函数；response代表服务器返回的数据  
            if (!response) {
                $("#picturepro").html("上传失败，图片应不超8Mb");
            }
            else {
				//此处可优化，ajaxUpload直接传数据出现bug,只能使用一次ajax删除更改的图片
				DelImg(img, hidPut); 
				hidPut.value = response;
				img.src = ROOT+response;
            }
        }
    });
}



//删除图片（连续点击上传时）
function DelImg(img, hidPut) {
	$.ajax({ 
		type: "POST", 	
		url: "/school/Admin/Teacher/upPic",
		data: {
			delPic: $("#hidImgName").val()
		},
		dataType: "json",
		success: function(data){
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	}); 
    // hidPut.value = "";
    // img.src = ROOT+"Public/Admin/img/icon/head.jpg";
}

//删除图片（点击删除按钮时）
function DelImgBtn(img, hidPut) {
	$.ajax({ 
		type: "POST", 	
		url: "/school/Admin/Teacher/upPic",
		data: {
			delPic: $("#hidImgName").val()
		},
		dataType: "json",
		success: function(data){
			hidPut.value = "";
			img.src = ROOT+"Public/Admin/img/icon/head.jpg";
		},
		error: function(jqXHR){     
		   alert("发生错误" + jqXHR.status);  
		},     
	}); 
    // hidPut.value = "";
    // img.src = ROOT+"Public/Admin/img/icon/head.jpg";
}

	