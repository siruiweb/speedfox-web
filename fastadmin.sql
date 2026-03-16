-- ----------------------------
-- 锐野优商加速器 - FastAdmin数据库表结构
-- ----------------------------

-- ----------------------------
-- 表前缀: fa_ruyi_
-- ----------------------------

DROP TABLE IF EXISTS a_oem;
CREATE TABLE a_oem (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  
ame varchar(50) NOT NULL COMMENT 'OEM名称',
  	itle varchar(100) DEFAULT NULL,
  logo varchar(255) DEFAULT NULL,
  oem_css text,
  oem_js text,
  contact_qq varchar(20) DEFAULT NULL,
  contact_wechat varchar(50) DEFAULT NULL,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  update_time int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY 
ame (
ame)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='OEM配置';

DROP TABLE IF EXISTS a_user;
CREATE TABLE a_user (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password varchar(32) NOT NULL,
  email varchar(100) DEFAULT NULL,
  mobile varchar(20) DEFAULT NULL,
  vatar varchar(255) DEFAULT NULL,
  alance decimal(10,2) DEFAULT 0.00,
  points int(11) DEFAULT 0,
  ip_level tinyint(1) DEFAULT 0,
  ip_expire_time int(11) DEFAULT NULL,
  last_login_time int(11) DEFAULT NULL,
  last_login_ip varchar(50) DEFAULT NULL,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  update_time int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户';

DROP TABLE IF EXISTS a_server;
CREATE TABLE a_server (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  
ame varchar(100) NOT NULL,
  country varchar(10) DEFAULT NULL,
  country_name varchar(50) DEFAULT NULL,
  ip varchar(50) DEFAULT NULL,
  port int(11) DEFAULT 80,
  	ype varchar(20) DEFAULT 'game',
  game_ids varchar(255) DEFAULT NULL,
  description text,
  speed varchar(20) DEFAULT NULL,
  load tinyint(3) DEFAULT 0,
  online int(11) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  is_free tinyint(1) DEFAULT 0,
  price decimal(10,2) DEFAULT 0.00,
  sort int(11) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  update_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='服务器';

DROP TABLE IF EXISTS a_game;
CREATE TABLE a_game (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  
ame varchar(100) NOT NULL,
  ename varchar(100) DEFAULT NULL,
  icon varchar(255) DEFAULT NULL,
  cover varchar(255) DEFAULT NULL,
  category varchar(20) DEFAULT NULL,
  	ags varchar(255) DEFAULT NULL,
  description text,
  official_website varchar(255) DEFAULT NULL,
  hot_level tinyint(3) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  sort int(11) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  update_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='游戏';

DROP TABLE IF EXISTS a_order;
CREATE TABLE a_order (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  order_no varchar(32) NOT NULL,
  user_id int(11) NOT NULL,
  mount decimal(10,2) NOT NULL,
  pay_type varchar(20) DEFAULT NULL,
  	rade_no varchar(64) DEFAULT NULL,
  status tinyint(1) DEFAULT 0,
  pay_time int(11) DEFAULT NULL,
  create_time int(11) DEFAULT NULL,
  update_time int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY order_no (order_no)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单';

DROP TABLE IF EXISTS a_package;
CREATE TABLE a_package (
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

DROP TABLE IF EXISTS a_user_package;
CREATE TABLE a_user_package (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  package_id int(11) NOT NULL,
  days int(11) DEFAULT NULL,
  expire_time int(11) DEFAULT NULL,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY user_id (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户套餐';

DROP TABLE IF EXISTS a_speed_record;
CREATE TABLE a_speed_record (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  server_id int(11) DEFAULT NULL,
  game_id int(11) DEFAULT NULL,
  ip varchar(50) DEFAULT NULL,
  start_time int(11) DEFAULT NULL,
  end_time int(11) DEFAULT NULL,
  duration int(11) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  PRIMARY KEY (id),
  KEY user_id (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='加速记录';

DROP TABLE IF EXISTS a_notice;
CREATE TABLE a_notice (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  	itle varchar(100) NOT NULL,
  content text,
  	ype varchar(20) DEFAULT 'notice',
  iews int(11) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='公告';

-- 初始数据
INSERT INTO a_oem (
ame, 	itle, status, create_time) VALUES ('default', '锐野优商加速器', 1, UNIX_TIMESTAMP());

INSERT INTO a_package (
ame, description, price, original_price, days, is_recommend, status, sort, create_time) VALUES 
('日卡', '有效期1天', 2.00, 5.00, 1, 0, 1, 1, UNIX_TIMESTAMP()),
('周卡', '有效期7天', 10.00, 20.00, 7, 0, 1, 2, UNIX_TIMESTAMP()),
('月卡', '有效期30天', 30.00, 60.00, 30, 1, 1, 3, UNIX_TIMESTAMP()),
('季卡', '有效期90天', 80.00, 150.00, 90, 0, 1, 4, UNIX_TIMESTAMP()),
('年卡', '有效期365天', 280.00, 500.00, 365, 0, 1, 5, UNIX_TIMESTAMP());

INSERT INTO a_server (
ame, country, country_name, ip, 	ype, is_free, status, sort, create_time) VALUES 
('香港-01', 'HK', '中国香港', 'hk01.ruiye.top', 'game', 1, 1, 1, UNIX_TIMESTAMP()),
('香港-02', 'HK', '中国香港', 'hk02.ruiye.top', 'game', 0, 1, 2, UNIX_TIMESTAMP()),
('日本-01', 'JP', '日本', 'jp01.ruiye.top', 'game', 1, 1, 3, UNIX_TIMESTAMP()),
('韩国-01', 'KR', '韩国', 'kr01.ruiye.top', 'game', 0, 1, 4, UNIX_TIMESTAMP()),
('美国-01', 'US', '美国', 'us01.ruiye.top', 'game', 0, 1, 5, UNIX_TIMESTAMP());

INSERT INTO a_game (
ame, ename, category, status, sort, create_time) VALUES 
('英雄联盟', 'League of Legends', 'pc', 1, 1, UNIX_TIMESTAMP()),
('绝地求生', 'PUBG', 'pc', 1, 2, UNIX_TIMESTAMP()),
('Valorant', 'Valorant', 'pc', 1, 3, UNIX_TIMESTAMP()),
('Steam', 'Steam', 'pc', 1, 4, UNIX_TIMESTAMP()),
('战网', 'Battle.net', 'pc', 1, 5, UNIX_TIMESTAMP());



