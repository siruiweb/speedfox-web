<?php
// 首页头部 - 直接包含数据库查询
$debug = time();
require_once("api/System.php");
$product = $_GET["product"] ?? '';
$productdata = mysqli_query($conn, "select * from fa_ruyi_oem where name = '" . mysqli_real_escape_string($conn, $product) . "'");
$productdata = mysqli_fetch_assoc($productdata);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="referrer" content="never">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>主页</title>
  <link href="static/layui/css/layui.css" rel="stylesheet">
  <link href="static/css/color_map.css?V1.0" rel="stylesheet">
  <link href="static/css/style.css?<?php echo $debug;?>" rel="stylesheet">
</head>
