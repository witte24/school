<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="/school/Public/Admin/js/jquery.js"></script>

<title>登录</title>

<link href="/school/Public/Admin/css/login.css" rel="stylesheet" type="text/css">

</head>

<body class="login">

<div class="login_m">
	<div class="login_logo"><img src="/school/Public/Admin/img/login/logo.png" width="196" height="46"></div>
	<div class="login_boder">
		<div class="login_padding">
			<h2>用户名</h2>
			<label>
				<input type="text" name="name" oninput="nameInput()"  id="name" class="txt_input txt_input2" >
			</label>
			<h2>密码</h2>
			<label>
				<input type="password" name="pwd" oninput="pwdInput()" id="pwd" class="txt_input" >
			</label>
			<p class="forgot" id="error" ><?php echo ($error); ?></p>
			<div class="rem_sub">
				<div class="rem_sub_l">
					<input type="checkbox" name="remember" id="remember" value='0'>
					<label for="checkbox">记住</label>
				</div>
				<label>
					<input type="submit" class="sub_button" name="button" id="login" value="登录" style="opacity: 0.7;">
				</label>
			</div>
		</div>
	</div><!--login_boder end-->
</div><!--login_m end-->

<br />
<br />

<p align="center"> </p>
<script language="javascript" type="text/javascript"  charset="UTF-8" src="/school/Public/Admin/js/login.js"></script>
</body>
</html>