<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="././vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="././vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="././css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="././images/favicon.png" />

 
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="././images/logo1.png" alt="logo">
              </div>

              
<?php if(@$_GET['w'])
{ echo'
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Sorry!</strong>  - '.@$_GET['w'].'
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
';}?>


              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form action="login1.php?q=login.php" method="POST" class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg"  placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sign in as</label>
                    <select style="color:gray" name="login" class="form-control form-control-lg" id="">
                      <option  value="0">Staff Member</option>
                      <option value="1">Workplan Advicer</option>
                      <option value="2">Admin</option>
                    </select>
                  </div>

                <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                </div>
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="././vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="././js/off-canvas.js"></script>
  <script src="././js/hoverable-collapse.js"></script>
  <script src="./js/template.js"></script>
  <!-- endinject -->
  
</body>

</html>
