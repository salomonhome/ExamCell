<?php
include 'Dbfunction.php';

session_start();

//connecting to database
$db = new Dbfunction();
$conn = $db -> dbconnect();
//echo $conn;

$username = $_POST['username'];
$password = $_POST['password'];
if(($username=='Admin@admin.com')&&($password=='KingsAlive'))
{
header("location:admin.php");
}
$res = $db -> loginverify($username, $password,$conn);
if($res==0){
	header("location:signin.php");
}
else if($res['type']=='admin')
{
    $_SESSION['id']=1;
    header("location:admin.php");
}
else if($res['type']=='hod')
{
    $sql="SELECT `dept_id` FROM `login` WHERE `username`='$username'";
    $result=mysql_query($sql,$conn);
    $output=mysql_fetch_assoc($result);
    echo $output['dept_id'];
    $_SESSION['id']=$output['dept_id'];
    header("location:hod.php");
}
?>
