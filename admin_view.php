<?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';  
}
else
{
include 'style_admin.php';
include 'Dbfunction.php';
$db=new Dbfunction();
$conn=$db->dbconnect();
$sql="SELECT faculty.faculty_name,department.dept_name,duty_assigned.session,duty_assigned.date,duty_assigned.info_status FROM faculty,department,duty_assigned WHERE faculty.dep_id=department.dept_id AND faculty.faculty_id=duty_assigned.faculty_id AND faculty.dep_id=duty_assigned.dept_id ORDER BY duty_assigned.date,duty_assigned.session ASC";
$result=mysql_query($sql,$conn);
?>
<body>
<div id="wrapper">
<div style="color:#0000FF" align=center>
<table width=400 height=100 align=center>
        <tr>
                <td><b>Faculty Assigned</b></td>
        </tr>
</table>
<table>
        <tr><th>name</th><th>Date</th><th>Session</th><th>Department</th><th>Informed</th></tr>
<?php
while ($row=mysql_fetch_assoc($result))
{
    if($row['info_status']=='sucess')
    {
        $xi='<img src="images/true.png" alt="" />';
    }
    else
    {
        $xi='<img src="images/false.png" alt="" />';
    }
    //$dt=strtotime($row['date']);
    $dt=date('F d Y', strtotime($row['date']))
?>
<tr>
                <td><?php echo $row['faculty_name']; ?></td><td><?php echo $dt; ?></td><td> <?php echo $row['session']; ?> </td><td> <?php echo $row['dept_name']; ?></td><td><?php echo $xi; ?></td>
</tr>
<?php
}
?>
</table>

     </div>
</body>
<?php
}
?>