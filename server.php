<?
// 模拟数据 - 不需要数据库
$servers = array(
    array('id'=>1,'name'=>'香港-01','country'=>'HK','country_name'=>'中国香港','ip'=>'hk01.ruiye.top','test_ip'=>'hk01.ruiye.top','test_port'=>10000,'type'=>'game','is_free'=>1,'status'=>1,'online'=>1234,'load'=>45,'tag'=>'免费'),
    array('id'=>2,'name'=>'香港-02','country'=>'HK','country_name'=>'中国香港','ip'=>'hk02.ruiye.top','test_ip'=>'hk02.ruiye.top','test_port'=>10000,'type'=>'game','is_free'=>0,'status'=>1,'online'=>856,'load'=>30,'tag'=>'VIP'),
    array('id'=>3,'name'=>'日本-01','country'=>'JP','country_name'=>'日本','ip'=>'jp01.ruiye.top','test_ip'=>'jp01.ruiye.top','test_port'=>10000,'type'=>'game','is_free'=>1,'status'=>1,'online'=>2341,'load'=>67,'tag'=>'免费'),
    array('id'=>4,'name'=>'日本-02','country'=>'JP','country_name'=>'日本','ip'=>'jp02.ruiye.top','test_ip'=>'jp02.ruiye.top','test_port'=>10000,'type'=>'game','is_free'=>0,'status'=>1,'online'=>567,'load'=>25,'tag'=>'VIP'),
    array('id'=>5,'name'=>'韩国-01','country'=>'KR','country_name'=>'韩国','ip'=>'kr01.ruiye.top','test_ip'=>'kr01.ruiye.top','test_port'=>10000,'type'=>'game','is_free'=>1,'status'=>1,'online'=>1890,'load'=>55,'tag'=>'免费'),
    array('id'=>6,'name'=>'美国-01','country'=>'US','country_name'=>'美国','ip'=>'us01.ruiye.top','test_ip'=>'us01.ruiye.top','test_port'=>10000,'type'=>'game','is_free'=>0,'status'=>1,'online'=>3456,'load'=>78,'tag'=>'VIP'),
    array('id'=>7,'name'=>'台湾-01','country'=>'TW','country_name'=>'中国台湾','ip'=>'tw01.ruiye.top','test_ip'=>'tw01.ruiye.top','test_port'=>10000,'type'=>'game','is_free'=>1,'status'=>1,'online'=>723,'load'=>35,'tag'=>'免费'),
    array('id'=>8,'name'=>'新加坡-01','country'=>'SG','country_name'=>'新加坡','ip'=>'sg01.ruiye.top','test_ip'=>'sg01.ruiye.top','test_port'=>10000,'type'=>'game','is_free'=>0,'status'=>1,'online'=>456,'load'=>20,'tag'=>'VIP')
);

$servers_json = json_encode($servers, JSON_UNESCAPED_UNICODE);
$product = '锐野优商';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>服务器列表 - <?php echo $product;?>加速器</title>
  <link href="static/layui/css/layui.css" rel="stylesheet">
  <link href="static/css/color_map.css?V1.0" rel="stylesheet">
  <link href="static/css/style.css" rel="stylesheet">
  <style>
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
  .page-title{font-size:32px;font-weight:bold;margin:40px 0;text-align:center;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  .server-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;padding:20px;}
  .server-card{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:15px;padding:25px;transition:0.3s;}
  .server-card:hover{transform:translateY(-5px);border-color:#667eea;box-shadow:0 10px 40px rgba(102,126,234,0.2);}
  .server-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;}
  .server-name{font-size:20px;font-weight:bold;}
  .tag{padding:4px 12px;border-radius:15px;font-size:12px;}
  .tag-free{background:linear-gradient(135deg,#4caf50,#8bc34a);}
  .tag-vip{background:linear-gradient(135deg,#ff9800,#ff5722);}
  .tag-country{background:linear-gradient(135deg,#667eea,#764ba2);}
  .server-info{margin:15px 0;font-size:14px;opacity:0.7;}
  .server-info p{margin:8px 0;display:flex;justify-content:space-between;}
  .server-stats{display:flex;gap:20px;margin-top:15px;padding-top:15px;border-top:1px solid rgba(255,255,255,0.1);}
  .stat{text-align:center;flex:1;}
  .stat-num{font-size:24px;font-weight:bold;color:#667eea;}
  .stat-label{font-size:12px;opacity:0.6;}
  .connect-btn{display:block;width:100%;padding:15px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-align:center;border-radius:10px;text-decoration:none;margin-top:20px;font-weight:bold;transition:0.3s;}
  .connect-btn:hover{transform:scale(1.02);box-shadow:0 5px 20px rgba(102,126,234,0.4);}
  .footer{background:rgba(0,0,0,0.3);padding:40px 0;text-align:center;margin-top:60px;}
  .footer p{opacity:0.6;margin:10px 0;}
  .footer a{color:#667eea;text-decoration:none;margin:0 15px;}
  </style>
</head>
<body>
  <!-- 顶部导航 -->
  <div class=\"header\">
    <div class=\"container\">
      <div class=\"logo\"><?php echo $product;?>加速器</div>
      <div class=\"nav\">
        <a href=\"../index.php\">首页</a>
        <a href=\"server_list.php\" class=\"active\">服务器</a>
        <a href=\"../pay/pay.php\">充值</a>
        <a href=\"../load/appload.php\">下载</a>
        <a href=\"#\">帮助</a>
      </div>
      <div class=\"user-area\">
        <a href=\"#\">登录</a>
        <a href=\"#\">注册</a>
      </div>
    </div>
  </div>
  
  <div class=\"container\">
    <h1 class=\"page-title\">🌍 服务器节点列表</h1>
    
    <!-- 服务器列表 -->
    <div class=\"server-grid\">
      <?php foreach($servers as $s):?>
      <div class=\"server-card\">
        <div class=\"server-header\">
          <span class=\"server-name\"><?php echo $s['name'];?></span>
          <div class=\"server-tags\">
            <span class=\"tag <?php echo $s['is_free']?'tag-free':'tag-vip';?>\"><?php echo $s['tag'];?></span>
            <span class=\"tag tag-country\"><?php echo $s['country_name'];?></span>
          </div>
        </div>
        <div class=\"server-info\">
          <p><span>服务器IP</span><span><?php echo $s['ip'];?></span></p>
          <p><span>端口</span><span>10000</span></p>
          <p><span>协议</span><span>TCP/UDP</span></p>
        </div>
        <div class=\"server-stats\">
          <div class=\"stat\">
            <div class=\"stat-num\"><?php echo $s['online'];?></div>
            <div class=\"stat-label\">在线人数</div>
          </div>
          <div class=\"stat\">
            <div class=\"stat-num\"><?php echo $s['load'];?>%</div>
            <div class=\"stat-label\">负载</div>
          </div>
          <div class=\"stat\">
            <div class=\"stat-num\">50ms</div>
            <div class=\"stat-label\">延迟</div>
          </div>
        </div>
        <a href=\"#\" class=\"connect-btn\">🚀 立即加速</a>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  
  <!-- Footer -->
  <div class=\"footer\">
    <p>&copy; 2024 <?php echo $product;?>科技有限公司 版权所有</p>
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

