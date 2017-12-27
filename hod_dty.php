<!DOCTYPE html>

<html>

<head>
 <?php
 include 'Dbfunction.php';  
$db=new Dbfunction();
session_start();
$conn=$db->dbconnect();
 extract($_REQUEST);
$sql="SELECT  `phone` FROM `faculty` WHERE `faculty_id`=$id";
$result=mysql_query($sql,$conn);
$phone=mysql_fetch_assoc($result);
$phone=$phone['phone'];
$msg="Exam Duty has been assigned on following dates ";
$sql="SELECT  `date`, `session` FROM `duty_assigned` WHERE `faculty_id`=$id AND `info_status` <> 'sucess'" ;
$result=mysql_query($sql,$conn);
$res=mysql_query($sql,$conn);
$r=mysql_fetch_assoc($res);
$date=$r['date'];
while ($row=mysql_fetch_assoc($result))
{
        $msg=$msg.$row['date']." on session-".$row['session'];
        $r=$row['date'];
        $d=$row['session'];
      echo  $sql="UPDATE `duty_assigned` SET `info_status`='sucess' WHERE `faculty_id`=$id AND`session`='$d' AND`date`='$r'";
        mysql_query($sql,$conn);
}
echo $msg;
$time=$date.' 05:15';
$url="http://easyhops.co.in/sendsch/globalelective/global777/RITMCA/".$phone."/".$msg."/".$time."/T";
header("location:$url")
?>
</head>

<body>
</body>
</html>