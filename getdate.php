<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$s=$_GET['s'];
$res=explode(',',$s);
$session=$res[0];
$date=$res[1];
$datetime1 = date_create($date);
$date=date_format($datetime1,"Y/m/d");
include 'Dbfunction.php';
session_start();
//connecting to database
$db = new Dbfunction();
$conn = $db -> dbconnect();
$sql="select session,date from required where session='$session' and date='$date'";
$result=mysql_query($sql,$conn);
if(mysql_num_rows($result)>=1){
echo ' <div class="alert1">
  <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>
  <strong>Alert!</strong> Date and Session Allready Assigned do you wish to modify<a href="admin_duty_edit.php?s='.$s.'">Click here</a>
</div>';
}
?>
</body>
</html>