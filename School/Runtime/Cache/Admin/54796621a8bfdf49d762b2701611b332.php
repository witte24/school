<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/school/Public/Admin/css/style.css">
<script language="javascript" type="text/javascript" src="/school/Public/Admin/js/jquery.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
</head>
<body>

<section class=" content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">修改密码</h2>
      </div>
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">原密码：</span>
        <input type="password" id="oldpwd" oninput="oldpwdInput()" class="textbox textbox_225" value="" placeholder="6~20位字符"/>
        <span class="errorTips" id="oldpwdpro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">新密码：</span>
        <input type="password" id="newpwd" oninput="newpwdInput()" class="textbox textbox_225" value="" placeholder="6~20位字符"/>
        <span class="errorTips" id="newpwdpro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">再输一次：</span>
        <input type="password" id="newpwd2" oninput="newpwd2Input()" class="textbox textbox_225" value="" placeholder="6~20位字符"/>
        <span class="errorTips" id="newpwdpro2" >*</span>
       </li>
       <li>
        <input hidden type="tel" id="aid" class="textbox textbox_225" value="<?php echo ($aid); ?>" placeholder=""/>
       </li>

       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" id="update" value="更新/保存"/>
       </li>
      </ul>
 </div>
</section>
<script language="javascript" type="text/javascript"  charset="UTF-8"
		src="/school/Public/Admin/js/admin/alterPwd.js">
</script>
</body>
</html>