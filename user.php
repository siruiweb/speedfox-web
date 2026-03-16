<?php
header('Content-Type: text/html; charset=utf-8');

// 检查登录状态
$uid = $_COOKIE['uid'] ?? '';
$token = $_COOKIE['token'] ?? '';

if (!$uid || !$token) {
    // 未登录，跳转到登录页
    header('Location: /login_home.php');
    exit;
}

// 连接数据库验证token
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
mysqli_set_charset($conn, "utf8");

// 验证token获取用户信息
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id, username, nickname, mobile, avatar, token, createtime, logintime FROM fa_user WHERE id = '$uid' AND token = '$token' LIMIT 1"));

if (!$user) {
    // token无效，跳转登录
    setcookie('uid', '', time() - 3600, '/');
    setcookie('token', '', time() - 3600, '/');
    header('Location: /login_home.php');
    exit;
}

// 获取用户套餐信息
$package = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT p.name, p.price, p.days, up.expire_time 
    FROM fa_ruyi_user_package up 
    LEFT JOIN fa_ruyi_package p ON up.package_id = p.id 
    WHERE up.user_id = " . $user['id'] . " AND up.expire_time > " . time() . " 
    ORDER BY up.expire_time DESC LIMIT 1
"));

mysqli_close($conn);

// 格式化数据
$is_vip = $package ? true : false;
$package_name = $package['name'] ?? '暂无套餐';
$expire_time = $package['expire_time'] ? date('Y-m-d H:i', $package['expire_time']) : '未开通';
$create_time = date('Y-m-d', $user['createtime']);
$login_time = $user['logintime'] ? date('Y-m-d H:i', $user['logintime']) : '首次登录';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>用户中心 - 锐野优商加速器</title>
  <link href="static/layui/css/layui.css" rel="stylesheet">
  <style>
  *{margin:0;padding:0;box-sizing:border-box;}
  body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;background:#0a0a0a;color:#fff;min-height:100vh;}
  .header{background:linear-gradient(135deg,#1a1a2e 0%,#16213e 100%);padding:20px 0;position:sticky;top:0;z-index:100;box-shadow:0 2px 20px rgba(0,0,0,0.3);}
  .container{max-width:1200px;margin:0 auto;padding:0 20px;}
  .header .container{display:flex;align-items:center;justify-content:space-between;}
  .logo{font-size:24px;font-weight:bold;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
  .nav{display:flex;gap:30px;}
  .nav a{color:#fff;text-decoration:none;opacity:0.9;transition:0.3s;font-size:15px;}
  .nav a:hover,.nav a.active{opacity:1;color:#667eea;}
  .user-area{display:flex;gap:15px;align-items:center;}
  .user-area .username{color:#667eea;font-weight:bold;}
  
  .user-card{background:linear-gradient(135deg,#1a1a2e,#16213e);border-radius:16px;padding:40px;margin:40px auto;max-width:800px;}
  .user-header{display:flex;align-items:center;gap:30px;margin-bottom:30px;}
  .avatar{width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#667eea,#764ba2);display:flex;align-items:center;justify-content:center;font-size:32px;}
  .user-info h2{font-size:28px;margin-bottom:8px;}
  .vip-badge{display:inline-block;background:linear-gradient(135deg,#f093fb,#f5576c);padding:4px 16px;border-radius:20px;font-size:14px;}
  .vip-badge.normal{background:#666;}
  
  .stats{display:flex;gap:40px;margin-top:30px;}
  .stat-item{text-align:center;}
  .stat-value{font-size:24px;font-weight:bold;color:#667eea;}
  .stat-label{color:#999;font-size:14px;margin-top:5px;}
  
  .menu-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:40px;}
  .menu-item{background:rgba(255,255,255,0.05);border-radius:12px;padding:30px;text-align:center;cursor:pointer;transition:0.3s;}
  .menu-item:hover{background:rgba(255,255,255,0.1);transform:translateY(-5px);}
  .menu-icon{font-size:36px;margin-bottom:15px;}
  .menu-title{font-size:16px;}
  
  .logout-btn{display:block;width:200px;margin:40px auto 0;padding:12px;background:rgba(255,255,255,0.1);border:none;border-radius:8px;color:#fff;font-size:16px;cursor:pointer;transition:0.3s;}
  .logout-btn:hover{background:#f5576c;}
  </style>
</head>
<body>
  <div class="header">
    <div class="container">
      <div class="logo">锐野优商加速器</div>
      <nav class="nav">
        <a href="/">首页</a>
        <a href="/server.php">服务器</a>
        <a href="/pay.php">套餐</a>
        <a href="/appload.php">下载</a>
        <a href="/user.php" class="active">用户中心</a>
      </nav>
      <div class="user-area">
        <span class="username"><?php echo htmlspecialchars($user['username']); ?></span>
        <a href="/login_home.php?action=logout" style="color:#999;">退出</a>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="user-card">
      <div class="user-header">
        <div class="avatar"><?php echo substr($user['username'], 0, 1); ?></div>
        <div class="user-info">
          <h2><?php echo htmlspecialchars($user['username']); ?></h2>
          <span class="vip-badge <?php echo $is_vip ? '' : 'normal'; ?>">
            <?php echo $is_vip ? 'VIP会员' : '普通用户'; ?>
          </span>
        </div>
      </div>
      
      <div class="stats">
        <div class="stat-item">
          <div class="stat-value"><?php echo $package_name; ?></div>
          <div class="stat-label">当前套餐</div>
        </div>
        <div class="stat-item">
          <div class="stat-value"><?php echo $expire_time; ?></div>
          <div class="stat-label">到期时间</div>
        </div>
        <div class="stat-item">
          <div class="stat-value"><?php echo $create_time; ?></div>
          <div class="stat-label">注册时间</div>
        </div>
        <div class="stat-item">
          <div class="stat-value"><?php echo $login_time; ?></div>
          <div class="stat-label">最后登录</div>
        </div>
      </div>
      
      <div class="menu-grid">
        <div class="menu-item" onclick="location.href='/pay.php'">
          <div class="menu-icon">💎</div>
          <div class="menu-title">开通/续费VIP</div>
        </div>
        <div class="menu-item">
          <div class="menu-icon">📋</div>
          <div class="menu-title">订单记录</div>
        </div>
        <div class="menu-item">
          <div class="menu-icon">⚙️</div>
          <div class="menu-title">账号设置</div>
        </div>
      </div>
      
      <button class="logout-btn" onclick="location.href='/login_home.php?action=logout'">退出登录</button>
    </div>
  </div>
</body>
</html>
