<?php
// 直接用mysqli连接并执行SQL
$conn = new mysqli("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");

// 设置字符集
$conn->set_charset("utf8mb4");

// 执行SQL文件
$sql = file_get_contents("/tmp/temp_data.sql");

// 执行多条SQL
if ($conn->multi_query($sql)) {
    do {
        // 存储结果集
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
}

echo "SQL executed\n";

// 验证
$result = $conn->query("SELECT name, country_name FROM fa_ruyi_server");
while ($row = $result->fetch_assoc()) {
    echo $row['name'] . " - " . $row['country_name'] . "\n";
}

$conn->close();
?>
