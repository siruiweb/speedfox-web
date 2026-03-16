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
  <title>登录/注册 - <?php echo $productdata['title'];?></title>
  <link href=\"../../static/layui/css/layui.css\" rel=\"stylesheet\">
  <link href=\"../../static/css/style.css\" rel=\"stylesheet\">
  <style>
  *{margin:0;padding:0;box-sizing:border-box;}
  body{background:#0a0a0a;color:#fff;min-height:100vh;display:flex;align-items:center;justify-content:center;}
  .login-container{width:400px;padding:40px;background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.1);}
  .login-logo{text-align:center;margin-bottom:30px;}
  .login-logo img{height:50px;}
  .login-title{font-size:24px;font-weight:bold;text-align:center;margin-bottom:30px;}
  .form-group{margin-bottom:20px;}
  .form-group label{display:block;margin-bottom:8px;opacity:0.8;}
  .form-group input{width:100%;padding:12px 15px;background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);border-radius:8px;color:#fff;font-size:14px;}
  .form-group input:focus{outline:none;border-color:#667eea;}
  .login-btn{width:100%;padding:14px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;border-radius:8px;font-size:16px;font-weight:bold;cursor:pointer;transition:0.3s;}
  .login-btn:hover{opacity:0.9;}
  .login-footer{text-align:center;margin-top:20px;opacity:0.6;}
  .login-footer a{color:#667eea;text-decoration:none;}
  .tabs{display:flex;margin-bottom:30px;border-bottom:1px solid rgba(255,255,255,0.1);}
  .tab{flex:1;text-align:center;padding-bottom:15px;cursor:pointer;opacity:0.6;transition:0.3s;}
  .tab.active{opacity:1;border-bottom:2px solid #667eea;}
  .tab-content{display:none;}
  .tab-content.active{display:block;}
  </style>
</head>
<body>
  <div class=\"login-container\">
    <div class=\"login-logo\">
      <img src=\"<?php echo $productdata['logo'];?>\" alt=\"logo\">
    </div>
    
    <div class=\"tabs\">
      <div class=\"tab active\" onclick=\"switchTab('login')\">登录</div>
      <div class=\"tab\" onclick=\"switchTab('register')\">注册</div>
    </div>
    
    <!-- 登录表单 -->
    <div id=\"loginForm\" class=\"tab-content active\">
      <form onsubmit=\"return doLogin()\">
        <div class=\"form-group\">
          <label>用户名</label>
          <input type=\"text\" name=\"username\" placeholder=\"请输入用户名\" required>
        </div>
        <div class=\"form-group\">
          <label>密码</label>
          <input type=\"password\" name=\"password\" placeholder=\"请输入密码\" required>
        </div>
        <button type=\"submit\" class=\"login-btn\">登录</button>
      </form>
    </div>
    
    <!-- 注册表单 -->
    <div id=\"registerForm\" class=\"tab-content\">
      <form onsubmit=\"return doRegister()\">
        <div class=\"form-group\">
          <label>用户名</label>
          <input type=\"text\" name=\"username\" placeholder=\"请输入用户名\" required>
        </div>
        <div class=\"form-group\">
          <label>邮箱</label>
          <input type=\"email\" name=\"email\" placeholder=\"请输入邮箱\" required>
        </div>
        <div class=\"form-group\">
          <label>密码</label>
          <input type=\"password\" name=\"password\" placeholder=\"请输入密码\" required>
        </div>
        <div class=\"form-group\">
          <label>确认密码</label>
          <input type=\"password\" name=\"confirm_password\" placeholder=\"请再次输入密码\" required>
        </div>
        <button type=\"submit\" class=\"login-btn\">注册</button>
      </form>
    </div>
    
    <div class=\"login-footer\">
      <a href=\"../../index.php\">返回首页</a>
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
    alert('登录功能需要后端API支持');
    return false;
  }
  
  function doRegister() {
    alert('注册功能需要后端API支持');
    return false;
  }
  </script>
</body>
</html>
