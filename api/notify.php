<?php
/**
 * 支付异步通知处理
 */

$pid = "1036";
$key = "8v8VNVv98cpHSZ43DnC83z38hJnsj1RP";

function log_msg($msg) {
    file_put_contents("/www/wwwroot/ruiye/api/pay_log.txt", date("Y-m-d H:i:s") . " " . $msg . "\n", FILE_APPEND);
}

log_msg("收到通知: " . json_encode($_POST));

// 验证签名
$sign = $_POST["sign"] ?? "";
$trade_no = $_POST["trade_no"] ?? "";
$out_trade_no = $_POST["out_trade_no"] ?? "";
$trade_status = $_POST["trade_status"] ?? "";

if ($trade_status != "TRADE_SUCCESS") {
    log_msg("支付状态非成功");
    echo "fail";
    exit;
}

// 验证签名
unset($_POST["sign"]);
unset($_POST["sign_type"]);
$_POST["key"] = $key;
ksort($_POST);
$sign_str = "";
foreach ($_POST as $k => $v) {
    if ($k != "sign" && $k != "sign_type" && $v != "") {
        $sign_str .= $k . "=" . $v . "&";
    }
}
$sign_str .= "key=" . $key;
$verify_sign = md5($sign_str);

if ($sign != $verify_sign) {
    log_msg("签名验证失败");
    echo "fail";
    exit;
}

// 更新订单状态
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
mysqli_set_charset($conn, "utf8mb4");

// 查询订单
$order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fa_ruyi_order WHERE out_trade_no = '$out_trade_no'"));

if ($order && $order["status"] == 0) {
    // 更新订单为已支付
    mysqli_query($conn, "UPDATE fa_ruyi_order SET status = 1, pay_time = " . time() . ", trade_no = '$trade_no' WHERE out_trade_no = '$out_trade_no'");
    
    // 获取套餐天数，给用户添加套餐
    $package = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fa_ruyi_package WHERE id = " . $order["package_id"]));
    
    if ($package) {
        $days = intval($package["days"]);
        $expire_time = time() + $days * 86400;
        
        // 检查用户是否已有套餐
        $user_package = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fa_ruyi_user_package WHERE user_id = " . $order["user_id"] . " AND expire_time > " . time()));
        
        if ($user_package) {
            // 续期
            $new_expire = $user_package["expire_time"] + $days * 86400;
            mysqli_query($conn, "UPDATE fa_ruyi_user_package SET expire_time = $new_expire WHERE id = " . $user_package["id"]);
        } else {
            // 新增
            mysqli_query($conn, "INSERT INTO fa_ruyi_user_package (user_id, package_id, expire_time, create_time) VALUES (" . $order["user_id"] . ", " . $order["package_id"] . ", $expire_time, " . time() . ")");
        }
    }
    
    log_msg("订单更新成功: " . $out_trade_no);
}

mysqli_close($conn);

echo "success";
?>
