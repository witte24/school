<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="/school/Public/Admin/css/style.css">
    </head>
    <body>
		<header>
			 <h1><img src="/school/Public/Admin/img/admin_logo.png"/></h1>
			 <ul class="rt_nav">
			  <li><a href="http://www.deathghost.cn" target="_blank" class="website_icon">站点首页</a></li>
			  <li><a href="#" class="clear_icon">清除缓存</a></li>
			  <li><a href="#" class="admin_icon">DeathGhost</a></li>
			  <li><a href="#" class="set_icon">账号设置</a></li>
			  <li><a onclick="if (confirm('确定要退出吗？')) return true; else return false;"
				href="/school/Admin/Login/logout" target=_top class="quit_icon">安全退出</a></li>
			 </ul>
		</header>
    </body>
</html>