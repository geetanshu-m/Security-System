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

/*

$image = $_POST["image1"];
$image = "<img src = ".$image.">";

*/


//On Form Submission

if(isset($_POST["submit"]))
    {
        logEvent('Form Submitting.');
        $cat = '24';
        $shift = $_POST["Shift"];
        $date = $_POST["Date"];
        $DN = $_POST["Department_NO_Security"];
        $rank = $_POST["Rank"];
        $post = $_POST["Post"];
        $name = $_POST["Name"];
        $IT = $_POST["In_Time"];
        $image = $_POST["image1"];
        $image = "<img src = ".$image.">";
        
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
                $sql = "insert into master(catergory,Shift,date1,Department_NO_Security,Rank,Post,Name,In_Time,Signature,Token_Number) values('$cat','$shift','$date','$DN','$rank','$post','$name','$IT','$image','$Token');";
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
                        logEvent('----Security Attendance Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Security Attendance Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Security Attendance Form Session Over---');
        }
    }       
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Security Attendance Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Security Attendance Form Session Started---'); ?>
    <h1><b><i>Security Attendance Form</i></b></h1><hr>
    <!--For Showing Errors and success Message-->

    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    <form method = "POST" action = "security_attendance.php" autocomplete="off">
    <table>
    <tr><td>Shift: </td><td> <select name = "Shift">
                            <option value="Morning">Morning</option>
                            <option value="Night">Night</option>
                            </select></td></tr> 
    <tr><td>Date:</td><td ><input type="date" name="Date" id = "Date" value = "<?php echo $curr_date; ?>" /></td></tr>
    <tr><td>D. No: </td><td> <input type="Number" name="Department_NO_Security" /></td></tr> 
    <tr><td>Rank: </td><td> <input type="text" name="Rank" /></td></tr>
    <tr><td>Post: </td><td> <input type="text" name="Post" /></td></tr>
    <tr><td>Name: </td><td> <input type="text" name="Name" /></td></tr>  
    <tr><td>In Time: </td><td> <input type="Time" name="In_Time" value = "<?php echo $curr_time; ?>" /></td></tr>
    <tr>
    <?php logEvent('WebCam Video Loading'); ?>
    <!--Takeing Image from webcam-->
        <td><div id="my_camera"></div></td>
        <td><div id="results" name = "image"></div></td>
    </tr>

        <input type = "hidden" value = "" id = "image1" name = "image1"  >
    


     <script type="text/javascript" src="js/webcam.js"></script>
        <script language="JavaScript">
            Webcam.set({
                width: 150,
                height: 115,
                image_format: 'jpeg',
                jpeg_quality: 200
            });
            Webcam.attach( '#my_camera' );
        </script>
    <tr>
    <?php logEvent('Loading Success.'); ?>
        <td>Security Image: </td>
        <td> <input type="button" value="Take Snapshot" onClick="take_snapshot()" /></td>
        
    </tr>
    
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Security Attendance Form Load Complete.'); ?>

    <!--Security Attendance Form Ends-->

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