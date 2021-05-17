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
          <!--<li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>-->
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
        echo '<!-- <img src="./files/'.$fetch['file'].'" alt="profile"/> -->
        <span class="nav-profile-name">'.$fetch['email'].'</span>';
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
            <a class="nav-link" <?php if(@$_GET['q']==1) echo'style=" color: #4d83ff;"'; ?> href="faculty-admin.php?q=1">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php if(@$_GET['q']==2) echo'style=" color: #4d83ff;"'; ?> href="faculty-admin.php?q=2">
              <i class="mdi mdi mdi-library-plus menu-icon"></i>
              <span class="menu-title">Add New Department</span>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        
<!-- -------------------------Faculty admin dashboard----------------->
<?php if(@$_GET['q']==1) {
  include_once 'dbConnection.php';

  $email=$_SESSION['email'];
    
  $query1 = mysqli_query($con, "SELECT * FROM user WHERE email='$email'") or die(mysqli_error());
  $fetch = mysqli_fetch_array($query1);

  $fac_id = $fetch['fac_id'];
  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h2>Hi! Welcome To '.$fac_id.' Faculty - Admin Dashboad.</h2>
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
    
  $query1 = mysqli_query($con, "SELECT * FROM user WHERE email='$email'") or die(mysqli_error());
  $fetch = mysqli_fetch_array($query1);

  $fac_id = $fetch['fac_id'];

  $result = mysqli_query($con,"SELECT * FROM user WHERE login ='2'") or die('Error');
  $position = 'department admin';
  echo'
  <div id="tl" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Add New Department & Department Admin</h4>
              <form class="forms-sample" name="form" action="update.php?q=adddepadmin" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                <label>Department Name</label>
                <input id="dep_id" name="dep_id" type="text" class="form-control form-control-sm" placeholder="Department Name" aria-label="Username">
              </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label>Email</label>
                <input id="email" name="email" type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Username">
              </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label>Password</label>
                <input id="password" name="password" type="text" class="form-control form-control-sm" placeholder="Password" aria-label="Username">
              </div>
                </div></div>
                <input id="login" name="login" type="hidden" value="2">
                <input id="fac_id" name="fac_id" type="hidden" value="'.$fac_id.'">
                <input id="Position" name="Position" type="hidden" value="'.$position.'">
                
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
              </div>
          </div>
        </div>
        </div>';
  
  echo'
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
      <div class="card-body">
        <h4 class="card-title">'.$fac_id.' - Faculty Admin List</h4>
       <!-- <p class="card-description">
          Add class <code>.table-striped</code>
        </p>-->
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Department Name
                </th>
                <th>
                  Admin Email
                </th>
                <th>
                  Password
                </th>
                <th>
                  Action
                </th>
                
              </tr>
            </thead><tbody>';
  
            $c=1;
  while($row = mysqli_fetch_array($result)) {
    $fac_id = $row['fac_id'];
    $email = $row['email'];
    $password = $row['password'];
    $dep_id = $row['dep_id'];
    
      echo'<tr>
      <td>
      '.$dep_id.'
      </td>
      <td>
      '.$email.'
      </td>        
      <td>
      '.$password.'
      </td>
      <td>
  <div class="btn-group">
  <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">Action</button>
  <div class="dropdown-menu">
    <a href="faculty-admin.php?q=3&femail='.$email.'" class="dropdown-item">Edit</a>
    <a href="update.php?ddepemail='.$email.'" class="dropdown-item">Delete</a>
  </div>                          
</div>
  </td>
      
      ';

   
    
  echo'</tr>
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


<!----------------------------------edit faculty admin details------------------->
<?php if(@$_GET['q']==3) {


if(@$_GET['femail'] ) {
  $email=@$_GET['femail'];
  $query1 = mysqli_query($con, "SELECT * FROM user WHERE email='$email'") or die(mysqli_error());
  $fetch = mysqli_fetch_array($query1);

  $fac_id = $fetch['fac_id'];
  $dep_id = $fetch['dep_id'];
  $email = $fetch['email'];
  $password = $fetch['password'];
  

}

echo'
<a href="faculty-admin.php?q=2" type="button" class="" style="font-weight:bold; padding:10px"><i class="mdi mdi mdi-arrow-left btn-icon-prepend"></i>
Back</a>

<div id="tl" class="row">
      <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Update Faculty & Faculty Admin</h4>
            <form class="forms-sample" name="form" action="update.php?edit_dep='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-4">
              <div class="form-group">
              <label>Email</label>
              <input value='.$email.' id="email" name="email" type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Username" readonly>
            </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
              <label>Faculty Name</label>
              <input value="'.$dep_id.'" id="dep_id" name="dep_id" type="text" class="form-control form-control-sm" placeholder="Faculty Name" aria-label="Username">
            </div>
              </div>
              
              <div class="col-md-4">
              <div class="form-group">
              <label>Password</label>
              <input value='.$password.' id="password" name="password" type="text" class="form-control form-control-sm" placeholder="Password" aria-label="Username">
            </div>
              </div></div>
              <input id="login" name="login" type="hidden" value="4">
              
              <input id="Position" name="Position" type="hidden" value="faculty admin">
              
            <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
            </div>
        </div>
      </div>
      </div>';
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

