<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/school/Public/Admin/css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/school/Public/Admin/js/jquery.js"></script>
<script src="/school/Public/Admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body>


<section class=" content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">个人信息</h2>
      </div>
      <table class="table">
       <tr>
        <th>账号</th>
        <th>姓名</th>
        <th>手机长号</th>
        <th>手机短号</th>
        <th>电子邮箱</th>
        <th>创建日期</th>
        <th>操作</th>
       </tr>
       <tr>
        <td class="center"><?php echo ($myMsg["name"]); ?></td>
        <td class="center"><?php echo ($myMsg["rname"]); ?></td>
        <td class="center"><?php echo ($myMsg["lphone"]); ?></td>
        <td class="center"><?php echo ($myMsg["sphone"]); ?></td>
        <td class="center"><?php echo ($myMsg["email"]); ?></td>
        <td class="center"><?php echo ($myMsg["cdate"]); ?></td>
        <td class="center">
         <a href="/school/Admin/Admin/alterMyMsg/aid/<?php echo ($aid); ?>" title="修改" class="link_icon">&#101;</a>
        </td>
       </tr>
      </table>
 </div>
</section>
<script language="javascript" type="text/javascript"  src="/school/Public/Admin/js/admin/alterMyMsg.js"></script>
</body>
</html>