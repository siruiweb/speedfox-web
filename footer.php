<?php
// 公共底部
$productdata = $productdata ?? array("title"=>"锐野优商加速器");
?>
  <div class="footer">
    <div class="container">
      <p>&copy; 2024 <?php echo $productdata['title'];?> 版权所有</p>
      <p style="opacity:0.6;margin-top:10px;">
        <a href="/" style="color:#667eea;margin:0 10px;">首页</a>
        <a href="/server.php" style="color:#667eea;margin:0 10px;">服务器</a>
        <a href="/pay.php" style="color:#667eea;margin:0 10px;">充值</a>
        <a href="/appload.php" style="color:#667eea;margin:0 10px;">下载</a>
      </p>
    </div>
  </div>
  <style>
  .footer{background:linear-gradient(135deg,#0a0a0a,#1a1a1a);padding:40px 0;text-align:center;border-top:1px solid rgba(255,255,255,0.1);margin-top:60px;}
  .footer a:hover{text-decoration:underline;}
  </style>
</body>
</html>
