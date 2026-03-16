<?php
$api_url = "http://global.ruiye.top/api";

// 服务器列表
$server_json = @file_get_contents($api_url . "/data.php?action=server_list");
$server_data = json_decode($server_json, true);
$servers = $server_data["data"] ?? array();

// 游戏列表
$game_json = @file_get_contents($api_url . "/data.php?action=game_list");
$game_data = json_decode($game_json, true);
$games = $game_data["data"] ?? array();

// 套餐列表
$package_json = @file_get_contents($api_url . "/data.php?action=package_list");
$package_data = json_decode($package_json, true);
$packages = $package_data["data"] ?? array();

$productdata = array("name"=>"default","title"=>"锐野优商加速器","logo"=>"/assets/images/logo.png");
$stats = array("users"=>"88888","servers"=>count($servers),"games"=>count($games),"traffic"=>"1536TB");
?>
