<?php
header('Content-Type: text/html; charset=utf-8');
require_once('../../api/Mock.php');
$productdata = get_oem_config();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>登录/注册 - <?php echo $productdata['title'];?></title>
  <link href="../../static/layui/css/layui.css" rel="stylesheet">
  <style>
  *{margin:0;padding:0;box-sizing:border-box;}
  body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;background:#0a0a0a;color:#fff;min-height:100vh;display:flex;align-items:center;justify-content:center;min-height:100vh;padding:20px;}
  .login-bg{position:fixed;top:0;left:0;right:0;bottom:0;background:linear-gradient(135deg,#1a1a2e 0%,#16213e 50%,#0a0a0a 100%);z-index:-1;}
  .login-bg::before{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background:radial-gradient(circle at 50% 50%, rgba(102,126,234,0.1) 0%, transparent 70%);}
  
  .login-container{width:100%;max-width:450px;padding:50px 40px;background:linear-gradient(145deg,rgba(30,30,50,0.9),rgba(20,20,35,0.95));border:1px solid rgba(255,255,255,0.1);border-radius:24px;box-shadow:0 25px 50px rgba(0,0,0,0.5);}
  .login-logo{text-align:center;margin-bottom:10px;}
  .login-logo img{height:50px;}
  .login-title{font-size:28px;font-weight:bold;text-align:center;margin-bottom:30px;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  
  .tabs{display:flex;margin-bottom:30px;border-bottom:1px solid rgba(255,255,255,0.1);}
  .tab{flex:1;text-align:center;padding:15px;cursor:pointer;opacity:0.6;transition:0.3s;border-bottom:2px solid transparent;margin-bottom:-1px;}
  .tab.active{opacity:1;border-bottom-color:#667eea;}
  
  .form-group{margin-bottom:20px;}
  .form-group label{display:block;margin-bottom:10px;opacity:0.8;font-size:14px;}
  .form-group input{width:100%;padding:14px 18px;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:12px;color:#fff;font-size:15px;transition:0.3s;}
  .form-group input:focus{outline:none;border-color:#667eea;background:rgba(255,255,255,0.08);}
  .form-group input::placeholder{color:rgba(255,255,255,0.3);}
  
  .login-btn{width:100%;padding:16px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;border-radius:12px;font-size:16px;font-weight:bold;cursor:pointer;transition:0.3s;margin-top:10px;}
  .login-btn:hover{transform:translateY(-2px);box-shadow:0 10px 30px rgba(102,126,234,0.4);}
  
  .login-footer{text-align:center;margin-top:25px;opacity:0.6;font-size:14px;}
  .login-footer a{color:#667eea;text-decoration:none;}
  
  .tab-content{display:none;}
  .tab-content.active{display:block;}
  
  .back-home{text-align:center;margin-top:30px;}
  .back-home a{color:#667eea;text-decoration:none;opacity:0.7;font-size:14px;}
  .back-home a:hover{opacity:1;}
  </style>
</head>
<body>
  <div class="login-bg"></div>
  
  <div class="login-container">
    <div class="login-logo">
      <img src="<?php echo $productdata['logo'];?>" alt="logo">
    </div>
    <div class="login-title">欢迎使用</div>
    
    <div class="tabs">
      <div class="tab active" onclick="switchTab('login')">登录</div>
      <div class="tab" onclick="switchTab('register')">注册</div>
    </div>
    
    <div id="loginForm" class="tab-content active">
      <form onsubmit="return doLogin()">
        <div class="form-group">
          <label>用户名</label>
          <input type="text" name="username" placeholder="请输入用户名" required>
        </div>
        <div class="form-group">
          <label>密码</label>
          <input type="password" name="password" placeholder="请输入密码" required>
        </div>
        <button type="submit" class="login-btn">登 录</button>
      </form>
    </div>
    
    <div id="registerForm" class="tab-content">
      <form onsubmit="return doRegister()">
        <div class="form-group">
          <label>用户名</label>
          <input type="text" name="username" placeholder="请输入用户名" required>
        </div>
        <div class="form-group">
          <label>邮箱</label>
          <input type="email" name="email" placeholder="请输入邮箱" required>
        </div>
        <div class="form-group">
          <label>密码</label>
          <input type="password" name="password" placeholder="请输入密码" required>
        </div>
        <div class="form-group">
          <label>确认密码</label>
          <input type="password" name="confirm_password" placeholder="请再次输入密码" required>
        </div>
        <button type="submit" class="login-btn">注 册</button>
      </form>
    </div>
    
    <div class="login-footer">
      <a href="#">忘记密码？</a>
    </div>
    
    <div class="back-home">
      <a href="../../index.php">← 返回首页</a>
    </div>
  </div>
  
  <script>
  function switchTab(tab) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
    
    if (tab === 'login') {
      document.querySelectorAll('.tab')[0].classList.add('active');
      document.getElementById('loginForm').classList.add('active');
    } else {
      document.querySelectorAll('.tab')[1].classList.add('active');
      document.getElementById('registerForm').classList.add('active');
    }
  }
  
  function doLogin() {
    alert('登录功能需要后端API支持，敬请期待！');
    return false;
  }
  
  function doRegister() {
    alert('注册功能需要后端API支持，敬请期待！');
    return false;
  }
  </script>
</body>
</html>