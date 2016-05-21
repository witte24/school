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
       <a href="/school/Admin/Teacher/addTeacher" class="fr top_rt_btn add_icon">添加教师</a>
      </div>
      <section class="mtb">
       <select class="select" id="teamtype" onchange="teamTypeChg()" >
		<option value="0" >全部</option>
		<?php if(is_array($teamRes)): foreach($teamRes as $key=>$vo): ?><option value="<?php echo ($vo["teamid"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
       </select>
       <input type="text" id="qrydata" class="textbox textbox_225" value="" placeholder="请输入查询信息"/>
       <input type="button" id="save" value="查询"  class="group_btn"/>
      </section>
      <table class="table">
       <tr>
        <th>照片</th>
        <th>名字</th>
        <th>职称</th>
        <th>最高学历</th>
        <th>办公室</th>
        <th>研究领域</th>
        <th>个人网页</th>
        <th>操作</th>
       </tr>
	   <?php if(is_array($teacherRes)): foreach($teacherRes as $key=>$vo): ?><tr>
        <td class="center"><img src="/school/<?php echo ($vo["picture"]); ?>" width="50" height="50"/></td>
        <td class="center"><?php echo ($vo["name"]); ?></td>
        <td class="center"><?php echo ($vo["title"]); ?></td>
        <td class="center"><?php echo ($vo["edubg"]); ?></td>
        <td class="center"><?php echo ($vo["office"]); ?></td>
		<td class="center"><?php echo ($vo["filed"]); ?></td>
        <td class="center"><a src="<?php echo ($vo["webpage"]); ?>">点击跳转</a> </td>
        <td class="center">
         <a href="/school/Admin/Teacher/alterTeacher" title="编辑" class="link_icon">&#101;</a>
         <a href="#" title="删除" class="link_icon">&#100;</a>
        </td>
       </tr><?php endforeach; endif; ?>

      </table>
      <aside class="paging">
		<?php echo ($page); ?>
      </aside>
 </div>
</section>
<script language="javascript" type="text/javascript" 
 src="/school/Public/Admin/js/teacher/teacherList.js"></script>
</body>
</html>