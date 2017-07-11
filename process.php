<?php
include 'database/db.php';
$sub_category = $_GET["sub"];
$category = $_GET["category"];
$sql1 = "select * from sub_cat where fsno = ".$category." and sno = ".$sub_category.";";
$cat1 = mysqli_fetch_assoc(mysqli_query($conn,$sql1));
$url = $cat1['db_cat_name'];
$url = $url.'.php';
header('Location: '.$url);
?>
