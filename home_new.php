
<!-- Pixel Code - //tongji.jihujiasuqi.com/ -->
<!--<script defer src="https://tongji.jihujiasuqi.com/pixel/yMe9gPGIZKE7GZNu"></script>-->
<!-- END Pixel Code -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="referrer" content="never">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>主页</title>
  <link href="static/layui/css/layui.css" rel="stylesheet">
  <link href="static/css/color_map.css?V1.0" rel="stylesheet"><!-- 颜色大全 -->
  <link href="static/css/style.css?1773674365" rel="stylesheet">
  
  <style>
  /* OEM_style */
    /* OEM_style_END */
  </style>
  
  
  
</head>
<body class="home_page_body">
    <!--这里是拖拽区域-->
    <div id="draggable"></div>
    
    <div class="Window_button close">
        <div class="exit button"  onclick="app_window('hide')">
            <i class="layui-icon layui-icon-close"></i> 
        </div>
        <div class="hide button" onclick="app_window('minimize')">
            <i class="layui-icon layui-icon-subtraction"></i> 
        </div>
        <div class="set button" onclick="my_set_page()" >
            <i class="layui-icon layui-icon-more-vertical"></i> 
        </div>
        
        <div class="kefu button" onclick="open_url('https://txc.qq.com/products/484011/#label=show')" >
            <i class="layui-icon layui-icon-service"></i> 
        </div>
        
    </div>
    
    <!--顶部栏-->
    <!--<div class="navbar"></div>-->
    <!-- 程序窗口，所有的ui都在这里表演展示~ -->
    <div class="app_box window_radius">
        <!-- 顶部导航栏 -->
        <div class="nav">
            <!-- 加速器 logo -->
            <img src="" class="logo" alt="logo">
            
            <!-- 搜索游戏 -->
            <div class="layui-form-item game_search ">
              <div class="layui-input-wrap">
                <div class="layui-input-prefix">
                  <i class="layui-icon layui-icon-search"></i>
                </div>
                <input type="text" name="username" value="" lay-verify="required" placeholder="搜索" lay-reqtext="搜索" autocomplete="off" class="layui-input no-outline" id="GamesearchInput" lay-affix="clear">
              </div>
            </div>
            <div class="game_search_text ">
                <p> <p/>
            </div>
            
            <div class="user_top_info">
                <img src="https://api.jihujiasuqi.com/app_ui/pc/static/img/avater.png" class="avater">
                <!--<img src="https://api.jihujiasuqi.com/up_img/Cards/1.gif" class="cards">-->
                <!--  可能占用cpu ~0.1 -->
                <!--<p>9999时59分</p>-->
                <p class="time1">00:00:00</p>
            </div>
            <div class="user_info_box">
                <onclickBOX onclick="my_set_page()" style="width: 150px;height: 40px;position: absolute;cursor: pointer;"></onclickBOX>
                <div class="info_box">
                    <p class="title">您的剩余时长</p>
                    
                    <p class="time1">--</p>
                    <p class="time_title1">不可暂停时长</p>
                    <button type="button" class="layui-btn layui-bg-blue layui-btn-sm time1_bottom" onclick="Get_free_time()">获取时长</button>
                    
                    <!--<p class="time2">--</p>-->
                    <!--<p class="time_title2">可暂停时长</p> layui-btn-disabled_--> 
                    <button type="button" class="layui-btn  layui-btn-sm layui-bg-orange time2_bottom"  onclick="buy_time_page()">免看广告</button>
                </div>
            </div>
            
            
            <!-- 加速器选项卡 -->
            <div class="layui-tab layui-tab-brief top-tab" lay-filter="top-tab">
              <ul class="layui-tab-title">
                <li class="layui-this" page="home">首页</li>
                <li page="allgame">游戏</li>
                <li page="speed_box" style="display: none;">加速盒</li>
                <li page="net_speed" style="display: none;">网络加速(调试)</li>
                <li page="start_game" style="display: none;">加速页面(debug)</li>
                <li page="my_set" style="display: none;">我的</li>
                <li page="buy_time" style="display: none;">套餐购买</li>
              </ul>
            </div>
            <div class="back_bottom" onclick="$(`[page='home']`).trigger('click');">
                <i class="layui-icon layui-icon-left"></i>
            </div>
            
        </div>
        
        <div class="home_page app_page">
            <!-- 首页游戏列表 -->
            <div class="home_game_list">
                <!-- 游戏列表 -->
                <!--<div class="home_game_box">-->
                <!--    <img src="/up_img/1ab6f8b64d2caf6a2dd6ccfe5954a186.png.webp" class="game_img">-->
                <!--</div>-->
                
            </div>
            
            
            <div class="home_game_list_all" id="home_game_list_all">
                <!-- 首页全部游戏 -->
            </div>
            
            
            
            <div class="home_carousel">
                <!--1000X200-->
                <!--<br>轮播图 JavaScript 未触发-->
                <!--<br>class=home_carousel-->
                <!--<br>该区域可自定义任何内容-->
            </div>
            
            <!-- 右侧菜单 -->
            <!--<div class="home_menu">-->
                
            <!--</div>-->
            
            
        </div>
        
        
        
        <div class="game_page app_page">
            
            <div class="layui-tab layui-tab-brief all-game-tab">
              <!--<ul class="layui-tab-title">-->
              <!--  <li class="layui-this">全部游戏</li>-->
              <!--  <li>平台加速</li>-->
              <!--  <li>主机加速</li>-->
              <!--  <li>我的游戏</li>-->
              <!--</ul>-->
            </div>
            
            <!-- 全部游戏列表 -->
            <div class="game_list_all">
                
            </div>
        </div>
        
        <div class="net_speed app_page">
            
            <!-- 加速列表 -->
            <div class="net_speed_list">
                <div class="layui-panel">
                    <div class="net_speed_list_box">面板任意内容</div>
                </div>
            </div>
        </div>
        
        <div class="start_game app_page">
            <div class="game_img_bg">
                <div class="MASK"></div>
                <img src="/app_ui/pc/static/img/wallpapers.jpg" class="game_bg">
                
                <video muted autoplay="autoplay"  class="game_bg_video" id="game_bg_video">
                	<source src="" type="video/mp4"></source>
                </video>
                
                
            </div>
            <div class="box">
                <p class="gamename">gamename</p>
                
                <p class="pt_title">同时加速:</p>
                <div class="pt_list">
                    <div class="pt_box" onclick="net_speed()">
                        <i class="layui-icon layui-icon-add-1" style="position: relative;top: 4px;left: -3px;font-size: 24px;margin-left: 0px;"></i> 
                    </div>
                </div>
                
                
                <div class="layui-panel info">
                  <div class="server_info">
                      <p>xxx服务器</p>
                      <!--<img src="/app_ui/pc/static/img/udp-err.png" class="udp_ico">-->
                      <div class="server_connect_test">
                          <pp class="tcp">TCP</pp>
                          <pp class="udp">UDP</pp>
                      </div>
                      
                  </div>
                </div>
                
                <div class="layui-panel ping">
                  <div class="server_ping">
                      <canvas id="Start_speed_pingCanvas"></canvas>
                      
                      <h2 class="pingh2">
                          <Start_speed_ping_html>0</Start_speed_ping_html><mini> ms</mini>
                          <p>游戏延迟</p>
                      </h2>
                      <h2 class="diubao">
                          <Start_speed_diubao_html>0</Start_speed_diubao_html><mini> %</mini>
                          <p>丢包率</p>
                      </h2>
                      <h2 class="outputBytes">
                          <Start_speed_outputBytes_html>0</Start_speed_outputBytes_html><mini> %</mini>
                          <p>加速流量</p>
                      </h2>
                      <h2 class="Bytes_speed">
                          <Start_speed_Bytes_speed_html>0</Start_speed_Bytes_speed_html><mini> %</mini>
                          <p>当前速度</p>
                      </h2>
                      
                      
                  </div>
                </div>
                
                <div class="layui-panel ping_all">
                    <div class="div_pc divbox">
                        <img class="ico ico_pc" src="https://api.jihujiasuqi.com/app_ui/pc/static/img/电脑.png">
                        <p>电脑</p>
                    </div>
                    <div class="div_routing divbox">
                        <img class="ico ico_routing" src="https://api.jihujiasuqi.com/app_ui/pc/static/img/路由器.png">
                        <p>路由器</p>
                    </div>
                    <div class="div_operators divbox">
                        <img class="ico ico_operators" src="https://api.jihujiasuqi.com/app_ui/pc/static/img/网络1.png">
                        <p>运营商</p>
                    </div>
                    
                    <!-- 路由id -->
                    <canvas class="routing networkDelayCanvas_routing" ></canvas>
                    <p style="position: absolute;left: 64px;top: 44px;width: 100px;text-align: center;">本地网络 <routing_ping>00 ms</routing_ping></p>
                    <!--<p><routing_ping>00 ms</routing_ping></p>-->
                    
                    
                    <!-- dns网络(运营商)  id="networkDelayCanvas_223.5.5.5" -->
                    <canvas class="alidns networkDelayCanvas_alidns" ></canvas>
                    <p style="position: absolute;left: 222px;top: 44px;width: 128px;text-align: center;">运营商网络 <dns_ping>00 ms</dns_ping></p>
                    <!--<p><dns_ping>00 ms</dns_ping></p>-->
                    
                    
                </div>
                
                <!-- 加速页面广告区域 -->
                <style>
                .adsbygoogle_1{
                    /*background: #ffffff82;*/
                    width: 400px;
                    height: 300px;
                    right: 38px;
                    top: 300px;
                    position: fixed;
                }
                
                .adsbygoogle_2{
                    /*background: #ffffff82;*/
                    width: 870px;
                    height: 120px;
                    right: 80px;
                    top: 100px;
                    position: fixed;
                }
                </style>
                <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2772837063332586"-->
                <!--     crossorigin="anonymous"></script>-->
                <!-- 正方形-自适应广告 -->
                <!--<ins class="adsbygoogle adsbygoogle_1"-->
                <!--     style="display:block"-->
                <!--     data-ad-client="ca-pub-2772837063332586"-->
                <!--     data-ad-slot="5326657602"-->
                <!--     data-ad-format="auto"-->
                <!--     data-full-width-responsive="true"></ins>-->
                <!--<script>-->
                <!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
                <!--</script>-->
                
                <!--/横幅广告-->
                <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2772837063332586"-->
                <!--     crossorigin="anonymous"></script>-->
                <!-- 800*100ad -->
                <!--<ins class="adsbygoogle adsbygoogle_2"-->
                <!--     style="display:inline-block;width:800px;height:100px"-->
                <!--     data-ad-client="ca-pub-2772837063332586"-->
                <!--     data-ad-slot="1691267568"></ins>-->
                <!--<script>-->
                <!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
                <!--</script>-->
                
                
                <!-- 加速页面广告区域 --  结束 -->
                
                <div class="server_button">
                    <button type="button" class="layui-btn layui-btn-lg layui-btn-primary layui-border-red stop_speed stop_speed_hover_jq"  onclick="stop_speed()">
                        <i class="layui-icon layui-icon-radio"></i> 
                        加速中:<time>00:00:00</time>
                    </button>
                    <button type="button" class="layui-btn layui-btn-lg layui-bg-red stop_speed_hover_jq stop_speed_hover" onclick="stop_speed()" style="position: absolute;left: -9px;width: 185px;opacity: 0;">
                        <i class="layui-icon layui-icon-radio"></i> 
                        停止加速
                    </button>
                    
                    
                    
                    <button onclick="start_game_user();" type="button" class="layui-btn layui-btn-lg layui-btn-primary layui-border-blue start_game start_game_user" style="width: 157px;border-radius: 4px 0px 0px 4px;">
                        <i class="layui-icon layui-icon-release"></i> 
                        启动游戏
                    </button>
                    
                    <button type="button"  onclick="ipcRenderer.send('user_get_exe');" class="layui-btn layui-btn-lg layui-btn-primary layui-border-blue start_game set_game_user" style="padding: 0 11px;margin-left: -5px;border-radius: 0px 4px 4px 0px;">
                        <i class="layui-icon layui-icon-set"></i> 
                    </button>
                    
                </div>
                
            </div>
            
        </div>
        
        <!-- 购买套餐 -->
        <div class="buy_time app_page">
            <iframe
                id="inlineFrameExample"
                class="buybgiframe"
                title="Inline Frame Example"
                frameborder="no"
                src="">
            </iframe>
            
            
            
        </div>
        <!-- 用户设置 -->
        <div class="my_set app_page">
            <h2 class="set_title">设置</h2>
            <ul class="layui-nav layui-nav-tree">
              <li class="layui-nav-item layui-this" page="my_user"><a href="javascript:;">个人中心</a></li>
              <!--<li class="layui-nav-item" page="iframe_Details"><a href="javascript:;">时长明细</a></li>-->
              <li class="layui-nav-item" page="sys_set"><a href="javascript:;">系统设置</a></li>
              <li class="layui-nav-item" page="fix"><a href="javascript:;">修复工具</a></li>
              <li class="layui-nav-item" page="iframe_aff"><a href="javascript:;">推广中心</a></li>
              <!--<li class="layui-nav-item" page="iframe_agent"><a href="javascript:;">加盟代理</a></li>-->
              <!--<li class="layui-nav-item" page="iframe_kl"><a href="javascript:;">口令兑换</a></li>-->
              <!--<li class="layui-nav-item" page="iframe_key"><a href="javascript:;">CDK 兑换</a></li>-->
              <li class="layui-nav-item" page="iframe_about"><a href="javascript:;">关于极狐</a></li>
            </ul>
            
            <div class="my_user my_set_page">
                <h2 class="title">我的</h2>
                
                <img src="https://api.jihujiasuqi.com/app_ui/pc/static/img/avater.png" class="avater">
                <img src="https://api.jihujiasuqi.com/up_img/Cards/1.gif" class="cards"><!--  可能占用cpu ~0.1 -->
                <p class="username">账号未登录</p>
                <p class="UID">账号未登录</p>
                
                <button class="layui-btn layui-btn-primary layui-border-red layui-btn-sm Logout" onclick="Logout();">退出登录</button>
                
                <h2 class="title" style="top: 140px;position: absolute;">我的等级</h2>
                <iframe frameborder="no" class="iframe_level" src="page/Level/index.php"></iframe>
                
                <p class="del_user_btn"  onclick="del_user();" style=" opacity: 0.6;">注销账号</p>
            </div>
            <div class="sys_set my_set_page"  style="display: none;">
                <h2 class="title">常规设置</h2>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">开机启动</label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="开机自动启动加速器" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">延迟共享</label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="共享您的网络状态和延迟，以便帮助我们更好的完善网络" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
                <hr>
                <h2 class="title">加速优化</h2>
                <div class="layui-form-item">
                    <label class="layui-form-label">动态多线</label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="动态调整网络状态,实时优化网络 (可能消耗一些CPU)" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">主机驱动</label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="加速主机时需开启主机驱动，如果网卡冲突影响可关闭该选项" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">自动连接</label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="自动连接上次选择的节点，如果节点爆满或稳定性低可能影响游戏体验" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                <!--<hr>-->
                <!--<h2 class="title">时长提示</h2>-->
                <!--<div class="layui-form-item">-->
                <!--    <label class="layui-form-label">提示音</label>-->
                <!--    <div class="layui-form" onclick="playAudio('/app_ui/pc/static/audio/B%E5%8A%A8%E9%9D%99_%E5%8A%A0%E9%80%9F%E6%97%B6%E9%95%BF%E4%B8%8D%E8%B6%B310%E5%88%86%E9%92%9F_1.MP3');timeover_Notification();">-->
                <!--        <input type="checkbox" name="agreement" value="1" title="当时间不足时，播放提示音 &nbsp;&nbsp;&nbsp;🤓☝️ (当前版本提示音逆天)" lay-filter="demo-checkbox-filter">-->
                <!--    </div>-->
                <!--</div>-->
                
                
            </div>
            
            <div class="fix my_set_page"  style="display: none;">
                <h2 class="title">网络修复</h2>
                <p class="title2">网络重置，若网络出现故障或加速失败，可尝试修复</p>
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal reset_lsp">修复LSP</button>
                <!--<open_url href="https://jihujiasuqi.com/">TEST</open_url>-->
                
                <h2 class="title">NetFilter 修复</h2>
                <p class="title2">若进程模式启动报错，可尝试修复 NetFilter 模块</p>
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal reset_nf2">修复</button>
                
                <h2 class="title">TUN/TAP 修复</h2>
                <p class="title2">若路由模式启动报错，可尝试修复 TUN/TAP 模块</p>
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal reset_tun">修复</button>
                
                
                <h2 class="title">网络无故丢包</h2>
                <p class="title2">若网络无故丢包，可检测您本地的网络状态，排除本地问题。</p>
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal net_test">网络检测</button>
                
            </div>
            
            <div class="iframe my_set_page"  style="display: none;">
                <iframe
                    frameborder="no"
                    src="">
                </iframe>
            </div>
            
            
        </div>
        
        
        <div class="error_page app_page">
            
            <h2 class="error_title">错误信息</h2>
            <p class="error_code">您的错误代码:<input type="text" name="error_code_input" value="0"><br>请将错误代码提交给管理员,并且说明情况,请勿截图,拍屏！</p>
            <textarea class="error_log layui-textarea" id="error_log" placeholder=" " readonly></textarea>
            
            
            <div class="error_captcha" style="display: none;">
                <div><button class="error_log_captcha_submit captcha_submit" type="button">提交</button></div>
            </div>
            
        </div>
        
        
    </div>
    
    
    <!-- 测试版水印 -->
    <div class="demo_watermark">抢先测试版</div>
    
    <div class="Framework"> 获取开发信息中</div>
    
    
    <update style="display: none;">
        <img src="static/img/file_msg.gif" class="ico">
        <p>开发中,请无视</p>
        
    </update>
  <!-- HTML Content -->
  <script src="static/layui/layui.js"></script>
  
  <script src="static/js/jquery-3.7.1.min.js"></script>
  <!--<script src="static/js/pinyin.js"></script><!-- 拼音 -->
  
  <script>
    // oem_js
    </script>
  <script src="static/js/sys.js?1773674365"></script>
  <script src="static/js/script.js?1773674365"></script>
  

  
  <script src="/apps/captcha2/dist/captcha.js"></script> 
  <link rel="stylesheet" type="text/css" href="/apps/captcha2/dist/captcha.css" />
  
  <!--Network telemetry-->
  <script src="/apps/Network_telemetry/node.js/user_js/Network_telemetry.js?1773674365"></script>
</body>
</html>