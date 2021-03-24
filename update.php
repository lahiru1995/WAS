<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];

//delete staff Member

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
    

//update staff Member
        if(@$_GET['upemail'] ) {
        $upemail=@$_GET['upemail'];
       
        $name =  $_POST['name'];
        $Employee_No =  $_POST['Employee_No'];
        $Position = $_POST['Position'];
        $FTE =  $_POST['FTE'];
        $Workplan_Advicer =  $_POST['Workplan_Advicer'];
        $email =  $_POST['email'];
        $password =  $_POST['password'];

        $filename = UploadImage();
        $location =  $filename ;
        
        //, email='$email', password='$password', F. T. E.='$FTE', Employee No='$Employee_No', Position='$Position', Workplan Advicer='$Workplan_Advicer', file='$location'
//$result1 = mysqli_query($con,"UPDATE user SET `name`=$name,email='$email', password='$password', F. T. E.='$FTE', Employee No='$Employee_No', Position='$Position', Workplan Advicer='$Workplan_Advicer', file='$location' WHERE email = '$upemail'") or die('Error');
        $query1 = mysqli_query($con, "SELECT * FROM user WHERE email='$upemail'") or die(mysqli_error());
        $fetch = mysqli_fetch_array($query1);
        $login = $fetch['login'];
        $f1 = $fetch['file'];

        if($location=="")
        $location =$f1;

        $result = mysqli_query($con,"UPDATE user SET name='$name', `Employee No`='$Employee_No', password='$password', `F. T. E.`='$FTE', Position='$Position', `Workplan Advicer`='$Workplan_Advicer', file='$location' WHERE email = '$upemail'") or die('Error');

        if($login=='0'){
            header("location:admin-staffmember.php?q=3");
        }elseif($login=='1'){
            header("location:admin-advicer.php?q=5");
        }
        elseif($login=='2'){
            header("location:admin-user.php?q=7");
        }
        
        }
        
//,`email`=$email,`password`=$password, `F. T. E.`=$FTE, `Employee No`=$Employee_No, `Position`=$Position, `Workplan Advicer`=$Workplan_Advicer, `file`=$location


        function UploadImage(){
            $target_dir = "files/";
            $fN = basename($_FILES['file']['name']);
            $target_file = $target_dir . $fN;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            
            
            if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
                || $imageFileType != "gif" || $imageFileType != "docs" || $imageFileType != "mp4") {
                 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    return   basename($_FILES["file"]["name"]);
                }else{
                   
                    
                }
            }else{
                    echo "File Not Supported";
                    exit;
        }
        } 
?>