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

$sql1 = array();
$sql2= "select * from master order by sno desc";
$row2=mysqli_fetch_assoc(mysqli_query($conn,$sql2));
$sno2 = $row2["sno"];
$sno2++;

if(isset($_POST["submit"]))
    {
       
        logEvent('Form Submitting.');
        $rows = $_POST["rows"];
        $cat = '7';
        $date = $_POST["Date"];
        $image = $_POST["image1"];
        $image = "<img src = ".$image.">";
        $Security_Signature=$_POST["Security_Signature"];
        $Remarks = $_POST["Remarks"];
        
for($i=0;$i<=$rows;$i++)
{
    $Description = "Description".$i;
    $des = $_POST[$Description];

    $Quant = "Quantity".$i;
    $Quantity = $_POST[$Quant];

    $sql1[] = "insert into relation_master(Catergory,SerialNumber,Description,Quantity) values('$cat','$sno2','$des','$Quantity')";
}
    foreach($sql1 as $s)
{
    if(mysqli_query($conn,$s))
    {
       // echo "Success1";
    }
    else
        echo "Some Error Occured1";
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
                $sql = "insert into master(catergory,date1,Reciver_Signature,Security_Signature,Remarks) values('$cat','$date','$image','$Security_Signature','$Remarks');";
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
                        logEvent('----Milk Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Milk Form Session Over---');
        }
    }       
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Milk Form</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
    $itr=1;
    $ite=3;
    function add() {
    var table = document.getElementById("first");
    var row = table.insertRow($ite);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = '<td><textarea wrap="on" cols="30" rows="5" type="text" placeholder="Enter Description" name="Description'+$itr+'"></textarea></td>';
    cell2.innerHTML = '<input type="text" name="Quantity'+$itr+'" placeholder="Enter Quantity" /></td></tr>';
    $itr++;
    $ite++;
    document.getElementById("rows").value = $itr;
}
</script>
</head>
<body>
<div class = "main"><hr>
    <?php logEvent('----Milk Form Session Started---'); ?>
    <h1><b><i>Milk Form</i></b></h1><hr>

     <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>
    
    <form method = "POST" action = "milk.php" id="myform" autocomplete="off">
    <input type = "hidden" name = "rows" id = "rows" value = ""/>
    <table id = "first">
    <tr><td>Date:</td><td ><input type="date" name="Date" id = "Date" value = "<?php echo $curr_date; ?>" /></td></tr>
   <tr><th>Description  </th><th>Quantity</th></tr>
    <tr><td> 
    <textarea wrap="on" cols="30" rows="5" type="text" name="Description0" placeholder="Enter Description" ></textarea></td><td>
    <input type="text" name="Quantity0" placeholder="Enter Quantity" /></td></tr>
    <tr><td colspan = "2" align = "center"><input type = "button" id = "btnAddCol" onclick="add()" value = "Add New Row"/></td></tr>
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
        <td>Receiver Image: </td>
        <td> <input type="button" value="Take Snapshot" onClick="take_snapshot()" /></td>
        
    </tr>

    <tr><td>Security Name: </td><td> <input type="text" name="Security_Signature" /></td></tr>
    <tr><td>Remarks: </td><td> <input type="text" name="Remarks" /></td></tr>
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Milk Form Load Complete.'); ?>

    <!--Milk Form Ends-->

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