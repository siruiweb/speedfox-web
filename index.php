<?php
header('Content-Type: text/html; charset=utf-8');
require_once('api/Mock.php');
$productdata = get_oem_config();
$servers = get_server_list();
$games = get_game_list();
$packages = get_packages();
$stats = get_statistics();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $productdata['title'];?> - 首页</title>
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
  
  .banner{height:520px;background:linear-gradient(135deg,#667eea 0%,#764ba2 50%,#6B8DD6 100%);position:relative;display:flex;align-items:center;justify-content:center;overflow:hidden;}
  .banner::before{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></svg>');opacity:0.3;}
  .banner-content{text-align:center;z-index:1;}
  .banner h1{font-size:56px;margin-bottom:20px;font-weight:800;letter-spacing:2px;text-shadow:0 4px 20px rgba(0,0,0,0.3);}
  .banner p{font-size:22px;opacity:0.95;margin-bottom:30px;}
  .banner .btn{display:inline-block;padding:16px 50px;background:#fff;color:#667eea;border-radius:30px;font-size:18px;text-decoration:none;font-weight:bold;transition:0.3s;box-shadow:0 10px 30px rgba(0,0,0,0.2);}
  .banner .btn:hover{transform:translateY(-3px);box-shadow:0 15px 40px rgba(0,0,0,0.3);}
  
  .stats{display:flex;justify-content:center;gap:80px;padding:40px 0;background:rgba(0,0,0,0.4);}
  .stats-item{text-align:center;}
  .stats-num{font-size:42px;font-weight:bold;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  .stats-label{font-size:16px;opacity:0.7;margin-top:5px;}
  
  .section{padding:70px 0;}
  .section-title{text-align:center;font-size:36px;font-weight:bold;margin-bottom:50px;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  
  .server-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:25px;max-width:1200px;margin:0 auto;padding:0 20px;}
  .server-card{background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border:1px solid rgba(255,255,255,0.1);border-radius:16px;padding:25px;transition:0.3s;}
  .server-card:hover{transform:translateY(-8px);border-color:#667eea;box-shadow:0 20px 40px rgba(102,126,234,0.2);}
  .server-name{font-size:20px;font-weight:bold;margin-bottom:15px;}
  .server-info{font-size:14px;opacity:0.7;margin:8px 0;}
  .server-tags{margin-top:15px;}
  .tag{padding:4px 12px;border-radius:20px;font-size:12px;margin-right:8px;}
  .tag-free{background:linear-gradient(135deg,#4caf50,#8bc34a);}
  .tag-vip{background:linear-gradient(135deg,#ff9800,#ff5722);}
  .tag-country{background:linear-gradient(135deg,#667eea,#764ba2);}
  
  .game-grid{display:grid;grid-template-columns:repeat(8,1fr);gap:20px;max-width:1200px;margin:0 auto;padding:0 20px;}
  .game-item{text-align:center;padding:25px 15px;background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border-radius:12px;transition:0.3s;cursor:pointer;}
  .game-item:hover{transform:scale(1.05);background:linear-gradient(145deg,rgba(50,50,70,0.9),rgba(30,30,50,0.9));}
  .game-icon{width:60px;height:60px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:12px;margin:0 auto 15px;display:flex;align-items:center;justify-content:center;font-size:24px;}
  .game-name{font-size:13px;font-weight:500;}
  
  .package-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:25px;max-width:1200px;margin:0 auto;padding:0 20px;}
  .package-card{background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border:1px solid rgba(255,255,255,0.1);border-radius:16px;padding:30px 20px;text-align:center;transition:0.3s;position:relative;}
  .package-card:hover{transform:translateY(-8px);border-color:#667eea;}
  .package-card.recommend{border:2px solid #667eea;transform:scale(1.05);}
  .package-card.recommend::before{content:'最优惠';position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;padding:4px 16px;border-radius:20px;font-size:12px;}
  .package-name{font-size:22px;font-weight:bold;margin-bottom:15px;}
  .package-price{font-size:36px;font-weight:bold;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  .package-price span{font-size:14px;opacity:0.6;font-weight:normal;}
  .package-desc{font-size:14px;opacity:0.6;margin:15px 0;}
  .package-btn{display:block;padding:12px;border-radius:25px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-decoration:none;font-weight:bold;margin-top:20px;transition:0.3s;}
  .package-btn:hover{opacity:0.9;transform:scale(1.02);}
  
  .footer{background:linear-gradient(135deg,#0a0a0a,#1a1a1a);padding:50px 0;text-align:center;border-top:1px solid rgba(255,255,255,0.1);}
  .footer p{opacity:0.6;margin:12px 0;font-size:14px;}
  .footer a{color:#667eea;text-decoration:none;margin:0 20px;transition:0.3s;}
  .footer a:hover{opacity:1;}
  </style>
</head>
<body>
  <div class="header">
    <div class="container">
      <div class="logo"><?php echo $productdata['title'];?></div>
      <div class="nav">
        <a href="/" class="active">首页</a>
        <a href="/server.php">服务器</a>
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
  
  <div class="banner">
    <div class="banner-content">
      <h1><?php echo $productdata['title'];?></h1>
      <p>永久免费 不玩套路 - 畅玩全球游戏</p>
      <a href="/page/load/appload.php" class="btn">立即下载</a>
    </div>
  </div>
  
  <div class="stats">
    <div class="stats-item">
      <div class="stats-num"><?php echo number_format($stats['total_users']);?>+</div>
      <div class="stats-label">注册用户</div>
    </div>
    <div class="stats-item">
      <div class="stats-num"><?php echo $stats['total_servers'];?>+</div>
      <div class="stats-label">服务器节点</div>
    </div>
    <div class="stats-item">
      <div class="stats-num"><?php echo $stats['total_games'];?>+</div>
      <div class="stats-label">支持游戏</div>
    </div>
    <div class="stats-item">
      <div class="stats-num"><?php echo $stats['total_traffic'];?>TB+</div>
      <div class="stats-label">累计流量</div>
    </div>
  </div>
  
  <div class="section">
    <h2 class="section-title">热门服务器</h2>
    <div class="server-grid">
      <?php foreach(array_slice($servers, 0, 8) as $s):?>
      <div class="server-card">
        <div class="server-name"><?php echo $s['name'];?></div>
        <div class="server-info">IP: <?php echo $s['ip'];?></div>
        <div class="server-info">在线: <?php echo $s['online'];?> 人</div>
        <div class="server-info">负载: <?php echo $s['load'];?>%</div>
        <div class="server-tags">
          <span class="tag <?php echo $s['is_free']?'tag-free':'tag-vip';?>"><?php echo $s['is_free']?'免费':'VIP';?></span>
          <span class="tag tag-country"><?php echo $s['country_name'];?></span>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <div class="section" style="background:rgba(255,255,255,0.02);">
    <h2 class="section-title">支持游戏</h2>
    <div class="game-grid">
      <?php foreach($games as $g):?>
      <div class="game-item">
        <div class="game-icon">🎮</div>
        <div class="game-name"><?php echo $g['name'];?></div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <div class="section">
    <h2 class="section-title">会员套餐</h2>
    <div class="package-grid">
      <?php foreach($packages as $i => $p):?>
      <div class="package-card <?php echo isset($p['is_recommend']) && $p['is_recommend']?'recommend':'';?>">
        <div class="package-name"><?php echo $p['name'];?></div>
        <div class="package-price">￥<?php echo $p['price'];?><span>/<?php echo $p['days'];?>天</span></div>
        <div class="package-desc"><?php echo $p['description'];?></div>
        <a href="/page/pay/pay.php" class="package-btn">立即购买</a>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <div class="footer">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
    <p>
      <a href="#">关于我们</a>
      <a href="#">联系我们</a>
      <a href="#">服务条款</a>
      <a href="#">隐私政策</a>
    </p>
  </div>
</body>
</html>