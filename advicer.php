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
            <!--<a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
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
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a href="logout.php?q=login.php" class="dropdown-item">
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
            <a class="nav-link" <?php if(@$_GET['q']==1) echo'style=" color: #4d83ff;"'; ?> href="advicer.php?q=1">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==2) echo'style=" color: #4d83ff;"'; ?> href="advicer.php?q=2">
              <i class="mdi mdi mdi-bell-ring menu-icon"></i>
              <span class="menu-title">Request</span>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        

<?php if(@$_GET['q']==1) {
  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h2>Hi! Welcome To Advicer Dashboad.</h2>
             <!-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p>-->
              
            </div>
          </div>
            </div>
           
          </div>';
        }?>

<!---------------------------------------Advicers List---------------------------->
<?php if(@$_GET['q']==2) {
  include_once 'dbConnection.php';

  $email=$_SESSION['email'];
  $result = mysqli_query($con,"SELECT * FROM request WHERE advicer ='$email'") or die('Error');
    echo'
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
      <div class="card-body">
        <h4 class="card-title">Advicer List</h4>
       <!-- <p class="card-description">
          Add class <code>.table-striped</code>
        </p>-->
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Emp No
                </th>
                <th>
                  Email
                </th>
                
                <th>
                  Action
                </th>
               
              </tr>
            </thead><tbody>';
  
            $c=1;
  while($row = mysqli_fetch_array($result)) {
    $staff_member = $row['staff_member'];
    $Employee_No = $row['Employee_No'];
    $name = $row['name'];
    
  
    echo'<tr>
    <td>
    '.$name.'
    </td>
    <td>
    '.$Employee_No.'
    </td>        
    <td>
    '.$staff_member.'
    </td>
    
    <td>
   <a href="advicer.php?q=3&semail='.$staff_member.'" type="button" class="btn btn-outline-primary btn-fw">View</a>
    </td>
    
  </tr>
  ';
  }
  
            echo'
             
            </tbody>
          </table>
         
        </div>
      </div>
    </div>
      </div>
     
    </div>';
        }?>

<?php if(@$_GET['q']==3) {


if(@$_GET['semail'] ) {
  $email=@$_GET['semail'];
  $query1 = mysqli_query($con, "SELECT * FROM user WHERE email='$email'") or die(mysqli_error());
  $fetch = mysqli_fetch_array($query1);
  $login = $fetch['login'];
  $name = $fetch['name'];
  $Employee_No = $fetch['Employee No'];
  $Position = $fetch['Position'];
  $FTE = $fetch['F. T. E.'];
  $Workplan_Advicer = $fetch['Workplan Advicer'];
  $email = $fetch['email'];
  $file = $fetch['file'];

}

$query1 = mysqli_query($con, "SELECT * FROM request WHERE staff_member='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
$fetch11 = mysqli_fetch_assoc($query1);
$teaching_rel = $fetch11['teaching_rel'];
$hdr1 = $fetch11['hdr'];
$research = $fetch11['research'];
$leadership = $fetch11['leadership'];
$community = $fetch11['community'];
$leave1 = $fetch11['leave1'];


 $total1 = 1457;


    $total = $teaching_rel;
    $hdr = $hdr1;
    $resh = $research;
    $total_admis = $leadership;
    $total_comunity = $community;
    $tl = $leave1;

    $unallocate = 1457 - ($total+$hdr+$resh+$total_admis+$total_comunity+$tl);

    include_once 'dbConnection.php';
 $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email'") or die(mysqli_error());
 $fetchs = mysqli_fetch_array($query);
 
    $teaching = 864;
    $research_Sch = 504;
    $prof_Community = 184;
    $Leadership_Adm = 104;
    $TT = ($fetchs['F. T. E.'] * $teaching) + ($fetchs['F. T. E.'] * $research_Sch) + ($fetchs['F. T. E.'] * $Leadership_Adm) + ($fetchs['F. T. E.'] * $prof_Community);



echo'
<a href="advicer.php?q=2" type="button" class="" style="font-weight:bold; padding:10px"><i class="mdi mdi mdi-arrow-left btn-icon-prepend"></i>
Back</a>

 <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
  <div class="card-body">

 <div class="tab-content py-0 px-0">
 <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
 <div class="d-flex flex-wrap justify-content-xl-between">
 <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
 
 <div class="d-flex flex-column justify-content-around">
   
   <img src="./files/'.$file.'" style="margin-right: 30px; width:40px; heigth:40px; border-radius:50%"alt="Avatar" class="avatar">
 </div>
</div>
   <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
     <i class="mdi mdi-star-circle mr-3 icon-lg text-danger"></i>
     <div class="d-flex flex-column justify-content-around">
       <small class="mb-1 text-muted">Name:</small>
       <h5 class="mr-2 mb-0">'.$name.'</h5>
     </div>
   </div>
   <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
     <i class="mdi mdi-watch mr-3 icon-lg text-success"></i>
     <div class="d-flex flex-column justify-content-around">
       <small class="mb-1 text-muted">Employee No:</small>
       <h5 class="mr-2 mb-0">'.$Employee_No.'</h5>
     </div>
   </div>
   <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
     <i class="mdi mdi-account-card-details mr-3 icon-lg text-warning"></i>
     <div class="d-flex flex-column justify-content-around">
       <small class="mb-1 text-muted">Email:</small>
       <h5 class="mr-2 mb-0">'.$email.'</h5>
     </div>
   </div>
   <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
     <i class="mdi mdi-account mr-3 icon-lg text-danger"></i>
     <div class="d-flex flex-column justify-content-around">
       <small class="mb-1 text-muted">Position</small>
       <h5 class="mr-2 mb-0">'.$Position.'</h5>
     </div>
   </div>
   

 </div>
</div></div>

</div>
   </div>
 </div>
</div>';

  
echo '
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Workload Summary</h4>
     <!-- <p class="card-description">
        Add class <code>.table-striped</code>
      </p>-->
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
              Category
              </th>
              <th>
              Actual
              </th>
              <th>
              Percent of Activity
              </th>
              <th>
              Indicative FTE WL
              </th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
             
              <td>
              Teaching / Teaching-Related
              </td>
              <td>
              '.$total.'
              </td>
              <td>
              '.round($total / $total1 * 100) .'%
              </td>
              <td>
              '.$fetchs['F. T. E.'] * $teaching.'
              </td>
            </tr>
             <tr>
             
              <td>
              HDR Supervision
              </td>
              <td>
              '.$hdr.'
              </td>
              <td>
                '.round($hdr / $total1 * 100) .'%
              </td>
              <td>
                -
              </td>
            </tr>
 <tr>
             
              <td>
              Research
              </td>
              <td>
              '.$resh.'
              </td>
              <td>
                '.round($resh / $total1 * 100) .'%
              </td>
              <td>
              '.$fetchs['F. T. E.'] * $research_Sch.'
              </td>
            </tr>
 <tr>
             
              <td>
              Leadership / Admin
              </td>
              <td>
              '.$total_admis.'
              </td>
              <td>
                '.round($total_admis / $total1 * 100) .'%
              </td>
              <td>
              '.$fetchs['F. T. E.'] * $Leadership_Adm.'
              </td>
            </tr>
            <tr>
             
              <td>
              Prof / Comm Engagement
              </td>
              <td>
              '.$total_comunity.'
              </td>
              <td>
              '.round($total_comunity / $total1 * 100) .'%
              </td>
              <td>
              '.$fetchs['F. T. E.'] * $prof_Community.'
              </td>
            </tr>
            <tr>
             
            <td>
            Leave
            </td>
            <td>
              '.$tl.'
            </td>
            <td>
              '.round($tl / $total1 * 100) .'%
            </td>
            <td>
              -
            </td>
          </tr>
          <tr>
             
          <td>
          Unallocated*
          </td>
          <td>
          '.$unallocate.'
          </td>
          <td>
          '.round($unallocate / $total1 * 100) .'%
          </td>
          <td>
            -
          </td>
        </tr>
        <tr>
             
        <td>
        <b>TOTAL</b>
        </td>
        <td>
          '.$total1.'
        </td>
        <td>
        '.round($total1 / $total1 * 100) .'%
        </td>
        <td>
        '.$TT.'
        </td>
      </tr>
          </tbody>
        </table>
      </div>
      <br>
      <button type="button" class="btn btn-success mr-2" onclick="javascript:savedata()">Approve</button>
                    <button class="btn btn-light">Cancel</button>
    </div>
  </div>
</div>




</div>

';
        }?>
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
  


<script>
  
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

