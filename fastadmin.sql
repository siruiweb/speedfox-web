-- ----------------------------
-- 锐野优商加速器 - FastAdmin数据库表结构
-- ----------------------------

DROP TABLE IF EXISTS a_ruyi_oem;
CREATE TABLE a_ruyi_oem (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  
ame varchar(50) NOT NULL,
  	itle varchar(100) DEFAULT NULL,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='OEM配置';

DROP TABLE IF EXISTS a_ruyi_member;
CREATE TABLE a_ruyi_member (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password varchar(32) NOT NULL,
  mobile varchar(20) DEFAULT NULL,
  alance decimal(10,2) DEFAULT 0.00,
  ip_level tinyint(1) DEFAULT 0,
  ip_expire_time int(11) DEFAULT NULL,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户';

DROP TABLE IF EXISTS a_ruyi_server;
CREATE TABLE a_ruyi_server (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  
ame varchar(100) NOT NULL,
  country varchar(10) DEFAULT NULL,
  country_name varchar(50) DEFAULT NULL,
  ip varchar(50) DEFAULT NULL,
  port int(11) DEFAULT 80,
  is_free tinyint(1) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  sort int(11) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='服务器';

DROP TABLE IF EXISTS a_ruyi_package;
CREATE TABLE a_ruyi_package (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  
ame varchar(50) NOT NULL,
  description text,
  price decimal(10,2) NOT NULL,
  original_price decimal(10,2) DEFAULT NULL,
  days int(11) DEFAULT 30,
  is_recommend tinyint(1) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  sort int(11) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='套餐';

INSERT INTO a_ruyi_package VALUES (1,'日卡','有效期1天',2.00,5.00,1,0,1,1,UNIX_TIMESTAMP());
INSERT INTO a_ruyi_package VALUES (2,'周卡','有效期7天',10.00,20.00,7,0,1,2,UNIX_TIMESTAMP());
INSERT INTO a_ruyi_package VALUES (3,'月卡','有效期30天',30.00,60.00,30,1,1,3,UNIX_TIMESTAMP());
