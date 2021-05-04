<!DOCTYPE html>
<?php
	session_start();
	if(!ISSET($_SESSION['email'])){
		header('location:index.php');
	}
?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>W A S</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <style><?php include 'css/style.css'; ?></style>
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo1.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/favicon.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <span class="nav-profile-name" style="font-weight:bold; text-transform: uppercase; letter-spacing:3px">Workload Allocation System</span>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-1">
           <!-- <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>-->
              <span class="count"></span>
            </a>
           <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>-->
          </li>
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
           <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>-->
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <?php
				include_once 'dbConnection.php';
				$query = mysqli_query($con, "SELECT * FROM user WHERE email='$_SESSION[email]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
        echo '<img src="./files/'.$fetch['file'].'" alt="profile"/>
        <span class="nav-profile-name">'.$fetch['name'].'</span>';
	?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a id="myBtn" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==1) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=1">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" 
            <?php if(@$_GET['q']==11) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==22) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==33) echo'style=" color: #4d83ff;"'; ?>
            data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi mdi-book-open-page-variant menu-icon"></i>
              <span class="menu-title">Teaching</span>
              <i <?php if(@$_GET['q']==11) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==22) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==33) echo'style=" color: #4d83ff;"'; ?>
            class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic" >
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==11) echo'style=" font-weight:500;"'; ?> href="teaching.php?q=11">Course Coordination</a></li>
                <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==22) echo'style="font-weight:500;"'; ?> href="teaching.php?q=22">Teaching </a></li>
                <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==33) echo'style=" font-weight: 500;"'; ?> href="teaching.php?q=33">T & L Allowance </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==2) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=2">
              <i class="mdi mdi-flask-outline menu-icon"></i>
              <span class="menu-title">Research</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==3) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=3">
              <i class="mdi mdi mdi-account menu-icon"></i>
              <span class="menu-title">Administration</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==4) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=4">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">PD & community Engagement</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==5) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=5">
              <i class="mdi mdi mdi-calendar-clock menu-icon"></i>
              <span class="menu-title">Leave</span>
            </a>
          </li>
          
          
         
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==6) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=6">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">HDR Supervisation</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==7) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=7">
              <i class="mdi mdi mdi-calendar-remove menu-icon"></i>
              <span class="menu-title">Unallocated</span>
            </a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==8) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=8">
              <i class="mdi mdi-calculator menu-icon"></i>
              <span class="menu-title">Calculator</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        

<?php if(@$_GET['q']==11) {

include_once 'dbConnection.php';
$email=$_SESSION['email'];

$result = mysqli_query($con, "SELECT * FROM course_coordination WHERE email='$email'") or die(mysqli_error());

  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">Global Course Coordination</h4>
             <!-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p>-->
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                      Course code
                      </th>
                      <th>
                      Sem
                      </th>
                      <th>
                      Total Hours
                      </th>
                      <th>
                      Allocation Melbourne
                      </th>
                      <th>
                      Allocation OUA
                      </th>
                      <th>
                      RMIT online
                      </th>
                      <th>
                      Allocation SIM
                      </th>
                      <th>
                      Allocation VM
                      </th>
                      <th>
                      Allocation SUIBE
                      </th>
                      <th>
                      Allocation UPH
                      </th>
                      <th>
                      Extra WIL
                      </th>
                      
                    
                    </tr>
                  </thead>
                  <tbody>';
                  while($row = mysqli_fetch_array($result)) {
                    $Course_code = $row['Course_code'];
                    $Semester = $row['Semester'];
                    $Total_Hours = $row['Total_Hours'];
                    $Allocation_Melbourne = $row['Allocation_Melbourne'];
                    $Allocation_OUA = $row['Allocation_OUA'];
                    $RMIT_online = $row['RMIT_online'];
                    $Allocation_SIM = $row['Allocation_SIM'];
                    $Allocation_VM = $row['Allocation_VM'];
                    $Allocation_SUIBE = $row['Allocation_SUIBE'];
                    $Allocation_UPH = $row['Allocation_UPH'];
                    $Extra_WIL = $row['Extra_WIL'];
                    
                  echo'
                    <tr>
                     
                      <td>
                        '.$Course_code.'
                      </td>
                      <td>
                        '.$Semester.'
                      </td>
                      <td>
                        '. $Total_Hours.'
                      </td>
                      <td>
                      '.$Allocation_Melbourne.'
                    </td>
                    <td>
                    '.$Allocation_OUA.'
                  </td>
                  <td>
                  '.$RMIT_online.'
                </td>
                <td>
                '.$Allocation_SIM.'
              </td>
                <td>
                '.$Allocation_VM.'
              </td>
              <td>
                '.$Allocation_SUIBE.'
              </td>
              <td>
                '.$Allocation_UPH.'
              </td>
              <td>
              '.$Extra_WIL.'
            </td>
                      
                    </tr>';}
                     
                  echo'</tbody>
                </table>
                <br>
                <p class="text-muted">Each hour of face-to-face teaching delivery attracts an additional two teaching-related hours for preparation, marking, feedback. See School Academic Workload Model for details.
                </p>
                
              </div>
            </div>
          </div>
            </div>
           
          </div>';
        }?>


<?php if(@$_GET['q']==22) {

include_once 'dbConnection.php';
$email=$_SESSION['email'];

$result = mysqli_query($con, "SELECT * FROM semester_teaching WHERE email='$email' AND sem='1'") or die(mysqli_error());
$result1 = mysqli_query($con, "SELECT * FROM semester_teaching WHERE email='$email' AND sem='2'") or die(mysqli_error());
  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              
            <div class="tab1" style="display:flex">
              <button id="defaultOpen" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab2" onclick="openCity(event, `sem-one`)">Semester One Teaching</button>
              <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab2" onclick="openCity(event, `sem-two`)">Semester Two Teaching</button>
            </div>

             <!-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p>-->

              <div id="sem-one" class="tabcontent">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                      Course code
                      </th>
                      <th>
                      Description
                      </th>
                      <th>
                      Activity Type
                      </th>
                      <th>
                      Scheduled Dates
                      </th>
                      <th>
                      Scheduled Start time
                      </th>
                      <th>
                      Duration
                      </th>
                      <th>
                      Class Gap
                      </th>
                      <th>
                      Teaching Weeks
                      </th>
                      <th>
                      Workload hours
                      </th>
                      
                      
                    
                    </tr>
                  </thead>
                  <tbody>';
                  while($row = mysqli_fetch_array($result)) {
                    $Course_code = $row['Course_code'];
                    $Description = $row['Description'];
                    $Activity_Type = $row['Activity_Type'];
                    $Scheduled_Dates = $row['Scheduled_Dates'];
                    $Scheduled_Start_time = $row['Scheduled_Start_time'];
                    $Duration = $row['Duration'];
                    $Class_Gap = $row['Class_Gap'];
                    $Teaching_Weeks = $row['Teaching_Weeks'];
                    $Workload_hours = $row['Workload_hours'];
                    
                    
                  echo'
                    <tr>
                     
                      <td>
                        '.$Course_code.'
                      </td>
                      <td>
                        '.$Description.'
                      </td>
                      <td>
                        '.$Activity_Type.'
                      </td>
                      <td>
                      '.$Scheduled_Dates.'
                    </td>
                    <td>
                    '.$Scheduled_Start_time.'
                  </td>
                  <td>
                  '.$Duration.'
                </td>
                <td>
                '.$Class_Gap.'
              </td>
                <td>
                '.$Teaching_Weeks.'
              </td>
              <td>
                '.$Workload_hours.'
              </td>
             
                      
                    </tr>';}
                     
                  echo'</tbody>
                </table>
               
                
              </div></div>

              <div id="sem-two" class="tabcontent" style="display:none">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                      Course code
                      </th>
                      <th>
                      Description
                      </th>
                      <th>
                      Activity Type
                      </th>
                      <th>
                      Scheduled Dates
                      </th>
                      <th>
                      Scheduled Start time
                      </th>
                      <th>
                      Duration
                      </th>
                      <th>
                      Class Gap
                      </th>
                      <th>
                      Teaching Weeks
                      </th>
                      <th>
                      Workload hours
                      </th>
                      
                      
                    
                    </tr>
                  </thead>
                  <tbody>';
                  while($row = mysqli_fetch_array($result1)) {
                    $Course_code = $row['Course_code'];
                    $Description = $row['Description'];
                    $Activity_Type = $row['Activity_Type'];
                    $Scheduled_Dates = $row['Scheduled_Dates'];
                    $Scheduled_Start_time = $row['Scheduled_Start_time'];
                    $Duration = $row['Duration'];
                    $Class_Gap = $row['Class_Gap'];
                    $Teaching_Weeks = $row['Teaching_Weeks'];
                    $Workload_hours = $row['Workload_hours'];
                    
                    
                  echo'
                    <tr>
                     
                      <td>
                        '.$Course_code.'
                      </td>
                      <td>
                        '.$Description.'
                      </td>
                      <td>
                        '.$Activity_Type.'
                      </td>
                      <td>
                      '.$Scheduled_Dates.'
                    </td>
                    <td>
                    '.$Scheduled_Start_time.'
                  </td>
                  <td>
                  '.$Duration.'
                </td>
                <td>
                '.$Class_Gap.'
              </td>
                <td>
                '.$Teaching_Weeks.'
              </td>
              <td>
                '.$Workload_hours.'
              </td>
             
                      
                    </tr>';}
                     
                  echo'</tbody>
                </table>
               
                
              </div></div>

            </div>
          </div>
            </div>
           
          </div>';


          
//SIM semester teaching
$sim1 = mysqli_query($con, "SELECT * FROM sim_semester WHERE email='$email' AND sem='1'") or die(mysqli_error());
$sim2 = mysqli_query($con, "SELECT * FROM sim_semester WHERE email='$email' AND sem='2'") or die(mysqli_error());
echo'
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
  <div class="card-body">
    
  <div class="tab1" style="display:flex">
    <button id="defaultOpen1" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab3" onclick="openCity1(event, `simsem-one`)">SIM Semester One Teaching</button>
    <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab3" onclick="openCity1(event, `simsem-two`)">SIM Semester Two Teaching</button>
  </div>

   <!-- <p class="card-description">
      Add class <code>.table-striped</code>
    </p>-->

    <div id="simsem-one" class="tabcontent1">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
            Course code
            </th>
            <th>
            Course Coordinator
            </th>
            <th>
            Meeting atendees
            </th>
            <th>
            Visiting Lecture
            </th>
            <th>
            First Time visit
            </th>
            <th>
            Visiting Staff Member
            </th>
            <th>
            Sum Workload Hours
            </th>
            
          
          </tr>
        </thead>
        <tbody>';
        while($row = mysqli_fetch_array($sim1)) {
          $Course_code = $row['Course_code'];
          $Course_Coordinator = $row['Course_Coordinator'];
          $Meeting_atendees = $row['Meeting_atendees'];
          $Visiting_Lecture = $row['Visiting_Lecture'];
          $First_Time_visit = $row['First_Time_visit'];
          $Visiting_Staff_Member = $row['Visiting_Staff_Member'];
          $Sum_Workload_Hours = $row['Sum_Workload_Hours'];
         
          
        echo'
          <tr>
           
            <td>
              '.$Course_code.'
            </td>
            <td>
              '.$Course_Coordinator.'
            </td>
            <td>
              '.$Meeting_atendees.'
            </td>
            <td>
            '.$Visiting_Lecture.'
          </td>
          <td>
          '.$First_Time_visit.'
        </td>
        <td>
        '.$Visiting_Staff_Member.'
      </td>
      <td>
      '.$Sum_Workload_Hours.'
    </td>
        
          </tr>';}
           
        echo'</tbody>
      </table>
     
      
    </div></div>

    <div id="simsem-two" class="tabcontent1" style="display:none">
    <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>
          Course code
          </th>
          <th>
          Course Coordinator
          </th>
          <th>
          Meeting atendees
          </th>
          <th>
          Visiting Lecture
          </th>
          <th>
          First Time visit
          </th>
          <th>
          Visiting Staff Member
          </th>
          <th>
          Sum Workload Hours
          </th>
          
        
        </tr>
      </thead>
      <tbody>';
      while($row = mysqli_fetch_array($sim2)) {
        $Course_code = $row['Course_code'];
        $Course_Coordinator = $row['Course_Coordinator'];
        $Meeting_atendees = $row['Meeting_atendees'];
        $Visiting_Lecture = $row['Visiting_Lecture'];
        $First_Time_visit = $row['First_Time_visit'];
        $Visiting_Staff_Member = $row['Visiting_Staff_Member'];
        $Sum_Workload_Hours = $row['Sum_Workload_Hours'];
       
        
      echo'
        <tr>
         
          <td>
            '.$Course_code.'
          </td>
          <td>
            '.$Course_Coordinator.'
          </td>
          <td>
            '.$Meeting_atendees.'
          </td>
          <td>
          '.$Visiting_Lecture.'
        </td>
        <td>
        '.$First_Time_visit.'
      </td>
      <td>
      '.$Visiting_Staff_Member.'
    </td>
    <td>
    '.$Sum_Workload_Hours.'
  </td>
      
        </tr>';}
         
      echo'</tbody>
    </table>
   
    
  </div></div>

  </div>
</div>
  </div>
 
</div>'; 


//Online teaching
$online1 = mysqli_query($con, "SELECT * FROM online_teaching WHERE email='$email' AND sem='1'") or die(mysqli_error());
$online2 = mysqli_query($con, "SELECT * FROM online_teaching WHERE email='$email' AND sem='2'") or die(mysqli_error());
echo'
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
  <div class="card-body">
    
  <div class="tab1" style="display:flex">
    <button id="defaultOpen2" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab4" onclick="openCity2(event, `online-one`)">Online Teaching 1</button>
    <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab4" onclick="openCity2(event, `online-two`)">Online Teaching 2</button>
  </div>

   <!-- <p class="card-description">
      Add class <code>.table-striped</code>
    </p>-->

    <div id="online-one" class="tabcontent2">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
            Melb Course code
            </th>
            <th>
            OUA Course Code
            </th>
            <th>
            Course Name
            </th>
            <th>
            Study Session
            </th>
            <th>
            Delivary Staff
            </th>
            <th>
            Hours
            </th>
            
          </tr>
        </thead>
        <tbody>';
        while($row = mysqli_fetch_array($online1)) {
          $Melb_Course_code = $row['Melb_Course_code'];
          $OUA_Course_Code = $row['OUA_Course_Code'];
          $Course_Name = $row['Course_Name'];
          $Study_Session = $row['Study_Session'];
          $Delivary_Staff = $row['Delivary Staff'];
          $Hours= $row['Hours'];
        
         
          
        echo'
          <tr>
           
            <td>
              '.$Melb_Course_code.'
            </td>
            <td>
              '.$OUA_Course_Code.'
            </td>
            <td>
              '.$Course_Name.'
            </td>
            <td>
            '.$Study_Session.'
          </td>
          <td>
          '.$Delivary_Staff.'
        </td>
        <td>
        '.$Hours.'
      </td>
      
        
          </tr>';}
           
        echo'</tbody>
      </table>
     
      
    </div></div>

    <div id="online-two" class="tabcontent2" style="display:none">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
            Melb Course code
            </th>
            <th>
            OUA Course Code
            </th>
            <th>
            Course Name
            </th>
            <th>
            Study Session
            </th>
            <th>
            Delivary Staff
            </th>
            <th>
            Hours
            </th>
            
          </tr>
        </thead>
        <tbody>';
        while($row = mysqli_fetch_array($online2)) {
          $Melb_Course_code = $row['Melb_Course_code'];
          $OUA_Course_Code = $row['OUA_Course_Code'];
          $Course_Name = $row['Course_Name'];
          $Study_Session = $row['Study_Session'];
          $Delivary_Staff = $row['Delivary Staff'];
          $Hours= $row['Hours'];
        
         
          
        echo'
          <tr>
           
            <td>
              '.$Melb_Course_code.'
            </td>
            <td>
              '.$OUA_Course_Code.'
            </td>
            <td>
              '.$Course_Name.'
            </td>
            <td>
            '.$Study_Session.'
          </td>
          <td>
          '.$Delivary_Staff.'
        </td>
        <td>
        '.$Hours.'
      </td>
      
        
          </tr>';}
           
        echo'</tbody>
      </table>
     
      
    </div></div>

  </div>
</div>
  </div>
 
</div>'; 


//SUIBE teaching
$suibe1 = mysqli_query($con, "SELECT * FROM suibe WHERE email='$email' AND sem='1'") or die(mysqli_error());
$suibe2 = mysqli_query($con, "SELECT * FROM suibe WHERE email='$email' AND sem='2'") or die(mysqli_error());
echo'
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
  <div class="card-body">
    
  <div class="tab1" style="display:flex">
    <button id="defaultOpen3" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab5" onclick="openCity3(event, `suibe-one`)">SUIBE Teaching 1</button>
    <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab5" onclick="openCity3(event, `suibe-two`)">SUIBE Teaching 2</button>
  </div>

   <!-- <p class="card-description">
      Add class <code>.table-striped</code>
    </p>-->

    <div id="suibe-one" class="tabcontent3">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
          Course code
            </th>
            <th>
            Course
            </th>
            <th>
            Visiting Lecture
            </th>
            <th>
            Sum of workload
            </th>
            
            
          </tr>
        </thead>
        <tbody>';
        while($row = mysqli_fetch_array($suibe1)) {
          $Course_code = $row['Course_code'];
          $Course = $row['Course'];
          $Visiting_Lecture = $row['Visiting_Lecture'];
          $Sum_of_workload = $row['Sum_of_workload'];
          
         
          
        echo'
          <tr>
           
            <td>
              '.$Course_code.'
            </td>
            <td>
              '.$Course.'
            </td>
            <td>
              '.$Visiting_Lecture.'
            </td>
            <td>
            '.$Sum_of_workload.'
          </td>
          
        
          </tr>';}
           
        echo'</tbody>
      </table>
     
      
    </div></div>

    <div id="suibe-two" class="tabcontent3" style="display:none">
    <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>
        Course code
          </th>
          <th>
          Course
          </th>
          <th>
          Visiting Lecture
          </th>
          <th>
          Sum of workload
          </th>
          
          
        </tr>
      </thead>
      <tbody>';
      while($row = mysqli_fetch_array($suibe2)) {
        $Course_code = $row['Course_code'];
        $Course = $row['Course'];
        $Visiting_Lecture = $row['Visiting_Lecture'];
        $Sum_of_workload = $row['Sum_of_workload'];
        
       
        
      echo'
        <tr>
         
          <td>
            '.$Course_code.'
          </td>
          <td>
            '.$Course.'
          </td>
          <td>
            '.$Visiting_Lecture.'
          </td>
          <td>
          '.$Sum_of_workload.'
        </td>
        
      
        </tr>';}
         
      echo'</tbody>
    </table>
   
    
  </div></div>

  </div>
</div>
  </div>
 
</div>'; 
        }?>



<?php if(@$_GET['q']==33) {

include_once 'dbConnection.php';
$email=$_SESSION['email'];

$result = mysqli_query($con, "SELECT * FROM tl_allowance WHERE email='$email'") or die(mysqli_error());

  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">T & L Allowance</h4>
             <!-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p>-->
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                      Allocation Name
                      </th>
                      <th>
                      Notes
                      </th>
                      <th>
                      hours
                      </th>
                     
                    </tr>
                  </thead>
                  <tbody>';
                  while($row = mysqli_fetch_array($result)) {
                    $Allocation_Name = $row['Allocation_Name'];
                    $Notes = $row['Notes'];
                    $hours = $row['hours'];
                    
                    
                  echo'
                    <tr>
                     
                      <td>
                        '.$Allocation_Name.'
                      </td>
                      <td>
                        '.$Notes.'
                      </td>
                      <td>
                        '. $hours.'
                      </td>
                     
                    </tr>';}
                     
                  echo'</tbody>
                </table>
                
              </div>
            </div>
          </div>
            </div>
           
          </div>';
        }?>
        </div>

         <!--------------------------------- The Modal-------------------------------------- -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
 
    <span class="close">&times;</span>
    
  <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Staff Member Details</h4>
                  <?php
				include_once 'dbConnection.php';
				$query = mysqli_query($con, "SELECT * FROM user WHERE email='$_SESSION[email]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
        echo '
      <ul>
        <li><b>Name :</b> '.$fetch['name'].'</li>
        <li><b>Employee No :</b> '.$fetch['Employee No'].'</li>
        <li><b>Position :</b> '.$fetch['Position'].'</li>
        <li><b>FTE :</b> '.$fetch['F. T. E.'].'</li>
        <li><b>Workplan Advicer :</b> '.$fetch['Workplan Advicer'].'</li>
      </ul>';
	?>
                 
                </div>
              </div>
            </div>
  </div>
  
</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Designed by <a href="#" target="_blank">EngeniaSolutions</a> </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  


<!-- ------------------------------------pop up box------------------------------------------------>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//tab teaching

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab2");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function openCity1(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent1");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab3");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function openCity2(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent2");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab4");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function openCity3(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent3");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab5");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
document.getElementById("defaultOpen1").click();
document.getElementById("defaultOpen2").click();
document.getElementById("defaultOpen3").click();
</script>
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="././vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
  <!-- inject:js -->

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="././js/chart.js"></script>
</body>

</html>

