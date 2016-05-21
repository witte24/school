<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/school/Public/Admin/css/style.css">
<script src="/school/Public/Admin/js/jquery.js"></script>
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
        <span class="item_name" style="width:120px;">邮箱：</span>
        <input type="tel" class="textbox textbox_225" id="email" value="" oninput="emailInput()" placeholder="邮箱地址"/>
        <span class="errorTips" id="emailpro" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">毕业年份：</span>
        <input type="tel" class="textbox textbox_225" id="" value="" oninput="emailInput()" placeholder="邮箱地址"/>
        <span class="errorTips" id="" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">简介：</span>
		<div style="margin-left:120px;margin-top:-30;">
        <textarea   class="content" id="editor_id"  name="content" style="width:700px;height:300px;">
	
		</textarea>
		</div>
        <span class="errorTips" id="" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" id="submit" value="提交"/>
       </li>
      </ul>
 </div>
</section>
	<script charset="utf-8" src="/school/Public/Admin/editor/kindeditor-all.js"></script>
	<script charset="utf-8" src="/school/Public/Admin/editor/lang/zh-CN.js"></script>
	<script language="javascript" type="text/javascript" 
			src="/school/Public/Admin/js/teacher/demo.js"></script>
</body>
</html>