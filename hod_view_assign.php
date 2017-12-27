<?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';  
}
else
{
include 'style_hod.php';
include 'Dbfunction.php';  
$db=new Dbfunction();
$conn=$db->dbconnect();
$id=$_SESSION['id'];
$sql="SELECT  `date`, `session`, `faculty_id` FROM `duty_assigned` WHERE `dept_id`='$id' AND `date`>now() order by `date`,`session`;";
$result=mysql_query($sql,$conn);
?>
<body>
<div id="wrapper">
<div style="color:#0000FF" align=center>
<table>
        <tr>
                <th><b>Faculty Assigned</b></th>
        </tr>
</table>
<table>
        <tr><th>Date</th><th>Session</th><th>Staff Id</th><th>Faculty Name</th></tr>
<?php
while ($row=mysql_fetch_assoc($result))
{
 $rr=$row['faculty_id'];
 $sql="SELECT  `faculty_name` FROM `faculty` WHERE `faculty_id` = '$rr'";
 $res=mysql_query($sql,$conn);
 $r=mysql_fetch_assoc($res);
 $dt=date_create($row['date']);
 $date=date_format($dt,"d/M/Y");
?>
<tr>
                <td><?php echo $date; ?> <td> <?php echo $row['session']; ?> </td><td> <?php echo $row['faculty_id']; ?></td><td><?php echo $r['faculty_name']; ?></td>
</tr>
<?php
}
?>
</table>
</div>
</div>
</body>
<?php
}
?>
</html>