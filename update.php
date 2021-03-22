<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];

//delete staff Member
if(isset($_SESSION['key'])){
    if(@$_GET['demail'] ) {
    $demail=@$_GET['demail'];
    $query1 = mysqli_query($con, "SELECT * FROM user WHERE email='$demail'") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query1);
    $login = $fetch['login'];

    if($login=='0'){
        header("location:admin-staffmember.php?q=3");
    }elseif($login=='1'){
        header("location:admin-advicer.php?q=5");
    }
    elseif($login=='2'){
        header("location:admin-user.php?q=7");
    }
    $result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
    }
    }
?>