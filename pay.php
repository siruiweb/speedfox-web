<?php
header('Content-Type: text/html; charset=utf-8');
$current_page = 'pay';
require_once('api/init.php');
require_once('header.php');
?>

  <div class="container" style="padding:40px 20px;">
    <h1 style="text-align:center;font-size:42px;margin-bottom:40px;">
      <span style="background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
        💎 开通VIP会员
      </span>
    </h1>
    
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:25px;max-width:1000px;margin:0 auto;">
      <?php foreach($packages as $p):?>
      <div style="background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border:1px solid rgba(255,255,255,0.1);border-radius:16px;padding:35px 20px;text-align:center;">
        <div style="font-size:26px;font-weight:bold;margin-bottom:15px;"><?php echo $p['name'];?></div>
        <div style="font-size:38px;font-weight:bold;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
          <span style="font-size:14px;opacity:0.6;">￥</span><?php echo $p['price'];?>
        </div>
        <div style="font-size:14px;opacity:0.6;margin:15px 0;"><?php echo $p['description'];?></div>
        <a href="javascript:;" onclick="buyPackage(<?php echo $p['id'];?>, '<?php echo $p['price'];?>', '<?php echo $p['name'];?>')" style="display:block;width:100%;padding:14px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-align:center;border-radius:12px;text-decoration:none;margin-top:20px;">立即购买</a>
      </div>
      <?php endforeach;?>
    </div>
    
    <div id="qrSection" style="display:none;text-align:center;padding:40px;margin:40px auto;max-width:500px;background:linear-gradient(145deg,rgba(30,30,50,0.8),rgba(20,20,35,0.9));border-radius:20px;">
      <h2>📱 正在跳转支付...</h2>
      <div style="background:rgba(255,255,255,0.05);border-radius:10px;padding:20px;margin:20px 0;">
        <p>套餐: <span id="payName"></span></p>
        <p>金额: <span id="payAmount" style="color:#667eea;font-weight:bold;font-size:20px;"></span> 元</p>
        <p>订单号: <span id="payOrderNo"></span></p>
      </div>
      <div id="payFormContainer"></div>
    </div>
  </div>

  <script>
  function buyPackage(id, price, name) {
    if (!checkLogin()) {
      alert('请先登录');
      location.href = '/login_home.php';
      return;
    }
    
    if (!confirm('确认购买 ' + name + ' 套餐 ' + price + ' 元？')) {
      return;
    }
    
    document.getElementById('qrSection').style.display = 'block';
    document.getElementById('payName').innerText = name;
    document.getElementById('payAmount').innerText = price;
    document.getElementById('qrSection').scrollIntoView({behavior:'smooth'});
    
    var formData = new FormData();
    formData.append('package_id', id);
    
    fetch('/api/pay.php?action=create_order', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.code === 200) {
        document.getElementById('payOrderNo').innerText = data.data.out_trade_no;
        document.getElementById('payFormContainer').innerHTML = data.data.html;
        setTimeout(function() {
          document.getElementById('payFormContainer').querySelector('form').submit();
        }, 1000);
      } else {
        alert(data.msg || '创建订单失败');
        document.getElementById('qrSection').style.display = 'none';
      }
    })
    .catch(err => {
      alert('网络错误');
      document.getElementById('qrSection').style.display = 'none';
    });
  }
  </script>

<?php require_once('footer.php'); ?>
