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
        <input type="tel" id="name" class="textbox textbox_225" oninput="nameInput()" value="<?php echo ($myMsg["name"]); ?>" placeholder="2~30个字符"/>
        <span class="errorTips" id="namepro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">姓名：</span>
        <input type="tel" id="rname" class="textbox textbox_225" oninput="rnameInput()" value="<?php echo ($myMsg["rname"]); ?>" placeholder="2~30个字符"/>
        <span class="errorTips" id="rnamepro" >*</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">手机长号：</span>
        <input type="tel" id="lphone" class="textbox textbox_225" oninput="lphoneInput()" value="<?php echo ($myMsg["lphone"]); ?>" placeholder="11位数字"/>
        <span class="errorTips" id="lphonepro" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">手机短号：</span>
        <input type="tel" id="sphone" class="textbox textbox_225" oninput="sphoneInput()" value="<?php echo ($myMsg["sphone"]); ?>" placeholder="4~8位数字"/>
        <span class="errorTips" id="sphonepro" ></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">邮箱：</span>
        <input type="tel" id="email" class="textbox textbox_225"  oninput="emailInput()" value="<?php echo ($myMsg["email"]); ?>" placeholder="邮箱地址"/>
        <span class="errorTips" id="emailpro" ></span>
       </li>
       <li>
        <input hidden type="tel" id="aid" class="textbox textbox_225" value="<?php echo ($aid); ?>" placeholder=""/>
       </li>
       <li>
        <input hidden type="tel" id="issuper" class="textbox textbox_225" value="<?php echo ($issuper); ?>" placeholder=""/>
       </li>

       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" id="update" value="更新/保存"/>
       </li>
      </ul>
 </div>
</section>
<script language="javascript" type="text/javascript"  charset="UTF-8"
		src="/school/Public/Admin/js/admin/alterMyMsgs.js">
</script>
</body>
</html>