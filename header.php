<?php
// 公共头部
$current_page = $current_page ?? '';
$productdata = $productdata ?? array("title"=>"锐野优商加速器","logo"=>"/assets/images/logo.png");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $page_title ?? '首页';?> - <?php echo $productdata['title'];?></title>
  <link href="static/layui/css/layui.css" rel="stylesheet">
  <link href="static/css/style.css" rel="stylesheet">
  <style>
  *{margin:0;padding:0;box-sizing:border-box;}
  body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;background:#0a0a0a;color:#fff;min-height:100vh;}
  .header{background:linear-gradient(135deg,#1a1a2e 0%,#16213e 100%);padding:20px 0;position:sticky;top:0;z-index:100;box-shadow:0 2px 20px rgba(0,0,0,0.3);}
  .container{max-width:1200px;margin:0 auto;padding:0 20px;}
  .header .container{display:flex;align-items:center;justify-content:space-between;}
  .logo{font-size:24px;font-weight:bold;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  .nav{display:flex;gap:30px;}
  .nav a{color:#fff;text-decoration:none;opacity:0.9;transition:0.3s;font-size:15px;}
  .nav a:hover,.nav a.active{opacity:1;color:#667eea;}
  .user-area{display:flex;gap:15px;align-items:center;}
  .user-area a{padding:8px 24px;border-radius:20px;background:rgba(255,255,255,0.1);color:#fff;text-decoration:none;transition:0.3s;font-size:14px;}
  .user-area a:hover{background:#667eea;}
  </style>
</head>
<body>
  <div class="header">
    <div class="container">
      <div class="logo"><?php echo $productdata['title'];?></div>
      <nav class="nav">
        <a href="/" <?php echo $current_page=='index'?'class="active"':'';?>>首页</a>
        <a href="/game.php">游戏</a>
        <a href="/server.php" <?php echo $current_page=='server'?'class="active"':'';?>>服务器</a>
        <a href="/pay.php" <?php echo $current_page=='pay'?'class="active"':'';?>>充值</a>
        <a href="/appload.php" <?php echo $current_page=='download'?'class="active"':'';?>>下载</a>
        <a href="/user.php" <?php echo $current_page=='user'?'class="active"':'';?>>用户中心</a>
      </nav>
      <div class="user-area" id="userArea">
        <a href="/login_home.php">登录</a>
      </div>
    </div>
  </div>
  <script>
  // 检查登录状态
  function checkLogin() {
    var match = document.cookie.match(/uid=(\d+)/);
    return match ? true : false;
  }
  function updateUserArea() {
    if (checkLogin()) {
      document.getElementById('userArea').innerHTML = '<a href="/user.php">用户中心</a>';
    }
  }
  updateUserArea();
  </script>
