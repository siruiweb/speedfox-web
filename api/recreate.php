<?php
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
mysqli_query($conn, "SET NAMES utf8mb4");

// 删除旧表
mysqli_query($conn, "DROP TABLE IF EXISTS fa_ruyi_server");
mysqli_query($conn, "DROP TABLE IF EXISTS fa_ruyi_game");
mysqli_query($conn, "DROP TABLE IF EXISTS fa_ruyi_package");

// 重新创建表（指定字符集）
$sql1 = "CREATE TABLE fa_ruyi_server (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL COMMENT '服务器名称',
  country varchar(10) DEFAULT NULL COMMENT '国家代码',
  country_name varchar(50) DEFAULT NULL COMMENT '国家名称',
  ip varchar(100) DEFAULT NULL COMMENT '服务器IP',
  port varchar(10) DEFAULT NULL COMMENT '端口',
  is_free tinyint(1) DEFAULT 0 COMMENT '是否免费',
  status tinyint(1) DEFAULT 1 COMMENT '状态',
  sort int(11) DEFAULT 0 COMMENT '排序',
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='服务器表'";

$sql2 = "CREATE TABLE fa_ruyi_game (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL COMMENT '游戏名称',
  ename varchar(100) DEFAULT NULL COMMENT '英文名',
  icon varchar(255) DEFAULT NULL COMMENT '图标',
  category varchar(20) DEFAULT NULL COMMENT '分类',
  hot_level int(11) DEFAULT 0 COMMENT '热度',
  status tinyint(1) DEFAULT 1 COMMENT '状态',
  sort int(11) DEFAULT 0 COMMENT '排序',
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='游戏表'";

$sql3 = "CREATE TABLE fa_ruyi_package (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL COMMENT '套餐名称',
  description varchar(255) DEFAULT NULL COMMENT '描述',
  price decimal(10,2) DEFAULT NULL COMMENT '价格',
  original_price decimal(10,2) DEFAULT NULL COMMENT '原价',
  days int(11) DEFAULT NULL COMMENT '天数',
  is_recommend tinyint(1) DEFAULT 0 COMMENT '是否推荐',
  status tinyint(1) DEFAULT 1 COMMENT '状态',
  sort int(11) DEFAULT 0 COMMENT '排序',
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='套餐表'";

mysqli_query($conn, $sql1);
echo "Created fa_ruyi_server\n";

mysqli_query($conn, $sql2);
echo "Created fa_ruyi_game\n";

mysqli_query($conn, $sql3);
echo "Created fa_ruyi_package\n";

// 插入测试数据
mysqli_query($conn, "INSERT INTO fa_ruyi_server (name, country, country_name, ip, port, is_free, status, sort) VALUES 
('香港-01', 'HK', '中国香港', 'hk01.ruiye.top', '80', 1, 1, 1),
('日本-01', 'JP', '日本', 'jp01.ruiye.top', '80', 1, 1, 2),
('韩国-01', 'KR', '韩国', 'kr01.ruiye.top', '80', 1, 1, 3)");

mysqli_query($conn, "INSERT INTO fa_ruyi_game (name, ename, category, status, sort) VALUES 
('英雄联盟', 'League of Legends', 'pc', 1, 1),
('绝地求生', 'PUBG', 'pc', 1, 2),
('Valorant', 'Valorant', 'pc', 1, 3),
('Steam', 'Steam', 'pc', 1, 4)");

mysqli_query($conn, "INSERT INTO fa_ruyi_package (name, description, price, original_price, days, status, sort) VALUES 
('日卡', '有效时间1天', 2.00, 5.00, 1, 1, 1),
('周卡', '有效时间7天', 10.00, 20.00, 7, 1, 2),
('月卡', '有效时间30天', 35.00, 70.00, 30, 1, 3),
('年卡', '有效时间365天', 300.00, 600.00, 365, 1, 4)");

echo "Inserted data\n";

// 验证
$result = mysqli_query($conn, "SELECT name, country_name FROM fa_ruyi_server");
echo "\nServer test:\n";
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . " - " . $row['country_name'] . "\n";
}

$result = mysqli_query($conn, "SELECT name FROM fa_ruyi_game");
echo "\nGame test:\n";
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . "\n";
}

$result = mysqli_query($conn, "SELECT name, price FROM fa_ruyi_package");
echo "\nPackage test:\n";
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . " - " . $row['price'] . "元\n";
}

mysqli_close($conn);
echo "\n全部完成！";
?>
