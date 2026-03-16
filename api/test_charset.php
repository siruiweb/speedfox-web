<?php
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");

// 检查字符集
echo "Server info: " . mysqli_get_server_info($conn) . "\n";
echo "Character set: " . mysqli_character_set_name($conn) . "\n";

// 设置正确的字符集
mysqli_query($conn, "SET NAMES utf8mb4");
mysqli_set_charset($conn, "utf8mb4");

// 重新插入测试
mysqli_query($conn, "TRUNCATE TABLE fa_ruyi_server");
$sql = "INSERT INTO fa_ruyi_server (name, country, country_name, ip, port, is_free, status, sort) VALUES ('测试-01', 'CN', '中国', 'test.ruiye.top', '80', 1, 1, 1)";
mysqli_query($conn, $sql);

// 读取
$result = mysqli_query($conn, "SELECT * FROM fa_ruyi_server");
$row = mysqli_fetch_assoc($result);
print_r($row);

mysqli_close($conn);
?>
