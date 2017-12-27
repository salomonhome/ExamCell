<?php
include 'Dbfunction.php';

session_start();
?>
 <head>
    <link rel="stylesheet" href="css/alertify.css" />
    <link rel="stylesheet" href="css/default.css" />
    <script type="text/javascript" src="js/alertify.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
 </head>
 <body>
<?php
//connecting to database
$db = new Dbfunction();
$conn = $db -> dbconnect();
//echo $conn;
extract($_REQUEST);
if($password1!=$password2)
{
    $sql="SELECT `dept_id` FROM `login` WHERE `username`='$username' and `password`='$password1'";
    $result=mysql_query($sql,$conn);
    $output=mysql_fetch_assoc($result);
    if(isset($output['dept_id']))
    {
    $sql="update `login` set `password`='$password2'";
    $result=mysql_query($sql,$conn);
       echo '<script>alertify.confirm("Passwords Updated Sucessfully.",
    function(){
        window.location="http://mca.rit.ac.in/projects/examcell/"
    },
    function(){
        window.location="http://mca.rit.ac.in/projects/examcell/"
    });
    </script>';
    }
    else
    {
    echo '<script>alertify.confirm("Faild to update your password as assosiated account not found.",
    function(){
        window.location="http://mca.rit.ac.in/projects/examcell/"
    },
    function(){
        window.location="http://mca.rit.ac.in/projects/examcell/"
    });
    </script>';
    }
}
else
{
   echo '<script>
    alertify.alert("New password and old cannot be the same");
    </script>';
        echo '<script>alertify.confirm("New password and old cannot be the same.",
    function(){
        window.location="http://mca.rit.ac.in/projects/examcell/"
    },
    function(){
        window.location="http://mca.rit.ac.in/projects/examcell/"
    });
    </script>';
}
?>
</body>