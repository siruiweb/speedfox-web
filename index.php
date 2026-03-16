<?php
header('Content-Type: text/html; charset=utf-8');
$current_page = 'index';
require_once('api/init.php');
require_once('header.php');
?>

  <div class="container" style="padding:40px 20px;">
    <h1 style="text-align:center;font-size:42px;margin-bottom:40px;">
      <span style="background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
        畅玩全球游戏 就用<?php echo $productdata['title'];?>
      </span>
    </h1>
    
    <div style="text-align:center;margin-bottom:60px;">
      <a href="/server.php" style="display:inline-block;padding:16px 40px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border-radius:30px;font-size:18px;text-decoration:none;">查看服务器</a>
      <a href="/pay.php" style="display:inline-block;padding:16px 40px;background:rgba(255,255,255,0.1);color:#fff;border-radius:30px;font-size:18px;text-decoration:none;margin-left:20px;">开通VIP</a>
    </div>
    
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:30px;max-width:1000px;margin:0 auto;">
      <div style="background:rgba(255,255,255,0.05);border-radius:16px;padding:30px;text-align:center;">
        <div style="font-size:36px;margin-bottom:15px;">🌍</div>
        <div style="font-size:24px;font-weight:bold;margin-bottom:10px;"><?php echo count($servers);?>+ 节点</div>
        <div style="opacity:0.6;">覆盖全球主要地区</div>
      </div>
      <div style="background:rgba(255,255,255,0.05);border-radius:16px;padding:30px;text-align:center;">
        <div style="font-size:36px;margin-bottom:15px;">🎮</div>
        <div style="font-size:24px;font-weight:bold;margin-bottom:10px;"><?php echo count($games);?>+ 游戏</div>
        <div style="opacity:0.6;">支持Steam/Epic/战网</div>
      </div>
      <div style="background:rgba(255,255,255,0.05);border-radius:16px;padding:30px;text-align:center;">
        <div style="font-size:36px;margin-bottom:15px;">⚡</div>
        <div style="font-size:24px;font-weight:bold;margin-bottom:10px;">50ms</div>
        <div style="opacity:0.6;">超低延迟稳定连接</div>
      </div>
    </div>
  </div>

<?php require_once('footer.php'); ?>
