<?php
header('Content-Type: text/html; charset=utf-8');
require_once('api/Mock.php');
$productdata = get_oem_config();
$servers = get_server_list();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>服务器列表 - <?php echo $productdata['title'];?></title>
  <link href="static/layui/css/layui.css" rel="stylesheet">
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
  .user-area{display:flex;gap:15px;}
  .user-area a{padding:8px 24px;border-radius:20px;background:rgba(255,255,255,0.1);color:#fff;text-decoration:none;transition:0.3s;font-size:14px;}
  .user-area a:hover{background:#667eea;}
  
  .page-title{text-align:center;font-size:42px;font-weight:bold;margin:50px 0 40px;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  
  .filter-bar{display:flex;justify-content:center;gap:15px;margin-bottom:40px;flex-wrap:wrap;}
  .filter-btn{padding:10px 24px;border-radius:25px;background:rgba(255,255,255,0.1);color:#fff;border:1px solid rgba(255,255,255,0.1);cursor:pointer;transition:0.3s;font-size:14px;}
  .filter-btn:hover,.filter-btn.active{background:linear-gradient(135deg,#667eea,#764ba2);border-color:#667eea;}
  
  .server-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:25px;max-width:1200px;margin:0 auto;padding:0 20px;}
  .server-card{background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border:1px solid rgba(255,255,255,0.1);border-radius:16px;padding:30px;transition:0.3s;}
  .server-card:hover{transform:translateY(-8px);border-color:#667eea;box-shadow:0 20px 40px rgba(102,126,234,0.2);}
  .server-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;}
  .server-name{font-size:22px;font-weight:bold;}
  .tag{padding:5px 14px;border-radius:20px;font-size:12px;margin-left:8px;}
  .tag-free{background:linear-gradient(135deg,#4caf50,#8bc34a);}
  .tag-vip{background:linear-gradient(135deg,#ff9800,#ff5722);}
  .server-info{font-size:14px;opacity:0.7;margin:10px 0;display:flex;justify-content:space-between;}
  .server-stats{display:flex;gap:20px;margin-top:20px;padding-top:20px;border-top:1px solid rgba(255,255,255,0.1);}
  .stat{text-align:center;flex:1;}
  .stat-num{font-size:24px;font-weight:bold;color:#667eea;}
  .stat-label{font-size:12px;opacity:0.6;margin-top:5px;}
  .connect-btn{display:block;width:100%;padding:14px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-align:center;border-radius:12px;text-decoration:none;font-weight:bold;margin-top:20px;transition:0.3s;}
  .connect-btn:hover{transform:scale(1.02);box-shadow:0 10px 30px rgba(102,126,234,0.4);}
  
  .footer{background:linear-gradient(135deg,#0a0a0a,#1a1a1a);padding:40px 0;text-align:center;border-top:1px solid rgba(255,255,255,0.1);margin-top:60px;}
  .footer p{opacity:0.6;margin:10px 0;}
  .footer a{color:#667eea;text-decoration:none;margin:0 15px;}
  </style>
</head>
<body>
  <div class="header">
    <div class="container">
      <div class="logo"><?php echo $productdata['title'];?></div>
      <div class="nav">
        <a href="/">首页</a>
        <a href="/server.php" class="active">服务器</a>
        <a href="/page/pay/pay.php">充值</a>
        <a href="/page/load/appload.php">下载</a>
        <a href="#">帮助</a>
      </div>
      <div class="user-area">
        <a href="/page/oauth/login_home.php">登录</a>
        <a href="/page/oauth/login_home.php">注册</a>
      </div>
    </div>
  </div>
  
  <div class="container">
    <h1 class="page-title">🌍 所有服务器节点</h1>
    
    <div class="filter-bar">
      <button class="filter-btn active">全部</button>
      <button class="filter-btn">免费</button>
      <button class="filter-btn">VIP</button>
      <button class="filter-btn">亚洲</button>
      <button class="filter-btn">欧洲</button>
      <button class="filter-btn">美洲</button>
    </div>
    
    <div class="server-grid">
      <?php foreach($servers as $s):?>
      <div class="server-card">
        <div class="server-header">
          <span class="server-name"><?php echo $s['name'];?></span>
          <div>
            <span class="tag <?php echo $s['is_free']?'tag-free':'tag-vip';?>"><?php echo $s['is_free']?'免费':'VIP';?></span>
          </div>
        </div>
        <div class="server-info"><span>服务器IP</span><span><?php echo $s['ip'];?></span></div>
        <div class="server-info"><span>端口</span><span>10000</span></div>
        <div class="server-info"><span>协议</span><span>TCP/UDP</span></div>
        <div class="server-stats">
          <div class="stat"><div class="stat-num"><?php echo $s['online'];?></div><div class="stat-label">在线人数</div></div>
          <div class="stat"><div class="stat-num"><?php echo $s['load'];?>%</div><div class="stat-label">负载</div></div>
          <div class="stat"><div class="stat-num">50ms</div><div class="stat-label">延迟</div></div>
        </div>
        <a href="#" class="connect-btn">🚀 立即加速</a>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <div class="footer">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
  </div>
</body>
</html>