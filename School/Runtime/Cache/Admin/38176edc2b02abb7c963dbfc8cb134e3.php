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
       <h2 class="fl">团队列表</h2>
       <a href="/school/Admin/Team/addTeam" class="fr top_rt_btn add_icon">添加团队</a>
      </div>

      <table class="table">
       <tr>
        <th>名称</th>
        <th>博士人数</th>
        <th>硕士人数</th>
        <th>学士人数</th>
        <th>总人数</th>
        <th>创建日期</th>
        <th>操作</th>
       </tr>

	   <?php if(is_array($teamRes)): foreach($teamRes as $key=>$vo): ?><tr>
        <td class="center" ><?php echo ($vo["name"]); ?></td>
        <td class="center">10</td>
        <td class="center">10</td>
        <td class="center">5</td>
		<td class="center">25</td>
		<td class="center"><?php echo ($vo["cdate"]); ?></td>
        <td class="center">
         <a href="/school/Admin/Team/alterTeam/teamid/<?php echo ($vo["teamid"]); ?>/name/<?php echo ($vo["name"]); ?>" title="编辑" class="link_icon">&#101;</a>
         <a href="" title="删除"  class="link_icon del">&#100;</a>
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