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
$sql="SELECT required.date, required.dept_id,department.dept_name,required.session,required.count,required_reserve.counts FROM `required_reserve`,required,department WHERE required.date=required_reserve.date AND required.dept_id=required_reserve.dept_id AND required.session=required_reserve.session AND required.dept_id=department.dept_id ORDER BY required.date,required.session,required.dept_id ASC";
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
        <tr><th>Date</th><th>Session</th><th>Department Name</th><th>Requested</th><th>Remaining</th></tr>
<?php
while ($row=mysql_fetch_assoc($result))
{
    //$dt=strtotime($row['date']);
    $dt=date('F d Y', strtotime($row['date']))
?>
<tr>
                <td><?php echo $dt; ?></td><td> <?php echo $row['session']; ?> </td><td> <?php echo $row['dept_name']; ?></td><td><?php echo $row['counts']; ?></td><td><?php echo $row['count']; ?></td>
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