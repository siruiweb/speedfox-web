-- ----------------------------
-- 锐野优商加速器 - FastAdmin数据库表结构
-- ----------------------------

DROP TABLE IF EXISTS fa_ruyi_member;
CREATE TABLE fa_ruyi_member (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password varchar(32) NOT NULL,
  mobile varchar(20) DEFAULT NULL,
  balance decimal(10,2) DEFAULT 0.00,
  vip_level tinyint(1) DEFAULT 0,
  vip_expire_time int(11) DEFAULT NULL,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户';
