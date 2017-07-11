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

$alert = array();

$sql5 = "select max(sno) from sub_cat";
$result5 = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_assoc($result5);
$sno = $row5['max(sno)'];
$sno++;


if(isset($_POST["submit"]))
    {
        logEvent('Form Submitting.');
        
        $comapny = $_POST["NC"];

        if(count($alert)==0)
        {

                $sql3 = "ALTER TABLE `report` ADD `r".$sno."` INT NOT NULL DEFAULT '0'";
                logEvent($sql3);
                if(mysqli_query($conn,$sql3))
                {
                    logEvent('Coloum Successfully added to the Report table');
                }
                else
                {
                    logEvent('Some error occured in adding Coloum to the Report table');
                }

                $sql4 = array();
                $sql4[] = "UPDATE report SET r".$sno."='1' WHERE coloums='date1'";
                $sql4[] = "UPDATE report SET r".$sno."='1' WHERE coloums='In_Time'";
                $sql4[] = "UPDATE report SET r".$sno."='1' WHERE coloums='Name_Of_Contracter'";
                $sql4[] = "UPDATE report SET r".$sno."='1' WHERE coloums='Out_Time'";
                $sql4[] = "UPDATE report SET r".$sno."='1' WHERE coloums='Security_Signature'";
                $sql4[] = "UPDATE report SET r".$sno."='1' WHERE coloums='Remarks'";
                $sql4[] = "UPDATE report SET r".$sno."='1' WHERE coloums='Signature'";
                $sql4[] = "UPDATE report SET r".$sno."='1' WHERE coloums='Token_Number'";

                foreach($sql4 as $s)
                {
                    logEvent($s);
                    if(mysqli_query($conn,$s))
                    {
                        logEvent('Corresponding rows successfully added');
                    }
                    else
                    {
                        logEvent('Rows not added');
                    }
                }


                logEvent('SQL Statement Parsing.');
                $sql = "insert into sub_cat(category,sno,fsno) values('$comapny','$sno','3');";
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
	<title>Add Contract Company</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Visitor Form Session Started---'); ?>
    <h1><b><i>Add Contract Company</i></b></h1><hr>

    <!--For Showing Errors and success Message-->

    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    <!--Basic Form-->
    <form method = "POST" action = "add_company.php" autocomplete="off">
    <table>
    <tr><td>Name Of Contract Company: </td><td> <input type="text" name="NC" required/></td></tr>
    
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