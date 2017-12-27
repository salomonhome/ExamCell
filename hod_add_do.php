<?php
extract($_REQUEST);
session_start();
include 'Dbfunction.php';  
$db=new Dbfunction();
$conn=$db->dbconnect();
$id=$_SESSION['id'];
echo $sql="INSERT INTO `faculty`(`faculty_id`, `faculty_name`, `email`, `phone`, `dep_id`) VALUES (null,'$name','$email',$phone,$id)";
$result=mysql_query($sql,$conn);
if(!$result)
{
   header('location:hod_add.php?s=2');
}
else
{
   header('location:hod_add.php?s=1');
}
?>