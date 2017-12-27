<head>
    <link rel="stylesheet" href="css/alertify.css" />
    <link rel="stylesheet" href="css/default.css" />
    <script type="text/javascript" src="js/alertify.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';  
}
else
{
    include 'style_hod.php';
    extract($_GET);
    ?>
<script>
function showUSS(str)
{
    var letters = /^[A-Za-z]+$/;
    if(str.match(letters))
    {

    }
    else
     {
     //alert("only charecter allowed");
     }
}
 function showUs(str)
 {
    if(isNaN(str))
        {
           alert("not a number");
        }
}
function showUU(str)
 {
      if(isNaN(str))
        {
           alert("not a number");
        }
        else
        {
            var x=str.length;
            if(x<7 )
            {
               alert("min length allowed is 7");
            }
        }

}

function myFunction() {
    document.getElementById("myForm").reset();
}
</script>
</head>
<body>

<div id="wrapper">
<?php
    if(@$s==1)
    {
    ?>
    <script>
    alertify.alert("Faculty Added Sucessfully.");
    </script>
 <?php
    }
    else if(@$s==2)
    {
    ?>
            <script>
    alertify.alert("Adding Faculty Failed.");
    </script>
    <?php
    }
?>
   <table><th>Add Faculty</th></table>
    <form id="myForm" action="hod_add_do.php" method="post">
    <table align=center width=auto height=auto>
    <tr>
    <th><label>Name</label></th>
    <th><input type="text" name="name" required onblur="showUSS(this.value)" /></th>
    </tr>
    <tr>
        <th><label>Email</label></th>
        <th><input type="email" name="email" placeholder="email" required /></th>
    </tr>
    <tr>
        <th><label>Phone</label></th>
        <th><input type="tel" name="phone" maxlength="10" minlength="7" onblur="showUU(this.value)" /></th>
    </tr>
    <tr><th><input type="button" onclick="myFunction()" value="Reset"></th><th><input type="submit" value="add" /> </th></tr>
    </table>
</form>
</div>

</body>
<?php
}
?>