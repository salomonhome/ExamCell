<!DOCTYPE html>
<html>
<body>

<?php
$now=date_create("Y-m-d");
$date1=date_create("2013-03-15");
$date2=date_create($now);
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");
?>

</body>
</html>