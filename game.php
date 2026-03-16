<?php
header('Content-Type: text/html; charset=utf-8');
$current_page = 'game';
require_once('api/init.php');
require_once('header.php');
?>

  <div class="container" style="padding:40px 20px;">
    <h1 style="text-align:center;font-size:42px;margin-bottom:40px;">
      <span style="background:linear-gradient(135deg,#f093fb,#f5576c);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
        🎮 游戏列表
      </span>
    </h1>
    
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:20px;max-width:1200px;margin:0 auto;">
      <?php foreach($games as $g):?>
      <div style="background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border:1px solid rgba(255,255,255,0.1);border-radius:16px;padding:25px;text-align:center;transition:transform 0.3s;">
        <div style="width:80px;height:80px;margin:0 auto 15px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:36px;">
          🎮
        </div>
        <h3 style="font-size:18px;margin-bottom:10px;color:#fff;"><?php echo $g['name'];?></h3>
        <p style="font-size:14px;opacity:0.6;margin-bottom:15px;"><?php echo $g['ename'] ?? '';?></p>
        <span style="display:inline-block;padding:5px 12px;background:rgba(102,126,234,0.3);border-radius:20px;font-size:12px;color:#a855f7;">
          <?php echo $g['category']=='pc'?'PC':($g['category']=='mobile'?'手机':'主机');?>
        </span>
      </div>
      <?php endforeach;?>
    </div>
    
    <?php if(empty($games)):?>
    <div style="text-align:center;padding:60px;color:rgba(255,255,255,0.5);">
      <p style="font-size:18px;">暂无游戏数据</p>
    </div>
    <?php endif;?>
  </div>

<?php require_once('footer.php'); ?>
