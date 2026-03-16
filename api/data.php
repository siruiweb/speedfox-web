<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
mysqli_set_charset($conn, "utf8");

function result($code, $msg, $data = null) {
    global $conn;
    if ($conn) mysqli_close($conn);
    echo json_encode(array("code" => $code, "msg" => $msg, "data" => $data), JSON_UNESCAPED_UNICODE);
    exit;
}

$action = $_GET["action"] ?? "";

if ($action == "server_list") {
    $result = mysqli_query($conn, "SELECT * FROM fa_ruyi_server WHERE status = 1 ORDER BY sort ASC");
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    result(200, "success", $data);
}

if ($action == "game_list") {
    $result = mysqli_query($conn, "SELECT * FROM fa_ruyi_game WHERE status = 1 ORDER BY sort ASC");
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    result(200, "success", $data);
}

if ($action == "package_list") {
    $result = mysqli_query($conn, "SELECT * FROM fa_ruyi_package WHERE status = 1 ORDER BY sort ASC");
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    result(200, "success", $data);
}

if ($action == "user_info") {
    // 从header获取token
    $token = $_SERVER["HTTP_TOKEN"] ?? "";
    
    if (empty($token)) {
        result(401, "未登录");
    }
    
    // 验证token并获取用户信息
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id, username, mobile, email, avatar, createtime, logintime FROM fa_user WHERE token = '$token' LIMIT 1"));
    
    if (!$row) {
        result(401, "Token无效");
    }
    
    // 查询用户套餐
    $package = mysqli_fetch_assoc(mysqli_query($conn, "SELECT p.name, up.expire_time FROM fa_ruyi_user_package up LEFT JOIN fa_ruyi_package p ON up.package_id = p.id WHERE up.user_id = " . $row['id'] . " AND up.expire_time > " . time() . " ORDER BY up.expire_time DESC LIMIT 1"));
    
    $userData = array(
        "id" => $row["id"],
        "username" => $row["username"],
        "mobile" => $row["mobile"],
        "email" => $row["email"],
        "avatar" => $row["avatar"],
        "create_time" => $row["createtime"],
        "login_time" => $row["logintime"],
        "vip" => $package ? true : false,
        "package_name" => $package["name"] ?? "",
        "expire_time" => $package["expire_time"] ?? 0
    );
    
    result(200, "success", $userData);
}

result(400, "unknown action");
?>
