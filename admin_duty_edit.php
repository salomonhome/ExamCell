    <?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';
}
else
{

$s=$_GET['s'];
$res=explode(',',$s);
$session=$res[0];
$date=$res[1];
$datetime1 = date_create($date);
$date=date_format($datetime1,"Y/m/d");
include 'style_admin.php';
include 'Dbfunction.php';
$db = new Dbfunction();
$conn = $db -> dbconnect();
$dept=array(0,0,0,0,0,0,0,0,0);
$sql="select dept_id,count from required where session='$session' and date='$date'";
$result=mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($result))
{
$id=$row['dept_id'];
$dept[$id]=$row['count'];
}
    ?>
<html>
<head>
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
  <title>Admin Faculty Edit</title>
</head>

<body>
    <div id="wrapper">
    <div style="color:#0000FF" align=center>
        <div id="txtHint">

        </div>
        <table id="moon" style="background:#CCCCCC;scroll=true;"><th>Faculty Duty Request</th></table>
   <form name="request" action="admin_duty_edit_do.php" methord="post" >
<table>

    <tr>
        <th>Date</th>
        <th><input type="text" name="date" value="<?php echo date_format($datetime1,"d/m/Y"); ?>" readonly="readonly" /></th>
    </tr>
    <tr>
        <th>Session</th>
        <th>
              <input type="text" name="session" value="<?php echo $session; ?>" readonly="readonly" />
        </th>
    </tr>
</table>
<table>
    <tr>
       <th>MCA</th><th>ECE</th><th>Mech</th><th>Civil</th><th>CSE</th><th>Arch</th><th>EEE</th><th>Applied Science</th><th>Physical Education</th>
    </tr>
        <tr>
           <td><input type="text" name="mca" value="<?php echo $dept[7]; ?>" required onblur="showUs(this.value)" val /></td>
           <td><input type="text" name="ece" value="<?php echo $dept[5]; ?>" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="mech" value="<?php echo $dept[6]; ?>" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="civil" value="<?php echo $dept[2]; ?>" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="cse" value="<?php echo $dept[3]; ?>" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="arch" value="<?php echo $dept[1]; ?>" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="eee" value="<?php echo $dept[4]; ?>" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="maths" value="<?php echo $dept[8]; ?>" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="physical" value="<?php echo $dept[9]; ?>" required onblur="showUs(this.value)" /></td>
    </tr>
    <tr>
    <td><input type="submit" value="submit" /></td>
    </tr>
</table>
   </form>
    </div>

     </div>
<script>
 function showUs(str)
 {
    if(isNaN(str))
        {
           alert("not a number");
        }
}
</script>
</body>
</html>
<?php
}
?>