<?php
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
mysqli_set_charset($conn, "utf8mb4");

// 清空并重新插入服务器数据
mysqli_query($conn, "TRUNCATE TABLE fa_ruyi_server");
$server_list = [
    ["name" => "香港-01", "country" => "HK", "country_name" => "中国香港", "ip" => "hk01.ruiye.top", "port" => "80", "is_free" => 1],
    ["name" => "香港-02", "country" => "HK", "country_name" => "中国香港", "ip" => "hk02.ruiye.top", "port" => "80", "is_free" => 0],
    ["name" => "日本-01", "country" => "JP", "country_name" => "日本", "ip" => "jp01.ruiye.top", "port" => "80", "is_free" => 1],
    ["name" => "韩国-01", "country" => "KR", "country_name" => "韩国", "ip" => "kr01.ruiye.top", "port" => "80", "is_free" => 1],
    ["name" => "美国-01", "country" => "US", "country_name" => "美国", "ip" => "us01.ruiye.top", "port" => "80", "is_free" => 0],
    ["name" => "新加坡-01", "country" => "SG", "country_name" => "新加坡", "ip" => "sg01.ruiye.top", "port" => "80", "is_free" => 0],
];

foreach ($server_list as $i => $s) {
    $sql = "INSERT INTO fa_ruyi_server (name, country, country_name, ip, port, is_free, status, sort) VALUES ('{$s['name']}', '{$s['country']}', '{$s['country_name']}', '{$s['ip']}', '{$s['port']}', {$s['is_free']}, 1, " . ($i+1) . ")";
    mysqli_query($conn, $sql);
}

// 清空并重新插入游戏数据
mysqli_query($conn, "TRUNCATE TABLE fa_ruyi_game");
$game_list = [
    ["name" => "英雄联盟", "ename" => "League of Legends", "category" => "pc"],
    ["name" => "绝地求生", "ename" => "PUBG", "category" => "pc"],
    ["name" => "Valorant", "ename" => "Valorant", "category" => "pc"],
    ["name" => "Steam", "ename" => "Steam", "category" => "pc"],
    ["name" => "战网", "ename" => "Battle.net", "category" => "pc"],
    ["name" => "DNF", "ename" => "DNF", "category" => "pc"],
];

foreach ($game_list as $i => $g) {
    $sql = "INSERT INTO fa_ruyi_game (name, ename, category, status, sort) VALUES ('{$g['name']}', '{$g['ename']}', '{$g['category']}', 1, " . ($i+1) . ")";
    mysqli_query($conn, $sql);
}

// 清空并重新插入套餐数据
mysqli_query($conn, "TRUNCATE TABLE fa_ruyi_package");
$package_list = [
    ["name" => "日卡", "description" => "有效时间1天", "price" => "2.00", "days" => 1],
    ["name" => "周卡", "description" => "有效时间7天", "price" => "10.00", "days" => 7],
    ["name" => "月卡", "description" => "有效时间30天", "price" => "35.00", "days" => 30],
    ["name" => "季卡", "description" => "有效时间90天", "price" => "90.00", "days" => 90],
    ["name" => "年卡", "description" => "有效时间365天", "price" => "300.00", "days" => 365],
];

foreach ($package_list as $i => $p) {
    $sql = "INSERT INTO fa_ruyi_package (name, description, price, days, status, sort) VALUES ('{$p['name']}', '{$p['description']}', '{$p['price']}', {$p['days']}, 1, " . ($i+1) . ")";
    mysqli_query($conn, $sql);
}

echo "数据修复完成！";

mysqli_close($conn);
?>
