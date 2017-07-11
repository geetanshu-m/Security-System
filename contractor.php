<?php
//includeing the database

include 'database/db.php';

$sql5 = "select max(Token_Number) from master";
$result = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_assoc($result);
$Token = $row5['max(Token_Number)'];

$category = $_GET["sno_contractor"];
$sql1 = "select * from contract_emp where category = ".$category.";";
$cat1 = mysqli_fetch_assoc(mysqli_query($conn,$sql1));


$sql2 = "select category from sub_cat where sno = ".$category.";";
$cat2 = mysqli_fetch_assoc(mysqli_query($conn,$sql2));
$title = $cat2["category"];


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
        $date = $_POST["Date"];
        $name = $_POST["Name_Of_Contracter"];
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
                $sql = "insert into master(catergory,date1,Name_Of_Contracter,In_Time,Signature,Security_Signature,Remarks,Token_Number) values('$category','$date','$name','$IT','$image','$Security_Signature','$Remarks','$Token');";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                if(mysqli_query($conn,$sql))
                    {
                        $msg = 'Success..!!';
                        echo '<script>alert("Your Token No is '.$Token.'");</script>';
                        $msg2 = 'Your Token Number is '.$Token;
                        logEvent($msg);
                        $alert[]= $msg;
                        $alert[]= $msg2;
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
	<title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Form Session Started---'); ?>
    <h1><b><i><?php echo $title; ?></i></b></h1><hr>

    <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    
    <form method = "POST" action = "<?php echo 'contractor.php?sno_contractor='.$category.'&submit=Submit'; ?>"  autocomplete="off" >
    <table>
    <tr><td>Date:</td><td ><input type="date" name="Date" value = "<?php echo $curr_date; ?>"/></td></tr>
    <tr><td>Name Of Employee: </td>
    <td>
    <select name  = "Name_Of_Contracter" >
        <?php 
                $sql = "select * from contract_emp where category = ".$category.";";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) :
        ?>
    
        <option value = "<?php echo $row['name']; ?>" ><?php echo $row['name']; ?></option>       

    
    <?php 
        endwhile;
    ?></select>

    </td>
    </tr>
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
        <td>Visitors Image: </td>
        <td> <input type="button" value="Take Snapshot" onClick="take_snapshot()" /></td>
        
    </tr>
    <tr><td>Security Name: </td><td> <input type="text" name="Security_Signature" /></td></tr>
    <tr><td>Remarks: </td><td> <input type="text" name="Remarks" /></td></tr>
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
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
