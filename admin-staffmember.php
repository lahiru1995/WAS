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
  
  <script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name must be filled out.");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("college must be filled out.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Passwords must match.");return false;}}
</script>
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
          <!--  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
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
            <!--<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
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
          
       
      
<!----------------------------------- Add Staff memeber -------------------------------------------->
<?php if(@$_GET['q']==2) {

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
              <label>F. T. E.</label>
              <input id="FTE" name="FTE" type="text" class="form-control" placeholder="F T E" aria-label="Username">
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Workplan Advicer</label>
              <input id="Workplan_Advicer" name="Workplan_Advicer" type="text" class="form-control" placeholder="Workplan Advicer" aria-label="Username">
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
            <input id="login" name="login" type="hidden" value="0">

            <button type="submit" name="upload" class="btn btn-primary mr-2">Save</button>
            <button class="btn btn-light">Cancel</button>
          </form>
            </div>
        </div>
      </div>
      </div>';
    }?>
        

<?php if(@$_GET['q']==3) {
include_once 'dbConnection.php';
$result = mysqli_query($con,"SELECT * FROM user WHERE login ='0'") or die('Error');
  echo'
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
      <h4 class="card-title">Staff Member List</h4>
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
                Emp: No:
              </th>
              <th>
                Email
              </th>
              <th>
                Position
              </th>
              <th>
                F.T.E.
              </th>
              <th>
                WP Advicer
              </th>
              <th>
                Action
              </th>
              <th>
              Manage
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
  '.$FTE.'
  </td>
  <td>
  '.$Workplan_Advicer.'
  </td>
  <td>
  <div class="btn-group">
  <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">Action</button>
  <div class="dropdown-menu">
    <a href="admin-staffmember.php?q=22&demail='.$email.'" class="dropdown-item">Edit</a>
    <a href="update.php?demail='.$email.'" class="dropdown-item">Delete</a>
  </div>                          
</div>
  </td>
  <td>
  <a href="admin-staffmember.php?q=8&memail='.$email.'" type="button" class="btn btn-outline-primary btn-fw">Manage</a>
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




<?php if(@$_GET['q']==8) {

include_once 'dbConnection.php';

$email=$_SESSION['email'];

if(@$_GET['memail'] ) {
  $memail=@$_GET['memail'];
  $query1 = mysqli_query($con, "SELECT * FROM user WHERE email='$memail'") or die(mysqli_error());
  $fetch = mysqli_fetch_array($query1);
  $login = $fetch['login'];
  $name = $fetch['name'];
  $Employee_No = $fetch['Employee No'];
  $Position = $fetch['Position'];
  $FTE = $fetch['F. T. E.'];
  $Workplan_Advicer = $fetch['Workplan Advicer'];
  $email = $fetch['email'];
  $file = $fetch['file'];

echo'
<a href="admin-staffmember.php?q=3" type="button" class="" style="font-weight:bold; padding:10px"><i class="mdi mdi mdi-arrow-left btn-icon-prepend"></i>
Back</a>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
  <div class="card-body">
  <div style="display:flex;  align-items:center; ">
  <img src="./files/'.$file.'" style="margin-right: 30px; width:40px; heigth:40px; border-radius:50%"alt="Avatar" class="avatar">
  <h5 style="padding-right:30px">Name: <small class="text-muted">'.$name.'</small></h5>
  <h5 style="padding-right:30px">Employee No: <small class="text-muted">'.$Employee_No.'</small></h5>
  <h5 style="padding-right:30px">Email: <small class="text-muted">'.$email.'</small></h5>
  <h5 style="padding-right:30px">Position: <small class="text-muted">'.$Position.'</small></h5>
  <a href="" style="margin: 0px 10px 0px 10px" type="button" class="btn btn-outline-primary btn-fw">Edit</a>
  <a href="admin-staffmember.php?q=10&vemail='.$email.'" style="margin: 0px 10px 0px 10px" type="button" class="btn btn-outline-primary btn-fw">View</a>
  </div>
  
  <!-- <p class="card-description">
      Add class <code>.table-striped</code>
    </p>-->
    
  </div>
</div>
  </div>
 
</div>';


    echo'
    
    <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <h4 class="card-title">Global Course Coordination</h4>

          <form class="forms-sample" name="form-GC" action="update.php?GC-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
          
          <div class="row">
                <div class="col-md-2">
                <div class="form-group">
                <label>Course code</label>
                <input id="Course_code" name="Course_code" type="text" class="form-control form-control-sm" placeholder="Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Semester</label>
                <input id="Semester" name="Semester" type="text" class="form-control form-control-sm" placeholder="Semester" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>*Total Cordi: Hours</label>
                <input id="Total_hours" name="Total_hours" type="text" class="form-control form-control-sm" placeholder="Total hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Allocation Melbourne</label>
                <input id="Alo_Melbourne" name="Alo_Melbourne" type="text" class="form-control form-control-sm" placeholder="Allocation Melbourne" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Allocation OUA</label>
                <input id="Allocation_OUA" name="Allocation_OUA" type="text" class="form-control form-control-sm" placeholder="Allocation OUA" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>RMIT online</label>
                <input id="RMIT_online" name="RMIT_online" type="text" class="form-control form-control-sm" placeholder="RMIT online" aria-label="Username">
              </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                <div class="form-group">
                <label>Allocation SIM</label>
                <input id="Allocation_SIM" name="Allocation_SIM" type="text" class="form-control form-control-sm" placeholder="Allocation SIM" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Allocation VM</label>
                <input id="Allocation_VM" name="Allocation_VM" type="text" class="form-control form-control-sm" placeholder="Allocation VM" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Allocation SUIBE</label>
                <input id="Allocation_SUIBE" name="Allocation_SUIBE" type="text" class="form-control form-control-sm" placeholder="Allocation SUIBE" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Allocation UPH</label>
                <input id="Allocation_UPH" name="Allocation_UPH" type="text" class="form-control form-control-sm" placeholder="Allocation UPH" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Extra WIL</label>
                <input id="Extra_WIL" name="Extra_WIL" type="text" class="form-control form-control-sm" placeholder="Extra WIL" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
              </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
              </div>
          </div>
        </div>
        </div>
             

              <div id="sem" class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

          <div class="tab1" style="display:flex">
              <button id="defaultOpen" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab2" onclick="openCity(event, `sem-one`)">Semester One Teaching</button>
              <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab2" onclick="openCity(event, `sem-two`)">Semester Two Teaching</button>
            </div>

              <div id="sem-one" class="tabcontent" style="display:none">
              <form class="forms-sample" name="forms-semester1" action="update.php?ST1-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-2">
                <div class="form-group">
                <label>Course code</label>
                <input id="Course_code1" name="Course_code1" type="text" class="form-control form-control-sm" placeholder="Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Description</label>
                <input id="Description1" name="Description1" type="text" class="form-control form-control-sm" placeholder="Description" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Activity Type</label>
                <input id="Activity_Type1" name="Activity_Type1" type="text" class="form-control form-control-sm" placeholder="Activity Type" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Scheduled Dates</label>
                <input id="Scheduled_Dates1" name="Scheduled_Dates1" type="text" class="form-control form-control-sm" placeholder="Scheduled Dates" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Scheduled Start time</label>
                <input id="Scheduled_Start_time1" name="Scheduled_Start_time1" type="text" class="form-control form-control-sm" placeholder="Scheduled Start time" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Duration</label>
                <input id="Duration1" name="Duration1" type="text" class="form-control form-control-sm" placeholder="Duration" aria-label="Username">
              </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                <div class="form-group">
                <label>Class Gap</label>
                <input id="Class_Gap1" name="Class_Gap1" type="text" class="form-control form-control-sm" placeholder="Class Gap" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Teaching Weeks</label>
                <input id="Teaching_Weeks1" name="Teaching_Weeks1" type="text" class="form-control form-control-sm" placeholder="Teaching Weeks" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Workload hours</label>
                <input id="Workload_hours1" name="Workload_hours1" type="text" class="form-control form-control-sm" placeholder="Workload hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
              </div>
                </div>
              </div>
              <input id="sem" name="sem" type="hidden" value="1">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
            </div>

              <div id="sem-two" class="tabcontent" style="display:none">
              <form class="forms-sample" name="forms-semester2" action="update.php?ST2-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-2">
                <div class="form-group">
                <label>Course code*</label>
                <input id="Course_code1" name="Course_code1" type="text" class="form-control form-control-sm" placeholder="Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Description</label>
                <input id="Description1" name="Description1" type="text" class="form-control form-control-sm" placeholder="Description" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Activity Type</label>
                <input id="Activity_Type1" name="Activity_Type1" type="text" class="form-control form-control-sm" placeholder="Activity Type" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Scheduled Dates</label>
                <input id="Scheduled_Dates1" name="Scheduled_Dates1" type="text" class="form-control form-control-sm" placeholder="Scheduled Dates" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Scheduled Start time</label>
                <input id="Scheduled_Start_time1" name="Scheduled_Start_time1" type="text" class="form-control form-control-sm" placeholder="Scheduled Start time" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Duration</label>
                <input id="Duration1" name="Duration1" type="text" class="form-control form-control-sm" placeholder="Duration" aria-label="Username">
              </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                <div class="form-group">
                <label>Class Gap</label>
                <input id="Class_Gap1" name="Class_Gap1" type="text" class="form-control form-control-sm" placeholder="Class Gap" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Teaching Weeks</label>
                <input id="Teaching_Weeks1" name="Teaching_Weeks1" type="text" class="form-control form-control-sm" placeholder="Teaching Weeks" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                <label>Workload hours</label>
                <input id="Workload_hours1" name="Workload_hours1" type="text" class="form-control form-control-sm" placeholder="Workload hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
              </div>
                </div>
              </div>
              <input id="sem" name="sem" type="hidden" value="2">
              <button type="submit" class="btn btn-primary mr-2">Submit*</button>
              </form></div>
              </div>
          </div>
        </div>
        </div>
           
        
      

        <div id="sim" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              
              <div class="tab1" style="display:flex">
              <button id="defaultOpen1" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab3" onclick="openCity1(event, `sim-sem-one`)">SIM Semester One Teaching</button>
              <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab3" onclick="openCity1(event, `sim-sem-two`)">SIM Semester Two Teaching</button>
            </div>

              <div id="sim-sem-one" class="tabcontent1">
              <form class="forms-sample" name="forms-sim-semester1" action="update.php?SST1-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Course code</label>
                <input id="Course_code3" name="Course_code3" type="text" class="form-control form-control-sm" placeholder="Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Course Coordinator</label>
                <input id="Course_Coordinator" name="Course_Coordinator" type="text" class="form-control form-control-sm" placeholder="Course Coordinator" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Meeting atendees</label>
                <input id="Meeting_atendees" name="Meeting_atendees" type="text" class="form-control form-control-sm" placeholder="Meeting atendees" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Visiting Lecture</label>
                <input id="Visiting_Lecture" name="Visiting_Lecture" type="text" class="form-control form-control-sm" placeholder="Visiting Lecture" aria-label="Username">
              </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>First Time visit to SIM</label>
                <input id="First_Time_visit" name="First_Time_visit" type="text" class="form-control form-control-sm" placeholder="First Time visit" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Visiting Staff Member</label>
                <input id="Visiting_Staff_Member" name="Visiting_Staff_Member" type="text" class="form-control form-control-sm" placeholder="Visiting Staff Member" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Sum Workload Hours</label>
                <input id="Sum_Workload_Hours" name="Sum_Workload_Hours" type="text" class="form-control form-control-sm" placeholder="Sum Workload Hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div>
              <input id="sem" name="sem" type="hidden" value="1">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form></div>

              <div id="sim-sem-two" class="tabcontent1" style="display:none">
              <form class="forms-sample" name="forms-sim-semester2" action="update.php?SST2-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Course code*</label>
                <input id="Course_code3" name="Course_code3" type="text" class="form-control form-control-sm" placeholder="Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Course Coordinator</label>
                <input id="Course_Coordinator" name="Course_Coordinator" type="text" class="form-control form-control-sm" placeholder="Course Coordinator" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Meeting atendees</label>
                <input id="Meeting_atendees" name="Meeting_atendees" type="text" class="form-control form-control-sm" placeholder="Meeting atendees" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Visiting Lecture</label>
                <input id="Visiting_Lecture" name="Visiting_Lecture" type="text" class="form-control form-control-sm" placeholder="Visiting Lecture" aria-label="Username">
              </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>First Time visit to SIM</label>
                <input id="First_Time_visit" name="First_Time_visit" type="text" class="form-control form-control-sm" placeholder="First Time visit" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Visiting Staff Member</label>
                <input id="Visiting_Staff_Member" name="Visiting_Staff_Member" type="text" class="form-control form-control-sm" placeholder="Visiting Staff Member" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Sum Workload Hours</label>
                <input id="Sum_Workload_Hours" name="Sum_Workload_Hours" type="text" class="form-control form-control-sm" placeholder="Sum Workload Hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div>
              <input id="sem" name="sem" type="hidden" value="2">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form></div>
              </div>
          </div>
        </div>
        </div>

    

        <div id="online" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              
              
              <div class="tab1" style="display:flex">
              <button id="defaultOpen2" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab4" onclick="openCity2(event, `online-teach1`)">ONLINE TEACHING 1</button>
              <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab4" onclick="openCity2(event, `online-teach2`)">ONLINE TEACHING 2</button>
            </div>

              <div id="online-teach1" class="tabcontent2">
              <form class="forms-sample" name="forms-online1" action="update.php?OT1-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Melb Course code</label>
                <input id="Melb_Course_code" name="Melb_Course_code" type="text" class="form-control form-control-sm" placeholder="Melb Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>OUA Course Code</label>
                <input id="OUA_Course_Code" name="OUA_Course_Code" type="text" class="form-control form-control-sm" placeholder="OUA Course Code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Course Name</label>
                <input id="Course_Name" name="Course_Name" type="text" class="form-control form-control-sm" placeholder="Course Name" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Study Session</label>
                <input id="Study_Session" name="Study_Session" type="text" class="form-control form-control-sm" placeholder="Study Session" aria-label="Username">
              </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Delivary Staff</label>
                <input id="Delivary_Staff" name="Delivary_Staff" type="text" class="form-control form-control-sm" placeholder="Delivary Staff" aria-label="Username">
              </div>
                </div>
                
                <div class="col-md-3">
                <div class="form-group">
                <label>Hours</label>
                <input id="Hours" name="Hours" type="text" class="form-control form-control-sm" placeholder="Hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div>
              <input id="sem" name="sem" type="hidden" value="1">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form></div>

              <div id="online-teach2" class="tabcontent2" style="display:none">
              <form class="forms-sample" name="forms-online2" action="update.php?OT2-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Melb Course code*</label>
                <input id="Melb_Course_code" name="Melb_Course_code" type="text" class="form-control form-control-sm" placeholder="Melb Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>OUA Course Code</label>
                <input id="OUA_Course_Code" name="OUA_Course_Code" type="text" class="form-control form-control-sm" placeholder="OUA Course Code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Course Name</label>
                <input id="Course_Name" name="Course_Name" type="text" class="form-control form-control-sm" placeholder="Course Name" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Study Session</label>
                <input id="Study_Session" name="Study_Session" type="text" class="form-control form-control-sm" placeholder="Study Session" aria-label="Username">
              </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Delivary Staff</label>
                <input id="Delivary_Staff" name="Delivary_Staff" type="text" class="form-control form-control-sm" placeholder="Delivary Staff" aria-label="Username">
              </div>
                </div>
                
                <div class="col-md-3">
                <div class="form-group">
                <label>Hours</label>
                <input id="Hours" name="Hours" type="text" class="form-control form-control-sm" placeholder="Hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div>
              <input id="sem" name="sem" type="hidden" value="2">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form></div>
              </div>
          </div>
        </div>
        </div>

    

      <div id="suib" class="row">
      <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              
              <div class="tab1" style="display:flex">
              <button id="defaultOpen3" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab5" onclick="openCity3(event, `SUIBE1`)">SUIBE Teaching 1</button>
              <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab5" onclick="openCity3(event, `SUIBE2`)">SUIBE Teaching 2</button>
            </div>

              <div id="SUIBE1" class="tabcontent3">
              <form class="forms-sample" name="forms-suibe1" action="update.php?SU1-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Course code</label>
                <input id="Course_code" name="Course_code" type="text" class="form-control form-control-sm" placeholder="Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Course</label>
                <input id="Course" name="Course" type="text" class="form-control form-control-sm" placeholder="Course" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Visiting Lecture</label>
                <input id="Visiting_Lecture" name="Visiting_Lecture" type="text" class="form-control form-control-sm" placeholder="Visiting Lecture" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Sum of workload Hours</label>
                <input id="Sum_of_workload" name="Sum_of_workload" type="text" class="form-control form-control-sm" placeholder="Sum of workload" aria-label="Username">
              </div>
                </div>
              </div>
              <input id="sem" name="sem" type="hidden" value="1">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form></div>

              <div id="SUIBE2" class="tabcontent3" style="display:none">
              <form class="forms-sample" name="forms-suibe2" action="update.php?SU2-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Course code*</label>
                <input id="Course_code" name="Course_code" type="text" class="form-control form-control-sm" placeholder="Course code" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Course</label>
                <input id="Course" name="Course" type="text" class="form-control form-control-sm" placeholder="Course" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Visiting Lecture</label>
                <input id="Visiting_Lecture" name="Visiting_Lecture" type="text" class="form-control form-control-sm" placeholder="Visiting Lecture" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Sum of workload Hours</label>
                <input id="Sum_of_workload" name="Sum_of_workload" type="text" class="form-control form-control-sm" placeholder="Sum of workload" aria-label="Username">
              </div>
                </div>
              </div>
              <input id="sem" name="sem" type="hidden" value="2">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form></div>
              </div>
          </div>
        </div>
        </div>

     

        <div id="tl" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">T&L Allowance</h4>
              <form class="forms-sample" name="forms-tl" action="update.php?TL-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Allocation Name</label>
                <input id="TL1" name="TL1" type="text" class="form-control form-control-sm" placeholder="T&L" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Notes</label>
                <input id="Notes" name="Notes" type="text" class="form-control form-control-sm" placeholder="Notes" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Hours</label>
                <input id="Hours" name="Hours" type="text" class="form-control form-control-sm" placeholder="Hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
              </div>
          </div>
        </div>
        </div><hr>

        
      
        <div id="res" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Research</h4>
              <form class="forms-sample" name="forms-R-total" action="update.php?Rt-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label><b>Total Research Hours</b></label>
                 <input id="Total_Research_Hours" name="Total_Research_Hours" type="text" class="form-control form-control-sm" placeholder="Total Research Hours" aria-label="Username">
                
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
              <button style="margin-top:3.5px;" type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
              </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div>
              <hr>
              
              <form class="forms-sample" name="forms-R-hdr" action="update.php?R-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>HDR Hours</label>
                <input id="HDR_Hours" name="HDR_Hours" type="text" class="form-control form-control-sm" placeholder="HDR Hours" aria-label="Username">
                
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Associate Supervisor</label>
                <input id="Associate_Supervisor" name="Associate_Supervisor" type="text" class="form-control form-control-sm" placeholder="Associate Supervisor" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Joint Senior Supervisor</label>
                <input id="Joint_Senior_Supervisor" name="Joint_Senior_Supervisor" type="text" class="form-control form-control-sm" placeholder="Joint Senior Supervisor" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Senior Supervisor</label>
                <input id="Senior_Supervisor" name="Senior_Supervisor" type="text" class="form-control form-control-sm" placeholder="Senior Supervisor" aria-label="Username">
              </div>
                </div>
              </div>
              
              
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
              </div>
          </div>
        </div>
        </div>

        <div id="admin" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Administration</h4>
              <form class="forms-sample" name="forms-ADt" action="update.php?ADt-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label><b>Standard Administration Hours</b></label>
                <input id="Standard_Administration" name="Standard_Administration" type="text" class="form-control form-control-sm" placeholder="Standard Administration" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
              <button style="margin-top:3.5px;" type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div><hr>

              <form class="forms-sample" name="forms-AD" action="update.php?AD-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Allocation Name</label>
                <input id="Allocation_Name" name="Allocation_Name" type="text" class="form-control form-control-sm" placeholder="Allocation Name" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Hours</label>
                <input id="Hours" name="Hours" type="text" class="form-control form-control-sm" placeholder="Hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
              </div>
          </div>
        </div>
        </div>

        <div id="com" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Professional/ community Engagement</h4>
              <form class="forms-sample" name="forms-CEt" action="update.php?CEt-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label><b>Standard Professional Hours</b></label>
                <input id="Standard_Professional" name="Standard_Professional" type="text" class="form-control form-control-sm" placeholder="Standard Professional" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
              <button style="margin-top:3.5px;" type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                
              </div>
                </div>
              </div><hr>

              <form class="forms-sample" name="forms-CE" action="update.php?CE-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                
                <div class="col-md-3">
                <div class="form-group">
                <label>Allocation Name</label>
                <input id="Allocation_Name" name="Allocation_Name" type="text" class="form-control form-control-sm" placeholder="Allocation Name" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Hours</label>
                <input id="Hours" name="Hours" type="text" class="form-control form-control-sm" placeholder="Hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
              </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
              </div>
          </div>
        </div>
        </div>

        <div id="lev" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Leave</h4>
              <form class="forms-sample" name="forms-LEV" action="update.php?LEV-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Allocation Name</label>
                <input id="Allocation_Name" name="Allocation_Name" type="text" class="form-control form-control-sm" placeholder="Allocation Name" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Hours</label>
                <input id="Hours" name="Hours" type="text" class="form-control form-control-sm" placeholder="Hours" aria-label="Username">
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                
              </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                
              </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
              </div>
          </div>
        </div>
        </div>

              
        ';}

        
}?>



<?php if(@$_GET['q']==22) {
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

}
  echo'

  <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">Edit Staff Member</h4>

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
              <label>F. T. E.</label>
              <input id="FTE" name="FTE" type="text" class="form-control" placeholder="F T E" aria-label="Username" value="'.$FTE.'">
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Workplan Advicer</label>
              <input value='.$Workplan_Advicer.' id="Workplan_Advicer" name="Workplan_Advicer" type="text" class="form-control" placeholder="Workplan Advicer" aria-label="Username">
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
  
  
    }?>

<?php if(@$_GET['q']==10) {

include_once 'dbConnection.php';

if(@$_GET['vemail'] ) {
  $email=@$_GET['vemail'];
//$email=$_SESSION['email'];

$query1 = mysqli_query($con, "SELECT SUM(Workload_hours) AS sum FROM semester_teaching WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch = mysqli_fetch_assoc($query1);
 $s = $fetch['sum'];

 $query2 = mysqli_query($con, "SELECT SUM(Total_Hours) AS sum1 FROM course_coordination WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch1 = mysqli_fetch_assoc($query2);
 $s1 = $fetch1['sum1'];

 $query3 = mysqli_query($con, "SELECT SUM(Sum_Workload_Hours) AS sum2 FROM sim_semester WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch2 = mysqli_fetch_assoc($query3);
 $s2 = $fetch2['sum2'];

 $query4 = mysqli_query($con, "SELECT SUM(Hours) AS sum3 FROM online_teaching WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch3 = mysqli_fetch_assoc($query4);
 $s3 = $fetch3['sum3'];

 $query5 = mysqli_query($con, "SELECT SUM(Sum_of_workload) AS sum4 FROM suibe WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch4 = mysqli_fetch_assoc($query5);
 $s4 = $fetch4['sum4'];

 $query6 = mysqli_query($con, "SELECT SUM(hours) AS sum5 FROM tl_allowance WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch5 = mysqli_fetch_assoc($query6);
 $s5 = $fetch5['sum5'];
  
$total = $s+$s1+$s2+$s3+$s4+$s5;

$query7 = mysqli_query($con, "SELECT SUM(HDR_Hours) AS hdr FROM research WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch6 = mysqli_fetch_assoc($query7);
 $hdr = $fetch6['hdr'];

 $query8 = mysqli_query($con, "SELECT * FROM total_research WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch7 = mysqli_fetch_assoc($query8);
 $resh = $fetch7['Total_Research_Hours'];

 $query9 = mysqli_query($con, "SELECT * FROM total_administration WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch8 = mysqli_fetch_assoc($query9);
 $adm = $fetch8['Standard_Administration'];

 $query10 = mysqli_query($con, "SELECT SUM(Hours) AS th FROM administration WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch9 = mysqli_fetch_assoc($query10);
 $th = $fetch9['th'];

 $total_admis = $adm + $th;

 $query11 = mysqli_query($con, "SELECT * FROM total_community_eng WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch10 = mysqli_fetch_assoc($query11);
 $sp = $fetch10['Standard_Professional'];

 $query12 = mysqli_query($con, "SELECT SUM(Hours) AS tc FROM community_eng WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch11 = mysqli_fetch_assoc($query12);
 $tc = $fetch11['tc'];

 $total_comunity = $sp + $tc;

 $query13 = mysqli_query($con, "SELECT SUM(Hours) AS tl FROM leave1 WHERE email='$email'") or die(mysqli_error());
 //$fetch = mysqli_fetch_array($query1);
 $fetch12 = mysqli_fetch_assoc($query13);
 $tl = $fetch12['tl'];
 if($tl==''){$tl=0;}else{$tl=$tl;}

 $unallocate = 1457 - ($total+$hdr+$resh+$total_admis+$total_comunity+$tl);

 $total1 = 1457;


 include_once 'dbConnection.php';
 $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email'") or die(mysqli_error());
 $fetch = mysqli_fetch_array($query);
 


 echo'

 <a href="admin-staffmember.php?q=8&memail='.$email.'" type="button" class="" style="font-weight:bold; padding:10px"><i class="mdi mdi mdi-arrow-left btn-icon-prepend"></i>
Back</a>

 <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
  <div class="card-body">

 <div class="tab-content py-0 px-0">
 <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
 <div class="d-flex flex-wrap justify-content-xl-between">
   
   <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
     <i class="mdi mdi-star-circle mr-3 icon-lg text-danger"></i>
     <div class="d-flex flex-column justify-content-around">
       <small class="mb-1 text-muted">Employee No:</small>
       <h5 class="mr-2 mb-0">'.$fetch['Employee No'].'</h5>
     </div>
   </div>
   <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
     <i class="mdi mdi-watch mr-3 icon-lg text-success"></i>
     <div class="d-flex flex-column justify-content-around">
       <small class="mb-1 text-muted">F. T. E.</small>
       <h5 class="mr-2 mb-0">'.$fetch['F. T. E.'].'</h5>
     </div>
   </div>
   <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
     <i class="mdi mdi-account-card-details mr-3 icon-lg text-warning"></i>
     <div class="d-flex flex-column justify-content-around">
       <small class="mb-1 text-muted">Position</small>
       <h5 class="mr-2 mb-0">'.$fetch['Position'].'</h5>
     </div>
   </div>
   <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
     <i class="mdi mdi-account mr-3 icon-lg text-danger"></i>
     <div class="d-flex flex-column justify-content-around">
       <small class="mb-1 text-muted">Workplan Advicer</small>
       <h5 class="mr-2 mb-0">'.$fetch['Workplan Advicer'].'</h5>
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
                -
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
                  -
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
                  -
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
                  -
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
            -
          </td>
        </tr>
            </tbody>
          </table></div>
        </div>
      </div>
    </div>
  </div>';


  //------------------course coordination---------------------------
$result = mysqli_query($con, "SELECT * FROM course_coordination WHERE email='$email'") or die(mysqli_error());

echo'
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
          <div class="card-body">
            
            <div class="tab-button" style="display:flex">
            <button id="tab7" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab7" onclick="myFunction()">Global Course Coordination</button>
          </div>
          <div id="myDIV" style="display: none">
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
            </div></div>
          </div>
        </div>
          </div>
         
        </div>';

//------------------teaching---------------------------
$result01 = mysqli_query($con, "SELECT * FROM semester_teaching WHERE email='$email' AND sem='1'") or die(mysqli_error());
$result1 = mysqli_query($con, "SELECT * FROM semester_teaching WHERE email='$email' AND sem='2'") or die(mysqli_error());
  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">

            <div class="tab-button" style="display:flex">
            <button id="tab8" style="padding-top:0px; padding-left:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab8" onclick="myFunction1()">Teaching</button>
          </div>
         
          <!-- --------teaching start----------------------->
          <div id="myDIV1" style="display: none">
          <hr>
            <div class="tab1" style="display:flex">
              <button id="defaultOpen" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab2" onclick="openCity5(event, `sem-one`)">Semester One Teaching</button>
              <button style="padding-top:0px; margin-top:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab2" onclick="openCity5(event, `sem-two`)">Semester Two Teaching</button>
            </div>

             <!-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p>-->

              <div id="sem-one" class="tabcontent" style="display:none">
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
                  while($row = mysqli_fetch_array($result01)) {
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
               
                
              </div></div>';

                        
//SIM semester teaching
$sim1 = mysqli_query($con, "SELECT * FROM sim_semester WHERE email='$email' AND sem='1'") or die(mysqli_error());
$sim2 = mysqli_query($con, "SELECT * FROM sim_semester WHERE email='$email' AND sem='2'") or die(mysqli_error());
echo'

 <br><hr><br>
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

  '; 


//Online teaching
$online1 = mysqli_query($con, "SELECT * FROM online_teaching WHERE email='$email' AND sem='1'") or die(mysqli_error());
$online2 = mysqli_query($con, "SELECT * FROM online_teaching WHERE email='$email' AND sem='2'") or die(mysqli_error());
echo'
<br><hr><br>
    
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

  '; 


//SUIBE teaching
$suibe1 = mysqli_query($con, "SELECT * FROM suibe WHERE email='$email' AND sem='1'") or die(mysqli_error());
$suibe2 = mysqli_query($con, "SELECT * FROM suibe WHERE email='$email' AND sem='2'") or die(mysqli_error());
echo'
<br><hr><br>

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


              <!-- --------teaching END----------------------->
              </div>

            </div>
          </div>
            </div>
           
          </div>';
          

//------------------T & L Allowance---------------------------
  $resulttl = mysqli_query($con, "SELECT * FROM tl_allowance WHERE email='$email'") or die(mysqli_error());


echo'
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
          <div class="card-body">
            
            <div class="tab-button" style="display:flex">
            <button id="tab9" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab9" onclick="myFunction2()">T & L Allowance</button>
          </div>
          <div id="myDIV2" style="display: none">
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
                  while($row = mysqli_fetch_array($resulttl)) {
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
          </div>
         
        </div>';
  

        //------------------research---------------------------
        $query8 = mysqli_query($con, "SELECT * FROM total_research WHERE email='$email'") or die(mysqli_error());
        //$fetch = mysqli_fetch_array($query1);
        $fetch7 = mysqli_fetch_assoc($query8);
        $resh = $fetch7['Total_Research_Hours'];
      
        $resultre = mysqli_query($con, "SELECT * FROM research WHERE email='$email'") or die(mysqli_error());
        

  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              
              <div class="tab-button" style="display:flex">
              <button id="tab10" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab10" onclick="myFunction3()">Research / H D R</button>
            </div>
            <div id="myDIV3" style="display: none">

            <h5>Total Research Hours - '.$resh.'</h5>
            <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    HDR Hours
                  </th>
                  <th>
                  Associate Supervisor
                  </th>
                  <th>
                  Joint Senior Supervisor
                  </th>
                  <th>
                  Senior Supervisor
                  </th>
                  
                </tr>
              </thead>
              <tbody>';

              while($row = mysqli_fetch_array($resultre)) {
                $HDR_Hours = $row['HDR_Hours'];
                $Associate_Supervisor = $row['Associate_Supervisor'];
                $Joint_Senior_Supervisor = $row['Joint_Senior_Supervisor'];
                $Senior_Supervisor = $row['Senior_Supervisor'];
                
              echo'
                <tr>
                 
                  <td>
                    '.$HDR_Hours.'
                  </td>
                  <td>
                    '.$Associate_Supervisor.'
                  </td>
                  <td>
                    '.$Joint_Senior_Supervisor.'
                  </td>
                  <td>
                    '.$Senior_Supervisor.'
                  </td>
                  
                </tr>
                 ';}
                echo'
     
              </tbody>
            </table>
          </div>
            </div>
  
            </div>
          </div>
            </div>
           
          </div>';

          
           //------------------Administration ---------------------------
           $query99 = mysqli_query($con, "SELECT * FROM total_administration WHERE email='$email'") or die(mysqli_error());
           //$fetch = mysqli_fetch_array($query1);
           $fetch88 = mysqli_fetch_assoc($query99);
           $adm = $fetch88['Standard_Administration'];

           $query10 = mysqli_query($con, "SELECT SUM(Hours) AS th FROM administration WHERE email='$email'") or die(mysqli_error());
           //$fetch = mysqli_fetch_array($query1);
           $fetch9 = mysqli_fetch_assoc($query10);
           $th = $fetch9['th'];

           $total_admis = $adm + $th;

           $resultAd = mysqli_query($con, "SELECT * FROM administration WHERE email='$email'") or die(mysqli_error());
           

  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              
              <div class="tab-button" style="display:flex">
              <button id="tab11" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab11" onclick="myFunction4()">Administration / Leadership</button>
            </div>
            <div id="myDIV4" style="display: none">

            <h5>Standard Administration / Leadership Allocation - '.$total_admis.'</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                        Allocation Name
                      </th>
                      <th>
                        Hours
                      </th>
                      
                    </tr>
                  </thead>
                  <tbody>';

                  while($row = mysqli_fetch_array($resultAd)) {
                    $Allocation_Name1 = $row['Allocation_Name'];
                    $Hours1 = $row['Hours'];
                    
                  echo'
                    <tr>
                     
                      <td>
                        '.$Allocation_Name1.'
                      </td>
                      <td>
                        '.$Hours1.'
                      </td>
                      
                      
                    </tr>';}
                     
                  echo'</tbody>
                </table>
              </div>
            </div>
  
            </div>
          </div>
            </div>
           
          </div>';


          //------------------Community Engadgement ---------------------------
          $query11 = mysqli_query($con, "SELECT * FROM total_community_eng WHERE email='$email'") or die(mysqli_error());
          //$fetch = mysqli_fetch_array($query1);
          $fetch10 = mysqli_fetch_assoc($query11);
          $sp = $fetch10['Standard_Professional'];
          
          $query12 = mysqli_query($con, "SELECT SUM(Hours) AS tc FROM community_eng WHERE email='$email'") or die(mysqli_error());
          //$fetch = mysqli_fetch_array($query1);
          $fetch11 = mysqli_fetch_assoc($query12);
          $tc = $fetch11['tc'];
          
          $total_comunity = $sp + $tc;
          
          $resultco = mysqli_query($con, "SELECT * FROM community_eng WHERE email='$email'") or die(mysqli_error());
           

 echo'
         <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
           <div class="card">
           <div class="card-body">
             
             <div class="tab-button" style="display:flex">
             <button id="tab12" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab12" onclick="myFunction5()">Professional / Community Engagement Roles</button>
           </div>
           <div id="myDIV5" style="display: none">

           <h5>Standard Professional / Community Engagement Allocation - '.$total_comunity.'</h5>
           <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                        Allocation Name
                      </th>
                      <th>
                        Hours
                      </th>
                     
                    </tr>
                  </thead>
                  <tbody>';
                    
                  while($row = mysqli_fetch_array($resultco)) {
                    $Allocation_Name2 = $row['Allocation_Name'];
                    $Hours2 = $row['Hours'];
                  echo'<tr>
                     
                      <td>
                        '.$Allocation_Name2.'
                      </td>
                      <td>
                        '.$Hours2.'
                      </td>
                      
                    </tr>';}
                    
                  echo'</tbody>
                </table>
              </div>
           </div>
 
           </div>
         </div>
           </div>
          
         </div>';


          //------------------Leave ---------------------------
         
  $resultleave = mysqli_query($con, "SELECT * FROM leave1 WHERE email='$email'") or die(mysqli_error());
   

 echo'
         <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
           <div class="card">
           <div class="card-body">
             
             <div class="tab-button" style="display:flex">
             <button id="tab13" style="padding-top:0px; margin-top:0px; padding-left:0px; background-color: inherit; float: left; border: none; outline: none;" class="tab13" onclick="myFunction6()">Leave</button>
           </div>
           <div id="myDIV6" style="display: none">

          
           <div class="table-responsive">
           <table class="table table-striped">
             <thead>
               <tr>
                 <th>
                   Allocation Name
                 </th>
                 <th>
                   Hours
                 </th>
                 
               
               </tr>
             </thead>
             <tbody>';
             while($row = mysqli_fetch_array($resultleave)) {
               $Allocation_Name3 = $row['Allocation_Name'];
               $Hours3 = $row['Hours'];

               if($Hours3 ==''){$Hours3 = 0;}else{$Hours3=$Hours3;}
             echo'
               <tr>
                
                 <td>
                   '.$Allocation_Name3.'
                 </td>
                 <td>
                  '.$Hours3.'
                 </td>
                
               </tr>';}
                
             echo'</tbody>
           </table></div>
           </div>
 
           </div>
         </div>
           </div>
          
         </div>';
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
document.getElementById("defaultOpen3").click();
document.getElementById("defaultOpen2").click();
document.getElementById("defaultOpen").click();
document.getElementById("defaultOpen1").click();


//--------------------view--------------------


function myFunction() {
  
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("tab7").style.color = "#4a4a4a";
  } else {
    x.style.display = "none";
    document.getElementById("tab7").style.color = "#ccc";
  }
}

function openCity5(evt, cityName) {
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

function myFunction1() {
  
  var x = document.getElementById("myDIV1");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("tab8").style.color = "#4a4a4a";
  } else {
    x.style.display = "none";
    document.getElementById("tab8").style.color = "#ccc";
  }
}

function myFunction2() {
  
  var x = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("tab9").style.color = "#4a4a4a";
  } else {
    x.style.display = "none";
    document.getElementById("tab9").style.color = "#ccc";
  }
}

function myFunction3() {
  
  var x = document.getElementById("myDIV3");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("tab10").style.color = "#4a4a4a";
  } else {
    x.style.display = "none";
    document.getElementById("tab10").style.color = "#ccc";
  }
}

function myFunction4() {
  
  var x = document.getElementById("myDIV4");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("tab11").style.color = "#4a4a4a";
  } else {
    x.style.display = "none";
    document.getElementById("tab11").style.color = "#ccc";
  }
}

function myFunction5() {
  
  var x = document.getElementById("myDIV5");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("tab12").style.color = "#4a4a4a";
  } else {
    x.style.display = "none";
    document.getElementById("tab12").style.color = "#ccc";
  }
}

function myFunction6() {
  
  var x = document.getElementById("myDIV6");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("tab13").style.color = "#4a4a4a";
  } else {
    x.style.display = "none";
    document.getElementById("tab13").style.color = "#ccc";
  }
}
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

