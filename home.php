<?
$debug = time();// 棰勯槻js鍜宑ss缂撳瓨
require_once('../../api/System.php');
$product = $_GET['product'];
$productdata= mysqli_query($conn,"select * from oem where name = '$product'");
$productdata = mysqli_fetch_assoc($productdata);

?>

<!-- Pixel Code - //tongji.jihujiasuqi.com/ -->
<!--<script defer src="https://tongji.jihujiasuqi.com/pixel/yMe9gPGIZKE7GZNu"></script>-->
<!-- END Pixel Code -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>涓婚〉</title>
  <link href="static/layui/css/layui.css" rel="stylesheet">
  <link href="static/css/color_map.css?V1.0" rel="stylesheet"><!-- 棰滆壊澶у叏 -->
  <link href="static/css/style.css?<?echo $debug;?>" rel="stylesheet">
  
  <style>
  /* OEM_style */
  <? echo $productdata["oem_css"]?>
  /* OEM_style_END */
  </style>
  
  
  
</head>
<body class="home_page_body">
    <!--杩欓噷鏄嫋鎷藉尯鍩?->
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
    </div>
    
    <!--椤堕儴鏍?->
    <!--<div class="navbar"></div>-->
    <!-- 绋嬪簭绐楀彛锛屾墍鏈夌殑ui閮藉湪杩欓噷琛ㄦ紨灞曠ず~ -->
    <div class="app_box window_radius">
        <!-- 椤堕儴瀵艰埅鏍?-->
        <div class="nav">
            <!-- 鍔犻€熷櫒 logo -->
            <img src="" class="logo" alt="logo">
            
            <!-- 鎼滅储娓告垙 -->
            <div class="layui-form-item game_search ">
              <div class="layui-input-wrap">
                <div class="layui-input-prefix">
                  <i class="layui-icon layui-icon-search"></i>
                </div>
                <input type="text" name="username" value="" lay-verify="required" placeholder="鎼滅储" lay-reqtext="鎼滅储" autocomplete="off" class="layui-input no-outline" id="GamesearchInput" lay-affix="clear">
              </div>
            </div>
            <div class="game_search_text ">
                <p> <p/>
            </div>
            
            <div class="user_top_info">
                <img src="https://api.jihujiasuqi.com/app_ui/pc/static/img/avater.png" class="avater">
                <img src="https://api.jihujiasuqi.com/up_img/Cards/1.gif" class="cards"><!--  鍙兘鍗犵敤cpu ~0.1 -->
                <!--<p>9999鏃?9鍒?/p>-->
                <p>鍐呮祴涓嶉檺鏃?/p>
            </div>
            <div class="user_info_box">
                <div class="info_box">
                    <p class="title">鎮ㄧ殑鍓╀綑鏃堕暱</p>
                    
                    <p class="time1">00鏃?00鍒?00绉?/p>
                    <p class="time_title1">涓嶅彲鏆傚仠鏃堕暱</p>
                    <button type="button" class="layui-btn layui-bg-blue layui-btn-sm time1_bottom">鑾峰彇鏃堕暱</button>
                    
                    <p class="time2">00鏃?00鍒?00绉?/p>
                    <p class="time_title2">鍙殏鍋滄椂闀?/p>
                    <button type="button" class="layui-btn layui-btn-disabled layui-btn-sm time2_bottom"  onclick="buy_time_page()">鍏呭€兼椂闀?/button>
                </div>
            </div>
            
            
            <!-- 鍔犻€熷櫒閫夐」鍗?-->
            <div class="layui-tab layui-tab-brief top-tab" lay-filter="top-tab">
              <ul class="layui-tab-title">
                <li class="layui-this" page="home">棣栭〉</li>
                <li page="allgame">娓告垙</li>
                <li page="net_speed" style="display: none;">缃戠粶鍔犻€?璋冭瘯)</li>
                <li page="start_game" style="display: none;">鍔犻€熼〉闈?debug)</li>
                <li page="my_set" style="display: none;">鎴戠殑</li>
                <li page="buy_time" style="display: none;">濂楅璐拱</li>
              </ul>
            </div>
            <div class="back_bottom" onclick="$(`[page='home']`).trigger('click');">
                <i class="layui-icon layui-icon-left"></i>
            </div>
            
        </div>
        
        <div class="home_page app_page">
            <!-- 棣栭〉娓告垙鍒楄〃 -->
            <div class="home_game_list">
                <!-- 娓告垙鍒楄〃 -->
                <!--<div class="home_game_box">-->
                <!--    <img src="/up_img/1ab6f8b64d2caf6a2dd6ccfe5954a186.png.webp" class="game_img">-->
                <!--</div>-->
                
            </div>
            
            
            <div class="home_game_list_all" id="home_game_list_all">
                <!-- 棣栭〉鍏ㄩ儴娓告垙 -->
            </div>
            
            
            
            <div class="home_carousel">
                <!--1000X200-->
                <!--<br>杞挱鍥?JavaScript 鏈Е鍙?->
                <!--<br>class=home_carousel-->
                <!--<br>璇ュ尯鍩熷彲鑷畾涔変换浣曞唴瀹?->
            </div>
            
            <!-- 鍙充晶鑿滃崟 -->
            <!--<div class="home_menu">-->
                
            <!--</div>-->
            
            
        </div>
        
        
        
        <div class="game_page app_page">
            
            <div class="layui-tab layui-tab-brief all-game-tab">
              <!--<ul class="layui-tab-title">-->
              <!--  <li class="layui-this">鍏ㄩ儴娓告垙</li>-->
              <!--  <li>骞冲彴鍔犻€?/li>-->
              <!--  <li>涓绘満鍔犻€?/li>-->
              <!--  <li>鎴戠殑娓告垙</li>-->
              <!--</ul>-->
            </div>
            
            <!-- 鍏ㄩ儴娓告垙鍒楄〃 -->
            <div class="game_list_all">
                
            </div>
        </div>
        
        <div class="net_speed app_page">
            
            <!-- 鍔犻€熷垪琛?-->
            <div class="net_speed_list">
                <div class="layui-panel">
                    <div class="net_speed_list_box">闈㈡澘浠绘剰鍐呭</div>
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
                
                <p class="pt_title">鍚屾椂鍔犻€?</p>
                <div class="pt_list">
                    <div class="pt_box" onclick="net_speed()">
                        <i class="layui-icon layui-icon-add-1" style="position: relative;top: 4px;left: -3px;font-size: 24px;margin-left: 0px;"></i> 
                    </div>
                </div>
                
                
                <div class="layui-panel info">
                  <div class="server_info">
                      <p>xxx鏈嶅姟鍣?/p>
                      <img src="/app_ui/pc/static/img/udp-err.png" class="udp_ico">
                  </div>
                </div>
                
                <div class="layui-panel ping">
                  <div class="server_ping">
                      <canvas id="Start_speed_pingCanvas"></canvas>
                      
                      <h2 class="pingh2">
                          <Start_speed_ping_html>0</Start_speed_ping_html><mini>ms</mini>
                          <p>娓告垙寤惰繜</p>
                      </h2>
                      <h2 class="diubao">
                          <Start_speed_diubao_html>0</Start_speed_diubao_html><mini>%</mini>
                          <p>涓㈠寘鐜?/p>
                      </h2>
                      <h2 class="outputBytes">
                          <Start_speed_outputBytes_html>0</Start_speed_outputBytes_html><mini>%</mini>
                          <p>鍔犻€熸祦閲?/p>
                      </h2>
                      <h2 class="Bytes_speed">
                          <Start_speed_Bytes_speed_html>0</Start_speed_Bytes_speed_html><mini>%</mini>
                          <p>褰撳墠閫熷害</p>
                      </h2>
                      
                      
                  </div>
                </div>
                
                <div class="server_button">
                    <button type="button" class="layui-btn layui-btn-lg layui-btn-primary layui-border-red stop_speed stop_speed_hover_jq"  onclick="stop_speed()">
                        <i class="layui-icon layui-icon-radio"></i> 
                        鍔犻€熶腑:<time>00:00:00</time>
                    </button>
                    <button type="button" class="layui-btn layui-btn-lg layui-bg-red stop_speed_hover_jq stop_speed_hover" onclick="stop_speed()" style="position: absolute;left: -9px;width: 185px;opacity: 0;">
                        <i class="layui-icon layui-icon-radio"></i> 
                        鍋滄鍔犻€?                    </button>
                    
                    
                    
                    <button onclick="start_game_user();" type="button" class="layui-btn layui-btn-lg layui-btn-primary layui-border-blue start_game start_game_user" style="width: 157px;border-radius: 4px 0px 0px 4px;">
                        <i class="layui-icon layui-icon-release"></i> 
                        鍚姩娓告垙
                    </button>
                    
                    <button type="button"  onclick="ipcRenderer.send('user_get_exe');" class="layui-btn layui-btn-lg layui-btn-primary layui-border-blue start_game set_game_user" style="padding: 0 11px;margin-left: -5px;border-radius: 0px 4px 4px 0px;">
                        <i class="layui-icon layui-icon-set"></i> 
                    </button>
                    
                </div>
                
            </div>
            
        </div>
        
        <!-- 璐拱濂楅 -->
        <div class="buy_time app_page">
            <iframe
                id="inlineFrameExample"
                class="buybgiframe"
                title="Inline Frame Example"
                frameborder="no"
                src="">
            </iframe>
            
            
            
        </div>
        <!-- 鐢ㄦ埛璁剧疆 -->
        <div class="my_set app_page">
            <h2 class="set_title">璁剧疆</h2>
            <ul class="layui-nav layui-nav-tree">
              <li class="layui-nav-item layui-this" page="my_user"><a href="javascript:;">涓汉涓績</a></li>
              <!--<li class="layui-nav-item" page="iframe_Details"><a href="javascript:;">鏃堕暱鏄庣粏</a></li>-->
              <li class="layui-nav-item" page="sys_set"><a href="javascript:;">绯荤粺璁剧疆</a></li>
              <li class="layui-nav-item" page="fix"><a href="javascript:;">淇宸ュ叿</a></li>
              <!--<li class="layui-nav-item" page="iframe_aff"><a href="javascript:;">鎺ㄥ箍涓績</a></li>-->
              <!--<li class="layui-nav-item" page="iframe_agent"><a href="javascript:;">鍔犵洘浠ｇ悊</a></li>-->
              <!--<li class="layui-nav-item" page="iframe_kl"><a href="javascript:;">鍙ｄ护鍏戞崲</a></li>-->
              <!--<li class="layui-nav-item" page="iframe_key"><a href="javascript:;">CDK 鍏戞崲</a></li>-->
              <li class="layui-nav-item" page="iframe_about"><a href="javascript:;">鍏充簬鏋佺嫄</a></li>
            </ul>
            
            <div class="my_user my_set_page">
                <h2 class="title">鎴戠殑</h2>
                
                <img src="https://api.jihujiasuqi.com/app_ui/pc/static/img/avater.png" class="avater">
                <img src="https://api.jihujiasuqi.com/up_img/Cards/2.gif" class="cards"><!--  鍙兘鍗犵敤cpu ~0.1 -->
                <p class="username">鑾峰彇鐢ㄦ埛鍚嶅け璐?/p>
                <p class="UID">UID 鑾峰彇澶辫触</p>
                
                <button class="layui-btn layui-btn-primary layui-border-red layui-btn-sm Logout" onclick="Logout();">閫€鍑虹櫥褰?/button>
                
            </div>
            <div class="sys_set my_set_page"  style="display: none;">
                <h2 class="title">甯歌璁剧疆</h2>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">寮€鏈哄惎鍔?/label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="寮€鏈鸿嚜鍔ㄥ惎鍔ㄥ姞閫熷櫒" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">寤惰繜鍏变韩</label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="鍏变韩鎮ㄧ殑缃戠粶鐘舵€佸拰寤惰繜锛屼互渚垮府鍔╂垜浠洿濂界殑瀹屽杽缃戠粶" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
                <hr>
                <h2 class="title">鍔犻€熶紭鍖?/h2>
                <div class="layui-form-item">
                    <label class="layui-form-label">鍔ㄦ€佸绾?/label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="鍔ㄦ€佽皟鏁寸綉缁滅姸鎬?瀹炴椂浼樺寲缃戠粶 (鍙兘娑堣€椾竴浜汣PU)" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">涓绘満椹卞姩</label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="鍔犻€熶富鏈烘椂闇€寮€鍚富鏈洪┍鍔紝濡傛灉缃戝崱鍐茬獊褰卞搷鍙叧闂閫夐」" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">鑷姩杩炴帴</label>
                    <div class="layui-form">
                        <input type="checkbox" name="agreement" value="1" title="鑷姩杩炴帴涓婃閫夋嫨鐨勮妭鐐癸紝濡傛灉鑺傜偣鐖嗘弧鎴栫ǔ瀹氭€т綆鍙兘褰卞搷娓告垙浣撻獙" lay-filter="demo-checkbox-filter">
                    </div>
                </div>
                
            </div>
            
            <div class="fix my_set_page"  style="display: none;">
                <h2 class="title">缃戠粶淇</h2>
                <p class="title2">缃戠粶閲嶇疆锛岃嫢缃戠粶鍑虹幇鏁呴殰鎴栧姞閫熷け璐ワ紝鍙皾璇曚慨澶?/p>
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal reset_lsp">淇LSP</button>
                <!--<open_url href="https://jihujiasuqi.com/">TEST</open_url>-->
                
                <h2 class="title">NetFilter 淇</h2>
                <p class="title2">鑻ヨ繘绋嬫ā寮忓惎鍔ㄦ姤閿欙紝鍙皾璇曚慨澶?NetFilter 妯″潡</p>
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal reset_nf2">淇</button>
                
                <h2 class="title">TUN/TAP 淇</h2>
                <p class="title2">鑻ヨ矾鐢辨ā寮忓惎鍔ㄦ姤閿欙紝鍙皾璇曚慨澶?TUN/TAP 妯″潡</p>
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal reset_tun">淇</button>
                
                
                <h2 class="title">缃戠粶鏃犳晠涓㈠寘</h2>
                <p class="title2">鑻ョ綉缁滄棤鏁呬涪鍖咃紝鍙娴嬫偍鏈湴鐨勭綉缁滅姸鎬侊紝鎺掗櫎鏈湴闂銆?/p>
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal net_test">缃戠粶妫€娴?/button>
                
            </div>
            
            <div class="iframe my_set_page"  style="display: none;">
                <iframe
                    frameborder="no"
                    src="">
                </iframe>
            </div>
            
            
        </div>
        
        
        <div class="error_page app_page">
            
            <h2 class="error_title">閿欒淇℃伅</h2>
            <textarea class="error_log layui-textarea" id="error_log" placeholder=" " readonly></textarea>
            
            
            <div class="error_captcha" style="display: none;">
                <div><button class="error_log_captcha_submit captcha_submit" type="button">鎻愪氦</button></div>
            </div>
            
        </div>
        
        
    </div>
    
    
    <!-- 娴嬭瘯鐗堟按鍗?-->
    <div class="demo_watermark">鎶㈠厛娴嬭瘯鐗?/div>
    
    <div class="Framework" onclick="app_window('openDevTools')"> 鑾峰彇寮€鍙戜俊鎭腑</div>
    
  <!-- HTML Content -->
  <script src="static/layui/layui.js"></script>
  
  <script src="static/js/jquery-3.7.1.min.js"></script>
  <!--<script src="static/js/pinyin.js"></script><!-- 鎷奸煶 -->

  
  <script>
    // oem_js
  <? echo $productdata["oem_js"]?>
  </script>
  <script src="static/js/sys.js?<?echo $debug;?>"></script>
  <script src="static/js/script.js?<?echo $debug;?>"></script>
  
  <script src="/apps/captcha2/dist/captcha.js"></script> 
  <link rel="stylesheet" type="text/css" href="/apps/captcha2/dist/captcha.css" />
  
</body>
</html>
