<?php
include 'database/db.php';
error_reporting(0);

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
    <style>
        .main{
    padding : 0px 40px 0px 40px;
    margin: auto;
    width: 1700px;
    border: 3px solid #73AD21;
    font-size: 20px;
}
input{
    border-radius: 10px;
    width :200px;
    height : 30px;
    padding-bottom: 5px;
    font-size: 15px;
}
table{
        border-style: dotted;
        font-size: 15px;
        padding : 10px 20px 10px 20px;
        width : 100% ;
        border-radius: 5px;
        overflow: auto;
}
th{
        border-style: inset;
        border-radius: 5px;
        width :100px;
        height : 40px;
}
td {
    border: 1px solid black;
    text-align: top;
    width :100px;
    height : 125px;
    border-radius: 10px;
    overflow : auto;
    padding : 2px 2px 2px 2px ;
}

body{
    background-color: lightgrey; 
}
button{
    border-radius: 10px;
    width :200px;
    height : 30px;
}

select{
    border-radius: 10px;
    width : 400px ;
    height: 30px;
    font-size: 17px ;
    font-style: italic;
}
.error{
    font-size: 15px;
}
    </style>
	<title>Security Support System</title>
</head>
<body>
<div class = "main">
<hr>
    <h1><b><i>Report Generation</i></b></h1><center>
    <hr>
    <!---a href ="report.php"><button name = report width = "60px" height = "30px" color = "red">Generate Report</button></a-->

    <form>

    <select name  = "main_cat" >
        <?php 
                $sql = "select * from sub_cat;";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) :
        ?>
    
        <option  name = "<?php echo $row['sno']; ?>" value = "<?php echo $row['sno']; ?>" ><?php echo $row['category']; ?></option>       

    
    <?php 
        endwhile;
    ?></select>
    <br>
    <br>
    <input type = "submit" name = "submit"/><a href = "admin.php"><input type = "button" width = "60px" height = "30px" value = "Back"></button></a>
    </form>
<?php
if(isset($_GET["main_cat"]))
{
    $sno_this = 1;
    $cat = $_GET["main_cat"];
    $cats = array();
    echo "<table>";
        if($cat==1||$cat==2||$cat==3||$cat==4||$cat==7)
        {
                
                echo "<th>SNo.</th>";
                $sql = "select coloums from report where r".$cat." = 1 ;";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) :
                    foreach($row as $r)
                    {
                        echo "<th>$r</th>";
                        $cats[] =  $r; 
                    }  
                endwhile; 
                    echo "<th>Description</th>";
                    echo "<th>Quantity</th>";





                    $final = implode(",",$cats);

                $sql2 = "select sno,".$final." from master where catergory = ".$cat."; " ;
                            //echo $sql2;
                $result2 = mysqli_query($conn,$sql2);
        
                while($row1 = mysqli_fetch_assoc($result2)) :
                    echo "<tr>";
                  //  echo "<td>".$sno_this."</td>";

                    foreach($row1 as $r)
                    {

                        echo "<td>$r</td>";
                    } 

                        $sql3 = 'select Description from relation_master where catergory = '.$cat.' and SerialNumber = '.$row1['sno'].';';
                        $result3 = mysqli_query($conn,$sql3);

                       /* $sql4 = "select sno from master where catergory = ".$cat."; " ;
                        $result4 = mysqli_query($conn,$sql4);
                        $row5=mysqli_fetch_assoc($result4);
                        echo "<td>".$row5["sno"]."</td>";*/
  
                        echo "<td>";
                        while($row4 = mysqli_fetch_assoc($result3)) :
                            foreach($row4 as $a)
                            {
                                echo $a."<br><hr>";
                            }
                        endwhile;
                        echo "</td>";


                        $sql3 = 'select Quantity from relation_master where catergory = '.$cat.' and SerialNumber = '.$row1['sno'].';';
                        $result3 = mysqli_query($conn,$sql3);

                        echo "<td>";
                        while($row4 = mysqli_fetch_assoc($result3)) :
                            foreach($row4 as $a)
                            {
                                echo $a."<br><hr>";
                            }
                        endwhile;                   
                        echo "</td>";

                        $sno_this++; 
                        echo "</tr>";        
                 endwhile; 
 

        }
        else
        {
            $sql = "select coloums from report where r".$cat." = 1 ;";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) :
                    foreach($row as $r)
                    {
                        echo "<th>$r</th>";
                        $cats[] =  $r; 
                    }                   
                endwhile;
                $final = implode(",",$cats);


                $sql2 = "select ".$final." from master where catergory = ".$cat."; " ;

                           // echo $sql2;

                $result2 = mysqli_query($conn,$sql2);
        
                while($row1 = mysqli_fetch_assoc($result2)) :
                    echo "<tr>";
                    foreach($row1 as $r)
                    {

                        echo "<td>$r</td>";
                    }     
                    echo "</tr>";              
                 endwhile; 
        }

    echo "</table>";
}?>
   <!-- <table>
    <th>Sno</th><th>Category</th><th>Name</th><th>Date</th><th>From Address</th><th>Whom To Meet</th><th>Purpose</th><th>Mobile Number</th><th>In Time</th><th>Out Time</th><th>Image</th><th>Security Name</th><th>Remarks</th>
    <?php
    /*$sql = "select * from master;";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?php echo $row['sno']; ?></td>
        <td><?php echo $row['catergory']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['date1']; ?></td>
        <td><?php echo $row['From_Address']; ?></td>
        <td><?php echo $row['Whom_To_Meet']; ?></td>
        <td><?php echo $row['Purpose']; ?></td>
        <td><?php echo $row['Mobile_Number']; ?></td>
        <td><?php echo $row['In_Time']; ?></td>
        <td><?php echo $row['Out_Time']; ?></td>
        <td><?php echo "<img src = ".$row['Signature'].">"; ?></td>
        <td><?php echo $row['Security_Signature']; ?></td>
        <td><?php echo $row['Remarks']; ?></td>
   </tr>
    <?php 
        endwhile;
    */?>-->
<br>
</center></div>

</body>
</html>
