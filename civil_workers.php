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
        $cat = '18';
        $date = $_POST["Date"];
        $D = $_POST["Department"];
        $BN = $_POST["Badge_No"];
        $Add = $_POST["From_Address"];
        $name = $_POST["Name"];
        $IT = $_POST["In_Time"];
        $image = $_POST["image1"];
        $image = "<img src = ".$image.">";
        $Security_Signature=$_POST["Security_Signature"];
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
                $sql = "insert into master(catergory,date1,Department,Badge_No,From_Address,Name,In_Time,Signature,Security_Signature,Remarks,Token_Number) values('$cat','$date','$D','$BN','$Add','$name','$IT','$image','$Security_Signature','$Remarks','$Token');";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                if(mysqli_query($conn,$sql))
                    {$msg = 'Success..!!';
                        echo '<script>alert("Your Token No is '.$Token.'");</script>';
                        $msg2 = 'Your Token Number is '.$Token;
                        logEvent($msg);
                        logEvent($msg2);
                        $alert[]= $msg;
                        $alert[]= $msg2;
                        logEvent('----Civil Workers Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Civil Workers Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Civil Workers Form Session Over---');
        }
    }       
?>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Civil Worker Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Civil Workers Form Session Started---'); ?>
    <h1><b><i>Civil Worker Form</i></b></h1><hr>


    <!--For Showing Errors and success Message-->

    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    <!--Basic Form-->
    <form method = "POST" action = "civil_workers.php" autocomplete="off" >
    <table>
    <tr><td>Date:</td><td ><input type="date" name="Date" id = "Date" value = "<?php echo $curr_date; ?>" /></td></tr>
    <tr><td>Department: </td><td> <input type="text" name="Department" /></td></tr> 
    <tr><td>Badge No.: </td><td> <input type="text" name="Badge_Number" /></td></tr> 
    <tr><td>From Address: </td><td> <input type="text" name="From_Address" /></td></tr>
    <tr><td>Name: </td><td> <input type="text" name="Name" /></td></tr>  
    <tr><td>In Time: </td><td> <input type="Time" name="In_Time"  value = "<?php echo $curr_time; ?>" /></td></tr>

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
        <td>Civil Worker Image: </td>
        <td> <input type="button" value="Take Snapshot" onClick="take_snapshot()" /></td>
        
    </tr>

    <!--Till Here-->
   
    <tr><td>Security Name: </td><td> <input type="text" name="Security_Signature" /></td></tr>
    <tr><td>Remarks: </td><td> <input type="text" name="Remarks" /></td></tr>
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
   <?php logEvent('Civil Workers Form Load Complete.'); ?>

    <!--Civil Workers Form Ends-->

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
