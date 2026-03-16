<?php
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
mysqli_query($conn, "SET NAMES utf8mb4");

// 修改表字符集
$tables = ['fa_ruyi_server', 'fa_ruyi_game', 'fa_ruyi_package'];

foreach ($tables as $table) {
    mysqli_query($conn, "ALTER TABLE $table CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Modified $table\n";
}

// 清空并重新插入
mysqli_query($conn, "TRUNCATE TABLE fa_ruyi_server");

$sql = "INSERT INTO fa_ruyi_server (name, country, country_name, ip, port, is_free, status, sort) VALUES ('香港-01', 'HK', '中国香港', 'hk01.ruiye.top', '80', 1, 1, 1)";
mysqli_query($conn, $sql);

$sql = "INSERT INTO fa_ruyi_server (name, country, country_name, ip, port, is_free, status, sort) VALUES ('日本-01', 'JP', '日本', 'jp01.ruiye.top', '80', 1, 1, 2)";
mysqli_query($conn, $sql);

$sql = "INSERT INTO fa_ruyi_server (name, country, country_name, ip, port, is_free, status, sort) VALUES ('韩国-01', 'KR', '韩国', 'kr01.ruiye.top', '80', 1, 1, 3)";
mysqli_query($conn, $sql);

// 测试读取
$result = mysqli_query($conn, "SELECT * FROM fa_ruyi_server");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . " - " . $row['country_name'] . "\n";
}

mysqli_close($conn);
echo "\n完成！";
?>
