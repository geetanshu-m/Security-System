<?php
include 'database/db.php';
$category = $_GET["category"];
$sql1 = "select * from mas_cat where sno = ".$category.";";
$cat1 = mysqli_fetch_assoc(mysqli_query($conn,$sql1));
?>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title><?php echo $cat1['catagory']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <h1><b><i><?php echo $cat1['catagory']; ?></i></b></h1><hr><center>
    <?php
    if($category==3)
    {
        ?>
        <form method = "GET" action = "contractor.php">
        <select name  = "sno_contractor">
              <?php
                $sql = "select * from sub_cat where fsno = 3;";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) :
        ?>
     <option value = "<?php echo $row['sno']; ?>" ><?php echo $row['category']; ?></option>
    <?php 
        endwhile;
    ?>
    <input type = "submit" name = "submit"/>
    </select> 
     </form>  
<?php
    }
   

    else
    {
    $sql = "select * from sub_cat where fsno = ".$category.";";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) : ?>
    <a href = "process.php?category=<?php echo $category;?>&sub=<?php echo $row['sno'];?>"  >
    <button name = "<?php  echo $row['db_cat_name']; ?>" ><?php  echo $row['category']; ?></button></a><br><br>
<?php 
endwhile;
   } 
?><hr>
<a href = "index.php"  >
    <button name = "back" >Back</button></a><hr>
</center></div>
</body>
</html>  