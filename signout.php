<?php
session_start();
if(isset($_SESSION["id"])){
    unset($_SESSION["id"]);
}
session_destroy();
header("location:http://mca.rit.ac.in/projects/examcell/");
?>