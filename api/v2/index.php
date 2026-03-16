<?php
/**
 * 客户端API统一入口
 * 路径: /api/v2/?mode=xxx
 */

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Token");

// 预检请求处理
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

$mode = $_GET['mode'] ?? '';
$product = $_GET['product'] ?? '';

// 数据库连接
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
mysqli_set_charset($conn, "utf8mb4");

function result($code, $msg, $data = null) {
    global $conn;
    if ($conn) mysqli_close($conn);
    echo json_encode(array("code" => $code, "msg" => $msg, "data" => $data), JSON_UNESCAPED_UNICODE);
    exit;
}

function getFaTable($name) {
    return "fa_ruyi_" . $name;
}

// ==================== get_oem ====================
if ($mode == "get_oem") {
    $oem_id = 1;
    $result = mysqli_query($conn, "SELECT * FROM " . getFaTable("oem") . " WHERE id = $oem_id");
    $oem = mysqli_fetch_assoc($result);
    
    if (!$oem) {
        $data = array(
            "id" => 1,
            "name" => "锐野优商加速器",
            "title" => "锐野优商加速器",
            "logo" => "/static/img/speed_logo.png",
            "version" => "1.0.0",
            "up_version" => "1.0.0",
            "up_url" => "",
            "up_content" => ""
        );
    } else {
        $data = $oem;
    }
    
    result(200, "success", $data);
}

// ==================== game_list ====================
if ($mode == "game_list") {
    $result = mysqli_query($conn, "SELECT * FROM " . getFaTable("game") . " WHERE status = 1 ORDER BY sort ASC");
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    result(200, "success", $data);
}

// ==================== server_list ====================
if ($mode == "server_list") {
    $CountryCode = $_GET['CountryCode'] ?? '';
    
    $sql = "SELECT * FROM " . getFaTable("server") . " WHERE status = 1";
    if ($CountryCode) {
        $CountryCode = mysqli_real_escape_string($conn, $CountryCode);
        $sql .= " AND country_code = '" . $CountryCode . "'";
    }
    $sql .= " ORDER BY sort ASC";
    
    $result = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    result(200, "success", $data);
}

// ==================== server_info ====================
if ($mode == "server_info") {
    $sid = intval($_GET['sid'] ?? 0);
    
    if (!$sid) {
        result(400, "缺少服务器ID");
    }
    
    $result = mysqli_query($conn, "SELECT * FROM " . getFaTable("server") . " WHERE id = $sid AND status = 1");
    $server = mysqli_fetch_assoc($result);
    
    if (!$server) {
        result(404, "服务器不存在");
    }
    
    result(200, "success", $server);
}

// ==================== server_sort ====================
if ($mode == "server_sort") {
    $result = mysqli_query($conn, "SELECT DISTINCT country_code, country_name FROM " . getFaTable("server") . " WHERE status = 1 ORDER BY sort ASC");
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    result(200, "success", $data);
}

// ==================== user_info ====================
if ($mode == "user_info") {
    $user_code = $_GET['user_code'] ?? '';
    $token = $_SERVER['HTTP_TOKEN'] ?? '';
    
    if (!$token && !$user_code) {
        result(401, "未登录");
    }
    
    if ($token) {
        $token = mysqli_real_escape_string($conn, $token);
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM " . getFaTable("member") . " WHERE token = '" . $token . "' LIMIT 1"));
    }
    
    if (!$row && $user_code) {
        $user_code = mysqli_real_escape_string($conn, $user_code);
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM " . getFaTable("member") . " WHERE user_code = '" . $user_code . "' LIMIT 1"));
    }
    
    if (!$row) {
        result(401, "用户不存在");
    }
    
    $user_id = $row['id'];
    $package = mysqli_fetch_assoc(mysqli_query($conn, "SELECT p.name, up.expire_time FROM " . getFaTable("user_package") . " up LEFT JOIN " . getFaTable("package") . " p ON up.package_id = p.id WHERE up.user_id = " . $user_id . " AND up.expire_time > " . time() . " ORDER BY up.expire_time DESC LIMIT 1"));
    
    $userData = array(
        "id" => $row["id"],
        "username" => $row["username"],
        "mobile" => $row["mobile"] ?? "",
        "email" => $row["email"] ?? "",
        "avatar" => $row["avatar"] ?? "",
        "create_time" => $row["createtime"] ?? time(),
        "login_time" => $row["logintime"] ?? time(),
        "vip" => $package ? true : false,
        "package_name" => $package["name"] ?? "",
        "expire_time" => $package["expire_time"] ?? 0
    );
    
    result(200, "success", $userData);
}

// ==================== game_config ====================
if ($mode == "game_config") {
    $game_id = intval($_GET['id'] ?? 0);
    
    if (!$game_id) {
        result(400, "缺少游戏ID");
    }
    
    $result = mysqli_query($conn, "SELECT * FROM " . getFaTable("game") . " WHERE id = " . $game_id);
    $game = mysqli_fetch_assoc($result);
    
    if (!$game) {
        result(404, "游戏不存在");
    }
    
    result(200, "success", $game);
}

// ==================== package_list ====================
if ($mode == "package_list") {
    $result = mysqli_query($conn, "SELECT * FROM " . getFaTable("package") . " WHERE status = 1 ORDER BY sort ASC");
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    result(200, "success", $data);
}

// ==================== server_user_info_update ====================
if ($mode == "server_user_info_update") {
    $user_code = $_GET['user_code'] ?? '';
    $speed_id = $_GET['speed_id'] ?? '';
    $server = intval($_GET['server'] ?? 0);
    $game = intval($_GET['game'] ?? 0);
    $speed = $_GET['speed'] ?? 0;
    $flow = $_GET['flow'] ?? 0;
    $ping = $_GET['ping'] ?? 0;
    
    if (!$user_code) {
        result(400, "缺少用户标识");
    }
    
    $user_code = mysqli_real_escape_string($conn, $user_code);
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM " . getFaTable("member") . " WHERE user_code = '" . $user_code . "' LIMIT 1"));
    
    if (!$user) {
        result(404, "用户不存在");
    }
    
    $user_id = $user['id'];
    $time = time();
    
    $sql = "INSERT INTO " . getFaTable("speed_record") . " (user_id, server_id, game_id, speed_id, speed, flow, ping, create_time) 
            VALUES (" . $user_id . ", " . $server . ", " . $game . ", '" . mysqli_real_escape_string($conn, $speed_id) . "', " . $speed . ", " . $flow . ", " . $ping . ", " . $time . ")";
    
    if (mysqli_query($conn, $sql)) {
        result(200, "success", array("id" => mysqli_insert_id($conn)));
    } else {
        result(500, "记录失败");
    }
}

// ==================== 未知接口 ====================
result(400, "unknown action: " . $mode);
?>
