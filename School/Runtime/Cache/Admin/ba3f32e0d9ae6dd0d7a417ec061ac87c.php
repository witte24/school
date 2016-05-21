<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>添加教师</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/school/Public/Admin/css/style.css">
<script src="/school/Public/Admin/js/jquery.js"></script>
</head>
<body>

<section class=" content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">添加教师</h2>
      </div>
     <section>
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">名字：</span>
        <input type="text" class="textbox textbox_225" oninput="nameInput()" id="name" placeholder="2~20个字符"/>
        <span class="errorTips" id="namepro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;"  >照片：</span>
         <input type="file" id="picture" onchange="pictureChg()" />
        <span class="errorTips" id="picturepro" on ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">学历：</span>
        <select class="select" id="edubg" onchange="edubgChg()" >
         <option value="选择学历">选择学历</option>
         <option value="博士" >博士</option>
         <option value="硕士" >硕士</option>
         <option value="学士" >学士</option>
        </select>
		<span class="errorTips" id="edubgpro" >*</span>
       </li>
       <li>
        <span class="item_name"  style="width:120px;">职称：</span>
        <select class="select" id="title" onchange="titleChg()" >
         <option value="选择职称" >选择职称</option>
         <option value="教授" >教授</option>
         <option value="副教授" >副教授</option>
         <option value="讲师" >讲师</option>
         <option value="实验员" >实验员</option>
         <option value="其它" >其它</option>
        </select>
		<span class="errorTips" id="titlepro" >*</span>
       </li>
       <li hidden = "hidden" id="litltle" >
        <span class="item_name" style="width:120px;"  ></span>
        <input type="text" class="textbox textbox_225" oninput="title2input()" id="title2" placeholder="2~60个字符"/>
        <span class="errorTips" id="title2pro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">办公室：</span>
        <input type="text" class="textbox textbox_295" id="office" oninput="officeInput()" placeholder="2~20个字符"/>
		<span class="errorTips" id="officepro" ></span>
       </li>       
	   <li>
        <span class="item_name" style="width:120px;">个人网页：</span>
        <input type="text" class="textbox textbox_295" oninput="webpageInput()" id="webpage" placeholder="5~100个字符"/>
		<span class="errorTips" id="webpagepro" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">所属团队：</span>
        <label class="single_selection"><input type="checkbox" name="name"/>计科团队</label>
        <label class="single_selection"><input type="checkbox" name="name"/>软件团队</label>
		<span class="errorTips" id="teampro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">研究领域：</span>
        <textarea id="field" placeholder="2~400个字符" class="textarea" oninput="fieldInput()" style="height:50px;width:640px;"></textarea>
		<span class="errorTips" id="fieldpro" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" id="save" value="保存"/>
       </li>
      </ul>
     </section>
 </div>
</section>
<script language="javascript" type="text/javascript"  src="/school/Public/Admin/js/team/addTeacher.js"></script>
</body>
</html>