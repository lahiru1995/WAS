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


    //add global course codination
    if(@$_GET['GC-email'] ) {
        $email=@$_GET['GC-email'];
       
        $Course_code =  $_POST['Course_code'];
        $Semester =  $_POST['Semester'];
        $Total_hours =  $_POST['Total_hours'];
        $Alo_Melbourne =  $_POST['Alo_Melbourne'];
        $Allocation_OUA =  $_POST['Allocation_OUA'];
        $RMIT_online =  $_POST['RMIT_online'];
        $Allocation_SIM =  $_POST['Allocation_SIM'];
        $Allocation_VM =  $_POST['Allocation_VM'];
        $Allocation_SUIBE =  $_POST['Allocation_SUIBE'];
        $Allocation_UPH =  $_POST['Allocation_UPH'];
        $Extra_WIL =  $_POST['Extra_WIL'];
        
        $result=mysqli_query($con,"INSERT INTO course_coordination VALUES  ('$email' , '$Course_code' , '$Semester','$Total_hours' ,'$Alo_Melbourne', '$Allocation_OUA', '$RMIT_online', '$Allocation_SIM', '$Allocation_VM', '$Allocation_SUIBE', '$Allocation_UPH', '$Extra_WIL')") or die('Error');
        header("location:admin-staffmember.php?q=8&memail=$email");
    }

        //add to semster teaching one
        if(@$_GET['ST1-email'] ) {
            $email=@$_GET['ST1-email'];
            $c=0;
             
            $Course_code =  $_POST['Course_code1'];
            $Description1 =  $_POST['Description1'];
            $Activity_Type1 =  $_POST['Activity_Type1'];
            $Scheduled_Dates1 =  $_POST['Scheduled_Dates1'];
            $Scheduled_Start_time1 =  $_POST['Scheduled_Start_time1'];
            $Duration1 =  $_POST['Duration1'];
            $Class_Gap1 =  $_POST['Class_Gap1'];
            $Teaching_Weeks1 =  $_POST['Teaching_Weeks1'];
            $Workload_hours1 =  $_POST['Workload_hours1'];
            $sem =  $_POST['sem'];
           
            
            $result=mysqli_query($con,"INSERT INTO semester_teaching VALUES  ('$email' , '$sem' , '$Course_code','$Description1' ,'$Activity_Type1', '$Scheduled_Dates1', '$Scheduled_Start_time1', '$Duration1', '$Class_Gap1', '$Teaching_Weeks1', '$Workload_hours1', '$c')") or die('Error');
            header("location:admin-staffmember.php?q=8&memail=$email&id=#sem");
        }

        //add to semster teaching Two
        if(@$_GET['ST2-email'] ) {
            $email=@$_GET['ST2-email'];
            $c=0;
             
            $Course_code =  $_POST['Course_code1'];
            $Description1 =  $_POST['Description1'];
            $Activity_Type1 =  $_POST['Activity_Type1'];
            $Scheduled_Dates1 =  $_POST['Scheduled_Dates1'];
            $Scheduled_Start_time1 =  $_POST['Scheduled_Start_time1'];
            $Duration1 =  $_POST['Duration1'];
            $Class_Gap1 =  $_POST['Class_Gap1'];
            $Teaching_Weeks1 =  $_POST['Teaching_Weeks1'];
            $Workload_hours1 =  $_POST['Workload_hours1'];
            $sem =  $_POST['sem'];
           
            
            $result=mysqli_query($con,"INSERT INTO semester_teaching VALUES  ('$email' , '$sem' , '$Course_code','$Description1' ,'$Activity_Type1', '$Scheduled_Dates1', '$Scheduled_Start_time1', '$Duration1', '$Class_Gap1', '$Teaching_Weeks1', '$Workload_hours1', '$c')") or die('Error');
            header("location:admin-staffmember.php?q=8&memail=$email&id=#sem");
        }

 //add to SIM semster teaching one
 if(@$_GET['SST1-email'] ) {
    $email=@$_GET['SST1-email'];
    $c=0;
   
    $Course_code =  $_POST['Course_code3'];
    $Course_Coordinator =  $_POST['Course_Coordinator'];
    $Meeting_atendees =  $_POST['Meeting_atendees'];
    $Visiting_Lecture =  $_POST['Visiting_Lecture'];
    $First_Time_visit =  $_POST['First_Time_visit'];
    $Visiting_Staff_Member =  $_POST['Visiting_Staff_Member'];
    $Sum_Workload_Hours =  $_POST['Sum_Workload_Hours'];
   
    $sem =  $_POST['sem'];
   
    
    $result=mysqli_query($con,"INSERT INTO sim_semester VALUES  ('$email' , '$sem' , '$Course_code','$Course_Coordinator' ,'$Meeting_atendees', '$Visiting_Lecture', '$First_Time_visit', '$Visiting_Staff_Member', '$Sum_Workload_Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#sim");
}

 //add to SIM semster teaching Two
 if(@$_GET['SST2-email'] ) {
    $email=@$_GET['SST2-email'];
    $c=0;
   
    $Course_code =  $_POST['Course_code3'];
    $Course_Coordinator =  $_POST['Course_Coordinator'];
    $Meeting_atendees =  $_POST['Meeting_atendees'];
    $Visiting_Lecture =  $_POST['Visiting_Lecture'];
    $First_Time_visit =  $_POST['First_Time_visit'];
    $Visiting_Staff_Member =  $_POST['Visiting_Staff_Member'];
    $Sum_Workload_Hours =  $_POST['Sum_Workload_Hours'];
   
    $sem =  $_POST['sem'];
   
    
    $result=mysqli_query($con,"INSERT INTO sim_semester VALUES  ('$email' , '$sem' , '$Course_code','$Course_Coordinator' ,'$Meeting_atendees', '$Visiting_Lecture', '$First_Time_visit', '$Visiting_Staff_Member', '$Sum_Workload_Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#sim");
}


//add to online teaching one
if(@$_GET['OT1-email'] ) {
    $email=@$_GET['OT1-email'];
    $c=0;
  
    $Melb_Course_code =  $_POST['Melb_Course_code'];
    $OUA_Course_Code =  $_POST['OUA_Course_Code'];
    $Course_Name =  $_POST['Course_Name'];
    $Study_Session =  $_POST['Study_Session'];
    $Delivary_Staff =  $_POST['Delivary_Staff'];
    $Hours =  $_POST['Hours'];
   
    $sem =  $_POST['sem'];
   
    
    $result=mysqli_query($con,"INSERT INTO online_teaching VALUES  ('$email' , '$sem' , '$Melb_Course_code','$OUA_Course_Code' ,'$Course_Name', '$Study_Session', '$Delivary_Staff', '$Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#online");
}

//add to online teaching Two
if(@$_GET['OT2-email'] ) {
    $email=@$_GET['OT2-email'];
    $c=0;
   
    $Melb_Course_code =  $_POST['Melb_Course_code'];
    $OUA_Course_Code =  $_POST['OUA_Course_Code'];
    $Course_Name =  $_POST['Course_Name'];
    $Study_Session =  $_POST['Study_Session'];
    $Delivary_Staff =  $_POST['Delivary_Staff'];
    $Hours =  $_POST['Hours'];
   
    $sem =  $_POST['sem'];
   
    
    $result=mysqli_query($con,"INSERT INTO online_teaching VALUES  ('$email' , '$sem' , '$Melb_Course_code','$OUA_Course_Code' ,'$Course_Name', '$Study_Session', '$Delivary_Staff', '$Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#online");
}

//add to suibe 01
if(@$_GET['SU1-email'] ) {
    $email=@$_GET['SU1-email'];
    $c=0;
   
    $Course_code =  $_POST['Course_code'];
    $Course =  $_POST['Course'];
    $Visiting_Lecture =  $_POST['Visiting_Lecture'];
    $Sum_of_workload =  $_POST['Sum_of_workload'];
   
    $sem =  $_POST['sem'];
   
    $result=mysqli_query($con,"INSERT INTO suibe VALUES  ('$email' , '$sem' , '$Course_code','$Course' ,'$Visiting_Lecture', '$Sum_of_workload', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#suib");
}


//add to suibe 02
if(@$_GET['SU2-email'] ) {
    $email=@$_GET['SU2-email'];
    $c=0;
   
    $Course_code =  $_POST['Course_code'];
    $Course =  $_POST['Course'];
    $Visiting_Lecture =  $_POST['Visiting_Lecture'];
    $Sum_of_workload =  $_POST['Sum_of_workload'];
   
    $sem =  $_POST['sem'];
   
    $result=mysqli_query($con,"INSERT INTO suibe VALUES  ('$email' , '$sem' , '$Course_code','$Course' ,'$Visiting_Lecture', '$Sum_of_workload', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#suib");
}

//add to T&L allowance
if(@$_GET['TL-email'] ) {
    $email=@$_GET['TL-email'];
    $c=0;
  
    $TL1 =  $_POST['TL1'];
    $Notes =  $_POST['Notes'];
    $Hours =  $_POST['Hours'];
   
   
    $result=mysqli_query($con,"INSERT INTO tl_allowance VALUES  ('$email', '$TL1', '$Notes', '$Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#tl");
}

//add to Research hdr
if(@$_GET['R-email'] ) {
    $email=@$_GET['R-email'];
    $c=0;
  
    $Total_Research_Hours =  $_POST['Total_Research_Hours'];
    $Associate_Supervisor =  $_POST['Associate_Supervisor'];
    $Joint_Senior_Supervisor =  $_POST['Joint_Senior_Supervisor'];
    $Senior_Supervisor =  $_POST['Senior_Supervisor'];
    $HDR_Hours =  $_POST['HDR_Hours'];
   
   
    $result=mysqli_query($con,"INSERT INTO research VALUES  ('$email', '$Associate_Supervisor', '$Joint_Senior_Supervisor', '$Senior_Supervisor', '$HDR_Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#res");
}

//add to Research total
if(@$_GET['Rt-email'] ) {
    $email=@$_GET['Rt-email'];
    $c=0;
  
    $Total_Research_Hours =  $_POST['Total_Research_Hours'];
    
    $result=mysqli_query($con,"INSERT INTO total_research VALUES  ('$email', '$Total_Research_Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#res");
}

//add to Admistration
if(@$_GET['AD-email'] ) {
    $email=@$_GET['AD-email'];
   $c=0;
   
    $Allocation_Name =  $_POST['Allocation_Name'];
    $Hours =  $_POST['Hours'];
   
    $result=mysqli_query($con,"INSERT INTO administration VALUES  ('$email', '$Allocation_Name', '$Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#admin");
}

//add to Admistration total
if(@$_GET['ADt-email'] ) {
    $email=@$_GET['ADt-email'];
   $c=0;
   
    $Standard_Administration =  $_POST['Standard_Administration'];
    
    $result=mysqli_query($con,"INSERT INTO total_administration VALUES  ('$email', ' $Standard_Administration', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#admin");
}

//add to community eng
if(@$_GET['CE-email'] ) {
    $email=@$_GET['CE-email'];
    $c=0;
   
    $Allocation_Name =  $_POST['Allocation_Name'];
    $Hours =  $_POST['Hours'];
   
    $result=mysqli_query($con,"INSERT INTO community_eng VALUES  ('$email', '$Allocation_Name', '$Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#com");
}

//add to community eng total
if(@$_GET['CEt-email'] ) {
    $email=@$_GET['CEt-email'];
    $c=0;
   
    $Standard_Professional =  $_POST['Standard_Professional'];

    $result=mysqli_query($con,"INSERT INTO total_community_eng VALUES  ('$email', '$Standard_Professional', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#com");
}


//add to leave
if(@$_GET['LEV-email'] ) {
    $email=@$_GET['LEV-email'];
    $c=0;
   
    $Allocation_Name =  $_POST['Allocation_Name'];
    $Hours =  $_POST['Hours'];
   
    $result=mysqli_query($con,"INSERT INTO leave1 VALUES  ('$email', '$Allocation_Name', '$Hours', '$c')") or die('Error');
    header("location:admin-staffmember.php?q=8&memail=$email&id=#lev");
}


//delete request

if(@$_GET['rec_email'] ) {
    $demail=@$_GET['rec_email'];
   
    $result = mysqli_query($con,"DELETE FROM request WHERE staff_member='$demail' ") or die('Error');
    
    header("location:index.php?q=8");
}

//approve request

if(@$_GET['aprv_email'] ) {
    $demail=@$_GET['aprv_email'];
   
    //$result = mysqli_query($con,"DELETE FROM request WHERE staff_member='$demail' ") or die('Error');
    $result = mysqli_query($con,"UPDATE request SET status='approved' WHERE staff_member = '$demail'") or die('Error');

    header("location:advicer.php?q=2");
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