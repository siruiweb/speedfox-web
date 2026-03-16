<?
$debug = time();// 棰勯槻js鍜宑ss缂撳瓨
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>鏈嶅姟鍣ㄥ垪琛?700*470</title>
  <!-- 璇峰嬁鍦ㄩ」鐩寮忕幆澧冧腑寮曠敤璇?layui.css 鍦板潃 -->
  <link href="../../static/layui/css/layui.css" rel="stylesheet">
  <link href="../../static/css/color_map.css?V1.0" rel="stylesheet"><!-- 棰滆壊澶у叏 -->
  <link href="../../static/css/style.css?<?echo $debug;?>" rel="stylesheet">
</head>

  <style>
  /*
   * 鍩轰簬澶嶉€夋鍜屽崟閫夋鐨勫崱鐗囬鏍煎閫夌粍浠?   * 闇€瑕佸叿澶囦竴浜涘熀纭€鐨?CSS 鎶€鑳斤紝浠ヤ笅鏍峰紡鍧囦负澶栭儴鑷富瀹炵幇銆?   */
  /* 涓讳綋 */
  .layui-form-checkbox>.lay-skin-checkcard,
  .layui-form-radio>.lay-skin-checkcard {
    display: table;
    display: flex;
    padding: 12px;
    white-space: normal;
    border-radius: 10px;
    border: 1px solid #e5e5e5;
    /*color: #000;*/
    background-color: #fff;
  }
  .layui-form-checkbox>.lay-skin-checkcard>*,
  .layui-form-radio>.lay-skin-checkcard>* {
    /* display: table-cell; */  /* IE */
    vertical-align: top;
  }
  /* 鎮仠 */
  .layui-form-checkbox:hover>.lay-skin-checkcard,
  .layui-form-radio:hover>.lay-skin-checkcard {
    border-color: var(--brand_blue);
  }
  /* 閫変腑 */
  .layui-form-checked>.lay-skin-checkcard,
  .layui-form-radioed[lay-skin="none"]>.lay-skin-checkcard {
    color: #fff;
    border-color: var(--brand_blue);
    background-color:#00aeec57 !important;
    /* box-shadow: 0 0 0 3px rgba(22, 183, 119, 0.08); */
  }
  /* 绂佺敤 */
  .layui-checkbox-disabled>.lay-skin-checkcard,
  .layui-radio-disabled>.lay-skin-checkcard {
    box-shadow: none;
    border-color: #e5e5e5 !important;
    background-color: #eeeeee38 !important;
  }
  /* card 甯冨眬 */
  .lay-skin-checkcard-avatar {
    padding-right: 8px;
  }
  .lay-skin-checkcard-detail {
    overflow: hidden;
    width: 100%;
  }
  .lay-skin-checkcard-header {
    font-weight: 500;
    font-size: 18px;
    white-space: nowrap;
    margin-bottom: 4px;
  }
  .lay-skin-checkcard-description {
    font-size: 13px;
    color: #5f5f5f;
  }
  .layui-disabled  .lay-skin-checkcard-description{
    color: #c2c2c2! important;
  }
  /* 閫変腑 dot */
  .layui-form-checked>.lay-check-dot:after,
  .layui-form-radioed>.lay-check-dot:after {
    position: absolute;
    content: "";
    top: 2px;
    right: 2px;
    width: 0;
    height: 0;
    display: inline-block;
    vertical-align: middle;
    border-width: 10px;
    border-style: dashed;
    border-color: transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 6px;
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 6px;
    border-top-color: var(--brand_blue);
    border-top-style: solid;
    border-right-color: var(--brand_blue);
    border-right-style: solid;
    overflow: hidden;
  }
  .layui-checkbox-disabled>.lay-check-dot:after,
  .layui-radio-disabled>.lay-check-dot:after {
    border-top-color: #d2d2d2;
    border-right-color: #d2d2d2;
  }
  /* 閫変腑 dot-2 */
  .layui-form-checked>.lay-check-dot-2:before,
  .layui-form-radioed>.lay-check-dot-2:before {
    position: absolute;
    font-family: "layui-icon";
    content: "\e605";
    color: #fff;
    bottom: 4px;
    right: 3px;
    font-size: 9px;
    z-index: 12;
  }
  .layui-form-checked>.lay-check-dot-2:after,
  .layui-form-radioed>.lay-check-dot-2:after {
    position: absolute;
    content: "";
    bottom: 2px;
    right: 2px;
    width: 0;
    height: 0;
    display: inline-block;
    vertical-align: middle;
    border-width: 10px;
    border-style: dashed;
    border-color: transparent;
    border-top-left-radius: 6px;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 6px;
    border-bottom-left-radius: 0px;
    border-right-color: var(--brand_blue);
    border-right-style: solid;
    border-bottom-color: var(--brand_blue);
    border-bottom-style: solid;
    overflow: hidden;
  }
  .layui-checkbox-disabled>.lay-check-dot-2:before,
  .layui-radio-disabled>.lay-check-dot-2:before {
    color: #eee !important;
  }
  .layui-checkbox-disabled>.lay-check-dot-2:after,
  .layui-radio-disabled>.lay-check-dot-2:after {
    border-bottom-color: #d2d2d2;
    border-right-color: #d2d2d2;
  }
  .lay-ellipsis-multi-line {
    overflow: hidden;
    word-break: break-all;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
  }

  .layui-form-radio>.lay-skin-tag,
  .layui-form-checkbox>.lay-skin-tag {
    font-size: 13px;
    border-radius: 100px;
  }
  .layui-form-checked>.lay-skin-tag,
  .layui-form-radioed>.lay-skin-tag {
    color: #fff !important;
    background-color: var(--brand_blue) !important;
  }

  /* 涓讳綋 */
  .layui-form-radio>.lay-skin-color-picker {
    border-radius: 50%;
    border-width: 1px;
    border-style: solid;
    width: 20px;
    height: 20px;
  }
  /* 閫変腑 */
  .layui-form-radioed>.lay-skin-color-picker {
    box-shadow: 0 0 0 1px #ffffff, 0 0 0 4px currentColor;
  }
</style>
<body class="server_list_page_body" style="display: none;">

<div class="layui-tab layui-tab-brief server-list-tab" lay-filter="top-tab">
  <ul class="layui-tab-title">

    <li page="server_sort">鍖烘湇</li>
    <li page="server_list">鑺傜偣</li>
  </ul>
</div>


<div class="list_box">
    
    <p class="title"><gamename>娓告垙鍚嶇О......... </gamename></p>
    
    
    
    
    
    <div class="layui-form" lay-filter="form-demo-skin">


    
    
    <div class="all_server">
        
        <i class="layui-icon layui-icon-loading-1 layui-anim layui-anim-rotate layui-anim-loop serverload"></i>
        <!--
        <button type="button" class="layui-btn layui-btn-normal">涓浗棣欐腐</button>
        <button type="button" class="layui-btn layui-btn-normal">涓浗鍙版咕</button>
        <button type="button" class="layui-btn layui-btn-normal">缇庡浗</button>
        <button type="button" class="layui-btn layui-btn-normal">鏃ユ湰</button>
        <button type="button" class="layui-btn layui-btn-normal">涓浗棣欐腐</button>
        <button type="button" class="layui-btn layui-btn-normal">涓浗鍙版咕</button>
        <button type="button" class="layui-btn layui-btn-normal">缇庡浗</button>
        
        <button type="button" class="layui-btn layui-btn-normal"><p>鏃ユ棩鏈棩鏈棩鏈棩鏈棩鏈棩鏈湰</p></button>
        <button type="button" class="layui-btn layui-btn-normal"><p>鏃ユ棩鏈棩鏈棩鏈棩鏈棩鏈棩鏈湰</p></button>
        <button type="button" class="layui-btn layui-btn-normal"><p>鏃ユ湰</p></button>
        -->
    </div>
    <div class="server_list">
        
        <div class="layui-row layui-col-space8" style="width: 430px;position: fixed;top: 69px;transform: scale(0.63);left: 380px;">
          <div class="layui-col-xs3">
            <input type="radio" name="radio1" value="chrome" lay-skin="none" checked>
            <div lay-radio class="lay-skin-checkcard lay-check-dot-2" style="height: 52px">
              <!--<div class="lay-skin-checkcard-avatar">-->
              <!--  <span class="layui-icon layui-icon-chrome" style="font-size: 30px"></span>-->
              <!--</div>-->
              <div class="lay-skin-checkcard-detail">
                <div class="lay-skin-checkcard-header">杩涚▼妯″紡</div>
              </div>
            </div>
          </div>
          <div class="layui-col-xs3">
            <input type="radio" name="radio1" value="edge" lay-skin="none" disabled>
            <div lay-radio class="lay-skin-checkcard lay-check-dot-2" style="height: 52px">
              <!--<div class="lay-skin-checkcard-avatar">-->
              <!--  <i class="layui-icon layui-icon-edge" style="font-size: 30px"></i>-->
              <!--</div>-->
              <div class="lay-skin-checkcard-detail">
                <div class="lay-skin-checkcard-header">缃戝崱妯″紡</div>
              </div>
            </div>
          </div>
          <div class="layui-col-xs3">
            <input type="radio" name="radio11" value="firefox" lay-skin="none" disabled>
            <div lay-radio class="lay-skin-checkcard lay-check-dot-2" style="height: 52px">
              <!--<div class="lay-skin-checkcard-avatar">-->
              <!--  <i class="layui-icon layui-icon-firefox" style="font-size: 30px"></i>-->
              <!--</div>-->
              <div class="lay-skin-checkcard-detail">
                <div class="lay-skin-checkcard-header">娣峰悎妯″紡</div>
              </div>
            </div>
          </div>
        </div>
        
        
        <i class="layui-icon layui-icon-loading-1 layui-anim layui-anim-rotate layui-anim-loop serverload"></i>
        <div class="tablelist">
            <table class="layui-hide" id="ID-table-data"></table>
        </div>
    </div>
    
    
    
    <!--<button type="button" class="layui-btn layui-btn-normal layui-btn-lg  go_start"><p>绔嬪嵆鍔犻€?/p></button>-->
</div>
</div>

</body>
  
<!-- 璇峰嬁鍦ㄩ」鐩寮忕幆澧冧腑寮曠敤璇?layui.js 鍦板潃 -->
<script src="../../static/layui/layui.js"></script> 
<script src="../../static/js/jquery-3.7.1.min.js"></script>

<script src="../../static/js/intlTelInput.min.js"></script><!--鍥藉鎵嬫満鍙?->

<script>
    var gameid = getUrlParams().gameid; // 杩欓噷鍙互鏍规嵁瀹為檯鎯呭喌淇敼鑾峰彇椤甸潰ID鐨勬柟寮?    $(function() {
        $("body").show();
        $(".server_list .serverload").hide()
    })
    
    if(!getUrlParams().product){
        layer.msg('缂哄け浜у搧鍙傛暟,璇风櫥褰?鏋佺嫄鍚堜綔闂ㄦ埛 <br>妫€鏌?product 鏄惁閰嶇疆姝ｇ‘锛?);
    }
    
    
    $("gamename").html(getUrlParams().name);
    
    var server_delayData = []; // 鍒濆涓虹┖鏁扮粍
    var server_list_R = 0

    function getUrlParams() {
        var params = {};
        var queryString = window.location.search.substring(1);
        var regex = /([^&=]+)=([^&]*)/g;
        var match;
    
        while (match = regex.exec(queryString)) {
            params[decodeURIComponent(match[1])] = decodeURIComponent(match[2]);
        }
        return params;
    }
    

    
    // 鑾峰彇鏈嶅姟鍣ㄥ垪琛?    $.getJSON("/api/v2/?mode=server_sort&user_code="+getUrlParams().user_code+"&product=" + getUrlParams().product)
    .done(function(data) {
        // 璇锋眰鎴愬姛鏃剁殑澶勭悊閫昏緫
        console.log("鏈嶅姟鍣ㄥ湴鍖鸿姹傛垚鍔? , data);
        $("[page='server_sort']").trigger("click");
        $(".all_server").html("")
        $.each(data, function(i, field){
            $(".all_server").append(`
                
                <button type="button" class="layui-btn layui-btn-normal" id="server_sort_`+field.id+`" onclick="server_list('` + field.CountryCode + `');"><img src="../../static/img/Flag/`+field.Flag.toLowerCase()+`.png" class="Flag"><p>` +field.name +`</p></button>
                
            `);
        })
        // layer.close(loadIndex)
        
        // 鑷姩閫夋嫨鏈嶅姟鍣?        var server_sort_pageStates = localStorage.getItem('server_sort_' + gameid);
        if(server_sort_pageStates){
            console.log("涓婃閫夋嫨鐨勬湇鍔″櫒" , server_sort_pageStates);
            server_list(server_sort_pageStates)
        }
        
    })
    .fail(function(xhr, status, error) {
      // 璇锋眰澶辫触鏃剁殑澶勭悊閫昏緫
        localStorage.removeItem('server_sort_' + gameid);
        console.log("璇锋眰澶辫触" + error,status,xhr);
        layer.msg('鏁版嵁璇锋眰澶辫触 <br>杩斿洖鐮?' + xhr.status);
    });
    
    var serverlist_config = null ;
    let pingloop
    
    function server_list(sort) {
        $(".server_list .tablelist").hide()
        $(".server_list .serverload").show()
        serverlist_config = []; // 娓呯┖鍒楄〃
        server_delayData = [] // 娓呯┖娴嬭瘯鍘嗗彶寤惰繜
        server_list_layui()// 娓叉煋鍒楄〃
        $("[page='server_list']").trigger("click");
        
        $.getJSON("/api/v2/?mode=server_list&user_code="+getUrlParams().user_code+"&product=" + getUrlParams().product + "&CountryCode=" + sort)
        .done(function(data) {
            // 璇锋眰鎴愬姛鏃剁殑澶勭悊閫昏緫
            serverlist_config = data
            // console.log("鏈嶅姟鍣ㄥ垪琛ㄨ姹傛垚鍔? , serverlist_config);
            if(!serverlist_config){
                $("[page='server_sort']").trigger("click");
                layer.msg('褰撳墠鍦板尯鏈嶅姟鍣ㄨ幏鍙栧け璐?);
            }
            
            localStorage.setItem('server_sort_' + gameid, sort);
            
            
            // 淇敼鎵€鏈夊璞＄殑name瀛楁
            serverlist_config.forEach(function(item) {
                item.name += "-" + item.id; // 灏唅d鍊兼坊鍔犲埌name瀛楁鍚庨潰
                item.ping = "<p class='server_ms'>娴嬮€熶腑</p>";
                item.netok= `<netok> <canvas id="networkDelayCanvas_`+item.test_ip+`"  width="162" height="32"></canvas> </netok>`;
                
                if(item.tag == "official"){
                    item.tag = `
                    <!-- 瀹樻柟鏈嶅姟鍣?-->
                    
                    <div title="瀹樻柟鏈嶅姟鍣?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16" style="color: rgb(0 255 102 / 75%);    margin-top: 6px;">
                          <path fill-rule="evenodd" d="M8 14.933a.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0   0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067v13.866zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c  .596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1  -2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                        </svg>
                    </div>
                    
                    `
                }
                
                if(item.tag == "community"){
                    item.tag = `
                    
                     <!-- 绀惧尯鏈嶅姟鍣?-->
                    
                    <div title="绀惧尯鏈嶅姟鍣?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16" style="color: #ffd600d4;    margin-top: 6px;">
                          <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm-.55 8.502L7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0zM8.002 12a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg>
                    </div>
                    
                    `
                }
                
            });
            server_list_R = 0
            $.each(data, function(i, field){
                server_list_R--
                // 绋€閲屽摋鍟﹀厛鎶婃暟鎹厛鐢╃粰鐖堕〉闈紝鐖堕〉闈㈢敥缁欏悗绔?                const pingdata = {
                      mode:"ping_server_list",
                      host: field.test_ip + ":" + field.test_port
                  };
                window.parent.postMessage(pingdata);
            })
            server_list_R = server_list_R
            
            server_list_layui()// 娓叉煋鍒楄〃
            
            try {
              window.clearInterval(loop_net_test)  // 鍘婚櫎瀹氭椂鍣?            } catch (error) {
              console.log("鍙兘娌″畾鏃跺櫒" ,error);
            }

            
            
            
            var test_list_speed = 0.5 // 娴嬭瘯閫熷害
            var loop_net_test = window.setInterval(function() {
            	$.each(data, function(i, field){
                    // 绋€閲屽摋鍟﹀厛鎶婃暟鎹厛鐢╃粰鐖堕〉闈紝鐖堕〉闈㈢敥缁欏悗绔?                    const pingdata = {
                          mode:"ping_server_list",
                          host: field.test_ip + ":" + field.test_port
                      };
                    window.parent.postMessage(pingdata);
                })
                console.log('娴嬭瘯寤惰繜鍒楄〃: 閫熷害' , test_list_speed);
            },1000 * test_list_speed)
            
            // 6绉掓病鍑烘暟鎹紝鐩存帴绠楄秴鏃?
            setTimeout(function() {
                if ($('.server_ms').text().trim() === "娴嬮€熶腑") {

                    $('.server_ms').text("鐘舵€佹湭鐭?);
                }
                console.log('寤惰繜鎺掑簭涓€閿ゅ畾闊?');
            }, 1000 * 6)
            
            // 闄嶉€熺户缁祴30绉?            setTimeout(function() {
                window.clearInterval(loop_net_test)  // 鍘婚櫎瀹氭椂鍣?                 console.log('鍋滄娴嬭瘯:');
            },1000 * 16)
            // servertestoklist = []
            // setTimeout(function() {
            //     const canvases = document.querySelectorAll('canvas');
    
            //         if (!canvases.length) {
            //             console.error('No canvas elements found');
            //             return;
            //         }
    
            //         const observer = new IntersectionObserver((entries) => {
            //             entries.forEach(entry => {
            //                 if (entry.isIntersecting) {
            //                     ip = entry.target.id.split("_")[1];
            //                     // console.log(`鏈嶅姟鍣ㄥ彲瑙乣 , ip);
            //                     servertestoklist.push(ip)
                                
            //                     // networkDelayCanvas_iptest(ip)
            //                 } else {
            //                     let index = servertestoklist.indexOf(ip); // 鎵惧埌鍊间负5鐨勭储寮?            //                     if (index !== -1) { // 纭繚鎵惧埌浜嗚鍒犻櫎鐨勫€?            //                         servertestoklist.splice(index, 1); // 鍒犻櫎鎵惧埌鐨勫€?            //                     }
            //                     // console.log(`鏈嶅姟鍣ㄤ笉鍙` , ip);
                                
                                
            //                 }
            //             });
            //             let servertestoklist_uniqueArr = servertestoklist.filter((value, index, self) => {
            //                 return self.indexOf(value) === index;
            //             });
                        
                        
            //             console.log(`妫€娴嬪垪琛╜ , servertestoklist);
                        
            //         }, {
            //             root: null, // Use the viewport as root
            //             threshold: 0 // Trigger callback as soon as any part of the target is visible
            //         });
    
            //         canvases.forEach(canvas => {
            //             observer.observe(canvas);
            //         });
                
            // }, 500)
            
        })
        .fail(function(xhr, status, error) {
          // 璇锋眰澶辫触鏃剁殑澶勭悊閫昏緫
            console.log("璇锋眰澶辫触" + error,status,xhr);
            layer.msg('鏁版嵁璇锋眰澶辫触 <br>杩斿洖鐮?' + xhr.status);
        });
    }
    
    
    window.addEventListener('message', function(event) {
        // console.log('浠庣埗椤甸潰鎺ユ敹鍒扮殑娑堟伅:', event.data);
        if(event.data.pingid == "ping_server_list"){
            // console.log('杩斿洖:', event.data);
            
            // 鎵惧埌鐩爣瀵硅薄骞舵彃鍏ユ暟鎹?            serverlist_config.forEach(function(item) {
                if (item.test_ip === event.data.res.host) {
                    if(event.data.res.time == "unknown"){
                        event.data.res.time = 9999
                    }
                    item.ping = event.data.res.time + " ms";
                    item.ping_initSort = event.data.res.time;
                }
            });
            
            
            // console.log('杩斿洖:', serverlist_config);
            // 绗竴娆℃祴璇曚篃鍐欒繘鍘?            updateDelayData(event.data.res.host, event.data.res.time);
            
            
            if(server_list_R < 0){
                // 鍒锋柊鍒楄〃
                server_list_layui()
                server_list_R++
                // console.log('鍒锋柊鍒楄〃娆℃暟:',server_list_R);
                $(".server_list .tablelist").hide()
                $(".server_list .serverload").show()
            }else{
                networkDelayCanvas_update(event.data.res.host) // 缁樺埗鏁版嵁
                setTimeout(() => {
                    $(".server_list .tablelist").show()
                    $(".server_list .serverload").hide()
                }, 1000 * .5);
                
            }
            
            
            
        }
        
    }, false);
    
    
    // 椤甸潰鍒囨崲
    $("[page='server_list']").on('click', function(event) {
        if(!serverlist_config){
            layer.msg('璇峰厛閫夋嫨鍖烘湇');
            setTimeout(() => { 
                $("[page='server_sort']").trigger("click");
            }, 1);
            return; 
        }
        $(".server_list").show()
        $(".all_server").hide()
    });
    // 椤甸潰鍒囨崲
    $("[page='server_sort']").on('click', function(event) {
        $(".all_server").show()
        $(".server_list").hide()
    });
    
    
    server_question_html = `
    
    <div title="杩欐槸浠€涔堟剰鎬濓紵">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16" style="color: #ffffff8a;padding: 0px;">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>

    </div>
    
    `
    
    function server_list_layui() {
            // 娓叉煋鏁版嵁
            layui.use('table', function(){
              var table = layui.table;
              
              // 宸茬煡鏁版嵁娓叉煋
              var inst = table.render({
                elem: '#ID-table-data',
                cols: [[ //鏍囬鏍?                  {field: 'name', title: '鑺傜偣', width: 300},
                  {field: 'tag', title: server_question_html, width: 100},
                  {field: 'netok', title: '缃戠粶璐ㄩ噺', width: 200},
                  {field: 'ping', title: '寤惰繜',sort: false},
                  
                ]],
                data: serverlist_config ,
                height: 310,
                width: 630,
                escape: false, // 涓嶅紑鍚?HTML 缂栫爜
                initSort: {
                  field: 'ping_initSort', // 鎸?寤惰繜 瀛楁鎺掑簭
                  type: 'asc' // 闄嶅簭鎺掑簭
                },
                
                //skin: 'line', // 琛ㄦ牸椋庢牸
                //even: true,
                // page: true, // 鏄惁鏄剧ず鍒嗛〉
                // limits: [5, 10, 15],
                // limit: 5 // 姣忛〉榛樿鏄剧ず鐨勬暟閲?              });
              
              
                table.on('row(ID-table-data)', function(obj){
                    var data = obj.data; // 鑾峰彇褰撳墠琛屾暟鎹?                    
                    // 鏄剧ず - 浠呯敤浜庢紨绀?                    layer.msg('褰撳墠琛屾暟鎹細<br>'+ JSON.stringify(data.id), {
                      offset: '65px'
                    });
                    // obj.setRowChecked({
                    //   type: 'radio' // radio 鍗曢€夋ā寮忥紱checkbox 澶嶉€夋ā寮?                    // });
                    const serverset = {
                      mode:"server_connect",
                      server_id: data.id,
                      gameid: gameid
                    };
                    window.parent.postMessage(serverset);
                    
                });
              
            });
            
            // 娓叉煋缁撴潫
    }
    
    function networkDelayCanvas_iptest(ip) {
        const pingdata1 = {
              mode:"ping_server_list_Canvas",
              host: ip
          };
        window.parent.postMessage(pingdata1);
        
    }
    
    
    function updateDelayData(ip, delay) {
        // 妫€鏌ユ槸鍚﹀瓨鍦ㄥ搴旂殑 IP 鍦板潃
        var existingEntry = server_delayData.find(function(entry) {
            return entry.ip === ip;
        });
    
        // 濡傛灉涓嶅瓨鍦紝鍒涘缓涓€涓柊鐨勫璞?        if (!existingEntry) {
            server_delayData.push({
                ip: ip,
                delays: [delay]
            });
        } else {
            // 濡傛灉瀛樺湪锛屾坊鍔犲欢杩熸暟鎹?            existingEntry.delays.push(delay);
        }
    }
    
    function getDelaysByIp(ip) {
        // 鏌ユ壘鍖归厤鐨?IP 鍦板潃
        var entry = server_delayData.find(function(entry) {
            return entry.ip === ip;
        });
    
        // 濡傛灉鎵惧埌鍖归厤鐨勬潯鐩紝鍒欒繑鍥炲欢杩熸暟缁勶紝鍚﹀垯杩斿洖 null
        return entry ? entry.delays : null;
    }
    function networkDelayCanvas_update(ip) {
        // networkDelayCanvas_
        // 鑾峰彇Canvas鍏冪礌
        var canvas = document.getElementById('networkDelayCanvas_' + ip);
        var ctx = canvas.getContext('2d');

        // 瀹氫箟涓€浜涘弬鏁?        var numBars = 16; // 绔栨潯鏁伴噺
        var barWidth = canvas.width / numBars; // 绔栨潯鐨勫搴?
        // 妯℃嫙寤惰繜鏁版嵁
        var delayValues =  getDelaysByIp(ip);
        // console.log('寤惰繜鏁版嵁:',delayValues);
        
        // for (var i = 0; i < 100; i++) {
        //     delayValues.push(Math.random() * 300); // 寤惰繜鍊煎湪0鍒?00涔嬮棿闅忔満鐢熸垚
        // }

        // 娓叉煋鍑芥暟
        function render() {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // 娓呯┖Canvas

            // 鍙粯鍒舵渶鏂扮殑50鏉℃暟鎹?            var startIdx = Math.max(0, delayValues.length - numBars);
            var endIdx = delayValues.length;

            // 缁樺埗绔栨潯
            for (var i = startIdx; i < endIdx; i++) {
                var delay = delayValues[i];
                var height = (delay / 350) * canvas.height; // 灏嗗欢杩熷€兼槧灏勫埌Canvas楂樺害
                var color = getColor(delay);
                ctx.fillStyle = color;
                ctx.fillRect((i - startIdx) * barWidth, canvas.height - height, barWidth, height);
            }
        }

        // 鑾峰彇棰滆壊
        function getColor(delay) {
            var ratio = delay / 350; // 寤惰繜鍊肩殑姣旂巼
            var r = Math.round(255 * ratio); // 绾㈣壊鍒嗛噺
            var g = Math.round(255 * (1 - ratio)); // 缁胯壊鍒嗛噺
            return 'rgb(' + r + ', ' + g + ', 0)';
        }

        // 鍒濆鍖栨覆鏌?        render();
        
    }
    
    
    // 鍏ㄥ眬榧犳爣妫€娴?    $("body").on('click', function(event) {
        //鐐瑰嚮寰幆娣诲姞鏈嶅姟鍣?        if(serverlist_config != null){
            serverlist_config.forEach(function(item) {
                // console.log('杩斿洖:', item);
                networkDelayCanvas_update(item.test_ip) // 缁樺埗鏁版嵁
            });
        }
        
    });
    

    
    // 绀轰緥鐢ㄦ硶
    // updateDelayData("192.168.1.1", 50);
    // updateDelayData("192.168.1.2", 70);
    // updateDelayData("192.168.1.1", 60);



    
    
</script>

</body>
</html>
