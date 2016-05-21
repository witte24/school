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
       <h2 class="fl">校友列表</h2>
       <a href="/school/Admin/SchFellow/addSchFellow" class="fr top_rt_btn add_icon">添加校友</a>
      </div>
	   <section class="mtb">
       <input type="text" id="qrydata" class="textbox textbox_225" value="" placeholder="请输入查询信息"/>
       <input type="button" id="save" value="查询"  class="group_btn"/>
      </section>

      <table class="table">
       <tr>
        <th>姓名</th>
        <th>邮箱地址</th>
        <th>简介</th>
        <th>毕业年份</th>
        <th>创建日期</th>
        <th>操作</th>
       </tr>

       <tr class="doublelh">
        <td class="center"  >赵敏</td>
        <td class="center">123456@qq.com</td>
        <td class="center"><a href="" >赵敏校友毕业于fsafasfasfasfafssfasf..........</a> </td>
		<td class="center">2003</td>
		<td class="center">2016/5/15</td>
        <td class="center">
         <a href="" title="编辑" class="link_icon">&#101;</a>
         <a href="" title="删除"  class="link_icon del">&#100;</a>
        </td>
       </tr>

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