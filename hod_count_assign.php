<?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';
}
else
{
include 'style_hod.php';
?>
<script>
function myFunction() {
    document.getElementById("myForm").reset();
}
</script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        } );
        $( function() {
        $( "#datepicker1" ).datepicker();
        } );
        </script>
<body>
<div id="wrapper">
<div style="color:#0000FF" align=center>
    <form id="myForm" action="hod_count_assign_show.php" method="post">
        <table><th>Duty Counter</th></table>
        <table >
            <th>Start:</th><td><input type="text" id="datepicker" name="start" required /></td>
            <th>End:</th><td><input type="text" id="datepicker1" name="end" required /></td>
        </table>
        <table><td><input type="button" onclick="myFunction()" value="Reset"></td><td><input type="submit" value="view" /></td></table>
    </form>
</div>
</div>
</body>
<?php
}
?>