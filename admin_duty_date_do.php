<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="js/tableExport.js"></script>
<script type="text/javascript" src="js/jquery.base64.js"></script>
<script type="text/javascript" src="js/html2canvas.js"></script>
<script type="text/javascript" src="js/libs/sprintf.js"></script>
<script type="text/javascript" src="js/jspdf.js"></script>
<script type="text/javascript" src="js/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <?php
    include 'style_admin.php';
extract($_REQUEST);
$datetime1 = date_create($date);
$datetime2= date_create($date1);
$date=date_format($datetime1,"Y/m/d");
$date1=date_format($datetime2,"Y/m/d");
$servername = "127.0.0.1";
$username = "salomon";
$password = "salomon123#789";
$dbname = "examcell";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$qry="SELECT duty_assigned.date,duty_assigned.session,faculty.faculty_name,department.dept_name,faculty.phone FROM department,duty_assigned,faculty WHERE faculty.faculty_id=duty_assigned.faculty_id AND department.dept_id=duty_assigned.dept_id AND duty_assigned.date BETWEEN'$date' AND '$date1' ORDER BY duty_assigned.dept_id,duty_assigned.session;";
 $result=mysqli_query($conn, $qry);
  if(mysqli_num_rows($result)<1)
  {
      header("location:admin_duty_date.php?s=1");
  }

 $records = array();

 while($row = mysqli_fetch_assoc($result)){
    $records[] = $row;
  }

?>
<div class="container">
    <div class="row">
        <div class="btn-group pull-right" style=" padding: 10px;">
            <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
     <span class="glyphicon glyphicon-th-list"></span> Save As

  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#" onclick="$('#employees').tableExport({type:'xml',escape:'false'});"> <img src="images/xml.png" width="24px"> XML</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick="$('#employees').tableExport({type:'csv',escape:'false'});"> <img src="images/csv.png" width="24px"> CSV</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick="$('#employees').tableExport({type:'excel',escape:'false'});"> <img src="images/xls.png" width="24px"> XLS</a></li>
                                <li><a href="#" onclick="$('#employees').tableExport({type:'doc',escape:'false'});"> <img src="images/word.png" width="24px"> Word</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick="$('#employees').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="images/pdf.png" width="24px"> PDF</a></li>

  </ul>
</div>
        </div>
    </div>
    <div class="row" style="height:300px !important;overflow:scroll;">
                        <table id="employees" class="table table-striped">
                <thead>
                    <tr class="">
                        <th>Date</th>
                        <th>Session</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($records as $rec):?>
                    <tr>
                        <td><?php $datetime1 = date_create($rec['date']);   echo date_format($datetime1,"d/M/Y");//$rec['date'];?></td>
                        <td><?php echo $rec['session']?></td>
                        <td><?php echo $rec['faculty_name']?></td>
                        <td><?php echo $rec['dept_name']?></td>
                        <td><?php echo $rec['phone']?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
</div>
</div>

</body>
</html>
<script type="text/javascript">
//$('#employees').tableExport();
$(function(){
    $('#example').DataTable();
      });
</script>