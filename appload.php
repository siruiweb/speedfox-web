<?php
header('Content-Type: text/html; charset=utf-8');
$current_page = 'download';
require_once('api/init.php');
require_once('header.php');
?>

  <div class="download-hero">
    <h1>下载客户端</h1>
    <p>畅享极速网络，告别延迟卡顿</p>
  </div>

  <div class="download-card">
    <div class="download-icon">⚡</div>
    <h2 class="download-title">锐野优商加速器</h2>
    <p style="opacity:0.7;margin-bottom:30px;">支持Windows/Mac/iOS/Android</p>
    
    <div style="display:flex;flex-direction:column;gap:15px;max-width:400px;margin:0 auto;">
      <a href="#" style="display:block;padding:18px 30px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;text-align:center;border-radius:12px;text-decoration:none;font-size:18px;font-weight:bold;">
        💻 Windows 下载
      </a>
      <a href="#" style="display:block;padding:18px 30px;background:rgba(255,255,255,0.1);color:#fff;text-align:center;border-radius:12px;text-decoration:none;font-size:18px;">
        🍎 Mac 下载
      </a>
      <a href="#" style="display:block;padding:18px 30px;background:rgba(255,255,255,0.1);color:#fff;text-align:center;border-radius:12px;text-decoration:none;font-size:18px;">
        📱 iOS 下载
      </a>
      <a href="#" style="display:block;padding:18px 30px;background:rgba(255,255,255,0.1);color:#fff;text-align:center;border-radius:12px;text-decoration:none;font-size:18px;">
        🤖 Android 下载
      </a>
    </div>
    
    <div style="margin-top:40px;padding-top:30px;border-top:1px solid rgba(255,255,255,0.1);">
      <p style="font-size:14px;opacity:0.6;margin-bottom:10px;">版本: v4.0.8</p>
      <p style="font-size:14px;opacity:0.6;">更新日期: 2026-03-17</p>
    </div>
  </div>

  <div style="max-width:900px;margin:0 auto;padding:40px 20px;">
    <h3 style="text-align:center;margin-bottom:30px;">功能特点</h3>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;">
      <div style="background:rgba(255,255,255,0.05);padding:25px;border-radius:12px;">
        <div style="font-size:30px;margin-bottom:15px;">🚀</div>
        <h4 style="margin-bottom:10px;">超低延迟</h4>
        <p style="opacity:0.7;font-size:14px;">智能路由选择，让你畅玩全球游戏</p>
      </div>
      <div style="background:rgba(255,255,255,0.05);padding:25px;border-radius:12px;">
        <div style="font-size:30px;margin-bottom:15px;">🛡️</div>
        <h4 style="margin-bottom:10px;">安全稳定</h4>
        <p style="opacity:0.7;font-size:14px;">企业级加密，保护你的上网隐私</p>
      </div>
      <div style="background:rgba(255,255,255,0.05);padding:25px;border-radius:12px;">
        <div style="font-size:30px;margin-bottom:15px;">🌍</div>
        <h4 style="margin-bottom:10px;">全球节点</h4>
        <p style="opacity:0.7;font-size:14px;">覆盖全球主要地区，极速畅连</p>
      </div>
    </div>
  </div>

<?php require_once('footer.php'); ?>
