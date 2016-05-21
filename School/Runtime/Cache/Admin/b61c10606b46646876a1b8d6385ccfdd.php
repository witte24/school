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
       <h2 class="fl">个人信息</h2>
      </div>
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">账号：</span>
        <input type="tel" class="textbox textbox_225" id="name" oninput="nameInput()" value="" placeholder="2~30位字符"/>
        <span class="errorTips" id="namepro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">密码：</span>
        <input type="password" class="textbox textbox_225" id="newpwd" oninput="newpwdInput()" value="" placeholder="6~20位字符"/>
        <span class="errorTips" id="newpwdpro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">再输一次：</span>
        <input type="password" class="textbox textbox_225" id="newpwd2" oninput="newpwd2Input()" value="" placeholder="6~20位字符"/>
        <span class="errorTips" id="newpwd2pro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">姓名：</span>
        <input type="tel" class="textbox textbox_225" id="rname" value="" oninput="rnameInput()" placeholder="2~30位字符"/>
        <span class="errorTips" id="rnamepro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">手机长号：</span>
        <input type="tel" class="textbox textbox_225" id="lphone" value="" oninput="lphoneInput()" placeholder="11位数字"/>
        <span class="errorTips" id="lphonepro" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">手机短号：</span>
        <input type="tel" class="textbox textbox_225" id="sphone" value="" oninput="sphoneInput()" placeholder="4~8位数字"/>
        <span class="errorTips" id="sphonepro" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">邮箱：</span>
        <input type="tel" class="textbox textbox_225" id="email" value="" oninput="emailInput()" placeholder="邮箱地址"/>
        <span class="errorTips" id="emailpro" ></span>
       </li>
       <li>
        <input hidden type="tel" id="aid" class="textbox textbox_225" value="<?php echo ($aid); ?>" placeholder=""/>
       </li>

       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" id="save" value="更新/保存"/>
       </li>
      </ul>
 </div>
</section>
<script language="javascript" type="text/javascript"  charset="UTF-8"
		src="/school/Public/Admin/js/admin/addAdmins.js">
</script>

</body>
</html>