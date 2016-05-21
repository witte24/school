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
       <h2 class="fl">管理员列表</h2>
       <a href="/school/Admin/Admin/addAdmin" class="fr top_rt_btn add_icon">添加新管理员</a>
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
	   <?php if(is_array($adminMsgs)): foreach($adminMsgs as $key=>$vo): ?><tr>
        <td class="center" ><?php echo ($vo["name"]); ?></td>
        <td class="center"><?php echo ($vo["rname"]); ?></td>
        <td class="center"><?php echo ($vo["lphone"]); ?></td>
        <td class="center"><?php echo ($vo["sphone"]); ?></td>
		<td class="center"><?php echo ($vo["email"]); ?></td>
		<td class="center"><?php echo ($vo["cdate"]); ?></td>
        <td class="center">
         <a href="/school/Admin/Admin/alterMyMsg/aid/<?php echo ($vo["aid"]); ?>/issuper/1/" title="编辑" class="link_icon">&#101;</a>
         <a href="/school/Admin/Admin/delAdmin/aid/<?php echo ($vo["aid"]); ?>" title="删除"  class="link_icon del">&#100;</a>
        </td>
       </tr><?php endforeach; endif; ?>
      </table>
      <aside class="paging">
			<?php echo ($page); ?>
      </aside>
 </div>
</section>
<script language="javascript" type="text/javascript"  charset="UTF-8"
		src="/school/Public/Admin/js/admin/delAdmin.js">
</script>

</body>
</html>