<?php
$now = new DateTime(null, new DateTimeZone('Asia/Kolkata'));
$curr_date =  $now->format('Y-m-d'); 
$curr_time =  $now->format('H:i'); 
echo $curr_date." ".$curr_time;
?>