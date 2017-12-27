<?php
  session_start();
include 'Dbfunction.php';
extract($_REQUEST);
$id=$_SESSION['id'];
$d=base64_decode( urldecode( $id) );
$db = new Dbfunction();
$conn = $db -> dbconnect();
echo $sql="UPDATE `faculty` SET `faculty_name`='$name',`email`='$email',`phone`='$phone' WHERE `faculty_id`=$d";
$result=mysql_query($sql,$conn);
if ($result==1)
{
    header("location:hod_edit_faculty.php?s=1");
}
else
{
    header("location:hod_edit_faculty.php?s=2");
}
?>