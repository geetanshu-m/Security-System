
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
        $cat = '13';
        $date = $_POST["Date"];
        $VN = $_POST["Vehicle_Number"];
        $BT = $_POST["Belongs_to"];
        $P = $_POST["Purpose"];
        $IT = $_POST["In_Time"];
        $image = $_POST["image1"];
        $image = "<img src = ".$image.">";
        $Security_Signature=$_POST["Security_Signature"];
        $DN = $_POST["Driver_Name"];
        $PN = $_POST["Mobile_Number"];
        $Remarks = $_POST["Remarks"];
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
        {       $Token = $Token+1;
                logEvent('SQL Statement Parsing.');
                $sql = "insert into master(catergory,date1,Vehicle_Number,Belongs_To,Purpose,In_Time,Signature,Security_Signature,Driver_Name,Mobile_Number,Remarks,Token_Number) values('$cat','$date','$VN','$BT','$P','$IT','$image','$Security_Signature','$DN','$PN','$Remarks','$Token');";
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
                        logEvent('----Vehicle In and Out Form Session Over---');
                    }    
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Vehicle In and Out Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Vehicle In and Out Form Session Over---');
        }
    }       
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Vehicle In and Out Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Vehicle In and Out Form Session Started---'); ?>
    <h1><b><i>Vehicle In and Out Form</i></b></h1><hr>
    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>

    <form method = "POST" action = "vehicle.php" autocomplete="off">
    <table>
    <tr><td>Date:</td><td ><input type="date" name="Date" id = "Date" value = "<?php echo $curr_date; ?>" /></td></tr>
    <tr><td>Vehicle No.: </td><td> <input type="text" name="Vehicle_Number" /></td></tr>
    <tr><td> Belongs To: </td><td> <input type="text" name="Belongs_to" /></td></tr>
    <tr><td>Purpose: </td><td> <input type="text" name="Purpose" /></td></tr>
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
        <td>Visitors Image: </td>
        <td> <input type="button" value="Take Snapshot" onClick="take_snapshot()" /></td>
        
    </tr>

    <tr><td>Security Name: </td><td> <input type="text" name="Security_Signature" /></td></tr>
    <tr><td>Driver Name: </td><td> <input type="text" name="Driver_Name" /></td></tr>
    <tr><td>Mobile No.: </td><td> <input type="text" maxlength=10 name="Mobile_Number" /></td></tr>
    <tr><td>Remarks: </td><td> <input type="text" name="Remarks" /></td></tr>
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Vehicle In and Out Form Load Complete.'); ?>

    <!--Vehicle In and Out Form Ends-->

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
