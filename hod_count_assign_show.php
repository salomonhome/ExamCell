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
extract($_REQUEST);
$start=date_create($start);
$start=date_format($start,"Y/m/d");
$end=date_create($end);
$end=date_format($end,"Y/m/d");
$id=$_SESSION['id'];
$sql="SELECT COUNT(duty_assigned.faculty_id),faculty.faculty_name,duty_assigned.faculty_id FROM `duty_assigned`,faculty  WHERE duty_assigned.dept_id=$id
AND duty_assigned.faculty_id=faculty.faculty_id AND duty_assigned.date BETWEEN '$start' AND '$end' GROUP BY duty_assigned.faculty_id;";
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
        <tr><th>Name</th><th>Count</th></tr>
<?php
//$row=mysql_fetch_assoc($result);
//print_r($row);
while ($row=mysql_fetch_assoc($result))
{
?>
<tr>
                <td> <?php $fid=$row['faculty_id']; echo $row['faculty_name']; ?></td><td><strong><?php echo $row['COUNT(duty_assigned.faculty_id)']; ?></strong>
                <?php
                $sql="SELECT `date`, `session` FROM `duty_assigned` WHERE `date` BETWEEN '$start' AND '$end' and `faculty_id`=$fid";
                $res= mysql_query($sql,$conn);
                ?>
            <table>
            <th>Date</th><th>Session</th>
               <?php
               while ($rows=mysql_fetch_assoc($res))
                {
                ?>
                <tr><td><?php echo $rows['date'] ?></td><td><?php echo $rows['session'] ?></td></tr>
                <?php
                }
                ?>
        </table>
                </td>
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
