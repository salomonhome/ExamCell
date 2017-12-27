<link rel="stylesheet" href="css/table_css.css" />
<?php
include 'Dbfunction.php';  
$db=new Dbfunction();
session_start();
$conn=$db->dbconnect();
$depid=$_SESSION['id'];
$sql="SELECT DISTINCT duty_assigned.`faculty_id`,COUNT(duty_assigned.faculty_id),duty_assigned.`info_status`,duty_assigned.date,duty_assigned.session,faculty.faculty_name FROM `duty_assigned`,`faculty` WHERE duty_assigned.`info_status`<> 'sucess' AND duty_assigned.`dept_id`=$depid and faculty.faculty_id=duty_assigned.faculty_id" ;
$result=mysql_query($sql,$conn);
if(mysql_num_rows($result)<1)
{
header("location:signout.php");
}
?>
<table name="request" width=400 height=100 border=true align=center>
        <tr><th>Date</th><th>Session</th><th>Faculty Name</th><th><?php echo 'Count'; ?></th><th>set</th></tr>
<?php
while ($row=mysql_fetch_assoc($result))
{

?>
   <tr>
                <td><?php echo $row['date']; ?> <td> <?php echo $row['session']; ?> </td><td> <?php echo $row['faculty_name']; ?></td><td> <?php echo $row['COUNT(duty_assigned.faculty_id)']; ?> </td><td><a href="hod_dty.php?id=<?php echo $row['faculty_id'] ?>" target="_blank">set</a></td>
    </tr>
<?php
}
?>
</table>
<div style="float: left"><a href="signout.php">signout</a></div>
