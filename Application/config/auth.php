<?php
session_start();
if(!isset($_SESSION['userid'])| $_SESSION['userid']==''){
    $_SESSION['error']='Please login to view this resource';
    header('location:../index.php');
}

?>