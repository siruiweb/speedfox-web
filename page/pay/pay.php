<?
$debug = time();// 棰勯槻js鍜宑ss缂撳瓨
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>鍏呭€?/title>
  <!-- 璇峰嬁鍦ㄩ」鐩寮忕幆澧冧腑寮曠敤璇?layui.css 鍦板潃 -->
  <link href="../../static/layui/css/layui.css" rel="stylesheet">
  <link href="../../static/css/color_map.css?V1.0" rel="stylesheet"><!-- 棰滆壊澶у叏 -->
  <link href="../../static/css/style.css?<?echo $debug;?>" rel="stylesheet">
</head>
<body class="pay_page_body" style="display: none;">


<div class="layui-form" lay-filter="form-demo-skin">
  <style>
  /*
   * 鍩轰簬澶嶉€夋鍜屽崟閫夋鐨勫崱鐗囬鏍煎閫夌粍浠?   * 闇€瑕佸叿澶囦竴浜涘熀纭€鐨?CSS 鎶€鑳斤紝浠ヤ笅鏍峰紡鍧囦负澶栭儴鑷富瀹炵幇銆?   */
   
   .pay_page_body{
           overflow: hidden;
   }
   
  /* 涓讳綋 */
  .layui-form-checkbox>.lay-skin-checkcard,
  .layui-form-radio>.lay-skin-checkcard {
    display: table;
    display: flex;
    padding: 12px;
    white-space: normal;
    border-radius: 10px;
    border: 1px solid #e5e5e5;
    color: #000;
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
    border-color: #1e9fff;
  }
  /* 閫変腑 */
  .layui-form-checked>.lay-skin-checkcard,
  .layui-form-radioed[lay-skin="none"]>.lay-skin-checkcard {
    color: #fff;
    border-color: #1e9fff;
    background-color: #1e9fff40 !important;
    /* box-shadow: 0 0 0 3px rgba(22, 183, 119, 0.08); */
  }
  /* 绂佺敤 */
  .layui-checkbox-disabled>.lay-skin-checkcard,
  .layui-radio-disabled>.lay-skin-checkcard {
    box-shadow: none;
    border-color: #e5e5e5 !important;
    background-color: #eee !important;
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
    font-size: 16px;
    white-space: nowrap;
    margin-bottom: 4px;
  }
  .lay-skin-checkcard-description {
    font-size: 13px;
    color: #fff;
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
    border-top-color: #1e9fff;
    border-top-style: solid;
    border-right-color: #1e9fff;
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
    border-right-color: #1e9fff;
    border-right-style: solid;
    border-bottom-color: #1e9fff;
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
</style>
<!-- 鏍囩椋庢牸 -->
<style>
  .layui-form-radio>.lay-skin-tag,
  .layui-form-checkbox>.lay-skin-tag {
    font-size: 13px;
    border-radius: 100px;
  }
  .layui-form-checked>.lay-skin-tag,
  .layui-form-radioed>.lay-skin-tag {
    color: #fff !important;
    background-color: #16b777 !important;
  }
</style>
<!-- 鍗曢€夋 Color Picker -->
<style>
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
  .title1{
    margin: 22px 32px 0px;
  }
  .layui-form-checkbox[lay-skin=none], .layui-form-radio[lay-skin=none] {
    position: relative;
    min-height: 20px;
    margin: 4px;
    padding: 0;
    height: auto;
    line-height: normal;
}
h1{
    font-size: 24px;
}

.layui-elem-quote {
    margin-bottom: 10px;
    padding: 15px;
    line-height: 1.8;
    border-left: 5px solid #1e9fff;
    border-radius: 0 2px 2px 0;
    background-color: #4343436b;
    position: absolute;
    width: 610px;
    left: 26px;
    bottom: 18px;
}

tip{
        background: red;
    position: absolute;
    padding: 2px 8px;
    border-radius: 37px;
    font-size: 10px;
    top: -8px;
    right: 12px;
    
}

paybox .radio {
    position: absolute;
    bottom: 215px;
    right: 170px;
}

paybox money{
    font-size: 26px;
    color: #38cbff;
}

paybox .money{
    position: absolute;
    bottom: 156px;
    right: 192px;
}

paybox time{
    font-size: 26px;
    color: #38cbff;
}

paybox .time{
    position: absolute;
    bottom: 194px;
    right: 192px;
}

paybox .qrcode{
    width: 128px;
    height: 128px;
    background: white;
    position: absolute;
    top: 178px;
    right: 28px;
    padding: 6px;
}

paybox .paylogo{
    width: 21px;
}


.layui-input, .layui-select, .layui-textarea {
    height: 38px;
    line-height: 1.3;
    line-height: 38px \9;
    border-width: 1px;
    border-style: solid;
    background-color: #434343;
    color: rgba(0, 0, 0, .85);
    border-radius: 2px;
    color: white;
}



</style>
 
  <h3 class="title1">璐拱鏃堕暱</h3>
  <div class="layui-row layui-col-space8">
    
    <div class="layui-row" style="margin: 12px 24px 0px;">
        
        
        <div class="layui-col-xs3">
          <input type="radio" name="radio1" value="chrome" lay-skin="none" checked>
          <div lay-radio class="lay-skin-checkcard lay-check-dot-2" style="height: 100px">
            <div class="lay-skin-checkcard-detail">
              <div class="lay-skin-checkcard-header">鏋佺嫄骞村崱</div>
              <div class="lay-skin-checkcard-description lay-ellipsis-multi-line">
                <h1>3鍏?鏈?/h1>
                <p>36鍏?/p>
                
                <tip>闄愯喘涓€娆?/tip>
                
                <p><br>锐野优商-------鍗犱綅瀛楃涓?/p>
              </div>
            </div>
          </div>
        </div>
        
        
        
        
        
        
        
        <div class="layui-col-xs3">
          <input type="radio" name="radio1" value="chrome" lay-skin="none">
          <div lay-radio class="lay-skin-checkcard lay-check-dot-2" style="height: 100px">
            <div class="lay-skin-checkcard-detail">
              <div class="lay-skin-checkcard-header">鏋佺嫄鍗婂勾鍗?/div>
              <div class="lay-skin-checkcard-description lay-ellipsis-multi-line">
                <h1>4.98鍏?鏈?/h1>
                <p>29.9鍏?/p>
                
                <tip>鍑犱箮鎴愭湰</tip>
                
                <p><br>锐野优商-------鍗犱綅瀛楃涓?/p>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="layui-col-xs3">
          <input type="radio" name="radio1" value="chrome" lay-skin="none">
          <div lay-radio class="lay-skin-checkcard lay-check-dot-2" style="height: 100px">
            <div class="lay-skin-checkcard-detail">
              <div class="lay-skin-checkcard-header">鏋佺嫄瀛ｅ崱</div>
              <div class="lay-skin-checkcard-description lay-ellipsis-multi-line">
                <h1>6.63鍏?鏈?/h1>
                <p>19.9鍏?/p>
                
                
                <tip>鎶涘幓鎴愭湰杩樿</tip>
                <p><br>锐野优商-------鍗犱綅瀛楃涓?/p>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="layui-col-xs3">
          <input type="radio" name="radio1" value="chrome" lay-skin="none">
          <div lay-radio class="lay-skin-checkcard lay-check-dot-2" style="height: 100px">
            <div class="lay-skin-checkcard-detail">
              <div class="lay-skin-checkcard-header">鏋佺嫄鏈堝崱</div>
              <div class="lay-skin-checkcard-description lay-ellipsis-multi-line">
                <!-- 浠嬬粛寮€濮?-->
                
                <h1>9.9鍏?鏈?/h1>
                <p>9.9鍏?/p>
                
                <tip>灏忚禋</tip>
                <!-- 浠嬬粛缁撴潫 -->
                <p><br>锐野优商-------鍗犱綅瀛楃涓?/p>
              </div>
            </div>
          </div>
        </div>
        
        
        
        
        
        <paybox>
            <!--<div class="radio">-->
            <!--  <input type="radio" name="AAA" value="1" title="浣跨敤浼樻儬浠锋敮浠? checked>-->
            <!--  <input type="radio" name="AAA" value="2" title="鏀寔鏋佺嫄鍘熶环鏀粯"> -->
            <!--</div>-->
            <div class="layui-col-xs3" style="
    position: absolute;
    right: 199px;
    top: 188px;
">
                <div class="layui-form-item" style="margin-bottom: 0;">
                  <!--<label class="layui-form-label">浼樻儬鍒?:</label>-->
                     <select>
                      <!--<option value="">璇烽€夋嫨</option>-->
                      <!--<option value="AAA">閫夐」 A</option>-->
                      <!--<option value="BBB">閫夐」 B</option>-->
                      <option value="CCC" selected>淇濇湰鍗锋鍚岃浼樻儬鍒?/option>
                    </select>
                </div>
            </div>
            
            <h2 class="time">
                濂楅鏈夋晥鏈?<time>366</time> 澶?            </h2>
            
            
            <h2 class="money">
                <img src="../../static/img/alipay.png" class="paylogo">
                <img src="../../static/img/wechatpay.png" class="paylogo">
                鎵爜鏀粯 <money>36</money> 鍏?            </h2>
            
            
            <div class="qrcode"></div>
            
        <paybox>
        
        
    </div>
    <blockquote class="layui-elem-quote">濡傛灉鎮ㄥ彲浠ヨ鐪嬪箍鍛婏紝鎮ㄥ彲浠ヤ緷鏃ч€氳繃骞垮憡鐪嬪箍鍛婃柟寮忚幏鍙栨椂闀匡紝鎴戜滑涔熸帹鑽愭偍瑙傜湅骞垮憡鑾峰彇鏃堕暱锛屽鏋滄偍鐪熺殑涓嶈兘瑙傜湅骞垮憡锛屾湅鍙嬩篃鏃犳硶甯姪鎮ㄧ殑鍚屾椂锛屾偍鍙互鑰冭檻鏀寔涓€涓嬫垜浠紝杩欎釜浠锋牸鍩烘湰涓婃槸鎴愭湰浠凤紝绠椾笂鐢佃垂鍟ョ殑鏈€渚垮疁鐨勪竴妗ｉ暱鏈熺敤娌″噯杩樹簭浜?/blockquote>



  </div>


</div>
  



  
<!-- 璇峰嬁鍦ㄩ」鐩寮忕幆澧冧腑寮曠敤璇?layui.js 鍦板潃 -->
<script src="../../static/layui/layui.js"></script> 
<script src="../../static/js/jquery-3.7.1.min.js"></script>

<script src="../../static/js/jquery.qrcode.min.js"></script><!-- 浜岀淮鐮?-->

<script>
    $(function() {
        $("body").show();
        //鐢熸垚100*100(瀹藉害100锛岄珮搴?00)鐨勪簩缁寸爜
        $('.qrcode').qrcode({
            render: "canvas", //涔熷彲浠ユ浛鎹负table
            width: 128,
            height: 128,
            text: "https://www.bilibili.com/video/BV1GJ411x7h7/?"
        });
    })
</script>

</body>
</html>

