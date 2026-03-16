<?php
header('Content-Type: text/html; charset=utf-8');
$current_page = 'server';
require_once('api/init.php');
require_once('header.php');
?>

  <div class="container" style="padding:40px 20px;">
    <h1 style="text-align:center;font-size:42px;margin-bottom:40px;">
      <span style="background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
        🌍 服务器节点
      </span>
    </h1>
    
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:25px;max-width:1200px;margin:0 auto;">
      <?php foreach($servers as $s):?>
      <div style="background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border:1px solid rgba(255,255,255,0.1);border-radius:16px;padding:30px;">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
          <span style="font-size:22px;font-weight:bold;"><?php echo $s['name'];?></span>
          <span style="padding:5px 14px;border-radius:20px;background:linear-gradient(135deg,#4caf50,#8bc34a);font-size:12px;">
            <?php echo $s['is_free']?'免费':'VIP';?>
          </span>
        </div>
        <div style="font-size:14px;opacity:0.7;margin:10px 0;">
          <div>服务器IP: <?php echo $s['ip'];?></div>
          <div>端口: <?php echo $s['port'];?></div>
        </div>
        <a href="#" style="display:block;width:100%;padding:14px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-align:center;border-radius:12px;text-decoration:none;margin-top:20px;">🚀 立即加速</a>
      </div>
      <?php endforeach;?>
    </div>
  </div>

<?php require_once('footer.php'); ?>
