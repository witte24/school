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
       <h2 class="fl">修改团队信息</h2>
      </div>
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">团队名称：</span>
        <input type="tel" class="textbox textbox_225" oninput="nameInput()" id="name" value="<?php echo ($teamRes["name"]); ?>" placeholder="2~20个字符"/>
        <span class="errorTips" id="namepro">*</span>
       </li>
       <li hidden >
        <span class="item_name" style="width:120px;"></span>
        <input type="tel" class="textbox textbox_225" id="teamid" value="<?php echo ($teamRes["teamid"]); ?>" />
        <span class="errorTips" id="namepro">*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" id="save" value="更新/保存"/>
       </li>
      </ul>
 </div>
</section>
<script language="javascript" type="text/javascript"  src="/school/Public/Admin/js/team/alterTeam.js"></script>
</body>
</html>