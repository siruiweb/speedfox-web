<?
$debug = time();
require_once('api/Mock.php');
$product = isset($_GET['product']) ? $_GET['product'] : 'default';
$productdata = get_oem_config($product);
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
  <link href="static/css/color_map.css" rel="stylesheet">
  <link href="static/css/style.css?<?echo $debug;?>" rel="stylesheet">
  <style>
  .banner{height:500px;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);position:relative;}
  .banner-content{text-align:center;padding-top:120px;color:#fff;}
  .banner h1{font-size:48px;margin-bottom:20px;}
  .banner p{font-size:20px;opacity:0.9;}
  .stats{display:flex;justify-content:center;gap:60px;padding:40px 0;}
  .stats-item{text-align:center;color:#fff;}
  .stats-num{font-size:36px;font-weight:bold;}
  .stats-label{font-size:14px;opacity:0.8;}
  .section{padding:60px 0;}
  .section-title{text-align:center;font-size:32px;margin-bottom:40px;color:#333;}
  .server-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;max-width:1200px;margin:0 auto;}
  .server-card{background:#fff;border-radius:10px;padding:20px;box-shadow:0 2px 12px rgba(0,0,0,0.1);transition:all 0.3s;}
  .server-card:hover{transform:translateY(-5px);box-shadow:0 5px 20px rgba(0,0,0,0.15);}
  .server-name{font-size:18px;font-weight:bold;margin-bottom:10px;}
  .server-info{font-size:14px;color:#666;}
  .server-tag{display:inline-block;padding:2px 8px;border-radius:4px;font-size:12px;margin-right:5px;}
  .tag-free{background:#4caf50;color:#fff;}
  .tag-vip{background:#ff9800;color:#fff;}
  .game-grid{display:grid;grid-template-columns:repeat(8,1fr);gap:15px;max-width:1200px;margin:0 auto;}
  .game-item{text-align:center;padding:15px;background:#fff;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.08);cursor:pointer;transition:all 0.3s;}
  .game-item:hover{transform:scale(1.05);}
  .game-icon{width:50px;height:50px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:10px;margin:0 auto 10px;}
  .game-name{font-size:12px;color:#333;}
  .package-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:20px;max-width:1200px;margin:0 auto;}
  .package-card{background:#fff;border-radius:10px;padding:25px;text-align:center;box-shadow:0 2px 12px rgba(0,0,0,0.1);transition:all 0.3s;}
  .package-card:hover{transform:translateY(-5px);}
  .package-card.recommend{border:2px solid #667eea;position:relative;}
  .package-card.recommend::before{content:'推荐';position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:#667eea;color:#fff;padding:2px 12px;border-radius:10px;font-size:12px;}
  .package-name{font-size:20px;font-weight:bold;margin-bottom:10px;}
  .package-price{font-size:28px;color:#667eea;font-weight:bold;}
  .package-price span{font-size:14px;color:#999;font-weight:normal;}
  .package-days{font-size:14px;color:#666;margin:10px 0;}
  .package-btn{display:block;padding:10px;border-radius:25px;background:#667eea;color:#fff;text-decoration:none;margin-top:15px;transition:all 0.3s;}
  .package-btn:hover{background:#5568d3;}
  .footer{background:#2d2d2d;color:#fff;padding:40px 0;text-align:center;}
  .footer a{color:#aaa;text-decoration:none;margin:0 10px;}
  </style>
</head>
<body>
  <!-- 顶部导航 -->
  <div class="header">
    <div class="container">
      <div class="logo">
        <img src="<?php echo $productdata['logo'];?>" alt="logo" style="height:40px;">
      </div>
      <div class="nav">
        <a href="/" class="active">首页</a>
        <a href="page/server/server_list.php">服务器</a>
        <a href="page/pay/pay.php">充值</a>
        <a href="page/load/appload.php">下载</a>
        <a href="#">帮助</a>
      </div>
      <div class="user-area">
        <a href="#">登录</a>
        <a href="#">注册</a>
      </div>
    </div>
  </div>
  
  <!-- Banner -->
  <div class="banner">
    <div class="banner-content">
      <h1><?php echo $productdata['title'];?></h1>
      <p>永久免费 不玩套路 - 畅玩全球游戏</p>
      <div style="margin-top:30px;">
        <a href="page/load/appload.php" style="display:inline-block;padding:15px 40px;background:#fff;color:#667eea;border-radius:30px;font-size:18px;text-decoration:none;font-weight:bold;">立即下载</a>
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
  </div>
  
  <!-- 服务器列表 -->
  <div class="section">
    <h2 class="section-title">🔥 热门服务器</h2>
    <div class="server-grid">
      <?php foreach($servers as $s):?>
      <div class="server-card">
        <div class="server-name"><?php echo $s['name'];?></div>
        <div class="server-info">
          <p>IP: <?php echo $s['ip'];?></p>
          <p>在线: <?php echo $s['online'];?> 人</p>
          <p>负载: <?php echo $s['load'];?>%</p>
        </div>
        <div style="margin-top:10px;">
          <?php if($s['is_free']):?>
          <span class="server-tag tag-free">免费</span>
          <?php else:?>
          <span class="server-tag tag-vip">VIP</span>
          <?php endif;?>
          <span class="server-tag" style="background:#667eea;color:#fff;"><?php echo $s['country_name'];?></span>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <!-- 游戏列表 -->
  <div class="section" style="background:#f5f5f5;">
    <h2 class="section-title">🎮 支持游戏</h2>
    <div class="game-grid">
      <?php foreach($games as $g):?>
      <div class="game-item">
        <div class="game-icon"></div>
        <div class="game-name"><?php echo $g['name'];?></div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <!-- 套餐列表 -->
  <div class="section">
    <h2 class="section-title">💎 会员套餐</h2>
    <div class="package-grid">
      <?php foreach($packages as $i => $p):?>
      <div class="package-card <?php echo $i==2?'recommend':'';?>">
        <div class="package-name"><?php echo $p['name'];?></div>
        <div class="package-price">￥<?php echo $p['price'];?><span>/<?php echo $p['days'];?>天</span></div>
        <div class="package-days"><?php echo $p['description'];?></div>
        <a href="#" class="package-btn">立即购买</a>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
    <p style="margin-top:10px;">
      <a href="#">关于我们</a>
      <a href="#">联系我们</a>
      <a href="#">服务条款</a>
      <a href="#">隐私政策</a>
    </p>
  </div>
  
  <script src="static/layui/layui.js"></script>
</body>
</html>

