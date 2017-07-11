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
        $cat = '23';
        $date = $_POST["Date"];
        $T = $_POST["Time"];
        $D = $_POST["Description"];
        $QS = $_POST["Quantity_Stock"];
        $QA = $_POST["Quantity_Available"];
        $image = $_POST["image1"];
        $image = "<img src = ".$image.">";
        $images = $_POST["image2"];
        $images = "<img src = ".$images.">";
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
                logEvent('SQL Statement Parsing.');
                $sql = "insert into master(catergory,date1,Time,Description,Quantity_Stock,Quantity_Available,HandingOver_Signature,TakeingOver_Signature,Security_Signature,Remarks) values('$cat','$date','$T','$D','$QS','$QA','$images','$image','$Security_Signature','$Remarks');";
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
	<title>Handing over and Taken over Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Handing over and Taken over Form Session Started---'); ?>
    <h1><b><i>Handing over and Taken over Form</i></b></h1><hr>

    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    <form method = "POST" action = "handing_over_&_taking_over.php" autocomplete="off">
    <table>
    <tr><td>Date:</td><td ><input type="date" name="Date" id = "Date" value = "<?php echo $curr_date; ?>" /></td></tr>
    <tr><td>Time: </td><td> <input type="Time" name="Time" value = "<?php echo $curr_time; ?>" /></td></tr> 
    <tr><td>Description: </td><td> <textarea wrap = "on" type="text" name="Description" /></textarea></td></tr> 
    <tr><td>Quantity Stock: </td><td> <input type="text" name="Quantity_Stock" /></td></tr>
    <tr><td>Quantity Available: </td><td> <input type="text" name="Quantity_Available" /></td></tr>  
    <tr>
    <?php logEvent('WebCam Video Loading'); ?>
    <!--Takeing Image from webcam-->
        <td><div id="my_camera"></div></td>
        <td><div id="results"></div></td>
    </tr>

        <input type = "hidden" value = "" id = "image1" name = "image1" >
    


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
        <td>Handing Over Image : </td>
        <td> <input type="button" value="Take Snapshot" onClick="take_snapshot()" /></td>
        
    </tr>

    <tr>
    <?php logEvent('WebCam Video Loading'); ?>
    <!--Takeing Image from webcam-->
        <td><div id="my_camera1"></div></td>
        <td><div id="results1"></div></td>
    </tr>

        <input type = "hidden" value = "" id = "image2" name = "image2"  >
    


     <script type="text/javascript" src="js/webcam.js"></script>
        <script language="JavaScript">
            Webcam.set({
                width: 150,
                height: 115,
                image_format: 'jpeg',
                jpeg_quality: 200
            });
            Webcam.attach( '#my_camera1' );
        </script>
    <tr>
    <?php logEvent('Loading Success.'); ?>
        <td>Takeing Over Image: </td>
        <td> <input type="button" value="Take Snapshot" onClick="take_snapshot1()" /></td>
        
    </tr>

    <tr><td>Security Name: </td><td> <input type="text" name="Security_Signature" /></td></tr>
    <tr><td>Remarks: </td><td> <input type="text" name="Remarks" /></td></tr>
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Handing over and Taken over Form Load Complete.'); ?>

    <!--Handing over and Taken over Form Ends-->

    <!--JS Code for forwarding the image and saveing it to folder-->

    <script language="JavaScript">
        function take_snapshot1() {
            Webcam.snap( function(data_uri) {
                Webcam.upload( data_uri, 'saveimage.php' , function(code, text) {
                    document.getElementById('results1').innerHTML = 
                    '<img src="'+text+'"/>';
                    var url = text;
                    document.getElementById("image1").value = url;


                } );    
            } );
        }
    </script>

     <?php logEvent('Handing over and Taken over Form Load Complete.'); ?>

    <!--Handing over and Taken over Form Ends-->

    <!--JS Code for forwarding the image and saveing it to folder-->

    <script language="JavaScript">
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                Webcam.upload( data_uri, 'saveimage.php' , function(code, text) {
                    document.getElementById('results').innerHTML = 
                    '<img src="'+text+'"/>';
                    var url = text;
                    document.getElementById("image2").value = url;


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