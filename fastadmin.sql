-- ----------------------------
-- 锐野优商加速器 - 数据库表结构
-- ----------------------------

-- 用户表
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

-- 服务器表
DROP TABLE IF EXISTS fa_ruyi_server;
CREATE TABLE fa_ruyi_server (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
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

-- 游戏表
DROP TABLE IF EXISTS fa_ruyi_game;
CREATE TABLE fa_ruyi_game (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  ename varchar(100) DEFAULT NULL,
  icon varchar(255) DEFAULT NULL,
  category varchar(20) DEFAULT NULL,
  hot_level tinyint(3) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  sort int(11) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='游戏';

-- 套餐表
DROP TABLE IF EXISTS fa_ruyi_package;
CREATE TABLE fa_ruyi_package (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
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

-- 订单表
DROP TABLE IF EXISTS fa_ruyi_order;
CREATE TABLE fa_ruyi_order (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  order_no varchar(32) NOT NULL,
  user_id int(11) NOT NULL,
  amount decimal(10,2) NOT NULL,
  pay_type varchar(20) DEFAULT NULL,
  status tinyint(1) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单';

-- 用户套餐表
DROP TABLE IF EXISTS fa_ruyi_user_package;
CREATE TABLE fa_ruyi_user_package (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  package_id int(11) NOT NULL,
  days int(11) DEFAULT NULL,
  expire_time int(11) DEFAULT NULL,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户套餐';

-- 加速记录表
DROP TABLE IF EXISTS fa_ruyi_speed_record;
CREATE TABLE fa_ruyi_speed_record (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  server_id int(11) DEFAULT NULL,
  game_id int(11) DEFAULT NULL,
  start_time int(11) DEFAULT NULL,
  duration int(11) DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='加速记录';

-- 公告表
DROP TABLE IF EXISTS fa_ruyi_notice;
CREATE TABLE fa_ruyi_notice (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  content text,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='公告';

-- OEM配置表
DROP TABLE IF EXISTS fa_ruyi_oem;
CREATE TABLE fa_ruyi_oem (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  title varchar(100) DEFAULT NULL,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='OEM配置';
