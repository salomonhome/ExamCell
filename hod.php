<?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';  
}
else
{
@$s=$_REQUEST['id'];
include 'style_hod.php';
include 'Dbfunction.php';  
$db=new Dbfunction();
$conn=$db->dbconnect();
$id=$_SESSION['id'];
$sql="SELECT `dept_name` FROM `department` WHERE `dept_id` =$id";
$result=mysql_query($sql,$conn);
$output=mysql_fetch_assoc($result);
?>
<head>
<style>
.alert {
    padding: 20px;
    background-color: #4dff4d;
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
    <div style="min-width:1348px;min-height:380px;background:#e6ecff;" >
    <div align=center id="sdiv">
    <label><marquee behavior="alternate" SCROLLDELAY=100><b><font size="20" color="blue"><center>Welcome</center> <br> <center><?php echo $output['dept_name'];  ?> Department  </center><br><center> to exam cell Management</center></font></b></marquee></label>
    </div>
 </div>

<?php
      include 'footer.php';
?>
</body>
<?php
}
?>