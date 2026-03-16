<?php
/**
 * SpeedFox 核心系统文件
 * 提供数据库连接和基础配置
 */

// 数据库配置 - 需要根据实际情况修改
$db_config = array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'speedfox'
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

// 获取OEM配置
function get_oem_config($conn, $product_name) {
    if (!$conn || !$product_name) {
        return null;
    }
    $product = mysqli_real_escape_string($conn, $product_name);
    $query = "SELECT * FROM oem WHERE name = ''";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

// 获取服务器列表
function get_server_list($conn, $type = 'all') {
    if (!$conn) { return array(); }
    $query = "SELECT * FROM server_list WHERE status = 1";
    if ($type !== 'all') {
        $type = mysqli_real_escape_string($conn, $type);
        $query .= " AND type = ''";
    }
    $query .= " ORDER BY sort_order ASC, id DESC";
    $result = mysqli_query($conn, $query);
    $servers = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $servers[] = $row;
        }
    }
    return $servers;
}

// 获取游戏列表
function get_game_list($conn) {
    if (!$conn) { return array(); }
    $query = "SELECT * FROM games WHERE status = 1 ORDER BY sort_order ASC";
    $result = mysqli_query($conn, $query);
    $games = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $games[] = $row;
        }
    }
    return $games;
}

// 用户登录验证
function verify_user($conn, $username, $password) {
    if (!$conn || !$username || !$password) { return false; }
    $username = mysqli_real_escape_string($conn, $username);
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username = '' AND password = ''";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

// 创建用户
function create_user($conn, $username, $password, $email = '') {
    if (!$conn || !$username || !$password) { return false; }
    $username = mysqli_real_escape_string($conn, $username);
    $password = md5($password);
    $email = mysqli_real_escape_string($conn, $email);
    $create_time = time();
    $query = "INSERT INTO users (username, password, email, create_time) VALUES ('', '', '', $create_time)";
    return mysqli_query($conn, $query);
}

// 获取用户信息
function get_user_info($conn, $user_id) {
    if (!$conn || !$user_id) { return null; }
    $user_id = intval($user_id);
    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

// 更新用户余额
function update_user_balance($conn, $user_id, $amount) {
    if (!$conn || !$user_id) { return false; }
    $user_id = intval($user_id);
    $amount = floatval($amount);
    $query = "UPDATE users SET balance = balance + $amount WHERE id = $user_id";
    return mysqli_query($conn, $query);
}

// 记录订单
function create_order($conn, $user_id, $amount, $pay_type, $order_no) {
    if (!$conn || !$user_id || !$amount) { return false; }
    $user_id = intval($user_id);
    $amount = floatval($amount);
    $pay_type = mysqli_real_escape_string($conn, $pay_type);
    $order_no = mysqli_real_escape_string($conn, $order_no);
    $create_time = time();
    $query = "INSERT INTO orders (user_id, amount, pay_type, order_no, status, create_time) 
               VALUES ($user_id, $amount, '', '', 0, $create_time)";
    return mysqli_query($conn, $query);
}

// 更新订单状态
function update_order_status($conn, $order_no, $status) {
    if (!$conn || !$order_no) { return false; }
    $order_no = mysqli_real_escape_string($conn, $order_no);
    $status = intval($status);
    $pay_time = time();
    $query = "UPDATE orders SET status = $status, pay_time = $pay_time WHERE order_no = ''";
    return mysqli_query($conn, $query);
}

// 获取统计数据
function get_statistics($conn) {
    if (!$conn) {
        return array('total_users' => 0, 'total_orders' => 0, 'total_revenue' => 0, 'total_servers' => 0);
    }
    $stats = array();
    $result = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM users");
    $stats['total_users'] = $result ? mysqli_fetch_assoc($result)['cnt'] : 0;
    $result = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM orders WHERE status = 1");
    $stats['total_orders'] = $result ? mysqli_fetch_assoc($result)['cnt'] : 0;
    $result = mysqli_query($conn, "SELECT SUM(amount) as total FROM orders WHERE status = 1");
    $stats['total_revenue'] = $result ? floatval(mysqli_fetch_assoc($result)['total']) : 0;
    $result = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM server_list WHERE status = 1");
    $stats['total_servers'] = $result ? mysqli_fetch_assoc($result)['cnt'] : 0;
    return $stats;
}

// API响应封装
function api_response($code, $msg, $data = array()) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array('code' => $code, 'msg' => $msg, 'data' => $data), JSON_UNESCAPED_UNICODE);
    exit;
}
