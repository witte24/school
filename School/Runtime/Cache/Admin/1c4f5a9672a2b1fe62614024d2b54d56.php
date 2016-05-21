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


<section class="content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">教师列表</h2>
       <a href="/school/Admin/Team/addTeacher" class="fr top_rt_btn add_icon">添加教师</a>
      </div>
      <section class="mtb">
       <select class="select">
		<option>全部</option>
        <option>计科团队</option>
        <option>软件团队</option>
        <option>信科团队</option>
       </select>
       <input type="text" class="textbox textbox_225" placeholder="请输入查询信息"/>
       <input type="button" value="查询" class="group_btn"/>
      </section>
      <table class="table">
       <tr>
        <th>Id</th>
        <th>照片</th>
        <th>名字</th>
        <th>职称</th>
        <th>最高学历</th>
        <th>办公室</th>
        <th>研究领域</th>
        <th>个人网页</th>
        <th>操作</th>
       </tr>
       <tr>
        <td class="center">001</td>
        <td class="center"><img src="upload/user_002.png" width="50" height="50"/></td>
        <td class="center">DeathGhost</td>
        <td class="center">教授</td>
        <td class="center">博士</td>
        <td class="center">8A302</td>
		<td class="center">普通教师</td>
        <td class="center"><a src="#">url</a> </td>
        <td class="center">
         <a href="/school/Admin/Team/alterTeacher" title="编辑" class="link_icon">&#101;</a>
         <a href="#" title="删除" class="link_icon">&#100;</a>
        </td>
       </tr>

      </table>
      <aside class="paging">
       <a>第一页</a>
       <a>1</a>
       <a>2</a>
       <a>3</a>
       <a>…</a>
       <a>1004</a>
       <a>最后一页</a>
      </aside>
 </div>
</section>
</body>
</html>