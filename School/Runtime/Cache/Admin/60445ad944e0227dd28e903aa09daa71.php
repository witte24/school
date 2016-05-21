<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/school/Public/Admin/css/style.css">
<script src="/school/Public/Admin/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/school/Public/Admin/css/jquery-ui.min.css">
<script src="/school/Public/Admin/js/jquery-ui.min.js"></script>
</head>
<body>

<section class=" content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">添加校友</h2>
      </div>
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">姓名：</span>
        <input type="tel" class="textbox textbox_225" oninput="nameInput()" id="name" value="" placeholder="2~20个字符"/>
        <span class="errorTips" id="namepro">*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">姓名：</span>
        <input type="text" id="selectDate" class="textbox textbox_225" readonly="readonly"/>  
        <span class="errorTips" id="namepro">*</span>
       </li>

       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" id="submit" value="提交"/>
       </li>
      </ul>
 </div>
</section>
	<script> 
	$(document).ready(function() {     
      $('#selectDate').datepicker();
jQuery(function($){  
    $.datepicker.regional['zh-CN'] = {  
        closeText: '关闭',  
        prevText: '<上月',  
        nextText: '下月>',  
        currentText: '今天',  
        monthNames: ['一月','二月','三月','四月','五月','六月',  
        '七月','八月','九月','十月','十一月','十二月'],  
        monthNamesShort: ['一','二','三','四','五','六',  
        '七','八','九','十','十一','十二'],  
        dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],  
        dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],  
        dayNamesMin: ['日','一','二','三','四','五','六'],  
        weekHeader: '周',  
        dateFormat: 'yy-mm-dd',  
        firstDay: 1,  
        isRTL: false,  
        showMonthAfterYear: true,  
        yearSuffix: '年'};  
    $.datepicker.setDefaults($.datepicker.regional['zh-CN']);  
});  	  
  });  
	</script>
	<script charset="utf-8" src="/school/Public/Admin/editor/kindeditor-all.js"></script>
	<script charset="utf-8" src="/school/Public/Admin/editor/lang/zh-CN.js"></script>
	<script language="javascript" type="text/javascript" 
			src="/school/Public/Admin/js/"></script>
</body>
</html>