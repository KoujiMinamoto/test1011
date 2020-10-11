<!DOCTYPE html>
<html>
<head>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <!-- <meta name="twitter:site" content="@bootstrapdash">
    <meta name="twitter:creator" content="@bootstrapdash">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

    <!-- Facebook -->
    <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> -->

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Dashboard Template</title>

    <!-- vendor css -->
    <link href="../public/azia-admin-master/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../public/azia-admin-master/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../public/azia-admin-master/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../public/azia-admin-master/lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


    <!-- azia CSS -->
    <link rel="stylesheet" href="../public/azia-admin-master/css/azia.css">

    <script src="file:///C:/Users/sysy1/Desktop/AU/bussiiness/azia-admin-master/lib/ionicons/ionicons/ionicons.z18qlu2u.js" data-resources-url="file:///C:/Users/sysy1/Desktop/AU/bussiiness/azia-admin-master/lib/ionicons/ionicons/" data-namespace="ionicons"></script>
</head>
<body onload="initPage()">
    <div class="az-header">
      <div class="container">
        <div class="az-header-left">
          <a href="index.html" class="az-logo"><span></span> YELLOWSTAR</a>
          <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
          <div class="az-header-menu-header">
            <a href="index.html" class="az-logo"><span></span> YELLOWSTAR</a>
            <a href="" class="close">×</a>
          </div><!-- az-header-menu-header -->
          <ul class="nav">
            <li class="nav-item" id="nav-dashboard_id" onclick="clickHeader(0)">
              <a class="nav-link" type = "button"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
            </li>
            
            <li class="nav-item" id="nav-profile_id" onclick="clickHeader(1)">
              <a class="nav-link" type = "button"><i class="typcn typcn-chart-bar-outline"></i> Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" type = "button"><i class="typcn typcn-chart-bar-outline"></i> HomePage</a>
            </li>
          </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
          <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
          <div class="az-header-message">
            <a href="#"><i class="typcn typcn-messages"></i></a>
          </div><!-- az-header-message -->
          
          
          </div>
        </div><!-- az-header-right -->
      </div><!-- container -->
    </div>





    <div class="az-content az-content-dashboard" id="dashboard_div_id" style="display:block">
      <div class="container">
        <div class="az-content-body">
          <div class="az-dashboard-one-title">
            <div>
              <h2 class="az-dashboard-title" id="usernametitle">Hi, welcome back!</h2>
              <p class="az-dashboard-text">Your web analytics dashboard</p>
            </div>
            <div class="az-content-header-right">
              <div class="media">
                <div class="media-body">
                  <label>Start Date</label>
                  <h6>Oct 10, 2018</h6>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="media-body">
                  <label>Now</label>
                  <h6 id="nowdate"></h6>
                </div><!-- media-body -->
              </div><!-- media -->
            </div>
          </div><!-- az-dashboard-one-title -->

          

          <div class="row row-sm mg-b-20">
            <div class="col-lg-7 ht-lg-100p">
              <div class="card card-dashboard-one">
                <div class="card-header">
                  <div>
                    <h6 class="card-title">Recent Orders</h6>
                    <p class="card-text">Orders by month</p>
                  </div>
                  
                </div><!-- card-header -->
                <div class="card-body">
                  
                  <div class="flot-chart-wrapper">
                    <div class="text_holder1" style="padding: 0px; position: relative; margin-left: auto; margin-right: auto; width: 90%;">
                    <canvas id="income-month-bar-chart"></canvas>
                    </div>
                  </div><!-- flot-chart-wrapper -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            <div class="col-lg-5 mg-t-20 mg-lg-t-0">
              <div class="row row-sm">
                <div class="col-sm-6">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6 id="totalOrder"></h6>
                      <p>Total Orders</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart1" class="flot-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="239" height="100" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 239.656px; height: 100px;"></canvas><canvas class="flot-overlay" width="239" height="100" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 239.656px; height: 100px;"></canvas></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6 id="totalUser"></h6>
                      <p>Total Users</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart2" class="flot-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="239" height="100" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 239.656px; height: 100px;"></canvas><canvas class="flot-overlay" width="239" height="100" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 239.656px; height: 100px;"></canvas></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-12 mg-t-20">
                  <div class="card card-dashboard-three">
                    <div class="card-header">
                      <p>Total Amount</p>
                      <h6 id="totalAmount"></h6>
                      <small></small>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div><canvas id="chartBar5" width="353" height="200" class="chartjs-render-monitor" style="display: block; width: 353px; height: 200px;"></canvas></div>
                    </div>
                  </div>
                </div>
              </div><!-- row -->
            </div><!--col -->
          </div><!-- row -->

          <div class="table1" style="padding: 0px;margin: 15px; position: relative; margin-left: auto; margin-right: auto; width: 100%;border:0.5px solid gray;">
            <div class="card-header">
                  <h6 class="card-title">Page Views by Page Title</h6>
                  <p class="card-text">This report is based on 100% of sessions.</p>
            </div><!-- card-header -->
            <div class="card-body">
                <table id="table_orders" class="display">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Price</th>
                        <th>Order Id</th>
                        <th>Order Type</th>
                    </tr>
                </thead> 
                </table>
            </div><!-- card-body -->
          </div>

          <div class="table1" style="padding: 0px;margin: 15px; position: relative; margin-left: auto; margin-right: auto; width: 100%;border:0.5px solid gray;">
            <div class="card-header">
                  <h6 class="card-title">Page Views by Page Title</h6>
                  <p class="card-text">This report is based on 100% of sessions.</p>
            </div><!-- card-header -->
            <div class="card-body">
                <table id="table_users" class="display">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Price</th>
                        <th>Order Id</th>
                        <th>Order Type</th>
                    </tr>
                </thead> 
                </table>
            </div><!-- card-body -->
          </div>

          
          

          

          </div><!-- row -->
        </div><!-- az-content-body -->
      </div>
    </div>
    <!-- profile -->
    <div class = "pro_div" id="profile_div_id" style="display:none">
    <h6 class="card-title">Page Views by Page Title</h6>
    </div>


    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="../public/azia-admin-master/lib/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="../public/azia-admin-master/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/azia-admin-master/lib/ionicons/ionicons.js"></script>
    <script src="../public/azia-admin-master/lib/peity/jquery.peity.min.js"></script>

    <script src="../public/azia-admin-master/js/azia.js"></script>
    <script type="text/javascript" src="{{URL::asset('/js/dashboard.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js" type="text/javascript"></script>

</body>

</html>