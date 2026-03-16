-- 服务器表
CREATE TABLE IF NOT EXISTS fa_ruyi_server (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  country varchar(10) DEFAULT NULL,
  country_name varchar(50) DEFAULT NULL,
  ip varchar(100) DEFAULT NULL,
  port varchar(10) DEFAULT NULL,
  is_free tinyint(1) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  sort int(11) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO fa_ruyi_server (name, country, country_name, ip, port, is_free, status, sort) VALUES
('香港-01', 'HK', '中国香港', 'hk01.ruiye.top', '80', 1, 1, 1),
('日本-01', 'JP', '日本', 'jp01.ruiye.top', '80', 1, 1, 2),
('韩国-01', 'KR', '韩国', 'kr01.ruiye.top', '80', 1, 1, 3);

-- 游戏表
CREATE TABLE IF NOT EXISTS fa_ruyi_game (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  ename varchar(100) DEFAULT NULL,
  icon varchar(255) DEFAULT NULL,
  category varchar(20) DEFAULT NULL,
  hot_level int(11) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  sort int(11) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO fa_ruyi_game (name, ename, category, status, sort) VALUES
('英雄联盟', 'League of Legends', 'pc', 1, 1),
('绝地求生', 'PUBG', 'pc', 1, 2),
('Valorant', 'Valorant', 'pc', 1, 3);

-- 套餐表
CREATE TABLE IF NOT EXISTS fa_ruyi_package (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  description varchar(255) DEFAULT NULL,
  price decimal(10,2) DEFAULT NULL,
  original_price decimal(10,2) DEFAULT NULL,
  days int(11) DEFAULT NULL,
  is_recommend tinyint(1) DEFAULT 0,
  status tinyint(1) DEFAULT 1,
  sort int(11) DEFAULT 0,
  create_time int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO fa_ruyi_package (name, description, price, original_price, days, status, sort) VALUES
('日卡', '有效时间1天', 2.00, 5.00, 1, 1, 1),
('周卡', '有效时间7天', 10.00, 20.00, 7, 1, 2),
('月卡', '有效时间30天', 35.00, 70.00, 30, 1, 3);
