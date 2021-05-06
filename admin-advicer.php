<!DOCTYPE html>
<?php
	session_start();
	if(!ISSET($_SESSION['email'])){
		header('location:admin-dashboad.php');
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
            <a class="nav-link" <?php if(@$_GET['q']==1) echo'style=" color: #4d83ff;"'; ?> href="admin-dashboad.php?q=1">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" 
            <?php if(@$_GET['q']==2) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==3) echo'style=" color: #4d83ff;"'; ?>
            
            data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Staff Members</span>
              <i <?php if(@$_GET['q']==2) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==3) echo'style=" color: #4d83ff;"'; ?>
            class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1" >
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==2) echo'style=" font-weight:500;"'; ?> href="admin-staffmember.php?q=2">Add New</a></li>
                <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==3) echo'style="font-weight:500;"'; ?> href="admin-staffmember.php?q=3">List </a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" 
            <?php if(@$_GET['q']==4) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==5) echo'style=" color: #4d83ff;"'; ?>
            
            data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi mdi-account-star menu-icon"></i>
              <span class="menu-title">Workplan Advicers</span>
              <i <?php if(@$_GET['q']==4) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==5) echo'style=" color: #4d83ff;"'; ?>
            
            class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2" >
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==4) echo'style=" font-weight:500;"'; ?> href="admin-advicer.php?q=4">Add New</a></li>
                <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==5) echo'style="font-weight:500;"'; ?> href="admin-advicer.php?q=5">List </a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" 
            <?php if(@$_GET['q']==6) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==7) echo'style=" color: #4d83ff;"'; ?>
           
            data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi mdi-account-key menu-icon"></i>
              <span class="menu-title">Admin (User)</span>
              <i <?php if(@$_GET['q']==6) echo'style=" color: #4d83ff;"'; ?>
            <?php if(@$_GET['q']==7) echo'style=" color: #4d83ff;"'; ?>
            
            class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3" >
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==6) echo'style=" font-weight:500;"'; ?> href="admin-user.php?q=6">Add New</a></li>
                <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==7) echo'style="font-weight:500;"'; ?> href="admin-user.php?q=7">List </a></li>
                
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==9) echo'style=" color: #4d83ff;"'; ?> href="admin-dashboad.php?q=9">
              <i class="mdi mdi-calendar-check menu-icon"></i>
              <span class="menu-title">Approval</span>
            </a>
          </li>
         
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        
<!---------------------------------------Add Advicers ---------------------------->
<?php if(@$_GET['q']==4) {

  /*----------------------------------- alart------------ ---*/
if(@$_GET['q7'])
{ echo'
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Error!</strong>  - '.@$_GET['q7'].'
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
';}
/*----------------------------------- alart end------------ ---*/
  echo'
  <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">New Staff Member</h4>

        <form class="forms-sample" name="form" action="add.php" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
        <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label>Name</label>
              <input id="name" name="name" type="text" class="form-control" placeholder="Name" aria-label="Username">
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Employee No</label>
              <input id="Employee_No" name="Employee_No" type="text" class="form-control" placeholder="Employee No" aria-label="Username">
            </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label>Position</label>
              <input id="Position" name="Position" type="text" class="form-control" placeholder="Position" aria-label="Username">
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                      <label>Upload Image</label>
                      <input type="file" name="file" class="file-upload-default">
                      <div class="input-group col-xs-6">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label>Email</label>
              <input id="email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Username">
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Password</label>
              <input id="password" name="password" type="password" class="form-control" placeholder="Username" aria-label="Username">
            </div>
              </div>
            </div>
            <input id="login" name="login" type="hidden" value="1">
            
    
            <button type="submit" name="upload" class="btn btn-primary mr-2">Save</button>
            <!--<button type="submit" class="btn btn-success mr-2">Edit</button>-->
            <button class="btn btn-light">Cancel</button>
            
            </form>
            </div>
        </div>
      </div>
      </div>
      ';
        }?>


<!---------------------------------------Advicers List---------------------------->
<?php if(@$_GET['q']==5) {
  include_once 'dbConnection.php';
  $result = mysqli_query($con,"SELECT * FROM user WHERE login ='1'") or die('Error');
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
                  User
                </th>
                <th>
                  Name
                </th>
                <th>
                  Employee No
                </th>
                <th>
                  Email
                </th>
                <th>
                  Position
                </th>
               
                <th>
                  Action
                </th>
               
              </tr>
            </thead><tbody>';
  
            $c=1;
  while($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    $Employee_No = $row['Employee No'];
    $Position = $row['Position'];
    $FTE = $row['F. T. E.'];
    $Workplan_Advicer = $row['Workplan Advicer'];
    $file = $row['file'];
  
    echo'<tr>
    <td class="py-1">
    <img src="./files/'.$file.'" alt="image"/>
  </td>         
    <td>
    '.$name.'
    </td>
    <td>
    '.$Employee_No.'
    </td>
    <td>
    '.$email.'
    </td>
    <td>
    '.$Position.'
    </td>
    
    <td>
    <div class="btn-group">
    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">Action</button>
    <div class="dropdown-menu">
      <a href="admin-advicer.php?q=44&demail='.$email.'" class="dropdown-item">Edit</a>
      <a href="update.php?demail='.$email.'" class="dropdown-item">Delete</a>
    </div>                          
  </div>
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


<!----------------------------------------Edit advicers------------------------------>
<?php if(@$_GET['q']==44) {
include_once 'dbConnection.php';

$email=$_SESSION['email'];

if(@$_GET['demail'] ) {
  $demail=@$_GET['demail'];
  $query1 = mysqli_query($con, "SELECT * FROM user WHERE email='$demail'") or die(mysqli_error());
  $fetch = mysqli_fetch_array($query1);
  $login = $fetch['login'];
  $name = $fetch['name'];
  $Employee_No = $fetch['Employee No'];
  $Position = $fetch['Position'];
  $FTE = $fetch['F. T. E.'];
  $Workplan_Advicer = $fetch['Workplan Advicer'];
  $email = $fetch['email'];
  $password = $fetch['password'];
  $file = $fetch['file'];


  echo'

  <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">Edit Advicer</h4>

        <form class="forms-sample" name="form" action="update.php?upemail='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data" >
        <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label>Name</label>
              <input value='.$name.' id="name" name="name" type="text" class="form-control" placeholder="Name" aria-label="Username">
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Employee No</label>
              <input value='.$Employee_No.' id="Employee_No" name="Employee_No" type="text" class="form-control" placeholder="Employee No" aria-label="Username">
            </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label>Position</label>
              <input value='.$Position.' id="Position" name="Position" type="text" class="form-control" placeholder="Position" aria-label="Username">
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                      <label>Upload Image</label>
                      <input value="'.$file.'" type="file" name="file" class="file-upload-default">
                      <div class="input-group col-xs-6">
                        <input value="'.$file.'" type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
              </div>
            </div>

            

            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label>Email</label>
              <input value='.$email.' id="email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Username" readonly>
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Password</label>
              <input value='.$password.' id="password" name="password" type="password" class="form-control" placeholder="Username" aria-label="Username">
            </div>
              </div>
            </div>
            <input id="login" name="login" type="hidden" value="0">

            <button type="submit" name="upload" class="btn btn-primary mr-2">Save</button>
            <button class="btn btn-light">Cancel</button>
          </form>
            </div>
        </div>
      </div>
      </div>';
 
 // $result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
  }
  
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
  <script src="././js/file-upload.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="././js/chart.js"></script>
</body>

</html>

