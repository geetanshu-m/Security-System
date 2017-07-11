<?php

//includeing the database

include 'database/db.php';
error_reporting(0);
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
        $user = $_POST["username"];
        $pass = $_POST["password"];

        //If No Errors 

        if(count($alert)==0)
        {
                logEvent('SQL Statement Parsing.');
                $sql = "select * from auth where username = '".$user."' and password = '".$pass."';";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                $row = mysqli_num_rows(mysqli_query($conn,$sql));
                if($row>0)
                    {
                        session_start();
                        $_SESSION['user'] = $user;
                        header('Location: admin.php');
                        $msg = 'Success..!!';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Visitor Form Session Over---');
                    }
                else{
                        $msg = 'No User Found';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Visitor Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Error';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Auth Form Session Over---');
        }
    }       
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Authentication</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Visitor Form Session Started---'); ?>
    <h1><b><i>Authentication</i></b></h1><hr>

    <!--For Showing Errors and success Message-->

    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    <!--Basic Form-->
    <form method = "POST" action = "auth.php" autocomplete="off">
    <table>

    <tr><td>Username </td><td> <input type="text" name="username" required/></td></tr>

    <tr><td>Password </td><td> <input type="Password" name="password" /></td></tr>

    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit" value = "Login"/></td><td><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
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
