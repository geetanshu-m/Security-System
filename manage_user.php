<?php
include 'database/db.php';

session_start();
if (isset($_SESSION['user'])){
}
else{
header("location:auth.php");
}

$alert = array();

if(isset($_POST["submit_1"]))
    {
        logEvent('Form Submitting.');
        $user = $_POST["user"];
        $pass = $_POST["password"];

        if(1)
        {
                logEvent('SQL Statement Parsing.');
                $sql = "insert into auth(username,password) values('$user','$pass');";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                if(mysqli_query($conn,$sql))
                    {
                        $msg = 'Success..!!';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Adding User Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Adding User Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'Entry Was Not Successfull..!!';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Adding User Form Session Over---');
        }
    }  
else if(isset($_POST["submit_2"]))
    {
        logEvent('Form Submitting.');
        $user = $_POST["user"];
        $pass = $_POST["password"];
        $sql5 = "select * from auth where username = '".$user."';";
        $result5 = mysqli_query($conn,$sql5);  
        logEvent($sql5);
        if(mysqli_num_rows($result5)!=0)
        {
                logEvent('SQL Statement Parsing.');
                $sql = "update auth set password = '".$pass."' where username = '".$user."';";
                logEvent('Statement Parsing Done.');
                logEvent($sql);
                if(mysqli_query($conn,$sql))
                    {
                        $msg = 'Success..!!';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Adding User Form Session Over---');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Adding User Form Session Over---');
                    }
        }

        //If Errors

        else{
                $msg = 'No Such user Exist..';
                logEvent($msg);
                $alert[]= $msg;
                logEvent('----Adding User Form Session Over---');
        }
    } 
else if(isset($_GET['del_id'])){
        $del_sql = "DELETE  FROM auth WHERE sno='$_GET[del_id]'";
        if(mysqli_query($conn,$del_sql))
                    {
                        $msg = 'Success..!!';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Adding User Form Session Over---');
                        header('Location:manage_user.php?member=Delete+User');
                    }
                else{
                        $msg = 'SQL Insertion Error.';
                        logEvent($msg);
                        $alert[]= $msg;
                        logEvent('----Adding User Form Session Over---');
                    }
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    input{
    border-radius: 10px;
    width :200px;
    height : 30px;
    padding-bottom: 5px;
    font-size: 15px;
}
    </style>
</head>
<body>
<div class = "main"><hr>
<?php 
if(isset($_GET["member"]))
{
    $id = $_GET["member"];
    if($id=="Add User")
    {
        logEvent('----Adding User Form Session Started---');
        echo
    '
    <h1><b><i>Add New User</i></b></h1><hr><center>
        <form method = "POST" action = "manage_user.php" autocomplete="off">
    <table>
    <tr><td>UserName: </td><td> <input type="text" name="user" required/></td></tr>
    <tr><td>Password: </td><td> <input type="text" name="password" required/></td></tr>
    <tr><td align = "center"><input type = "submit" name ="submit_1"/></td>
    </form>
    </table>
    </center>

      ';
    }
    else if($id=="Change Password")
    {
        echo
    '
    <h1><b><i>Change Password</i></b></h1><hr><center>
        <form method = "POST" action = "manage_user.php" autocomplete="off">
    <table>
    <tr><td>UserName: </td><td> <input type="text" name="user" required/></td></tr>
    <tr><td>New Password: </td><td> <input type="text" name="password" required/></td></tr>
    <tr><td align = "center"><input type = "submit" name ="submit_2"/></td>
    </form>
    </table>
    </center>

    ';
    }
    else if($id=="Delete User")
    {
        echo
    '<h1><b><i>Delete User</i></b></h1><hr><center>';
    $sql = "SELECT * FROM auth";
    $run_sql = mysqli_query($conn,$sql);
    echo "<table border = 'dotted'><tr><th>UserName</th><th>Password</th><th>Action</th></tr>";

            while($rows = mysqli_fetch_array($run_sql)){   
                echo '
                    <tR>
                        <td>'.$rows['username'].'</td>
                        <td>'.$rows['password'].'</td>
                        <td><a href="manage_user.php?del_id='.$rows['sno'].'"><button width = "100px">Delete</button></a></td>
                    </tr>
                ';
            }   
            echo "</table>";
    }
}
else 
    echo
    '
    <h1><b><i>Member area</i></b></h1><hr><center>
        <form method = "GET" action = "manage_user.php">
    <input type = "submit" name = "member" value = "Add User"><br><br>   
    <input type = "submit" name = "member" value = "Change Password"> <br><br> 
    <input type = "submit" name = "member" value = "Delete User"><br><br> 
     </form>  ';
     ?>
<hr>
<center>
<div class = "error" padding-bottom = "5px"><?php foreach($alert as $a) {echo "--> ".$a."<br>";}?></div>
<a href = "admin.php"  >
    <button name = "back" >Back</button></a><hr>
</center></div>
</body>
</html>  
<?php
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