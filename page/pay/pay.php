<?php
header('Content-Type: text/html; charset=utf-8');
require_once('../../api/Mock.php');
$productdata = get_oem_config();
$packages = get_packages();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>充值中心 - <?php echo $productdata['title'];?></title>
  <link href="../../static/layui/css/layui.css" rel="stylesheet">
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
  
  .package-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:25px;max-width:1000px;margin:0 auto;padding:0 20px;}
  .package-card{background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border:1px solid rgba(255,255,255,0.1);border-radius:16px;padding:35px 20px;text-align:center;transition:0.3s;cursor:pointer;position:relative;}
  .package-card:hover,.package-card.selected{border-color:#667eea;transform:translateY(-5px);}
  .package-card.recommend{border:2px solid #667eea;}
  .package-card.recommend::before{content:'最优惠';position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;padding:4px 16px;border-radius:20px;font-size:12px;}
  .package-name{font-size:26px;font-weight:bold;margin-bottom:15px;}
  .package-price{font-size:38px;font-weight:bold;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  .package-price span{font-size:14px;opacity:0.6;font-weight:normal;}
  .package-desc{font-size:14px;opacity:0.6;margin:15px 0;}
  .package-original{font-size:13px;opacity:0.4;text-decoration:line-through;}
  .buy-btn{display:block;width:100%;padding:14px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-align:center;border-radius:12px;text-decoration:none;font-weight:bold;margin-top:20px;transition:0.3s;}
  .buy-btn:hover{box-shadow:0 10px 30px rgba(102,126,234,0.4);}
  
  .qr-section{text-align:center;padding:40px;margin:40px auto;max-width:400px;background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border-radius:20px;border:1px solid rgba(255,255,255,0.1);}
  .qr-code{width:200px;height:200px;background:#fff;margin:20px auto;border-radius:10px;padding:10px;}
  .qr-code img{width:100%;height:100%;}
  
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
        <a href="../../index.php">首页</a>
        <a href="../server/server_list.php">服务器</a>
        <a href="pay.php" class="active">充值</a>
        <a href="../load/appload.php">下载</a>
        <a href="#">帮助</a>
      </div>
      <div class="user-area">
        <a href="../oauth/login_home.php">登录</a>
      </div>
    </div>
  </div>
  
  <div class="container">
    <h1 class="page-title">💎 会员套餐</h1>
    
    <div class="package-grid">
      <?php foreach($packages as $p):?>
      <div class="package-card <?php echo isset($p['is_recommend']) && $p['is_recommend']?'recommend':'';?>" onclick="selectPackage(<?php echo $p['id'];?>,<?php echo $p['price'];?>,'<?php echo $p['name'];?>')">
        <div class="package-name"><?php echo $p['name'];?></div>
        <div class="package-price">￥<?php echo $p['price'];?><span>/<?php echo $p['days'];?>天</span></div>
        <div class="package-desc"><?php echo $p['description'];?></div>
        <div class="package-original">原价:￥<?php echo isset($p['original_price'])?$p['original_price']:$p['price']*2;?></div>
        <a href="javascript:void(0)" class="buy-btn">立即购买</a>
      </div>
      <?php endforeach;?>
    </div>
    
    <div class="qr-section" id="qrSection" style="display:none;">
      <h2>📱 扫码支付 <span id="payAmount">0</span> 元</h2>
      <div class="qr-code">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=mock-pay" alt="支付二维码">
      </div>
      <p>请使用支付宝/微信扫码支付</p>
      <p style="opacity:0.6;margin-top:10px;">支付完成后请联系客服确认</p>
    </div>
  </div>
  
  <div class="footer">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
  </div>
  
  <script>
  function selectPackage(id, price, name) {
    document.getElementById('payAmount').innerText = price;
    document.getElementById('qrSection').style.display = 'block';
    document.getElementById('qrSection').scrollIntoView({behavior: 'smooth'});
  }
  </script>
</body>
</html>