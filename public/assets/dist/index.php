<?php
require_once('include/config.php');
require_once('include/customer.inc.php');
require_once('include/Database.inc.php');
require_once('include/function.php');
$connection = new Database(dbName, dbUser, dbPass, dbHost);
$customer = new customer($connection);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>HPW05 - Smart Water Meter Berbasis IOT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <link href="assets/libs/chartist/chartist.min.css" rel="stylesheet" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <?php include 'Topbar.php'; ?>
  </head>
    
  <body data-sidebar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">
    <?php include 'Sidebar.php'; ?>
    
      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
        <div class="page-content">
          <div class="container-fluid">
            <!-- start page title -->
            <div class="page-title-box">
              <div class="row align-items-center">
                <div class="col-md-8">
                  <h6 class="page-title">Dashboard</h6>
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to Admin Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- end page title -->

           
            <!-- end row -->

            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-4">Latest Action</h4>
                    <div class="table-responsive">
                      <table class="table table-hover table-centered table-nowrap mb-0">
                        <thead>
                          <tr>
                            <th scope="col">(#) Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col" colspan="2">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">#14256</th>
                            <td>
                              <div><img src="assets/images/users/user-2.jpg" alt="" class="avatar-xs rounded-circle me-2" /> Philip Smead</div>
                            </td>
                            <td>15/1/2018</td>
                            <td>$94</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            
                          </tr>
                          
                          <?php
                                $getData = $customer->getAll();
                                $no = 1;
                                if ($getData) {
                                    foreach ($getData as $data) {
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo "#". ($data['customerId']); ?>
                                            </th>
                                            <td>
                                                <?php echo $data['customerNama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['customerTime']; ?>
                                            </td>
                                            <td>
                                                <?php echo "Rp". ($data['pembayaranAmount']); ?>
                                            </td>
                                            <td>
                                                <?php  
                                                  $text = "Paid";
                                                  $text2 = "Unpaid";
                                                  $class = "badge bg-success";
                                                  $class2 = "badge bg-warning";

                                                if ($data['pembayaranStatus'] == "1"){
                                                  echo "<p class='$class'>$text</p>";
                                                } else {
                                                  echo "<p class='$class2'>$text2</p>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;" colspan="4">
                                            <?php echo "<h2> Data Tidak Ada </h2>" ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- end row -->
          </div>
          <!-- container-fluid -->
        </div>
      <!-- end main content-->
      <?php include 'Rightbar.php'; ?>
    </div>
    <!-- END layout-wrapper -->
    
    
    
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    
    <!-- Peity chart-->
    <script src="assets/libs/peity/jquery.peity.min.js"></script>
    
    <!-- Plugin Js-->
    <script src="assets/libs/chartist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>
    
    <script src="assets/js/pages/dashboard.init.js"></script>
    
    <script src="assets/js/app.js"></script>
  </body>
  <?php include 'Footer.php'; ?>
</html>
