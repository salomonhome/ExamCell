<?php
session_start();
include 'Dbfunction.php';
if(@$_SESSION['id']==null)
{
include '404.php';
}
else
{
    include 'style_hod.php';
    extract($_GET);
    ?>

<body>
<head>
    <link rel="stylesheet" href="css/alertify.css" />
    <link rel="stylesheet" href="css/default.css" />
    <script type="text/javascript" src="js/alertify.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
</head>
<div id="wrapper">
<?php
    if(@$s==1)
    {
    ?>
        <script>
    alertify.alert("Faculty Edit Completed sucessfully.");
    </script>
   <?php
    }
    else if(@$s==2)
    {
    ?>
            <script>
    alertify.alert("Faculty Edit Failed.");
    </script>
    <?php
    }
$id=$_SESSION['id'];
$db = new Dbfunction();
$conn = $db -> dbconnect();
$sql="SELECT `faculty_id`, `faculty_name` FROM `faculty` WHERE `dep_id`=$id";
$result=mysql_query($sql,$conn);
?>
<table name="request">
    <tr><th>ID</th><th>Name</th><th>Link</th></tr>
<?php
    while ($row=mysql_fetch_assoc($result))
    {
        $ids=urlencode( base64_encode( $row['faculty_id'] ) );
    ?>
    <tr>
    <td> <?php echo $row['faculty_id']; ?> </td><td> <?php echo $row['faculty_name']; ?></td><td><a href="hod_edit_faculty_do.php?d=<?php echo $ids; ?>">click to Edit</a> </td>
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