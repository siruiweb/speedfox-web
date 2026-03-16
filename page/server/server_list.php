<?
header('Content-Type: text/html; charset=utf-8');
require_once('../../api/Mock.php');
$productdata = get_oem_config();
$servers = get_server_list();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <title>服务器列表 - <?php echo $productdata['title'];?></title>
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
  .user-area a{padding:8px 20px;border-radius:20px;background:rgba(255,255,255,0.1);color:#fff;text-decoration:none;transition:0.3s;}
  .user-area a:hover{background:#667eea;}
  .page-title{font-size:32px;font-weight:bold;margin:40px 0;text-align:center;}
  .server-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;padding:20px;}
  .server-card{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:15px;padding:25px;transition:0.3s;}
  .server-card:hover{transform:translateY(-5px);border-color:#667eea;}
  .server-name{font-size:20px;font-weight:bold;margin-bottom:15px;}
  .server-info{font-size:14px;opacity:0.7;margin:5px 0;}
  .tag{padding:3px 10px;border-radius:15px;font-size:12px;margin-right:5px;}
  .tag-free{background:linear-gradient(135deg,#4caf50,#8bc34a);}
  .tag-vip{background:linear-gradient(135deg,#ff9800,#ff5722);}
  .connect-btn{display:block;width:100%;padding:15px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-align:center;border-radius:10px;text-decoration:none;margin-top:20px;font-weight:bold;}
  .footer{background:rgba(0,0,0,0.5);padding:30px 0;text-align:center;margin-top:60px;}
  .footer p{opacity:0.6;}
  </style>
</head>
<body>
  <div class=\"header\">
    <div class=\"container\">
      <div class=\"logo\"><?php echo $productdata['title'];?></div>
      <div class=\"nav\">
        <a href=\"../../index.php\">首页</a>
        <a href=\"server_list.php\" class=\"active\">服务器</a>
        <a href=\"../pay/pay.php\">充值</a>
        <a href=\"../load/appload.php\">下载</a>
      </div>
      <div class=\"user-area\">
        <a href=\"../oauth/login_home.php\">登录</a>
        <a href=\"../oauth/login_home.php\">注册</a>
      </div>
    </div>
  </div>
  
  <div class=\"container\">
    <h1 class=\"page-title\">服务器节点列表</h1>
    <div class=\"server-grid\">
      <?php foreach($servers as $s):?>
      <div class=\"server-card\">
        <div class=\"server-name\"><?php echo $s['name'];?></div>
        <div class=\"server-info\">IP: <?php echo $s['ip'];?></div>
        <div class=\"server-info\">在线: <?php echo $s['online'];?> 人</div>
        <div class=\"server-info\">负载: <?php echo $s['load'];?>%</div>
        <div style=\"margin-top:10px;\">
          <span class=\"tag <?php echo $s['is_free']?'tag-free':'tag-vip';?>\"><?php echo $s['is_free']?'免费':'VIP';?></span>
          <span class=\"tag\" style=\"background:#667eea;\"><?php echo $s['country_name'];?></span>
        </div>
        <a href=\"#\" class=\"connect-btn\">立即加速</a>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <div class=\"footer\">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
  </div>
</body>
</html>
