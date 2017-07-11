<!---
--Developed And Designed By Geetanshu Mathur and Lalit Kumar
--
--Security Support System 
--
--For Leeboy India Construction Equipment private limited.
-->

<?php
include 'database/db.php';

session_start();
if (isset($_SESSION['user'])){
}
else{
header("location:auth.php");
}
if(isset($_POST["logout"]))
{
session_start();
session_unset();
session_destroy();
header('Location: auth.php');
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Admin Area</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main">
<hr>
    <h1><b><i>Admin Area</i></b></h1><hr><center>

    <a href ="report.php"><button name = report width = "60px" height = "30px" color = "red">Generate Report</button><br><br>

	<a href ="add_contract_emp.php"><button name = report width = "60px" height = "30px" color = "red">Add Contract Based Employee</button></a><br><br>

	<a href ="add_company.php"><button name = report width = "60px" height = "30px" color = "red">Add Contract Company</button></a><br><br>

	<a href ="manage_user.php"><button name = report width = "60px" height = "30px" color = "red">Manage User Accounts</button></a><br><br>

  <hr>  <form method = "POST">
    
<button name = "logout" width = "60px" height = "30px" color = "red">Logout</button></form><hr>
</center>

</div>
</body>
</html>