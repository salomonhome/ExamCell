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
  //date check ajax
  function showUser(str) {
    var dates;
    dates=document.getElementById("datepicker");
    var x=str+","+dates.value;
        if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
        } else {
                if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                };
                xmlhttp.open("GET","getdate.php?s="+x,true);
                xmlhttp.send();
        }
}
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
    alertify.alert("Request Submitted Sucessfully.");
    </script>
 <?php
    }
    else if((@$s==2 )&&(!$e))
    {
    ?>
    <script>
    alertify.alert("Request Submittion failed due to server error.");
    </script>
    <?php
    }
    else if(@$s==3)
    {
    ?>
    <script>
    alertify.alert("Request cannot be made on a past day or today date.");
    </script>
    <?php
    }
    ?>
    <div style="color:#0000FF" align=center>
        <div id="txtHint">

        </div>
        <table id="moon" style="background:#CCCCCC;scroll=true;"><th>Faculty Duty Request</th></table>
   <form name="request" action="admin_req_do.php" methord="post" >
<table>

    <tr>
        <th>Date</th>
        <th><input type="text" name="date" id="datepicker" required /></th>
    </tr>
    <tr>
        <th>Session</th>
        <th>
               <select name="session" onchange="showUser(this.value)">
            <option value="Fn">Select</option>
            <option value="Fn">Fn</option>
            <option value="An">An</option>
        </select>
        </th>
    </tr>
</table>
<table>
    <tr>
       <th>MCA</th><th>ECE</th><th>Mech</th><th>Civil</th><th>CSE</th><th>Arch</th><th>EEE</th><th>Applied Science</th><th>Physical Education</th>
    </tr>
        <tr>
           <td><input type="text" name="mca" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="ece" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="mech"required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="civil" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="cse" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="arch" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="eee" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="maths" required onblur="showUs(this.value)" /></td>
           <td><input type="text" name="physical" required onblur="showUs(this.value)" /></td>
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