<?php

//includeing the database

include 'database/db.php';

//Takeing current date

$now = new DateTime(null, new DateTimeZone('Asia/Kolkata'));
        $curr_date =  $now->format('Y-m-d'); 
        $curr_time =  $now->format('H:i');

//Createing array for errors

$alert = array();

//On Form Submission

if(isset($_POST["submit"]))
    {
        logEvent('Form Submitting.');
        $cat = '11';
        $date = $_POST["Date"];
        $VN = $_POST["Vehicle_Number"];
        $TOV = $_POST["Type_of_Vehicle"];
        $PN = $_POST["Phone_Number"];
        $PU = $_POST["Pickup"];
        $drop = $_POST["Drop"];
        $len = strlen($PN);
        
        // Checking  the mobile number

        if($len!=10)
        {
            $msg = 'Phone Number Not Valid. ';
            logEvent($msg);
            $alert[]= $msg;
        }

        //Checking that the date or time is not less than current time

        if($curr_date>$date)
        {
            $msg = 'Date OR Time is Less than current date OR Time.';
            logEvent($msg);
            $alert[]= $msg;
        }

        //If No Errors 

        if(count($alert)==0)
        {
                logEvent('SQL Statement Parsing.');
                $sql = "insert into master(catergory,date1,Vehicle_Number,Type_Of_Vehicle,Mobile_Number,Pickup_Place,Drop_Place) values('$cat','$date','$VN','$TOV','$PN','$PU','$drop');";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                if(mysqli_query($conn,$sql))
                    {
                        $msg = 'Success..!!';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Form Session Over---');
        }
    }       
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Shift Employees Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Shift Employees Form Session Started---'); ?>
    <h1><b><i>Shift Employees Form</i></b></h1><hr>
    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    <form method = "POST" action = "shift_employees.php" autocomplete="off" >
    <table>
    <tr><td>Date:</td><td ><input type="date" name="Date" id = "Date" value = "<?php echo $curr_date; ?>"/></td></tr>
    <tr><td>Vehicle No.: </td><td> <input type="text" name="Vehicle_Number" /></td></tr>
    <tr><td>Type of Vehicle: </td><td> <input type="text" name="Type_of_Vehicle" /></td></tr>
    <tr><td>Phone Number: </td><td> <input type="text" maxlength=10 name="Phone_Number" /></td></tr>
    <tr><td>Pickup: </td><td> <input type="text" name="Pickup" /></td></tr>
    <tr><td>Drop: </td><td> <input type="text" name="Drop" /></td></tr>
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Shift Employees Form Load Complete.'); ?>

      <!--Shift Employees Form Ends--> 
      
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
