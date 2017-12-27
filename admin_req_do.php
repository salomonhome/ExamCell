<?php
extract($_REQUEST);
//print_r($_REQUEST);
include 'Dbfunction.php';
$now=date_create("Y-m-d");
$datetime1 = date_create($date);  //changing date to type date
$datetime2 = date_create($now);    //changing date to type date
$diff=date_diff($datetime2,$datetime1);//comparing date using function
$interval = (array)$diff;      //covrting output to array
$date=date_format($datetime1,"Y/m/d");
$dept=array(1,2,3,4,5,6,7,8,9);
$counts=array($arch,$civil,$cse,$eee,$ece,$mech,$mca,$maths,$physical);
$y=$interval['y'];
$m=$interval['m'];
$d=$interval['d'];
$h=$interval['h'];
if(($y>=1)||($m>=1)||($d>=1)||($h>=12))
{
    $db=new Dbfunction();
    $conn=$db->dbconnect();
    for($i=0;$i<9;$i++)
    {
        if($counts[$i]!=0)
        {
            echo $sql="INSERT INTO `required`(`date`, `dept_id`, `session`, `count`) VALUES ('$date',$dept[$i],'$session',$counts[$i]);";
            $result=mysql_query($sql,$conn);
            $sql="INSERT INTO `required_reserve`(`date`, `dept_id`, `session`, `counts`) VALUES ('$date',$dept[$i],'$session',$counts[$i]);";
            echo $result=mysql_query($sql,$conn);
            $sql="SELECT `username` FROM `login` WHERE `dept_id`=$dept[$i]";
            $msg="Examination is scheduled on '$date' at ''$session'. Please log in to http://mca.rit.ac.in/projects/examcell/";
            $result1=mysql_query($sql,$conn);
            $res1=mysql_fetch_assoc($result1);
            $email=$res1['username'];
            $name="HOD";
            $p=$db ->sendmail($email,$msg,$name);
            $res=mysql_error();
            //$res=$db -> request_fact($date,$dept[$i],$session,$counts[$i],$conn);
        }
    }
    if ($result == 1)
    {
        header("location:admin_req.php?s=1");
    }
    else
    {
        header("location:admin_req.php?s=2&x=$res");
    }
}
else
{
header("location:admin_req.php?s=3&d=$d");
}
//print_r($result);
?>
