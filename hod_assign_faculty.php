<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exam Cell</title>
<?php
  include 'style_hod.php';
  include 'Dbfunction.php';
  extract($_REQUEST);
  session_start();
  $id=$_SESSION['id'];
  $d=base64_decode( urldecode( $d) );
  $_SESSION['date']=$d;
  $i=base64_decode( urldecode( $i ) );
  $_SESSION['depid']=$i;
  $s=base64_decode( urldecode( $s ) ); 
  $_SESSION['session']=$s;
  $db=new Dbfunction();
  $conn=$db->dbconnect();
  $sql="SELECT `faculty_id`, `faculty_name`  FROM `faculty` WHERE `dep_id`=$id";
  $result=mysql_query($sql,$conn);
?>
<style>
.alert {
    padding: 20px;
    background-color:#009933;
    color: white;
}

</style>
<script type="text/javascript" src="js/assign.js"></script>
</head>
<body>
    <div id="wrapper">
<div class="alert">
  <span class="closebtn">&times;</span> 
  <strong>Date:<?php echo date('F d Y', strtotime($d)); ?> &nbsp; Count: <?php echo($i); ?> &nbsp; Session: <?php echo($s); ?></strong>
</div>
<div align="center" style="color:#FFF">
    <form action="hod_faculty_assign.php" methord=post>
<table id="bill_table" border="1" cellpadding="2" cellspacing="0" style="border-color: black; color: black;" height="auto" align="center">
 <tr><th>Select </th><th>Add/Remove</th></tr>
 <tr>
    <td>
    <select name="faculty[]" required>
    <option value="0">Select </option>
    <?php
while ($row=mysql_fetch_assoc($result))
{
?>
        <option value=" <?php echo $row['faculty_id']; ?>" > <?php echo $row['faculty_name']; ?> </option>
<?php
}
?>
    </select>
    </td>
    <td><a href="#" onclick="addRow('bill_table');"><img src="images/add.png" alt="" /></a> &nbsp; <a href="#" onclick="deleteRow('bill_table', this.parentNode.parentNode.rowIndex);" ><img src="images/remove.png" alt="" /></a></td>
 </tr>
</table>
<input type="submit" value="submit" />
</div>
</form>
</div>
</body>
</html>
