<?php
header('Content-Type: text/html; charset=utf-8');
require_once('../../api/Mock.php');
$productdata = get_oem_config();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>客户端下载 - <?php echo $productdata['title'];?></title>
  <link href="../../static/layui/css/layui.css" rel="stylesheet">
  <style>
  *{margin:0;padding:0;box-sizing:border-box;}
  body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;background:#0a0a0a;color:#fff;min-height:100vh;}
  .header{background:linear-gradient(135deg,#1a1a2e 0%,#16213e 100%);padding:20px 0;position:sticky;top:0;z-index:100;box-shadow:0 2px 20px rgba(0,0,0,0.3);}
  .container{max-width:900px;margin:0 auto;padding:0 20px;}
  .header .container{display:flex;align-items:center;justify-content:space-between;}
  .logo{font-size:24px;font-weight:bold;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  .nav{display:flex;gap:30px;}
  .nav a{color:#fff;text-decoration:none;opacity:0.9;transition:0.3s;font-size:15px;}
  .nav a:hover,.nav a.active{opacity:1;color:#667eea;}
  
  .download-hero{text-align:center;padding:80px 20px;background:linear-gradient(135deg,#667eea 0%,#764ba2 50%,#6B8DD6 100%);}
  .download-hero h1{font-size:48px;font-weight:bold;margin-bottom:20px;}
  .download-hero p{font-size:20px;opacity:0.9;margin-bottom:40px;}
  
  .download-card{background:linear-gradient(145deg,rgba(30,30,50,0.9),rgba(20,20,35,0.95));border:1px solid rgba(255,255,255,0.1);border-radius:20px;padding:60px;max-width:600px;margin:-40px auto 40px;position:relative;}
  .download-icon{width:120px;height:120px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:30px;margin:0 auto 30px;display:flex;align-items:center;justify-content:center;font-size:50px;}
  .download-title{font-size:32px;font-weight:bold;margin-bottom:10px;}
  .download-desc{font-size:16px;opacity:0.7;margin-bottom:30px;}
  .download-btn{display:inline-block;padding:18px 60px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;font-size:20px;text-decoration:none;border-radius:50px;font-weight:bold;transition:0.3s;}
  .download-btn:hover{transform:scale(1.05);box-shadow:0 15px 40px rgba(102,126,234,0.4);}
  
  .version-info{text-align:center;margin:30px 0;opacity:0.6;font-size:14px;}
  .download-links{text-align:center;margin:30px 0;}
  .download-links a{color:#667eea;margin:0 20px;text-decoration:none;transition:0.3s;}
  .download-links a:hover{opacity:1;}
  
  .features{padding:60px 20px;max-width:800px;margin:0 auto;}
  .features h2{text-align:center;font-size:32px;margin-bottom:40px;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  .feature-list{list-style:none;}
  .feature-list li{padding:20px;background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border-radius:12px;margin-bottom:15px;display:flex;align-items:center;gap:15px;}
  .feature-icon{width:50px;height:50px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:24px;}
  
  .footer{background:linear-gradient(135deg,#0a0a0a,#1a1a1a);padding:40px 0;text-align:center;border-top:1px solid rgba(255,255,255,0.1);}
  .footer p{opacity:0.6;margin:10px 0;}
  .footer a{color:#667eea;text-decoration:none;margin:0 15px;}
  </style>
</head>
<body>
  <div class="header">
    <div class="container" style="padding:0;">
      <div class="logo"><?php echo $productdata['title'];?></div>
      <div class="nav">
        <a href="../../index.php">首页</a>
        <a href="../server/server_list.php">服务器</a>
        <a href="../pay/pay.php">充值</a>
        <a href="appload.php" class="active">下载</a>
        <a href="#">帮助</a>
      </div>
    </div>
  </div>
  
  <div class="download-hero">
    <h1>客户端下载</h1>
    <p>支持 Windows / Mac / iOS / Android 全平台</p>
  </div>
  
  <div class="container">
    <div class="download-card">
      <div class="download-icon">🚀</div>
      <div class="download-title"><?php echo $productdata['title'];?></div>
      <div class="download-desc">畅玩全球游戏，从此刻开始</div>
      
      <a href="http://global.ruiye.top/锐野优商游戏加速器 Setup 4.0.8.exe" class="download-btn" target="_blank">
        Windows 版下载
      </a>
      
      <div class="version-info">
        <p>当前版本: 4.0.9</p>
        <p>更新时间: 2024-01-15</p>
      </div>
      
      <div class="download-links">
        <a href="https://github.com/sunnny516/speedfox/releases/" target="_blank">GitHub 下载</a>
        <a href="https://pan.baidu.com/s/1M08rVRrj7gMC_5vQkxVE-g?pwd=1234" target="_blank">百度网盘 (提取码:1234)</a>
      </div>
    </div>
    
    <div class="features">
      <h2>✨ 功能特点</h2>
      <ul class="feature-list">
        <li><div class="feature-icon">⚡</div><div><strong>超低延迟</strong><br><span style="opacity:0.7;font-size:14px;">专线带宽，全球节点，极速连接</span></div></li>
        <li><div class="feature-icon">🛡️</div><div><strong>安全稳定</strong><br><span style="opacity:0.7;font-size:14px;">采用开源技术，数据安全有保障</span></div></li>
        <li><div class="feature-icon">🎮</strong></div><div><strong>游戏专线</strong><br><span style="opacity:0.7;font-size:14px;">支持Steam/Epic/战网等主流平台</span></div></li>
        <li><div class="feature-icon">💰</div><div><strong>永久免费</strong><br><span style="opacity:0.7;font-size:14px;">不玩套路，无需充值也能用</span></div></li>
      </ul>
    </div>
    
    <div class="features">
      <h2>📖 使用说明</h2>
      <ol style="line-height:2;opacity:0.8;padding-left:20px;background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));padding:30px;border-radius:15px;">
        <li>下载并安装客户端</li>
        <li>注册账号或登录</li>
        <li>选择服务器节点</li>
        <li>点击连接开始加速</li>
      </ol>
    </div>
  </div>
  
  <div class="footer">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
  </div>
</body>
</html>