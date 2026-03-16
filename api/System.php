<?php
/**
 * 锐野优商加速器 - 系统函数库
 * 提供数据库连接和业务函数
 */

// 数据库配置 - 需要修改
$db_config = array(
    'host' => 'localhost',
    'username' => 'ruiyeadmin',
    'password' => 'bkTm452WyBsHin1H',
    'database' => 'ruiyeadmin'
);

// 建立数据库连接
$conn = mysqli_connect(
    $db_config['host'], 
    $db_config['username'], 
    $db_config['password'], 
    $db_config['database']
);

// 设置字符集
if ($conn) {
    mysqli_set_charset($conn, 'utf8mb4');
}

// 获取表前缀
function getFaTable($name) {
    return "fa_ruyi_" . $name;
}

// 获取OEM配置
function get_oem_config($type = "default") {
    global $conn;
    if (!$conn) { return null; }
    
    $result = mysqli_query($conn, "SELECT * FROM " . getFaTable("oem") . " LIMIT 1");
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

// 获取服务器列表
function get_server_list($type = 'all') {
    global $conn;
    if (!$conn) { return array(); }
    
    $sql = "SELECT * FROM " . getFaTable("server") . " WHERE status = 1";
    $sql .= " ORDER BY sort ASC";
    
    $result = mysqli_query($conn, $sql);
    $servers = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $servers[] = $row;
        }
    }
    return $servers;
}

// 获取游戏列表
function get_game_list() {
    global $conn;
    if (!$conn) { return array(); }
    
    $query = "SELECT * FROM " . getFaTable("game") . " WHERE status = 1 ORDER BY sort ASC";
    $result = mysqli_query($conn, $query);
    $games = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $games[] = $row;
        }
    }
    return $games;
}

// 获取套餐列表
function get_packages() {
    global $conn;
    if (!$conn) { return array(); }
    
    $query = "SELECT * FROM " . getFaTable("package") . " WHERE status = 1 ORDER BY sort ASC";
    $result = mysqli_query($conn, $query);
    $packages = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $packages[] = $row;
        }
    }
    return $packages;
}

// 获取统计信息
function get_statistics() {
    global $conn;
    if (!$conn) {
        return array('total_users' => 0, 'total_servers' => 0, 'total_games' => 0, 'total_traffic' => 0);
    }
    
    $stats = array();
    
    $result = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM " . getFaTable("member"));
    $stats['total_users'] = $result ? mysqli_fetch_assoc($result)['cnt'] : 0;
    
    $result = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM " . getFaTable("server") . " WHERE status = 1");
    $stats['total_servers'] = $result ? mysqli_fetch_assoc($result)['cnt'] : 0;
    
    $result = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM " . getFaTable("game") . " WHERE status = 1");
    $stats['total_games'] = $result ? mysqli_fetch_assoc($result)['cnt'] : 0;
    
    $stats['total_traffic'] = 0;
    
    return $stats;
}

// 用户登录验证
function verify_user($username, $password) {
    global $conn;
    if (!$conn || !$username || !$password) { return false; }
    
    $username = mysqli_real_escape_string($conn, $username);
    $password = md5($password);
    
    $query = "SELECT * FROM " . getFaTable("member") . " WHERE username = '" . $username . "' AND password = '" . $password . "' LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

// 获取用户信息
function get_user_info($user_id) {
    global $conn;
    if (!$conn || !$user_id) { return null; }
    
    $user_id = intval($user_id);
    $query = "SELECT * FROM " . getFaTable("member") . " WHERE id = " . $user_id;
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

// API响应封装
function api_response($code, $msg, $data = array()) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array('code' => $code, 'msg' => $msg, 'data' => $data), JSON_UNESCAPED_UNICODE);
    exit;
}
?>
