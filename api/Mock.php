<?php
/**
 * SpeedFox 本地模拟测试版本
 * 不需要数据库，直接使用模拟数据
 */

// 模拟数据库数据
$模拟数据 = array(
    // OEM配置
    'oem' => array(
        'default' => array(
            'name' => 'default',
            'title' => '锐野优商加速器',
            'logo' => '/assets/images/logo.png',
            'oem_css' => '',
            'oem_js' => '',
            'contact_qq' => '123456789',
            'contact_wechat' => '锐野优商'
        )
    ),
    
    // 服务器列表
    'server_list' => array(
        array('id' => 1, 'name' => '香港-01', 'country' => 'HK', 'country_name' => '中国香港', 'ip' => 'hk01.ruiye.top', 'type' => 'game', 'is_free' => 1, 'status' => 1, 'online' => 1234, 'load' => 45),
        array('id' => 2, 'name' => '香港-02', 'country' => 'HK', 'country_name' => '中国香港', 'ip' => 'hk02.ruiye.top', 'type' => 'game', 'is_free' => 0, 'status' => 1, 'online' => 856, 'load' => 30),
        array('id' => 3, 'name' => '日本-01', 'country' => 'JP', 'country_name' => '日本', 'ip' => 'jp01.ruiye.top', 'type' => 'game', 'is_free' => 1, 'status' => 1, 'online' => 2341, 'load' => 67),
        array('id' => 4, 'name' => '日本-02', 'country' => 'JP', 'country_name' => '日本', 'ip' => 'jp02.ruiye.top', 'type' => 'game', 'is_free' => 0, 'status' => 1, 'online' => 567, 'load' => 25),
        array('id' => 5, 'name' => '韩国-01', 'country' => 'KR', 'country_name' => '韩国', 'ip' => 'kr01.ruiye.top', 'type' => 'game', 'is_free' => 1, 'status' => 1, 'online' => 1890, 'load' => 55),
        array('id' => 6, 'name' => '美国-01', 'country' => 'US', 'country_name' => '美国', 'ip' => 'us01.ruiye.top', 'type' => 'game', 'is_free' => 0, 'status' => 1, 'online' => 3456, 'load' => 78),
        array('id' => 7, 'name' => '台湾-01', 'country' => 'TW', 'country_name' => '中国台湾', 'ip' => 'tw01.ruiye.top', 'type' => 'game', 'is_free' => 1, 'status' => 1, 'online' => 723, 'load' => 35),
        array('id' => 8, 'name' => '新加坡-01', 'country' => 'SG', 'country_name' => '新加坡', 'ip' => 'sg01.ruiye.top', 'type' => 'game', 'is_free' => 0, 'status' => 1, 'online' => 456, 'load' => 20)
    ),
    
    // 游戏列表
    'games' => array(
        array('id' => 1, 'name' => '英雄联盟', 'ename' => 'League of Legends', 'category' => 'pc', 'icon' => '/static/img/game1.png', 'hot_level' => 95),
        array('id' => 2, 'name' => '绝地求生', 'ename' => 'PUBG', 'category' => 'pc', 'icon' => '/static/img/game2.png', 'hot_level' => 90),
        array('id' => 3, 'name' => 'Valorant', 'ename' => 'Valorant', 'category' => 'pc', 'icon' => '/static/img/game3.png', 'hot_level' => 88),
        array('id' => 4, 'name' => 'Steam', 'ename' => 'Steam', 'category' => 'pc', 'icon' => '/static/img/game4.png', 'hot_level' => 85),
        array('id' => 5, 'name' => '战网', 'ename' => 'Battle.net', 'category' => 'pc', 'icon' => '/static/img/game5.png', 'hot_level' => 80),
        array('id' => 6, 'name' => 'DNF', 'ename' => 'DNF', 'category' => 'pc', 'icon' => '/static/img/game6.png', 'hot_level' => 75),
        array('id' => 7, 'name' => 'CF', 'ename' => 'CrossFire', 'category' => 'pc', 'icon' => '/static/img/game7.png', 'hot_level' => 70),
        array('id' => 8, 'name' => '永劫无间', 'ename' => 'Naraka Bladepoint', 'category' => 'pc', 'icon' => '/static/img/game8.png', 'hot_level' => 82)
    ),
    
    // 套餐
    'packages' => array(
        array('id' => 1, 'name' => '日卡', 'price' => 2.00, 'days' => 1, 'description' => '有效期1天'),
        array('id' => 2, 'name' => '周卡', 'price' => 10.00, 'days' => 7, 'description' => '有效期7天'),
        array('id' => 3, 'name' => '月卡', 'price' => 30.00, 'days' => 30, 'description' => '有效期30天'),
        array('id' => 4, 'name' => '季卡', 'price' => 80.00, 'days' => 90, 'description' => '有效期90天'),
        array('id' => 5, 'name' => '年卡', 'price' => 280.00, 'days' => 365, 'description' => '有效期365天')
    ),
    
    // 统计数据
    'statistics' => array(
        'total_users' => 88888,
        'total_servers' => 8,
        'total_games' => 50,
        'total_traffic' => 1536,  // GB
        'speed_avg' => 125  // Mbps
    )
);

// 获取OEM配置
function get_oem_config($product_name = 'default') {
    global $模拟数据;
    return $模拟数据['oem']['default'];
}

// 获取服务器列表
function get_server_list($type = 'all') {
    global $模拟数据;
    $list = $模拟数据['server_list'];
    if ($type !== 'all') {
        $list = array_filter($list, function($s) use ($type) {
            return $s['type'] === $type;
        });
    }
    return array_values($list);
}

// 获取游戏列表
function get_game_list() {
    global $模拟数据;
    return $模拟数据['games'];
}

// 获取套餐列表
function get_packages() {
    global $模拟数据;
    return $模拟数据['packages'];
}

// 获取统计数据
function get_statistics() {
    global $模拟数据;
    return $模拟数据['statistics'];
}

// API响应
function api_response($code, $msg, $data = array()) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array(
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    ), JSON_UNESCAPED_UNICODE);
    exit;
}

