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
//conecting for Description and Quantity

$sql1 = array();
$sql2= "select * from master order by sno desc";
$row2=mysqli_fetch_assoc(mysqli_query($conn,$sql2));
$sno2 = $row2["sno"];
$sno2++;

if(isset($_POST["submit"]))
    {
        logEvent('Form Submitting.');
        $cat = '2';
        $rows = $_POST["rows"];
        $date = $_POST["Date_Of_Dispatch"];
        $VN = $_POST["Vehicle_Number"];
        $IT = $_POST["In_Time"];
        $INV = $_POST["SDV_INV_No_and_Date"];
        $Consigner = $_POST["Consigner_Name_and_Address"];
        $GDD = $_POST["Goods_Dispatch_Department"];
        $image = $_POST["image1"];
        $image = "<img src = ".$image.">";
        $Security_Signature=$_POST["Security_Signature"];
        $Remarks = $_POST["Remarks"];

        for($i=0;$i<$rows;$i++)
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
        echo "Success1";
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
                $Token = $Token+1;
                logEvent('SQL Statement Parsing.');
                $sql = "insert into master(catergory,Date_Of_Dispatch,Vehicle_Number,In_Time,SDV_INV_No_and_Date,Consigner_Name_and_Address,Goods_Dispatch_Department,Reciver_Signature,Security_Signature,Remarks,Token_Number) values('$cat','$date','$VN','$IT','$INV','$Consigner','$GDD','$image','$Security_Signature','$Remarks','$Token');";
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
                        logEvent('----Material Outward Returnable Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Material Outward Returnable Form Session Over---');
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
    <title>Material Outward Returnable Form</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
    $itr=1;
    $ite=7;
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
     <?php logEvent('----Material Outward Returnable Form Session Started---'); ?>
     <h1><b><i>Material Outward Returnable Form</i></b></h1>

     <div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
    <?php logEvent('Form Loading'); ?>

    <form method = "POST" action = "material_outward_r.php" id="myform" autocomplete="off" >
    <input type = "hidden" name = "rows" id = "rows" value = ""/>
    <table id = "first">
    <tr><td>Date of Dispatch:</td><td ><input type="date" name="Date_Of_Dispatch" id = "Date" value = "<?php echo $curr_date; ?>" /></td></tr>
    <tr><td>Vehicle No.: </td><td> <input type="text" name="Vehicle_Number" /></td></tr>
    <tr><td>In Time: </td><td> <input type="Time" name="In_Time" value = "<?php echo $curr_time; ?>" /></td></tr>
    <tr><td>SDV / INV NO and Date: </td><td> <input type="text" name="SDV_INV_No_and_Date" /></td></tr>
    <tr><td>Consignor Name and Address: </td><td> <input type="text" name="Consigner_Name_and_Address" /></td></tr>
    <tr><th>Description  </th><th>Quantity</th></tr>
    <tr><td> 
    <textarea wrap="on" cols="30" rows="5" type="text" name="Description0" placeholder="Enter Description" ></textarea></td><td>
    <input type="text" name="Quantity0" placeholder="Enter Quantity" /></td></tr>
    <tr><td colspan = "2" align = "center"><input type = "button" id = "btnAddCol" onclick="add()" value = "Add New Row"/></td></tr>

    <tr><td>Goods Dispatch Department: </td><td> <input type="text" name="Goods_Dispatch_Department" /></td></tr>
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
        <td>Goods Receiver Image: </td>
        <td> <input type="button" value="Take Snapshot" onClick="take_snapshot()" /></td>
        
    </tr>

    <tr><td>Security Name: </td><td> <input type="text" name="Security_Signature" /></td></tr>
    <tr><td>Remarks: </td><td> <input type="text" name="Remarks" /></td></tr>
    </table>
    <table border-style = "none">
    <tr><td align = "center"><input type = "submit" name ="submit"/></td><td><input type = "reset" name = "reset"/><td><a href = "index.php"><input type = "button" name = "back" value = "Back"/></a></td></tr>
    </table>
    </form>
    <?php logEvent('Material Outward Returnable Form Load Complete.'); ?>

     <!--Material Outward Returnable Form Ends-->

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
