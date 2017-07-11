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

$alert = array();


if(isset($_POST["submit"]))
    {
        logEvent('Form Submitting.');
        
        $comapny = $_POST["NC"];
        $name = $_POST["NE"];

        if(count($alert)==0)
        {

                logEvent('SQL Statement Parsing.');
                $sql = "insert into contract_emp(category,name) values('$comapny','$name');";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                if(mysqli_query($conn,$sql))
                    {
                        $msg = 'Employee Successfully Added .. !!';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Add Contract Employee Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Add Contract Employee Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Add Contract Employee Form Session Over---');
        }
    }       
?>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Add Contract Employees</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Visitor Form Session Started---'); ?>
    <h1><b><i>Add Contract Employees</i></b></h1><hr>

    <!--For Showing Errors and success Message-->

    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    <!--Basic Form-->
    <form method = "POST" action = "add_contract_emp.php" autocomplete="off">
    <table> 
    <tr><td>Name Of Company: </td><td> <select name = "NC">
            <?php
                $sql = "select * from sub_cat where fsno = 3;";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) :
            ?>
             <option value = "<?php echo $row['sno']; ?>" ><?php echo $row['category']; ?></option>
             <?php 
                endwhile;
            ?>
    </select></td></tr> 
    <tr><td>Name Of Employee: </td><td> <input type="text" name="NE" required/></td></tr>
    
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset" /><td><a href = "admin.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Form Load Complete.'); ?>

    
</div>
</body>
</html>   

<?php

//Function to record all the activities in the Program

function logEvent($message) {
    if ($message != '') {

        $now = new DateTime(null, new DateTimeZone('Asia/Kolkata'));
        $curr_date =  $now->format('Y-m-d'); 
        $curr_time =  $now->format('H:i:s');

        $message = $curr_date.' '.$curr_time.' : '.$message;
        $fp = fopen('Logs/log.txt', 'a');
        fwrite($fp, $message."\n");
        fclose($fp);
    }
}

?>