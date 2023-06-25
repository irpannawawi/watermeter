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
    <?php include 'Topbar2.php'; ?>
  </head>
    
  <body data-sidebar="dark">
    <div id="layout-wrapper">
    <?php include 'Sidebar2.php'; ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Dashboard</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to HPW05 Dashboard</li>
                        </ol>
                    </div>
                </div>                
            </div>
                <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Activity</h4>
                            <div class="row">
                                <div class="col-lg-7">
                                    <div>
                                        <div id="chart-with-area" class="ct-chart earning ct-golden-section">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <p class="text-muted mb-4">This month</p>
                                                <h3>$34,252</h3>
                                                <p class="text-muted mb-5">Adalah penggunaan air anda bulan ini.</p>
                                                <span class="peity-donut"
                                                    data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                                    data-width="72" data-height="72">4/5</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <p class="text-muted mb-4">Last month</p>
                                                <h3>$36,253</h3>
                                                <p class="text-muted mb-5">Adalah penggunaan air anda bulan lalu.</p>
                                                <span class="peity-donut"
                                                    data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                                    data-width="72" data-height="72">3/5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4 class="card-title mb-4">Sales Analytics</h4>
                            </div>
                            <div class="wid-peity mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted">Debit Air</p>
                                            <h5 class="mb-4">1,542</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <span class="peity-line" data-width="100%"
                                                data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wid-peity mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted">Volume Air</p>
                                            <h5 class="mb-4">6,451</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <span class="peity-line" data-width="100%"
                                                data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted">Marketing</p>
                                            <h5>84,574</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <span class="peity-line" data-width="100%"
                                                data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end row -->
    <?php include 'Rightbar2.php'; ?>
    </div>
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
  <?php include 'Footer2.php'; ?>
  </html>