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
    $id=base64_decode( urldecode( $d) );
    $db=new Dbfunction();
    $conn=$db->dbconnect();
    $sql="SELECT  `faculty_name`, `email`, `phone`, `dep_id` FROM `faculty` WHERE `faculty_id`=$id ";
    $result=mysql_query($sql,$conn);
    $row=mysql_fetch_assoc($result);
?>
</head>
<body>
<div id="wrapper">
    <table>
        <th>Edit Faculty Data</th>
    </table>
    <form action="hod_edit_faculty_done.php" method="post">
          <table>
              <tr>
                  <th>Name</th><td><input type="text" name="name" value="<?php echo $row['faculty_name'];  ?>" onblur="showUSS(this.value)" /></td>
              </tr>
              <tr>
                  <th>Email</th><td><input type="text" name="email" value="<?php echo $row['email']; ?>" /></td>
              </tr>
              <tr>
                  <th>Phone</th><td><input type="text" name="phone" value="<?php echo $row['phone']; ?>"  onblur="showUU(this.value)" maxlength="10"/></td>
              </tr>
          </table>
          <table>
              <td><input type="button" value="back" onclick="window.location.href = 'hod_edit_faculty.php'" /></td><td><input type="submit" value=submit /></td>
          </table>
          <input type="hidden" name="f_id" value="<?php echo $id; ?>" />
    </form>
</div>
<script>
function showUSS(str)
{
    var letters = /^[A-Za-z]+$+ /;
    if(str.match(letters))
    {

    }
    else
     {
     alert("only charecter allowed");
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
</script>
</body>
</html>
