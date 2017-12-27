    <?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';
}
else
{
    @$s=$_REQUEST['s'];
    @$x=$_REQUEST['x'];
    ?>
    <?php
    include 'style_admin.php'
    ?>
<html>
<head>
    <link rel="stylesheet" href="css/alertify.css" />
    <link rel="stylesheet" href="css/default.css" />
    <script type="text/javascript" src="js/alertify.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <!-- Date picker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  //screen reload


  //date picker

  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  //date check ajax
  </script>
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
  <title>Admin Faculty Request</title>
</head>

<body>
    <div id="wrapper">
<?php
    if(@$s==1)
    {
    ?>
    <script>
    alertify.alert("No duty on That Date.");
    </script>
 <?php
    }
    ?>
    <div style="color:#0000FF" align=center>
        <table id="moon" style="background:#CCCCCC;scroll=true;"><th>Faculty Duty List Date Based</th></table>
   <form name="request" action="admin_duty_date_do.php" methord="post" >
<table>

    <tr>
        <th>Start Date</th>
        <th><input type="text" name="date" id="datepicker" required /></th>
    </tr>
    <tr>
        <th>End Date</th>
        <th><input type="text" name="date1" id="datepicker1" required /></th>
    </tr>
</table>
<table>
    <tr>
    <td><input type="submit" value="submit" /></td>
    </tr>
</table>
   </form>
    </div>

     </div>
</body>
</html>
<?php
}
?>