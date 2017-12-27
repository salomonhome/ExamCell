<?php
session_start();
if(@$_SESSION['id']==null)
{
include '404.php';  
}
else
{
include 'style_admin.php';
}
?>
<div style="width:auto;min-height:380px;background:#e6ecff;" > 
</div>
<?php
      include 'footer.php';
?>