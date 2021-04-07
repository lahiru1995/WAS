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
        
 //add input field       
//,`email`=$email,`password`=$password, `F. T. E.`=$FTE, `Employee No`=$Employee_No, `Position`=$Position, `Workplan Advicer`=$Workplan_Advicer, `file`=$location
if(@$_GET['q']== 'addlocation') {
    $name1 = $_POST['name1'];
    $id = 0;
    $l11 = $_POST['l1'];
   
	include_once 'dbConnection.php';
				$query = mysqli_query($con, "SELECT * FROM location WHERE id = (SELECT MAX(id) FROM location)") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
      $id1= $fetch['id'];
      $l1= $fetch['l1'];
      $l2= $fetch['l2'];
      $l3= $fetch['l3'];
      $l4= $fetch['l4'];
     
    //  $result1=mysqli_query($con,"INSERT INTO location VALUES  ('$id' , '$name1' , ' $l222','$l22' ,'$l33', '$l44')") or die('Error1');
   // $result1 = mysqli_query($con,"UPDATE location SET l2='$id1' WHERE id = $id1") or die('Error');
  if( $l1!="" && $l2=="" && $l3=="" && $l4==""){
        $result1 = mysqli_query($con,"UPDATE location SET l2='$l11' WHERE id = $id1") or die('Error2');
        }if($l1!="" && $l2!="" && $l3=="" && $l4==""){
        $resul1t = mysqli_query($con,"UPDATE location SET l3='$l11' WHERE id = $id1") or die('Error3');
        }if($l1!="" && $l2!="" && $l3!="" && $l4==""){
        $result1 = mysqli_query($con,"UPDATE location SET l4='$l11' WHERE id = $id1") or die('Error4');
        }if($l1!="" && $l2!="" && $l3!="" && $l4!="" ){
            $result1=mysqli_query($con,"INSERT INTO location VALUES  ('$id' , '$name1' , ' $l11','$l22' ,'$l33', '$l44')") or die('Error1');
        }if($id1==null){
            $result1=mysqli_query($con,"INSERT INTO location VALUES  ('$id' , '$name1' , ' $l11','$l22' ,'$l33', '$l44')") or die('Error1');
        }
    
    
   // $result=mysqli_query($con,"INSERT INTO location VALUES  ('$id' , '$name1' , '$l1','$l2' ,'$l3', '$l4')") or die('Error1');
    
    header("location:admin-dashboad.php?q=1");
    }


    //add db
    if(@$_GET['q']== 'adddb') {
        $l1 = $_POST[''.$l1.''];
        $id = 0;
        $l2 = $_POST[''.$l2.''];

    }





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