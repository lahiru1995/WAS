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
  <title>W A S </title>
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
  

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
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
              <a id="myBtn" class="dropdown-item">
                <i class="mdi mdi-account text-primary"></i>
                Profile
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
            <a class="nav-link" <?php if(@$_GET['q']==1) echo'style=" color: #4d83ff;"'; ?> href="index.php?q=1">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi mdi-book-open-page-variant menu-icon"></i>
              <span class="menu-title">Teaching</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==11) echo'style=" color: #4d83ff;"'; ?> href="teaching.php?q=11">Course Coordination</a></li>
                <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==22) echo'style=" color: #4d83ff;"'; ?> href="teaching.php?q=22">Teaching </a></li>
                <li class="nav-item"> <a class="nav-link" <?php if(@$_GET['q']==33) echo'style=" color: #4d83ff;"'; ?> href="teaching.php?q=33">T & L Allowance </a></li>
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
          
<!----------------------------------------staffmember dashboard------------------------------>
          <?php if(@$_GET['q']==1) {
          include_once 'dbConnection.php';
          $email=$_SESSION['email'];
          
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
           $query = mysqli_query($con, "SELECT * FROM user WHERE email='$_SESSION[email]'") or die(mysqli_error());
           $fetch = mysqli_fetch_array($query);

           $teaching = 864;
           $research_Sch = 504;
           $prof_Community = 184;
           $Leadership_Adm = 104;
          $TT = ($fetch['F. T. E.'] * $teaching) + ($fetch['F. T. E.'] * $research_Sch) + ($fetch['F. T. E.'] * $Leadership_Adm) + ($fetch['F. T. E.'] * $prof_Community);
           echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h2>Hi! Welcome To Staff Member Dashboad.</h2>
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
                          '.$fetch['F. T. E.'] * $teaching.'
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
                          '.$fetch['F. T. E.'] * $research_Sch.'
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
                          '.$fetch['F. T. E.'] * $Leadership_Adm.'
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
                          '.$fetch['F. T. E.'] * $prof_Community.'
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
                </div>
              </div>
            </div>
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Workload summary</h4>
                 <!-- <canvas id="doughnutChart"></canvas>-->
                  <div id="donutchart" style="width: 100%; height: 400px;"></div>
                </div>
              </div>
            </div>
            
         
          </div>
          
          ';

    echo "<script type=\"text/javascript\">
      
      google.charts.load(\"current\", {packages:[\"corechart\"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours'],
          ['Teaching',     $total],
          ['HDR Supervision',      $hdr],
          ['Research',  $resh],
          ['Leadership/Admin', $total_admis],
          ['Prof/Comm Engagement', $total_comunity],
          ['Leave',    $tl]
          
        ]);

        var options = {
          title: 'Doughnut chart',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>";
          
        }?>

<!----------------------------------------Research / HDR------------------------------>
<?php if(@$_GET['q']==2) {
  include_once 'dbConnection.php';
  $email=$_SESSION['email'];

  $query8 = mysqli_query($con, "SELECT * FROM total_research WHERE email='$email'") or die(mysqli_error());
  //$fetch = mysqli_fetch_array($query1);
  $fetch7 = mysqli_fetch_assoc($query8);
  $resh = $fetch7['Total_Research_Hours'];

  $result = mysqli_query($con, "SELECT * FROM research WHERE email='$email'") or die(mysqli_error());
  echo'
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">Research / H D R</h4>
             <!-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p>-->
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

                  while($row = mysqli_fetch_array($result)) {
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
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Total Research Hours</p>
                  <h1>'.$resh.'</h1>
                  
                  <p class="text-muted">Adjusted pro-rata for part-time fraction or when you have leave (annual leave excepted) and any other adjustments.
                  </p><br>
                  <p class="text-muted">HDR Supervision data is sourced from RMITs official HDR Supervision Register, which is exported from Research Master. There can be lag between the agreement is made and this is reflected in reports.
                  </p><br>
                  <p class="text-muted">The data in your workload profile will only be updated based on what is in the HDR Supervision Register - if you believe there are errors in the data and that these errors are not associated with lag, please contact the Business Research Office to amend.
                  </p><br>
                                 
                </div>
                
              </div>
            </div>
          </div>';
        }?>

<!----------------------------------------Administration------------------------------>
<?php if(@$_GET['q']==3) {
   include_once 'dbConnection.php';
   $email=$_SESSION['email'];

   $query9 = mysqli_query($con, "SELECT * FROM total_administration WHERE email='$email'") or die(mysqli_error());
           //$fetch = mysqli_fetch_array($query1);
           $fetch8 = mysqli_fetch_assoc($query9);
           $adm = $fetch8['Standard_Administration'];

           $query10 = mysqli_query($con, "SELECT SUM(Hours) AS th FROM administration WHERE email='$email'") or die(mysqli_error());
           //$fetch = mysqli_fetch_array($query1);
           $fetch9 = mysqli_fetch_assoc($query10);
           $th = $fetch9['th'];

           $total_admis = $adm + $th;

           $result = mysqli_query($con, "SELECT * FROM administration WHERE email='$email'") or die(mysqli_error());
           
  echo'
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">Leadership Roles</h4>
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
                        Hours
                      </th>
                      
                    </tr>
                  </thead>
                  <tbody>';

                  while($row = mysqli_fetch_array($result)) {
                    $Allocation_Name = $row['Allocation_Name'];
                    $Hours = $row['Hours'];
                    
                  echo'
                    <tr>
                     
                      <td>
                        '.$Allocation_Name.'
                      </td>
                      <td>
                        '.$Hours.'
                      </td>
                      
                      
                    </tr>';}
                     
                  echo'</tbody>
                </table>
              </div>
            </div>
          </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Standard Administration / Leadership Allocation</p>
                  <h1>'.$total_admis.'</h1>
                  
                  <p class="text-muted">Administration and leadership should list all internal leadership / administrative roles and committee memberships which you undertake.
                  </p><br>
                  <p class="text-muted">If you are undertaking a task which does not appear below, please email it to the Manager, Planning & Resources, cc your line manager.
                  </p><br>
                  <p class="text-muted">This allocation covers attendance at staff meetings, Open Day, Graduation, the school conference and other School events / meetings.
                  </p><br>
                  <p class="text-muted">This allocation also covers at least one administrative task or committee membership which contributes to the School - if you do not yet have such a task, you should suggest one you would like to take to your line.
                  </p><br>
                  
                                 
                </div>
                
              </div>
            </div>
          </div>';
        }?>

<!----------------------------------------Community Eng------------------------------>
<?php if(@$_GET['q']==4) {

include_once 'dbConnection.php';
$email=$_SESSION['email'];

$query11 = mysqli_query($con, "SELECT * FROM total_community_eng WHERE email='$email'") or die(mysqli_error());
//$fetch = mysqli_fetch_array($query1);
$fetch10 = mysqli_fetch_assoc($query11);
$sp = $fetch10['Standard_Professional'];

$query12 = mysqli_query($con, "SELECT SUM(Hours) AS tc FROM community_eng WHERE email='$email'") or die(mysqli_error());
//$fetch = mysqli_fetch_array($query1);
$fetch11 = mysqli_fetch_assoc($query12);
$tc = $fetch11['tc'];

$total_comunity = $sp + $tc;

$result = mysqli_query($con, "SELECT * FROM community_eng WHERE email='$email'") or die(mysqli_error());
  echo'
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">Professional / Community Engagement Roles</h4>
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
                        Hours
                      </th>
                     
                    </tr>
                  </thead>
                  <tbody>';
                    
                  while($row = mysqli_fetch_array($result)) {
                    $Allocation_Name = $row['Allocation_Name'];
                    $Hours = $row['Hours'];
                  echo'<tr>
                     
                      <td>
                        '.$Allocation_Name.'
                      </td>
                      <td>
                        '.$Hours.'
                      </td>
                      
                    </tr>';}
                    
                  echo'</tbody>
                </table>
              </div>
            </div>
          </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Standard Professional / Community Engagement Allocation</p>
                  <h1>'.$total_comunity.'</h1>
                  
                  <p class="text-muted">Normally 184 hours for full-time, adjusted pro-rata for part-time fraction or when you have leave (annual leave excepted).
                  </p><br>
                                 
                </div>
                
              </div>
            </div>
          </div>';
        }?>

<!----------------------------------------Leave------------------------------>
<?php if(@$_GET['q']==5) {
  include_once 'dbConnection.php';
  $email=$_SESSION['email'];

  $result = mysqli_query($con, "SELECT * FROM leave1 WHERE email='$email'") or die(mysqli_error());
          

  echo'
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">Leave</h4>
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
                        Hours
                      </th>
                      
                    
                    </tr>
                  </thead>
                  <tbody>';
                  while($row = mysqli_fetch_array($result)) {
                    $Allocation_Name = $row['Allocation_Name'];
                    $Hours = $row['Hours'];

                    if($Hours ==''){$Hours = 0;}else{$Hours=$Hours;}
                  echo'
                    <tr>
                     
                      <td>
                        '.$Allocation_Name.'
                      </td>
                      <td>
                       '.$Hours.'
                      </td>
                     
                    </tr>';}
                     
                  echo'</tbody>
                </table>
                <br>
                <p class="text-muted">This section does not list annual leave - only Research Leave, Long Service Leave, Parental Leave, Leave Without Pay or extended periods of Sick Leave.
                </p>
                <p class="text-muted">Annual leave is factored into your normal annualised teaching hours (1656hrs for a full-time member of staff).
                </p>
                <p class="text-muted">A leave allocation above reduces targets and standard allocations for all parameters (research, teaching, etc.) on a pro-rata basis.
                </p>
              </div>
            </div>
          </div>
            </div>
           
          </div>';
        }?>


<!----------------------------------------Calculator------------------------------>
<?php if(@$_GET['q']==8) {
   include_once 'dbConnection.php';
   $email=$_SESSION['email'];
   
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
    $query = mysqli_query($con, "SELECT * FROM user WHERE email='$_SESSION[email]'") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);
    
    $teaching = 864;
    $research_Sch = 504;
    $prof_Community = 184;
    $Leadership_Adm = 104;
   $TT = ($fetch['F. T. E.'] * $teaching) + ($fetch['F. T. E.'] * $research_Sch) + ($fetch['F. T. E.'] * $Leadership_Adm) + ($fetch['F. T. E.'] * $prof_Community);
   

   echo '
   <div class="row">
   <div class="col-lg-6 grid-margin stretch-card">
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
                 %
                 </th>
                 <th>
                 FTE
                 </th>
                 
               </tr>
             </thead>
             <tbody>
               <tr>
                
                 <td>
                 Teaching / Teaching-Related
                 </td>
                 <td>
                 <p id="demo"> '.$total.'</p>
                 </td>
                 <td>
                 <p id="demo1"> '.round($total / $total1 * 100) .'%</p>
                 </td>
                 <td>
                 '.$fetch['F. T. E.'] * $teaching.'
                 </td>
               </tr>
                <tr>
                
                 <td>
                 HDR Supervision
                 </td>
                 <td>
                 <p id="hdr"> '.$hdr.'</p>
                 </td>
                 <td>
                   <p id="hdr1"> '.round($hdr / $total1 * 100) .'%</p>
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
                 <p id="resh"> '.$resh.'</p>
                 </td>
                 <td>
                   <p id="resh1"> '.round($resh / $total1 * 100).'%</p>
                 </td>
                 <td>
                 '.$fetch['F. T. E.'] * $research_Sch.'
                 </td>
               </tr>
    <tr>
                
                 <td>
                 Leadership / Admin
                 </td>
                 <td>
                 <p id="la"> '.$total_admis.'</p>
                 </td>
                 <td>
                   <p id="la1"> '.round($total_admis / $total1 * 100).'%</p>
                 </td>
                 <td>
                 '.$fetch['F. T. E.'] * $Leadership_Adm.'
                 </td>
               </tr>
               <tr>
                
                 <td>
                 Prof / Comm Engagement
                 </td>
                 <td>
                 <p id="profcom"> '.$total_comunity.'</p>
                 </td>
                 <td>
                 <p id="profcom1"> '.round($total_comunity / $total1 * 100).'%</p>
                 </td>
                 <td>
                 '.$fetch['F. T. E.'] * $prof_Community.'
                 </td>
               </tr>
               <tr>
                
               <td>
               Leave
               </td>
               <td>
                <p id="lea"> '.$tl.'</p>
               </td>
               <td>
                <p id="lea1"> '.round($tl / $total1 * 100).'%</p>
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
            <p id="un"> '.$unallocate.'</p>
             </td>
             <td>
             <p id="un1"> '.round($unallocate / $total1 * 100).'%</p>
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
       </div>
     </div>
   </div>
   


   <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Category hours can be amended by making changes to the following:----[ Add (+) | Subtract (-) ]</h4>
                

                <form class="forms-sample">
                <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                      <label>Teaching &Teaching-Related</label>
                      <input id="teaching123" name="teaching123" type="text" class="form-control form-control-sm" placeholder="" aria-label="Username">
                    </div>
                      </div>
                 
                  <div class="col-md-6">
                  <div class="form-group">
                  <label>Course Coordination</label>
                  <input id="course-codi" name="course-codi" type="text" class="form-control form-control-sm" placeholder="" aria-label="Username">
                  </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label>Other L&T Activities</label>
                  <input id="other-LT" name="other-LT" type="text" class="form-control form-control-sm" placeholder="" aria-label="Username">
                  </div>
                  </div>
                 
                  <div class="col-md-6">
                  <div class="form-group">
                  <label>HDR Supervision</label>
                  <input id="hdr-sup" name="hdr-sup" type="text" class="form-control form-control-sm" placeholder="" aria-label="Username">
                  </div>
                  </div>
               </div>

              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label>Research</label>
              <input id="resch" name="resch" type="text" class="form-control form-control-sm" placeholder="" aria-label="Username">
              </div>
              </div>
         
              <div class="col-md-6">
              <div class="form-group">
              <label>Leadership / Admin</label>
              <input id="leadsp" name="leadsp" type="text" class="form-control form-control-sm" placeholder="" aria-label="Username">
              </div>
              </div>
              </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                      <label>Prof/Comm Engagement</label>
                      <input id="com_eng" name="com_eng" type="text" class="form-control form-control-sm" placeholder="" aria-label="Username">
                      </div>
                      </div>
 
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Leave</label>
                    <input id="leave1" name="leave1" type="text" class="form-control form-control-sm" placeholder="" aria-label="Username">
                    </div>
                    </div>
                    </div>

                    <button type="button" class="btn btn-primary mr-2" onclick="javascript:addNumbers()">Calculate</button>
                    <button type="submit" class="btn btn-success mr-2">Request</button>
                    <button class="btn btn-light">Cancel</button>
                    
                    </form>
                    </div>
                </div>
              </div>
 </div>
 
 ';

         

          
              

              echo'
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Professional / Community Engagement Roles</h4>
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
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          
                        </tr>
                         <tr>
                         <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          
                        </tr>
             <tr>
             <td>
             -
           </td>
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          
                        </tr>
             <tr>
             <td>
             -
           </td>       
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                         
                        </tr>
                      </tbody>
                    </table>
                   
                  </div>
                </div>
              </div>
                </div>
    
                <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Professional / Community Engagement Roles</h4>
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
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          
                        </tr>
                         <tr>
                         <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          
                        </tr>
             <tr>
             <td>
             -
           </td>
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                          
                        </tr>
             <tr>
             <td>
             -
           </td>       
                          <td>
                            -
                          </td>
                          <td>
                            -
                          </td>
                         
                        </tr>
                      </tbody>
                    </table>
                   
                  </div>
                </div>
              </div>
                </div>
               
              </div>';
        }?>
<script language="javascript">
 var total1 = <?php echo  $total1 ?>;
 var total = <?php echo  $total ?>;
 var resh = <?php echo  $resh ?>;
 var hdr = <?php echo  $hdr ?>;
 var ta = <?php echo  $total_admis ?>;
 var comu = <?php echo  $total_comunity ?>;
 var tl = <?php echo  $tl ?>;
                function addNumbers()
                {
                        var teach = parseInt(document.getElementById("teaching123").value);
                        var course_codi = parseInt(document.getElementById("course-codi").value);
                        var other_LT = parseInt(document.getElementById("other-LT").value);
                        var hdr_sup = parseInt(document.getElementById("hdr-sup").value);
                        var resch = parseInt(document.getElementById("resch").value);
                        
                        var leadsp = parseInt(document.getElementById("leadsp").value);
                        var com_eng = parseInt(document.getElementById("com_eng").value);
                        var leave1 = parseInt(document.getElementById("leave1").value);
                        
                        //var val2 = parseInt(document.getElementById("value2").value);
                        //var ansD = document.getElementById("answer");
                        //ansD.value = val1 + val2 + num; round($total / $total1 * 100)
                        if ((isNaN(teach)) && (isNaN(course_codi)) && (isNaN(other_LT))) {document.getElementById("demo").style.color = "black"; document.getElementById("demo1").style.color = "black";}

                        if ((isNaN(teach)) && (isNaN(course_codi)) && (isNaN(other_LT)) && (isNaN(hdr_sup)) && (isNaN(resch)) && (isNaN(leadsp)) && (isNaN(com_eng)) && (isNaN(leave1))) {document.getElementById("un").style.color = "black"; document.getElementById("un1").style.color = "black";}  
                        else {document.getElementById("un").style.color = "#ff0000"; document.getElementById("un1").style.color = "#ff0000";} 

                        if (isNaN(teach))  teach = 0; 
                        else {document.getElementById("demo").style.color = "#ff0000"; document.getElementById("demo1").style.color = "#ff0000";} 

                        if (isNaN(course_codi)) course_codi = 0;
                        else {document.getElementById("demo").style.color = "#ff0000"; document.getElementById("demo1").style.color = "#ff0000";} 
                        
                        if (isNaN(other_LT)) other_LT = 0;
                        else {document.getElementById("demo").style.color = "#ff0000"; document.getElementById("demo1").style.color = "#ff0000";} 
                        
                        if (isNaN(hdr_sup)) { hdr_sup = 0; document.getElementById("hdr").style.color = "black"; document.getElementById("hdr1").style.color = "black";} 
                        else {document.getElementById("hdr").style.color = "#ff0000"; document.getElementById("hdr1").style.color = "#ff0000";} 
                        
                        if (isNaN(resch)) { resch = 0; document.getElementById("resh").style.color = "black"; document.getElementById("resh1").style.color = "black";} 
                        else {document.getElementById("resh").style.color = "#ff0000"; document.getElementById("resh1").style.color = "#ff0000";} 
                        
                        if (isNaN(leadsp)) { leadsp = 0; document.getElementById("la").style.color = "black"; document.getElementById("la1").style.color = "black";} 
                        else {document.getElementById("la").style.color = "#ff0000"; document.getElementById("la1").style.color = "#ff0000";} 
                        
                        if (isNaN(com_eng)) { com_eng = 0; document.getElementById("profcom").style.color = "black"; document.getElementById("profcom1").style.color = "black";} 
                        else {document.getElementById("profcom").style.color = "#ff0000"; document.getElementById("profcom1").style.color = "#ff0000";} 
                        
                        if (isNaN(leave1)) { leave1 = 0; document.getElementById("lea").style.color = "black"; document.getElementById("lea1").style.color = "black";}  
                        else {document.getElementById("lea").style.color = "#ff0000"; document.getElementById("lea1").style.color = "#ff0000";} 
                        
                        
                        document.getElementById("demo").innerHTML = total + teach + course_codi + other_LT;
                        document.getElementById("demo1").innerHTML = Math.round((total + teach + course_codi + other_LT) / total1 * 100) + '%';
            
                        document.getElementById("hdr").innerHTML = hdr + hdr_sup;
                        document.getElementById("hdr1").innerHTML = Math.round((hdr + hdr_sup) / total1 * 100) + '%';

                        document.getElementById("resh").innerHTML = resh + resch;
                        document.getElementById("resh1").innerHTML = Math.round((resh + resch) / total1 * 100) + '%';

                        document.getElementById("la").innerHTML = ta + leadsp;
                        document.getElementById("la1").innerHTML = Math.round((ta + leadsp) / total1 * 100) + '%';

                        document.getElementById("profcom").innerHTML = comu + com_eng;
                        document.getElementById("profcom1").innerHTML = Math.round((comu + com_eng) / total1 * 100) + '%';

                        document.getElementById("lea").innerHTML = tl + leave1;
                        document.getElementById("lea1").innerHTML = Math.round((tl + leave1) / total1 * 100) + '%';

                        var un = 1457 - (total + teach + course_codi + other_LT + hdr + hdr_sup + resh + resch + ta + leadsp + comu + com_eng + tl + leave1);

                        document.getElementById("un").innerHTML = un;
                        document.getElementById("un1").innerHTML = Math.round(un / total1 * 100) + '%';

                        
                  }
        </script>
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


//--------------------------------kdounut chart----------------
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
  <script src="vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
  <!-- inject:js -->

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/chart.js"></script>
</body>

</html>

