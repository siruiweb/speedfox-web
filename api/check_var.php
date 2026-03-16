<?php
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");

// 检查MySQL变量
$result = mysqli_query($conn, "SHOW VARIABLES LIKE 'character_set%'");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['Variable_name'] . " = " . $row['Value'] . "\n";
}

mysqli_close($conn);
?>
