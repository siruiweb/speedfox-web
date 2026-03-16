-- SpeedFox 数据库表结构
-- 创建日期: 2026-03-16

-- ============================================
-- 1. OEM配置表 (oem)
-- ============================================
CREATE TABLE IF NOT EXISTS oem (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
    
ame VARCHAR(50) NOT NULL COMMENT 'OEM名称',
    	itle VARCHAR(100) DEFAULT NULL COMMENT '标题',
    logo VARCHAR(255) DEFAULT NULL COMMENT 'Logo URL',
    oem_css TEXT DEFAULT NULL COMMENT '自定义CSS',
    oem_js TEXT DEFAULT NULL COMMENT '自定义JS',
    contact_qq VARCHAR(20) DEFAULT NULL COMMENT '联系QQ',
    contact_wechat VARCHAR(50) DEFAULT NULL COMMENT '联系微信',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0禁用 1启用',
    create_time INT(11) DEFAULT NULL COMMENT '创建时间',
    update_time INT(11) DEFAULT NULL COMMENT '更新时间',
    PRIMARY KEY (id),
    UNIQUE KEY uk_name (
ame)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='OEM配置表';

-- ============================================
-- 2. 用户表 (users)
-- ============================================
CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
    username VARCHAR(50) NOT NULL COMMENT '用户名',
    password VARCHAR(32) NOT NULL COMMENT '密码(MD5)',
    email VARCHAR(100) DEFAULT NULL COMMENT '邮箱',
    mobile VARCHAR(20) DEFAULT NULL COMMENT '手机号',
    vatar VARCHAR(255) DEFAULT NULL COMMENT '头像',
    alance DECIMAL(10,2) DEFAULT 0.00 COMMENT '账户余额',
    points INT(11) DEFAULT 0 COMMENT '积分',
    ip_level TINYINT(1) DEFAULT 0 COMMENT 'VIP等级',
    ip_expire_time INT(11) DEFAULT NULL COMMENT 'VIP过期时间',
    last_login_time INT(11) DEFAULT NULL COMMENT '最后登录时间',
    last_login_ip VARCHAR(50) DEFAULT NULL COMMENT '最后登录IP',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0禁用 1正常',
    create_time INT(11) DEFAULT NULL COMMENT '注册时间',
    update_time INT(11) DEFAULT NULL COMMENT '更新时间',
    PRIMARY KEY (id),
    UNIQUE KEY uk_username (username),
    KEY idx_email (email),
    KEY idx_mobile (mobile)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

-- ============================================
-- 3. 服务器列表 (server_list)
-- ============================================
CREATE TABLE IF NOT EXISTS server_list (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT '服务器ID',
    
ame VARCHAR(100) NOT NULL COMMENT '服务器名称',
    country VARCHAR(10) DEFAULT NULL COMMENT '国家代码',
    country_name VARCHAR(50) DEFAULT NULL COMMENT '国家名称',
    ip VARCHAR(50) DEFAULT NULL COMMENT '服务器IP',
    port INT(11) DEFAULT 80 COMMENT '端口',
    domain VARCHAR(100) DEFAULT NULL COMMENT '域名',
    	ype VARCHAR(20) DEFAULT 'game' COMMENT '类型: game游戏, oss存储, proxy代理',
    game_ids VARCHAR(255) DEFAULT NULL COMMENT '支持的游戏ID,逗号分隔',
    description TEXT DEFAULT NULL COMMENT '描述',
    speed VARCHAR(20) DEFAULT NULL COMMENT '带宽',
    load TINYINT(3) DEFAULT 0 COMMENT '负载 0-100',
    online INT(11) DEFAULT 0 COMMENT '在线人数',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0维护 1正常',
    is_free TINYINT(1) DEFAULT 0 COMMENT '是否免费',
    price DECIMAL(10,2) DEFAULT 0.00 COMMENT '价格(元/天)',
    sort_order INT(11) DEFAULT 0 COMMENT '排序',
    create_time INT(11) DEFAULT NULL COMMENT '创建时间',
    update_time INT(11) DEFAULT NULL COMMENT '更新时间',
    PRIMARY KEY (id),
    KEY idx_country (country),
    KEY idx_type (	ype),
    KEY idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='服务器列表';

-- ============================================
-- 4. 游戏表 (games)
-- ============================================
CREATE TABLE IF NOT EXISTS games (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT '游戏ID',
    
ame VARCHAR(100) NOT NULL COMMENT '游戏名称',
    ename VARCHAR(100) DEFAULT NULL COMMENT '英文名',
    icon VARCHAR(255) DEFAULT NULL COMMENT '图标',
    cover VARCHAR(255) DEFAULT NULL COMMENT '封面',
    category VARCHAR(20) DEFAULT NULL COMMENT '分类: pc电脑, mobile手机, web网页',
    	ags VARCHAR(255) DEFAULT NULL COMMENT '标签',
    description TEXT DEFAULT NULL COMMENT '描述',
    official_website VARCHAR(255) DEFAULT NULL COMMENT '官网',
    server_count INT(11) DEFAULT 0 COMMENT '服务器数量',
    hot_level TINYINT(3) DEFAULT 0 COMMENT '热门程度 0-100',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0下架 1上架',
    sort_order INT(11) DEFAULT 0 COMMENT '排序',
    create_time INT(11) DEFAULT NULL COMMENT '创建时间',
    update_time INT(11) DEFAULT NULL COMMENT '更新时间',
    PRIMARY KEY (id),
    KEY idx_category (category),
    KEY idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='游戏表';

-- ============================================
-- 5. 订单表 (orders)
-- ============================================
CREATE TABLE IF NOT EXISTS orders (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT '订单ID',
    order_no VARCHAR(32) NOT NULL COMMENT '订单号',
    user_id INT(11) NOT NULL COMMENT '用户ID',
    mount DECIMAL(10,2) NOT NULL COMMENT '金额',
    pay_type VARCHAR(20) DEFAULT NULL COMMENT '支付方式: alipay, wechat, qqpay',
    	rade_no VARCHAR(64) DEFAULT NULL COMMENT '第三方交易号',
    status TINYINT(1) DEFAULT 0 COMMENT '状态 0待支付 1已支付 2已取消 3退款',
    pay_time INT(11) DEFAULT NULL COMMENT '支付时间',
    create_time INT(11) DEFAULT NULL COMMENT '创建时间',
    update_time INT(11) DEFAULT NULL COMMENT '更新时间',
    PRIMARY KEY (id),
    UNIQUE KEY uk_order_no (order_no),
    KEY idx_user_id (user_id),
    KEY idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单表';

-- ============================================
-- 6. 套餐表 (packages)
-- ============================================
CREATE TABLE IF NOT EXISTS packages (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT '套餐ID',
    
ame VARCHAR(50) NOT NULL COMMENT '套餐名称',
    description TEXT DEFAULT NULL COMMENT '描述',
    price DECIMAL(10,2) NOT NULL COMMENT '价格',
    original_price DECIMAL(10,2) DEFAULT NULL COMMENT '原价',
    days INT(11) DEFAULT 30 COMMENT '天数',
    discount DECIMAL(3,2) DEFAULT 1.00 COMMENT '折扣',
    is_recommend TINYINT(1) DEFAULT 0 COMMENT '是否推荐',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0下架 1上架',
    sort_order INT(11) DEFAULT 0 COMMENT '排序',
    create_time INT(11) DEFAULT NULL COMMENT '创建时间',
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='套餐表';

-- ============================================
-- 7. 用户套餐表 (user_packages)
-- ============================================
CREATE TABLE IF NOT EXISTS user_packages (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
    user_id INT(11) NOT NULL COMMENT '用户ID',
    package_id INT(11) NOT NULL COMMENT '套餐ID',
    package_name VARCHAR(50) DEFAULT NULL COMMENT '套餐名称',
    days INT(11) DEFAULT NULL COMMENT '天数',
    expire_time INT(11) DEFAULT NULL COMMENT '过期时间',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0过期 1有效',
    create_time INT(11) DEFAULT NULL COMMENT '创建时间',
    PRIMARY KEY (id),
    KEY idx_user_id (user_id),
    KEY idx_expire_time (expire_time)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户套餐表';

-- ============================================
-- 8. 加速记录表 (speed_records)
-- ============================================
CREATE TABLE IF NOT EXISTS speed_records (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
    user_id INT(11) NOT NULL COMMENT '用户ID',
    server_id INT(11) DEFAULT NULL COMMENT '服务器ID',
    game_id INT(11) DEFAULT NULL COMMENT '游戏ID',
    ip VARCHAR(50) DEFAULT NULL COMMENT '用户IP',
    start_time INT(11) DEFAULT NULL COMMENT '开始时间',
    end_time INT(11) DEFAULT NULL COMMENT '结束时间',
    duration INT(11) DEFAULT 0 COMMENT '时长(秒)',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0中断 1正常',
    PRIMARY KEY (id),
    KEY idx_user_id (user_id),
    KEY idx_start_time (start_time)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='加速记录表';

-- ============================================
-- 9. 公告表 (notices)
-- ============================================
CREATE TABLE IF NOT EXISTS 
otices (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT '公告ID',
    	itle VARCHAR(100) NOT NULL COMMENT '标题',
    content TEXT DEFAULT NULL COMMENT '内容',
    	ype VARCHAR(20) DEFAULT 'notice' COMMENT '类型: notice公告, activity活动, update更新',
    is_top TINYINT(1) DEFAULT 0 COMMENT '是否置顶',
    iews INT(11) DEFAULT 0 COMMENT '浏览量',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0隐藏 1显示',
    create_time INT(11) DEFAULT NULL COMMENT '创建时间',
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='公告表';

-- ============================================
-- 10. 管理员表 (admins)
-- ============================================
CREATE TABLE IF NOT EXISTS dmins (
    id INT(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
    username VARCHAR(50) NOT NULL COMMENT '用户名',
    password VARCHAR(32) NOT NULL COMMENT '密码',
    ealname VARCHAR(50) DEFAULT NULL COMMENT '真实姓名',
    mobile VARCHAR(20) DEFAULT NULL COMMENT '手机',
    email VARCHAR(100) DEFAULT NULL COMMENT '邮箱',
    ole_id INT(11) DEFAULT NULL COMMENT '角色ID',
    last_login_time INT(11) DEFAULT NULL COMMENT '最后登录时间',
    last_login_ip VARCHAR(50) DEFAULT NULL COMMENT '最后登录IP',
    status TINYINT(1) DEFAULT 1 COMMENT '状态 0禁用 1正常',
    create_time INT(11) DEFAULT NULL COMMENT '创建时间',
    PRIMARY KEY (id),
    UNIQUE KEY uk_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='管理员表';

-- ============================================
-- 初始数据
-- ============================================

-- 插入默认OEM配置
INSERT INTO oem (
ame, 	itle, status, create_time) VALUES 
('default', '锐野优商加速器', 1, UNIX_TIMESTAMP()),
('speedfox', '极狐加速器', 1, UNIX_TIMESTAMP());

-- 插入默认管理员 (密码: admin123)
INSERT INTO dmins (username, password, ealname, status, create_time) VALUES 
('admin', '0192023a7bbd73250516f069df18b500', '管理员', 1, UNIX_TIMESTAMP());

-- 插入默认套餐
INSERT INTO packages (
ame, description, price, original_price, days, is_recommend, status, sort_order, create_time) VALUES 
('日卡', '有效期1天', 2.00, 5.00, 1, 0, 1, 1, UNIX_TIMESTAMP()),
('周卡', '有效期7天', 10.00, 20.00, 7, 1, 1, 2, UNIX_TIMESTAMP()),
('月卡', '有效期30天', 30.00, 60.00, 30, 1, 1, 3, UNIX_TIMESTAMP()),
('季卡', '有效期90天', 80.00, 150.00, 90, 0, 1, 4, UNIX_TIMESTAMP()),
('年卡', '有效期365天', 280.00, 500.00, 365, 0, 1, 5, UNIX_TIMESTAMP());

-- 插入示例游戏
INSERT INTO games (
ame, ename, category, description, status, sort_order, create_time) VALUES 
('英雄联盟', 'League of Legends', 'pc', 'MOBA竞技游戏', 1, 1, UNIX_TIMESTAMP()),
('绝地求生', 'PUBG', 'pc', '生存竞技游戏', 1, 2, UNIX_TIMESTAMP()),
('Valorant', 'Valorant', 'pc', '射击竞技游戏', 1, 3, UNIX_TIMESTAMP()),
('Steam', 'Steam', 'pc', '游戏平台', 1, 4, UNIX_TIMESTAMP()),
('战网', 'Battle.net', 'pc', '暴雪游戏平台', 1, 5, UNIX_TIMESTAMP());

-- 插入示例服务器
INSERT INTO server_list (
ame, country, country_name, ip, 	ype, is_free, status, sort_order, create_time) VALUES 
('香港-01', 'HK', '中国香港', 'hk01.speedfox.net', 'game', 1, 1, 1, UNIX_TIMESTAMP()),
('香港-02', 'HK', '中国香港', 'hk02.speedfox.net', 'game', 0, 1, 2, UNIX_TIMESTAMP()),
('日本-01', 'JP', '日本', 'jp01.speedfox.net', 'game', 1, 1, 3, UNIX_TIMESTAMP()),
('韩国-01', 'KR', '韩国', 'kr01.speedfox.net', 'game', 0, 1, 4, UNIX_TIMESTAMP()),
('美国-01', 'US', '美国', 'us01.speedfox.net', 'game', 0, 1, 5, UNIX_TIMESTAMP());
