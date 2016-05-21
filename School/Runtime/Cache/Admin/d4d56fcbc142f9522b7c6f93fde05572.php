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
       <h2 class="fl">修改教师信息</h2>
      </div>
     <section>
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">名字：</span>
        <input type="text" class="textbox textbox_225" placeholder="2~20个字符"/>
        <span class="errorTips">*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">照片：</span>
        <label class="uploadImg">
         <input type="file"/>
         <span>上传照片</span>
        </label>
       </li>
       <li>
        <span class="item_name" style="width:120px;">学历：</span>
        <select class="select">
         <option>选择学历</option>
         <option>博士</option>
         <option>硕士</option>
         <option>学士</option>
        </select>
		<span class="errorTips">*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">职称：</span>
        <select class="select">
         <option>选择职称</option>
         <option>教授</option>
         <option>副教授</option>
         <option>讲师</option>
         <option>实验员</option>
         <option>其它</option>
        </select>
		<span class="errorTips">*</span>
       </li>
       <li hidden>
        <span class="item_name" style="width:120px;">职称：</span>
        <input type="text" class="textbox textbox_225" placeholder="请填写职称"/>
        <span class="errorTips">*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">办公室：</span>
        <input type="text" class="textbox textbox_295" placeholder="不超过20个字符"/>
       </li>       <li>
        <span class="item_name" style="width:120px;">个人网页：</span>
        <input type="text" class="textbox textbox_295" placeholder="不超过100个字符"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">所属团队：</span>
        <label class="single_selection"><input type="checkbox" name="name"/>计科团队</label>
        <label class="single_selection"><input type="checkbox" name="name"/>软件团队</label>
		<span class="errorTips">*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">研究领域：</span>
        <textarea placeholder="不超过200个中文字符" class="textarea" style="height:50px;width:640px;"></textarea>
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" value="保存"/>
       </li>
      </ul>
     </section>
 </div>
</section>
</body>
</html>