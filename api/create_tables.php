<?php
$conn = mysqli_connect("localhost", "ruiyeadmin", "bkTm452WyBsHin1H", "ruiyeadmin");
mysqli_set_charset($conn, "utf8mb4");

// 创建订单表
$sql = "CREATE TABLE IF NOT EXISTS fa_ruyi_order (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL COMMENT '用户ID',
  package_id int(11) DEFAULT NULL COMMENT '套餐ID',
  out_trade_no varchar(50) DEFAULT NULL COMMENT '商户订单号',
  trade_no varchar(50) DEFAULT NULL COMMENT '支付平台订单号',
  money decimal(10,2) DEFAULT NULL COMMENT '金额',
  status tinyint(1) DEFAULT 0 COMMENT '状态:0待支付,1已支付',
  create_time int(11) DEFAULT NULL COMMENT '创建时间',
  pay_time int(11) DEFAULT NULL COMMENT '支付时间',
  PRIMARY KEY (id),
  KEY out_trade_no (out_trade_no)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单表'";

mysqli_query($conn, $sql);
echo "Order table created\n";

// 创建用户套餐表
$sql2 = "CREATE TABLE IF NOT EXISTS fa_ruyi_user_package (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL COMMENT '用户ID',
  package_id int(11) DEFAULT NULL COMMENT '套餐ID',
  expire_time int(11) DEFAULT NULL COMMENT '过期时间',
  create_time int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (id),
  KEY user_id (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户套餐表'";

mysqli_query($conn, $sql2);
echo "User package table created\n";

mysqli_close($conn);
echo "Done!";
?>
