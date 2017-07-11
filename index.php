<!---
--Developed And Designed By Geetanshu Mathur and Lalit Kumar under the supervision of Gopi.C Sir.
--
--Security Support System 
--
--For Leeboy India Construction Equipment private limited.
--
--    



  /$$$$$$                        /$$                                   /$$                
 /$$__  $$                      | $$                                  | $$                
| $$  \__/  /$$$$$$   /$$$$$$  /$$$$$$    /$$$$$$  /$$$$$$$   /$$$$$$$| $$$$$$$  /$$   /$$
| $$ /$$$$ /$$__  $$ /$$__  $$|_  $$_/   |____  $$| $$__  $$ /$$_____/| $$__  $$| $$  | $$
| $$|_  $$| $$$$$$$$| $$$$$$$$  | $$      /$$$$$$$| $$  \ $$|  $$$$$$ | $$  \ $$| $$  | $$
| $$  \ $$| $$_____/| $$_____/  | $$ /$$ /$$__  $$| $$  | $$ \____  $$| $$  | $$| $$  | $$
|  $$$$$$/|  $$$$$$$|  $$$$$$$  |  $$$$/|  $$$$$$$| $$  | $$ /$$$$$$$/| $$  | $$|  $$$$$$/
 \______/  \_______/ \_______/   \___/   \_______/|__/  |__/|_______/ |__/  |__/ \______/ 




  /$$        /$$$$$$  /$$       /$$$$$$ /$$$$$$$$
| $$       /$$__  $$| $$      |_  $$_/|__  $$__/
| $$      | $$  \ $$| $$        | $$     | $$   
| $$      | $$$$$$$$| $$        | $$     | $$   
| $$      | $$__  $$| $$        | $$     | $$   
| $$      | $$  | $$| $$        | $$     | $$   
| $$$$$$$$| $$  | $$| $$$$$$$$ /$$$$$$   | $$   
|________/|__/  |__/|________/|______/   |__/   
                                                
                                                
                                                
                                                                                          
                                                                                          

--       
--
-->

<?php
include 'database/db.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Security Support System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main">
<hr>
    <h1><b><i>Security Support System</i></b></h1><hr><center>
    <?php
    $sql = "select * from mas_cat;";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) : ?>
    <a href = "redirect.php?category=<?php echo $row['sno'];?>"  >
    <button name = "<?php  echo $row['catagory']; ?>" ><?php  echo $row['catagory']; ?></button></a><br><br>
<?php 
endwhile;
    ?>
    <hr>
    <a href ="token_out.php"><button name = report width = "60px" height = "30px" color = "red">Token Out</button>
<a href ="auth.php"><button name = report width = "60px" height = "30px" color = "red">Admin Area</button></a>
<hr>
</center>

</div>
</body>
</html>