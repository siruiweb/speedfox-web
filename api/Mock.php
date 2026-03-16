<?php
header('Content-Type: text/html; charset=utf-8');

function get_oem_config($type = "default") {
    return array(
        "name" => $type,
        "title" => "锐野优商加速器",
        "logo" => "/assets/images/logo.png"
    );
}

function get_server_list() {
    return array(
        array("id"=>1,"name"=>"香港-01","country"=>"HK","country_name"=>"中国香港","ip"=>"hk01.ruiye.top","is_free"=>1,"online"=>1234,"load"=>45),
        array("id"=>2,"name"=>"香港-02","country"=>"HK","country_name"=>"中国香港","ip"=>"hk02.ruiye.top","is_free"=>0,"online"=>856,"load"=>30),
        array("id"=>3,"name"=>"日本-01","country"=>"JP","country_name"=>"日本","ip"=>"jp01.ruiye.top","is_free"=>1,"online"=>2341,"load"=>67),
        array("id"=>4,"name"=>"日本-02","country"=>"JP","country_name"=>"日本","ip"=>"jp02.ruiye.top","is_free"=>0,"online"=>567,"load"=>25),
        array("id"=>5,"name"=>"韩国-01","country"=>"KR","country_name"=>"韩国","ip"=>"kr01.ruiye.top","is_free"=>1,"online"=>1890,"load"=>55),
        array("id"=>6,"name"=>"美国-01","country"=>"US","country_name"=>"美国","ip"=>"us01.ruiye.top","is_free"=>0,"online"=>3456,"load"=>78),
        array("id"=>7,"name"=>"台湾-01","country"=>"TW","country_name"=>"中国台湾","ip"=>"tw01.ruiye.top","is_free"=>1,"online"=>723,"load"=>35),
        array("id"=>8,"name"=>"新加坡-01","country"=>"SG","country_name"=>"新加坡","ip"=>"sg01.ruiye.top","is_free"=>0,"online"=>456,"load"=>20)
    );
}

function get_game_list() {
    return array(
        array("id"=>1,"name"=>"英雄联盟","category"=>"pc"),
        array("id"=>2,"name"=>"绝地求生","category"=>"pc"),
        array("id"=>3,"name"=>"Valorant","category"=>"pc"),
        array("id"=>4,"name"=>"Steam","category"=>"pc"),
        array("id"=>5,"name"=>"战网","category"=>"pc"),
        array("id"=>6,"name"=>"DNF","category"=>"pc"),
        array("id"=>7,"name"=>"CF","category"=>"pc"),
        array("id"=>8,"name"=>"永劫无间","category"=>"pc")
    );
}

function get_packages() {
    return array(
        array("id"=>1,"name"=>"日卡","price"=>2.00,"days"=>1,"description"=>"有效期1天"),
        array("id"=>2,"name"=>"周卡","price"=>10.00,"days"=>7,"description"=>"有效期7天"),
        array("id"=>3,"name"=>"月卡","price"=>30.00,"days"=>30,"description"=>"有效期30天","is_recommend"=>1),
        array("id"=>4,"name"=>"季卡","price"=>80.00,"days"=>90,"description"=>"有效期90天"),
        array("id"=>5,"name"=>"年卡","price"=>280.00,"days"=>365,"description"=>"有效期365天")
    );
}

function get_statistics() {
    return array("total_users"=>88888,"total_servers"=>8,"total_games"=>50,"total_traffic"=>1536);
}

function get_notices() {
    return array(
        array("id"=>1,"title"=>"欢迎使用锐野优商加速器","content"=>"永久免费，不玩套路！"),
        array("id"=>2,"title"=>"新增美国节点","content"=>"已新增美国-01高速节点！")
    );
}

function mock_login($username, $password) {
    if ($username && $password) {
        return array("code"=>0,"msg"=>"登录成功","data"=>array("id"=>1,"username"=>$username,"balance"=>100));
    }
    return array("code"=>1,"msg"=>"用户名或密码错误");
}

function api_response($code, $msg, $data = array()) {
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode(array("code"=>$code,"msg"=>$msg,"data"=>$data), JSON_UNESCAPED_UNICODE);
    exit;
}