<?php
    session_start();
include 'Dbfunction.php';
extract($_REQUEST);
$id=base64_decode( urldecode( $d) );
$db = new Dbfunction();
$conn = $db -> dbconnect();
echo $sql="DELETE FROM faculty WHERE faculty_id=$id";
$result=mysql_query($sql,$conn);
if ($result==1)
{
        header("location:hod_delete_faculty.php?s=1");
}
else
{
        header("location:hod_delete_faculty.php?s=2");
}
?>