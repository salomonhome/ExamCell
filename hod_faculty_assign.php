<!DOCTYPE html>

<html>

<head>
</head>

<body>

<?php
session_start();
$i=0;
$ch = curl_init();
include 'Dbfunction.php';  
$db=new Dbfunction();
$conn=$db->dbconnect();
$date=$_SESSION['date'];
$date=date_create($date);
$date2=date_create($_SESSION['date']);
echo $date=date_format($date,"Y/m/d");
$depid=$_SESSION['id'];
$session=$_SESSION['session'];
extract($_REQUEST);
while(isset($faculty[$i]))
{
    $error='';
    $sql="INSERT INTO `duty_assigned`(`dept_id`, `date`, `session`, `faculty_id`,`info_status`) VALUES ($depid,'$date','$session','$faculty[$i]','unknown')";
    $result=mysql_query($sql,$conn);
    $error=mysql_error();
    if ($error==null)
    {
        $sql="UPDATE `required` SET `count`=`count`-1  WHERE `date`='$date' AND `dept_id`=$depid AND `session`='$session' ";
        $result=mysql_query($sql,$conn);
        $sql="SELECT `faculty_name`, `email`, `phone` FROM `faculty` WHERE `faculty_id`='$faculty[$i]'" ;
        $x=mysql_query($sql,$conn);
        $re=mysql_fetch_assoc($x);
        print_r($re);
        $phone=$re['phone'];
        $email=$re['email'];
        $name=$re['faculty_name'];
        echo $dt=date_format($date2,'d-M-Y') ;
        $time=$dt.' 05:15';
        $msg="Dear ".$name.", you have an Invigilation Duty on ".$dt."   ".$session.". ";
        $p=$db ->sendmail($email,$msg,$name);
        echo $p;
        if($p!='done')
        {
            $sql="UPDATE `duty_assigned` SET `info_status`='failed' WHERE `faculty_id`='$faculty[$i]' AND`session`='$session' AND`date`='$date'";
            $s=mysql_query($sql,$conn);
        }
        else
        {
           $sql="UPDATE `duty_assigned` SET `info_status`='sucess' WHERE `faculty_id`='$faculty[$i]' AND`session`='$session' AND`date`='$date'";
           $s=mysql_query($sql,$conn);
        }
        curl_setopt($ch,CURLOPT_URL, "http://easyhops.co.in/sendsch");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"uname=globalelective&pwd=global777&senderid=RITMCA&to=$phone&msg=$msg&schtime=$time&route=T");
        $buffer = curl_exec($ch);
    }
 $i=$i+1;
}
if(!$result)
{
    header("location:hod_view_req.php?id=2&e=$error");
}
else
{
    header("location:hod_view_req.php?id=1");
}
?>
</body>
</html>
