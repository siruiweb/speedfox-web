<?
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
  <link href=\"static/layui/css/layui.css\" rel=\"stylesheet\">
  <link href=\"static/css/style.css\" rel=\"stylesheet\">
  <style>
  *{margin:0;padding:0;box-sizing:border-box;}
  body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;background:#0a0a0a;color:#fff;min-height:100vh;}
  .header{background:linear-gradient(135deg,#1a1a2e,#16213e);padding:15px 0;position:sticky;top:0;z-index:100;}
  .container{max-width:1200px;margin:0 auto;padding:0 20px;}
  .header .container{display:flex;align-items:center;justify-content:space-between;}
  .logo{font-size:20px;font-weight:bold;color:#667eea;}
  .nav{display:flex;gap:30px;}
  .nav a{color:#fff;text-decoration:none;opacity:0.8;transition:0.3s;}
  .nav a:hover,.nav a.active{opacity:1;color:#667eea;}
  .user-area{display:flex;gap:15px;}
  .user-area a{padding:8px 20px;border-radius:20px;background:rgba(255,255,255,0.1);color:#fff;text-decoration:none;transition:0.3s;}
  .user-area a:hover{background:#667eea;}
  
  .banner{height:500px;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);position:relative;display:flex;align-items:center;justify-content:center;}
  .banner-content{text-align:center;color:#fff;}
  .banner h1{font-size:48px;margin-bottom:20px;}
  .banner p{font-size:20px;opacity:0.9;}
  .banner .btn{display:inline-block;padding:15px 40px;background:#fff;color:#667eea;border-radius:30px;font-size:18px;text-decoration:none;font-weight:bold;margin-top:30px;transition:0.3s;}
  .banner .btn:hover{transform:scale(1.05);}
  
  .stats{display:flex;justify-content:center;gap:60px;padding:30px 0;background:rgba(0,0,0,0.3);}
  .stats-item{text-align:center;}
  .stats-num{font-size:36px;font-weight:bold;color:#667eea;}
  .stats-label{font-size:14px;opacity:0.7;}
  
  .section{padding:60px 0;}
  .section-title{text-align:center;font-size:32px;font-weight:bold;margin-bottom:40px;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  
  .server-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;max-width:1200px;margin:0 auto;padding:0 20px;}
  .server-card{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:15px;padding:20px;transition:0.3s;}
  .server-card:hover{transform:translateY(-5px);border-color:#667eea;}
  .server-name{font-size:18px;font-weight:bold;margin-bottom:10px;}
  .server-info{font-size:14px;opacity:0.7;margin:5px 0;}
  .server-tags{margin-top:10px;}
  .tag{padding:3px 10px;border-radius:15px;font-size:12px;margin-right:5px;}
  .tag-free{background:linear-gradient(135deg,#4caf50,#8bc34a);}
  .tag-vip{background:linear-gradient(135deg,#ff9800,#ff5722);}
  .tag-country{background:linear-gradient(135deg,#667eea,#764ba2);}
  
  .game-grid{display:grid;grid-template-columns:repeat(8,1fr);gap:15px;max-width:1200px;margin:0 auto;padding:0 20px;}
  .game-item{text-align:center;padding:20px;background:rgba(255,255,255,0.05);border-radius:10px;transition:0.3s;cursor:pointer;}
  .game-item:hover{transform:scale(1.05);background:rgba(255,255,255,0.1);}
  .game-icon{width:50px;height:50px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:10px;margin:0 auto 10px;}
  .game-name{font-size:12px;}
  
  .package-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:20px;max-width:1200px;margin:0 auto;padding:0 20px;}
  .package-card{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:15px;padding:25px;text-align:center;transition:0.3s;}
  .package-card:hover{transform:translateY(-5px);}
  .package-card.recommend{border-color:#667eea;position:relative;}
  .package-card.recommend::before{content:'推荐';position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:#667eea;color:#fff;padding:2px 12px;border-radius:10px;font-size:12px;}
  .package-name{font-size:20px;font-weight:bold;margin-bottom:10px;}
  .package-price{font-size:28px;color:#667eea;font-weight:bold;}
  .package-price span{font-size:14px;opacity:0.6;}
  .package-desc{font-size:14px;opacity:0.6;margin:10px 0;}
  .package-btn{display:block;padding:12px;border-radius:25px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-decoration:none;margin-top:15px;}
  
  .footer{background:rgba(0,0,0,0.5);padding:40px 0;text-align:center;margin-top:60px;}
  .footer p{opacity:0.6;margin:10px 0;}
  .footer a{color:#667eea;text-decoration:none;margin:0 15px;}
  </style>
</head>
<body>
  <!-- 顶部导航 -->
  <div class=\"header\">
    <div class=\"container\">
      <div class=\"logo\">
        <img src=\"<?php echo $productdata['logo'];?>\" alt=\"logo\" style=\"height:35px;\">
      </div>
      <div class=\"nav\">
        <a href=\"/\" class=\"active\">首页</a>
        <a href=\"/server.php\">服务器</a>
        <a href=\"/page/pay/pay.php\">充值</a>
        <a href=\"/page/load/appload.php\">下载</a>
        <a href=\"#\">帮助</a>
      </div>
      <div class=\"user-area\">
        <a href=\"/page/oauth/login_home.php\">登录</a>
        <a href=\"/page/oauth/login_home.php\">注册</a>
      </div>
    </div>
  </div>
  
  <!-- Banner -->
  <div class=\"banner\">
    <div class=\"banner-content\">
      <h1><?php echo $productdata['title'];?></h1>
      <p>永久免费 不玩套路 - 畅玩全球游戏</p>
      <a href=\"/page/load/appload.php\" class=\"btn\">立即下载</a>
    </div>
  </div>
  
  <!-- 统计数据 -->
  <div class=\"stats\">
    <div class=\"stats-item\">
      <div class=\"stats-num\"><?php echo number_format($stats['total_users']);?>+</div>
      <div class=\"stats-label\">注册用户</div>
    </div>
    <div class=\"stats-item\">
      <div class=\"stats-num\"><?php echo $stats['total_servers'];?>+</div>
      <div class=\"stats-label\">服务器节点</div>
    </div>
    <div class=\"stats-item\">
      <div class=\"stats-num\"><?php echo $stats['total_games'];?>+</div>
      <div class=\"stats-label\">支持游戏</div>
    </div>
    <div class=\"stats-item\">
      <div class=\"stats-num\"><?php echo $stats['total_traffic'];?>TB+</div>
      <div class=\"stats-label\">累计流量</div>
    </div>
  </div>
  
  <!-- 热门服务器 -->
  <div class=\"section\">
    <h2 class=\"section-title\">热门服务器</h2>
    <div class=\"server-grid\">
      <?php foreach(array_slice($servers, 0, 8) as $s):?>
      <div class=\"server-card\">
        <div class=\"server-name\"><?php echo $s['name'];?></div>
        <div class=\"server-info\">IP: <?php echo $s['ip'];?></div>
        <div class=\"server-info\">在线: <?php echo $s['online'];?> 人</div>
        <div class=\"server-info\">负载: <?php echo $s['load'];?>%</div>
        <div class=\"server-tags\">
          <span class=\"tag <?php echo $s['is_free']?'tag-free':'tag-vip';?>\"><?php echo $s['is_free']?'免费':'VIP';?></span>
          <span class=\"tag tag-country\"><?php echo $s['country_name'];?></span>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <!-- 支持游戏 -->
  <div class=\"section\" style=\"background:rgba(255,255,255,0.02);\">
    <h2 class=\"section-title\">支持游戏</h2>
    <div class=\"game-grid\">
      <?php foreach($games as $g):?>
      <div class=\"game-item\">
        <div class=\"game-icon\"></div>
        <div class=\"game-name\"><?php echo $g['name'];?></div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <!-- 会员套餐 -->
  <div class=\"section\">
    <h2 class=\"section-title\">会员套餐</h2>
    <div class=\"package-grid\">
      <?php foreach($packages as $i => $p):?>
      <div class=\"package-card <?php echo isset($p['is_recommend']) && $p['is_recommend']?'recommend':'';?>\">
        <div class=\"package-name\"><?php echo $p['name'];?></div>
        <div class=\"package-price\">￥<?php echo $p['price'];?><span>/<?php echo $p['days'];?>天</span></div>
        <div class=\"package-desc\"><?php echo $p['description'];?></div>
        <a href=\"/page/pay/pay.php\" class=\"package-btn\">立即购买</a>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <!-- Footer -->
  <div class=\"footer\">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
    <p>
      <a href=\"#\">关于我们</a>
      <a href=\"#\">联系我们</a>
      <a href=\"#\">服务条款</a>
      <a href=\"#\">隐私政策</a>
    </p>
  </div>
  
  <script src=\"static/layui/layui.js\"></script>
</body>
</html>
