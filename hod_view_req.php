<?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';  
}
else
{
@$s=$_REQUEST['id'];
@$e=$_REQUEST['e'];

include 'style_hod.php';
include 'Dbfunction.php';  
$db=new Dbfunction();
$conn=$db->dbconnect();
$id=$_SESSION['id'];
$sql="SELECT `date`, `dept_id`,session, `count` FROM `required` WHERE `dept_id`='$id' AND `date`>now() AND `count`>0";
$result=mysql_query($sql,$conn);
?>
<head>
    <link rel="stylesheet" href="css/alertify.css" />
    <link rel="stylesheet" href="css/default.css" />
    <script type="text/javascript" src="js/alertify.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
<style>
.alert {
    padding: 20px;
    background-color: #009933;
    color: white;
}
.alert1 {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
</head>
<body>
<div style="width: 1365px;height:380px;background:#e6ecff;" >
<?php
if(@$s==1)
{
?>
  <script>
    alertify.alert("Faculty Assignment Completed sucessfully.");
    </script>
<?php
}
else if(@$s==2)
{
?>
        <script>
        alertify.alert("Faculty Assignment Failed.");
        </script>
<?php
}
else if(isset($e))
{
?>
 <script>
        alertify.alert("Faculty Assignment Failed,Same faculty cannot be assigned on same day with same duty.");
 </script>
<?php
}
?>

<div style="color:#0000FF;min-height:400px;" align=center>
<?php
if (mysql_num_rows($result)<1)
{
?>
    <h1>No pending requests..............!</h1>
<?php
}
else
{
?>
<table>
    <tr>
        <th><b>Faculty Needed</b></th>
    </tr>
</table>
<table name="request">
    <tr><th>Date</th><th>Session</th><th>Count</th><th>Link</th></tr>
<?php
    while ($row=mysql_fetch_assoc($result))
    {
?>
<tr>
    <?php
    $date=urlencode( base64_encode( $row['date'] ) );
    $session=urlencode( base64_encode( $row['session'] ) );
    $c=urlencode( base64_encode( $row['count'] ) );

    ?>
        <td><?php echo date('F d Y', strtotime($row['date']));?> <td> <?php echo $row['session']; ?> </td><td> <?php echo $row['count']; ?></td><td><a href="hod_assign_faculty.php?d=<?php echo $date; ?>&s=<?php echo $session; ?>&i=<?php echo $c; ?>">click to set job</a> </td>
</tr>
<?php
    }
?>
</table>
<?php
  }
?>
</div>
</div>
</body>
<?php
}
include 'footer.php';
?>
</html>