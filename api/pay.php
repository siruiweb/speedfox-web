<?php
/**
 * 支付接口
 * 商户ID: 1036
 * 密钥: 8v8VNVv98cpHSZ43DnC83z38hJnsj1RP
 */

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

$action = $_GET["action"] ?? "";

// 支付配置
$pid = "1036";
$key = "8v8VNVv98cpHSZ43DnC83z38hJnsj1RP";
$pay_url = "https://xx2.er3w.com/submit.php";

function result($code, $msg, $data = null) {
    echo json_encode(array("code" => $code, "msg" => $msg, "data" => $data), JSON_UNESCAPED_UNICODE);
    exit;
}

function make_sign($data, $key) {
    ksort($data);
    $sign_str = "";
    foreach ($data as $k => $v) {
        if ($k != "sign" && $k != "sign_type" && $v != "") {
            $sign_str .= $k . "=" . $v . "&";
        }
    }
    $sign_str .= "key=" . $key;
    return md5($sign_str);
}

// 创建支付订单
if ($action == "create_order") {
    $package_id = $_POST["package_id"] ?? 0;
    $user_id = $_COOKIE["uid"] ?? 0;
    
    if (!$user_id) {
        result(401, "请先登录");
    }
    if (!$package_id) {
        result(400, "请选择套餐");
    }
    
    // 连接数据库获取套餐信息
    $conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
    mysqli_set_charset($conn, "utf8mb4");
    
    // 获取套餐信息
    $package = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fa_ruyi_package WHERE id = $package_id"));
    if (!$package) {
        result(400, "套餐不存在");
    }
    
    // 生成订单号
    $out_trade_no = "RUYI" . date("YmdHis") . rand(1000, 9999);
    
    // 创建订单
    $user_id = intval($user_id);
    $price = floatval($package["price"]);
    $name = $package["name"];
    
    mysqli_query($conn, "INSERT INTO fa_ruyi_order (user_id, package_id, out_trade_no, money, status, create_time) 
        VALUES ($user_id, $package_id, '$out_trade_no', $price, 0, " . time() . ")");
    
    $order_id = mysqli_insert_id($conn);
    
    // 准备支付参数
    $pay_data = array(
        "pid" => $pid,
        "type" => "alipay",
        "out_trade_no" => $out_trade_no,
        "notify_url" => "http://global.ruiye.top/api/notify.php",
        "return_url" => "http://global.ruiye.top/pay.php?action=return",
        "name" => $name . "-VIP会员",
        "money" => $price,
        "param" => $order_id
    );
    
    // 生成签名
    $pay_data["sign"] = make_sign($pay_data, $key);
    $pay_data["sign_type"] = "MD5";
    
    mysqli_close($conn);
    
    // 返回支付表单
    $html = '<form id="pay_form" action="' . $pay_url . '" method="post">';
    foreach ($pay_data as $k => $v) {
        $html .= '<input type="hidden" name="' . $k . '" value="' . $v . '">';
    }
    $html .= '</form><script>document.getElementById("pay_form").submit();</script>';
    
    result(200, "success", array("html" => $html, "out_trade_no" => $out_trade_no));
}

// 查询订单状态
if ($action == "query_order") {
    $out_trade_no = $_GET["out_trade_no"] ?? "";
    
    if (!$out_trade_no) {
        result(400, "订单号不能为空");
    }
    
    $conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
    mysqli_set_charset($conn, "utf8mb4");
    
    $order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fa_ruyi_order WHERE out_trade_no = '$out_trade_no'"));
    mysqli_close($conn);
    
    if ($order) {
        result(200, "success", $order);
    } else {
        result(404, "订单不存在");
    }
}

result(400, "unknown action");
?>
