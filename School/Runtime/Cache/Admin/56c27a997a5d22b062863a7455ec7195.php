<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/school/Public/Admin/css/style.css">
<script src="/school/Public/Admin/js/jquery.js"></script>
<script src="/school/Public/Admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<title>无标题文档</title>

</head>

<body>
	<aside class="lt_aside_nav content mCustomScrollbar">
	 <h2><a href="index.html">起始页</a></h2>
	 <ul>
	  <li>
	   <dl>
		<dt>公告事项</dt>
		<!--当前链接则添加class:active-->
		<dd><a href="/school/Admin/Index/right" target="main" class="active">公告</a></dd>
		<dd><a href="#">文档</a></dd>
	   </dl>
	  </li>
	  <li>
	   <dl>
		<dt>学院</dt>
		<dd><a href="#">基本信息</a></dd>
		<dd><a href="#">实验室</a></dd>
		<dd><a href="#">办公室</a></dd>
	   </dl>
	  </li>
	  <li>
	   <dl>
		<dt>教学团队</dt>
		<dd><a href="/school/Admin/Team/teamList" target="main" >团队管理</a></dd>
		<dd><a href="/school/Admin/Teacher/teacherList" target="main" >团队成员管理</a></dd>
	   </dl>
	  </li>
	  <li>
	   <dl>
		<dt>专业资讯</dt>
		<dd><a href="">教学大纲</a></dd>
		<dd><a href="">人才培养方案</a></dd>
	   </dl>
	  </li>
	  <li>
	   <dl>
		<dt>学生园地</dt>
		<dd><a href="">竞赛</a></dd>
		<dd><a href="">毕业论文</a></dd>
		<dd><a href="">实习与实训</a></dd>
	   </dl>
	  </li>
	  <li>
	   <dl>
		<dt>杰出校友</dt>
		<dd><a href="/school/Admin/SchFellow/schFellowList" target="main" >校友信息</a></dd>
	   </dl>
	  </li>
	  <li>
	   <dl>
		<dt>管理员</dt>
		<dd><a href="/school/Admin/Admin/adminMsg/aid/<?php echo ($aid); ?>" target="main">个人信息</a></dd>
		<dd><a href="/school/Admin/Admin/alterPwd/aid/<?php echo ($aid); ?>" target="main">修改密码</a></dd>
		<dd><a href="/school/Admin/Admin/adminList/aid/<?php echo ($aid); ?>" target="main">管理员列表</a></dd>
	   </dl>
	  </li>
	  <li>
	   <p class="btm_infor">计算机学院 版权所有</p>
	  </li>
	 </ul>
	</aside>
</body>
</html>