<?php

//includeing the database

include 'database/db.php';

//Token number Entry
$sql5 = "select max(Token_Number) from master";
$result = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_assoc($result);
$Token = $row5['max(Token_Number)'];
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
        $cat = '12';
        $date = $_POST["Date"];
        $VN = $_POST["Vehicle_Number"];
        $IT = $_POST["In_Time"];
        $KM = $_POST["Kilometer"];
        $Remarks = $_POST["Remarks"];
        
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
                $Token = $Token+1;
                logEvent('SQL Statement Parsing.');
                $sql = "insert into master(catergory,date1,Vehicle_Number,In_Time,Kilometer,Remarks,Token_Number) values('$cat','$date','$VN','$IT','$KM','$Remarks','$Token');";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                if(mysqli_query($conn,$sql))
                    {
                        $msg = 'Success..!!';
                        echo '<script>alert("Your Token No is '.$Token.'");</script>';
                        $msg2 = 'Your Token Number is '.$Token;
                        logEvent($msg);
                        logEvent($msg2);
                        $alert[]= $msg;
                        $alert[]= $msg2;
                        logEvent('----Shift Vehicle Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Shift Vehicle Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Shift Vehicle Form Session Over---');
        }
    }       
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Shift Vehicle Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Shift Vehicle Form Session Started---'); ?>
    <h1><b><i>Shift Vehicle Form</i></b></h1><hr>
    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>

    <form method = "POST" action = "shift_vehicle.php" autocomplete="off" >
    <table>
    <tr><td>Date:</td><td ><input type="date" name="Date" id = "Date" value = "<?php echo $curr_date; ?>" /></td></tr>
    <tr><td>Vehicle No.: </td><td> <input type="text" name="Vehicle_Number" /></td></tr>
    <tr><td>In Time: </td><td> <input type="time" name="In_Time" value = "<?php echo $curr_time; ?>" /></td></tr>
     <tr><td>Kilometer: </td><td> <input type="number" name="Kilometer" /></td></tr>
    <tr><td>Remarks: </td><td> <input type="text" name="Remarks" /></td></tr>
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Shift Vehicle Form Load Complete.'); ?>

     <!--Shift Vehicle Form Ends--> 

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
