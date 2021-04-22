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
  <a href="" style="margin: 0px 10px 0px 10px" type="button" class="btn btn-outline-primary btn-fw">View</a>
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

              <div id="sem-one" class="tabcontent">
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
              <form class="forms-sample" name="forms-R" action="update.php?R-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Total Research Hours</label>
                <input id="Total_Research_Hours" name="Total_Research_Hours" type="text" class="form-control form-control-sm" placeholder="HDR Hours" aria-label="Username">
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
              
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>HDR Hours</label>
                <input id="HDR_Hours" name="HDR_Hours" type="text" class="form-control form-control-sm" placeholder="Total Research Hours" aria-label="Username">
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

        <div id="admin" class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Administration</h4>
              <form class="forms-sample" name="forms-AD" action="update.php?AD-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Standard Administration Hours</label>
                <input id="Standard_Administration" name="Standard_Administration" type="text" class="form-control form-control-sm" placeholder="Standard Administration" aria-label="Username">
              </div>
                </div>
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
              <form class="forms-sample" name="forms-CE" action="update.php?CE-email='.$email.'" onSubmit="return validateForm()" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                <label>Standard Professional</label>
                <input id="Standard_Professional" name="Standard_Professional" type="text" class="form-control form-control-sm" placeholder="Standard Professional" aria-label="Username">
              </div>
                </div>
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

