<?
header('Content-Type: text/html; charset=utf-8');
require_once('../../api/Mock.php');
$productdata = get_oem_config();
$packages = get_packages();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <title>充值中心 - <?php echo $productdata['title'];?></title>
  <link href=\"../../static/layui/css/layui.css\" rel=\"stylesheet\">
  <link href=\"../../static/css/style.css\" rel=\"stylesheet\">
  <style>
  *{margin:0;padding:0;box-sizing:border-box;}
  body{background:#0a0a0a;color:#fff;min-height:100vh;}
  .header{background:linear-gradient(135deg,#1a1a2e,#16213e);padding:15px 0;position:sticky;top:0;z-index:100;}
  .container{max-width:1200px;margin:0 auto;padding:0 20px;}
  .header .container{display:flex;align-items:center;justify-content:space-between;}
  .logo{font-size:20px;font-weight:bold;color:#667eea;}
  .nav{display:flex;gap:30px;}
  .nav a{color:#fff;text-decoration:none;opacity:0.8;transition:0.3s;}
  .nav a:hover,.nav a.active{opacity:1;color:#667eea;}
  .user-area{display:flex;gap:15px;}
  .user-area a{padding:8px 20px;border-radius:20px;background:rgba(255,255,255,0.1);color:#fff;text-decoration:none;}
  .page-title{font-size:32px;font-weight:bold;margin:40px 0;text-align:center;}
  .package-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:20px;padding:20px;}
  .package-card{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:15px;padding:30px;text-align:center;transition:0.3s;cursor:pointer;}
  .package-card:hover,.package-card.selected{border-color:#667eea;background:rgba(102,126,234,0.1);}
  .package-card.recommend{position:relative;}
  .package-card.recommend::before{content:'推荐';position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:#667eea;padding:2px 12px;border-radius:10px;font-size:12px;}
  .package-name{font-size:24px;font-weight:bold;margin-bottom:15px;}
  .package-price{font-size:32px;color:#667eea;font-weight:bold;}
  .package-price span{font-size:14px;opacity:0.6;}
  .package-desc{font-size:14px;opacity:0.6;margin:10px 0;}
  .buy-btn{display:block;width:100%;padding:15px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-align:center;border-radius:10px;text-decoration:none;margin-top:20px;font-weight:bold;}
  .qr-section{text-align:center;padding:40px;margin-top:40px;background:rgba(255,255,255,0.05);border-radius:15px;}
  .qr-code{width:200px;height:200px;background:#fff;margin:20px auto;border-radius:10px;}
  .footer{background:rgba(0,0,0,0.5);padding:30px 0;text-align:center;margin-top:60px;}
  </style>
</head>
<body>
  <div class=\"header\">
    <div class=\"container\">
      <div class=\"logo\"><?php echo $productdata['title'];?></div>
      <div class=\"nav\">
        <a href=\"../../index.php\">首页</a>
        <a href=\"../server/server_list.php\">服务器</a>
        <a href=\"pay.php\" class=\"active\">充值</a>
        <a href=\"../load/appload.php\">下载</a>
      </div>
      <div class=\"user-area\">
        <a href=\"../oauth/login_home.php\">登录</a>
      </div>
    </div>
  </div>
  
  <div class=\"container\">
    <h1 class=\"page-title\">充值中心</h1>
    
    <div class=\"package-grid\">
      <?php foreach($packages as $p):?>
      <div class=\"package-card <?php echo isset($p['is_recommend']) && $p['is_recommend']?'recommend':'';?>\">
        <div class=\"package-name\"><?php echo $p['name'];?></div>
        <div class=\"package-price\">￥<?php echo $p['price'];?><span>/<?php echo $p['days'];?>天</span></div>
        <div class=\"package-desc\"><?php echo $p['description'];?></div>
        <div style=\"font-size:12px;opacity:0.5;text-decoration:line-through;\">原价:￥<?php echo $p['original_price'];?></div>
        <a href=\"#\" class=\"buy-btn\" onclick=\"selectPackage(<?php echo $p['id'];?>,<?php echo $p['price'];?>)\">立即购买</a>
      </div>
      <?php endforeach;?>
    </div>
    
    <div class=\"qr-section\" id=\"qrSection\" style=\"display:none;\">
      <h2>扫码支付 <span id=\"payAmount\">0</span> 元</h2>
      <div class=\"qr-code\">
        <img src=\"https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=mock-pay\" alt=\"支付二维码\" style=\"width:100%;\">
      </div>
      <p style=\"margin-top:20px;\">请使用支付宝/微信扫码支付</p>
      <p style=\"opacity:0.6;margin-top:10px;\">支付完成后请联系客服确认</p>
    </div>
  </div>
  
  <div class=\"footer\">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
  </div>
  
  <script>
  function selectPackage(id, price) {
    document.getElementById('payAmount').innerText = price;
    document.getElementById('qrSection').style.display = 'block';
  }
  </script>
</body>
</html>
