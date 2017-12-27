<?php
extract($_REQUEST);
include 'Dbfunction.php';
$db=new Dbfunction();
$conn=$db->dbconnect();
echo $sql="SELECT  `password` FROM `login` WHERE `username`='$email'";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_assoc($result);
$pass=$row['password'];
include 		"classes/class.phpmailer.php"; // include the class name
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587 465
            $mail->IsHTML(true);
            $mail->Username = "ritcollegepampady@gmail.com";
            $mail->Password = "ritcollege";
            $mail->SetFrom("ritcollegepampady@gmail.com");
            $mail->Subject = "Password Reminder";
            $mail->Body = "Hi your login password for examcell sytsem is $pass";
            $mail->AddAddress($email);//here mailid is fetched from the database
             if(!$mail->Send())
            {
                echo 'Failed to inform! check Mail <a href="http://mca.rit.ac.in/projects/examcell/">Click to login</a>'; 
            }
            else
            {
                echo 'Informed Sucessfully! check Mail <a href="http://mca.rit.ac.in/projects/examcell/">Click to login</a>';
            }
?>