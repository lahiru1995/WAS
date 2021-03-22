<?php
 
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$Employee_No = $_POST['Employee_No'];
$email = $_POST['email'];
$Position = $_POST['Position'];
$FTE = $_POST['FTE'];
$password = $_POST['password'];
$Workplan_Advicer = $_POST['Workplan_Advicer'];
$login = $_POST['login'];

$filename = UploadImage();
$location = "files/". $filename ;

$page = "admin-staffmember.php?q=2";



$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$email' , '$password','$login' ,'$Employee_No', '$Position', '$FTE', '$Workplan_Advicer', '$location')");
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

if($login==0){
	header("location:admin-staffmember.php?q=3");
}elseif($login==1){
	header("location:admin-advicer.php?q=5");
}
elseif($login==2){
	header("location:admin-user.php?q=7");
}
}
else
{
header("location:$page&q7=Email Already Registered!!!");
}
ob_end_flush();


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
            echo "Error Uploading File";
            exit;
        }
    }else{
            echo "File Not Supported";
            exit;
}
} 

  

  
?>