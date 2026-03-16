<?
header('Content-Type: text/html; charset=utf-8');
require_once('../../api/Mock.php');
$productdata = get_oem_config();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <title>客户端下载 - <?php echo $productdata['title'];?></title>
  <link href=\"../../static/layui/css/layui.css\" rel=\"stylesheet\">
  <link href=\"../../static/css/style.css\" rel=\"stylesheet\">
  <style>
  *{margin:0;padding:0;box-sizing:border-box;}
  body{background:#0a0a0a;color:#fff;min-height:100vh;}
  .header{background:linear-gradient(135deg,#1a1a2e,#16213e);padding:15px 0;position:sticky;top:0;z-index:100;}
  .container{max-width:800px;margin:0 auto;padding:40px 20px;}
  .header .container{display:flex;align-items:center;justify-content:space-between;}
  .logo{font-size:20px;font-weight:bold;color:#667eea;}
  .nav{display:flex;gap:30px;}
  .nav a{color:#fff;text-decoration:none;opacity:0.8;}
  .nav a:hover,.nav a.active{opacity:1;color:#667eea;}
  .download-card{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:20px;padding:60px;text-align:center;margin-top:40px;}
  .download-title{font-size:36px;font-weight:bold;margin-bottom:20px;}
  .download-desc{font-size:18px;opacity:0.7;margin-bottom:40px;}
  .download-btn{display:inline-block;padding:20px 60px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;font-size:20px;text-decoration:none;border-radius:50px;font-weight:bold;transition:0.3s;}
  .download-btn:hover{transform:scale(1.05);box-shadow:0 10px 40px rgba(102,126,234,0.4);}
  .version-info{margin-top:40px;opacity:0.6;}
  .download-links{margin-top:40px;}
  .download-links a{color:#667eea;margin:0 20px;text-decoration:none;}
  .footer{background:rgba(0,0,0,0.5);padding:30px 0;text-align:center;margin-top:60px;}
  </style>
</head>
<body>
  <div class=\"header\">
    <div class=\"container\" style=\"padding:0;\">
      <div class=\"logo\"><?php echo $productdata['title'];?></div>
      <div class=\"nav\">
        <a href=\"../../index.php\">首页</a>
        <a href=\"../server/server_list.php\">服务器</a>
        <a href=\"../pay/pay.php\">充值</a>
        <a href=\"appload.php\" class=\"active\">下载</a>
      </div>
    </div>
  </div>
  
  <div class=\"container\">
    <div class=\"download-card\">
      <div class=\"download-title\">客户端下载</div>
      <div class=\"download-desc\">支持Windows/Mac/iOS/Android</div>
      
      <a href=\"https://github.com/sunnny516/speedfox/releases/download/4.0.9/Setup4.0.9.exe\" class=\"download-btn\" target=\"_blank\">
        Windows 版下载
      </a>
      
      <div class=\"version-info\">
        <p>当前版本: 4.0.9</p>
        <p>更新时间: 2024-01-15</p>
      </div>
      
      <div class=\"download-links\">
        <a href=\"https://github.com/sunnny516/speedfox/releases/\" target=\"_blank\">GitHub下载</a>
        <a href=\"https://pan.baidu.com/s/1M08rVRrj7gMC_5vQkxVE-g?pwd=1234\" target=\"_blank\">百度网盘 提取码:1234</a>
      </div>
    </div>
    
    <div style=\"margin-top:40px;padding:30px;background:rgba(255,255,255,0.02);border-radius:15px;\">
      <h3 style=\"margin-bottom:20px;\">使用说明</h3>
      <ol style=\"line-height:2;opacity:0.8;padding-left:20px;\">
        <li>下载并安装客户端</li>
        <li>注册账号或登录</li>
        <li>选择服务器节点</li>
        <li>点击连接开始加速</li>
      </ol>
    </div>
  </div>
  
  <div class=\"footer\">
    <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
  </div>
</body>
</html>
