<?php

//includeing the database

include 'database/db.php';
$t = time();
//Takeing current date

$now = new DateTime(null, new DateTimeZone('Asia/Kolkata'));
        $curr_date =  $now->format('Y-m-d'); 
        $curr_time =  $now->format('H:i');

//Createing array for errors

$alert = array();

//On Form Submission
if(isset($_POST["submit"]))
    {
        $th = $_POST["session1"];
        if (($t-$th)>30) {
            $msg = "Session Was Expired Please Enter Token again.";
            logEvent($msg);
            $alert[]= $msg;
        }
        else{
        logEvent('Form Submitting.');
        $token = $_POST["Token_Number"];
        $OT = $_POST["Out_Time"];

        $sql2 = "select * from master where Token_Number = ".$token." and IS_in = 1;";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_num_rows($result2);
        logEvent($sql2);
        $row5 = mysqli_fetch_assoc($result2);

        if($row2==0)
        {
                        $msg = $row5['Name']." Out Time Already Entered Or this token does't Exist";
                        logEvent($msg);
                        $alert[]= $msg;
        }
        else if(1)
        {
                logEvent('SQL Statement Parsing.');
                $sql = "update master set IS_in = 0 , Out_Time = '".$OT."' where Token_Number = ".$token.";";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                if(mysqli_query($conn,$sql))
                    {
                        $msg = $row5['Name'].' Out Time Successfully Entered!!';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Token Out Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Token Out Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Token Out Form Session Over---');
        }
    } }      
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Out Time</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Token Out Form Session Started---'); ?>
    <h1><b><i>Token Out Form</i></b></h1><hr>

    <!--For Showing Errors and success Message-->

    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    <!--Basic Form-->
    <form method = "POST" action = "token_out.php" autocomplete="off">
    <table>
<input type="hidden" name="session1" value = "<?php echo $t; ?>"/>
    <tr><td>Enter Token Number : </td><td> <input type="text" name="Token_Number" required/></td></tr>

    <tr><td>Out Time: </td><td> <input type="Time" name="Out_Time" value = "<?php echo $curr_time; ?>" /></td></tr>

    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset" /><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Form Load Complete.'); ?>

    <!--Form Ends-->

    <!--JS Code for forwarding the image and saveing it to folder-->

    <script language="JavaScript">
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                Webcam.upload( data_uri, 'saveimage.php' , function(code, text) {
                    document.getElementById('results').innerHTML = 
                    '<img src="'+text+'"/>';
                    var url = text;
                    document.getElementById("image1").value = url;
                } );    
            } );
        }
    </script>
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
