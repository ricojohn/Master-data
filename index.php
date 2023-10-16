<?php include 'include/header.php'?>
<?php
include 'include/conn.php';

$datetoday = date('M-y');

if(isset($_POST['submit'])){
    $year = $_POST['year'];
    $query = "SELECT *,YEAR(Start_Date) as Years,MONTHNAME(Start_Date) as Months,COUNT(*) as total FROM master_data WHERE Month LIKE '%$year%' GROUP BY Years, Months, locode ORDER BY Start_Date ASC";
    $run = $conn->query($query);
}else{
    $query = "SELECT *,YEAR(Start_Date) as Years,MONTHNAME(Start_Date) as Months,COUNT(*) as total FROM master_data WHERE Month LIKE '%2023%' GROUP BY Years, Months, locode ORDER BY Start_Date ASC";
    $run = $conn->query($query);
}

?>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <!-- <img src="images/locnstor247-logo-137x175-2.jpg" alt="logo" /> -->
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <!-- <img src="images/locnstor247-logo-137x175-2.jpg" alt="logo" /> -->
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Day!</h1>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">Admin Admin</p>
                <p class="fw-light text-muted mb-0">Admin@Admin.com</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include 'include/sidebar.php'?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-2">
                        <div class="row mb-3">
                          <div class="col-12">
                            <form method="POST">
                              <select name="year" id="year" class="form-select "  required>
                                <option value=''>--Select Year--</option>
                                <option value='2020'>2020</option>
                                <option value='2021'>2021</option>
                                <option value='2022'>2022</option>
                                <option value='2023'>2023</option>
                              </select>
                              <input type="submit" class="btn btn-info mt-3" name="submit" value="Submit">
                              <a href="index.php" class="btn btn-success mt-3">Refresh</a>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-10 d-flex flex-column">
                        <div class="d-sm-flex align-items-center justify-content-between ">
                          <h2>Inquiry <?php if(isset($_POST['submit'])){ echo "($year)";}else{ echo $year = '(2023)';}?></h2>
                          <div>
                            <div class="btn-wrapper">
                              <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                            </div>
                          </div>
                        </div>
                        <table id="myTable" class="table table-striped" style="width:100%">
                          <thead>
                              <tr>
                                  <th hidden>Year</th>
                                  <th scope="col">Month</th>
                                  <th scope="col"><b>Pasig</b></th>
                                  <th scope="col"><b>Jp Rizal</b></th>
                                  <th scope="col"><b>Urban</b></th>
                                  <th scope="col"><b>Neds</b></th>
                                  <th scope="col"><b>Sucat</b></th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                              // Pasig
                              $january_count = array("");
                              $feb_count = array("");
                              $mar_count = array("");
                              $apr_count = array("");
                              $may_count = array("");
                              $june_count = array("");
                              $july_count = array("");
                              $aug_count = array("");
                              $sept_count = array("");
                              $oct_count = array("");
                              $nov_count = array("");
                              $dec_count = array("");

                              // Urban
                              $january_count2 = array("");
                              $feb_count2 = array("");
                              $mar_count2 = array("");
                              $apr_count2 = array("");
                              $may_count2 = array("");
                              $june_count2 = array("");
                              $july_count2 = array("");
                              $aug_count2 = array("");
                              $sept_count2 = array("");
                              $oct_count2 = array("");
                              $nov_count2 = array("");
                              $dec_count2 = array("");

                              // Jp
                              $january_count3 = array("");
                              $feb_count3 = array("");
                              $mar_count3 = array("");
                              $apr_count3 = array("");
                              $may_count3 = array("");
                              $june_count3 = array("");
                              $july_count3 = array("");
                              $aug_count3 = array("");
                              $sept_count3 = array("");
                              $oct_count3 = array("");
                              $nov_count3 = array("");
                              $dec_count3 = array("");

                              // NEDS
                              $january_count4 = array("");
                              $feb_count4 = array("");
                              $mar_count4 = array("");
                              $apr_count4 = array("");
                              $may_count4 = array("");
                              $june_count4 = array("");
                              $july_count4 = array("");
                              $aug_count4 = array("");
                              $sept_count4 = array("");
                              $oct_count4 = array("");
                              $nov_count4 = array("");
                              $dec_count4 = array("");

                              // Sucat
                              $january_count5 = array("");
                              $feb_count5 = array("");
                              $mar_count5 = array("");
                              $apr_count5 = array("");
                              $may_count5 = array("");
                              $june_count5 = array("");
                              $july_count5 = array("");
                              $aug_count5 = array("");
                              $sept_count5 = array("");
                              $oct_count5 = array("");
                              $nov_count5 = array("");
                              $dec_count5 = array("");

                              while($row = $run->fetch_array()){
                                  $total = $row['total'];

                                  // Pasig Column
                                  if($row['Months'] == 'January' && $row['locode'] == 'L001'){
                                      $january_count = array_replace($january_count,array($total));
                                  }elseif($row['Months'] == 'February'  && $row['locode'] == 'L001'){
                                      $feb_count = array_replace($feb_count,array($total));
                                  }elseif($row['Months'] == 'March'  && $row['locode'] == 'L001'){
                                      $mar_count = array_replace($mar_count,array($total));
                                  }elseif($row['Months'] == 'April'  && $row['locode'] == 'L001'){
                                      $apr_count = array_replace($apr_count,array($total));
                                  }elseif($row['Months'] == 'May'  && $row['locode'] == 'L001'){
                                      $may_count = array_replace($may_count,array($total));
                                  }elseif($row['Months'] == 'June'  && $row['locode'] == 'L001'){
                                      $june_count = array_replace($june_count,array($total));
                                  }elseif($row['Months'] == 'July'  && $row['locode'] == 'L001'){
                                      $july_count = array_replace($july_count,array($total));
                                  }elseif($row['Months'] == 'August'  && $row['locode'] == 'L001'){
                                      $aug_count = array_replace($aug_count,array($total));
                                  }elseif($row['Months'] == 'September'  && $row['locode'] == 'L001'){
                                      $sept_count = array_replace($sept_count,array($total));
                                  }elseif($row['Months'] == 'October'  && $row['locode'] == 'L001'){
                                      $oct_count = array_replace($oct_count,array($total));
                                  }elseif($row['Months'] == 'November'  && $row['locode'] == 'L001'){
                                      $nov_count = array_replace($nov_count,array($total));
                                  }elseif($row['Months'] == 'December'  && $row['locode'] == 'L001'){
                                      $dec_count = array_replace($dec_count,array($total));
                                  }

                                  // urban Column
                                  elseif($row['Months'] == 'January'  && $row['locode'] == 'L002'){
                                      $january_count2 = array_replace($january_count2,array($total));
                                  }elseif($row['Months'] == 'February'  && $row['locode'] == 'L002'){
                                      $feb_count2 = array_replace($feb_count2,array($total));
                                  }elseif($row['Months'] == 'March'  && $row['locode'] == 'L002'){
                                      $mar_count2 = array_replace($mar_count2,array($total));
                                  }elseif($row['Months'] == 'April'  && $row['locode'] == 'L002'){
                                      $apr_count2 = array_replace($apr_count2,array($total));
                                  }elseif($row['Months'] == 'May'  && $row['locode'] == 'L002'){
                                      $may_count2 = array_replace($may_count2,array($total));
                                  }elseif($row['Months'] == 'June'  && $row['locode'] == 'L002'){
                                      $june_count2 = array_replace($june_count2,array($total));
                                  }elseif($row['Months'] == 'July'  && $row['locode'] == 'L002'){
                                      $july_count2 = array_replace($july_count2,array($total));
                                  }elseif($row['Months'] == 'August'  && $row['locode'] == 'L002'){
                                      $aug_count2 = array_replace($aug_count2,array($total));
                                  }elseif($row['Months'] == 'September'  && $row['locode'] == 'L002'){
                                      $sept_count2 = array_replace($sept_count2,array($total));
                                  }elseif($row['Months'] == 'October'  && $row['locode'] == 'L002'){
                                      $oct_count2 = array_replace($oct_count2,array($total));
                                  }elseif($row['Months'] == 'November'  && $row['locode'] == 'L002'){
                                      $nov_count2 = array_replace($nov_count2,array($total));
                                  }elseif($row['Months'] == 'December'  && $row['locode'] == 'L002'){
                                      $dec_count2 = array_replace($dec_count2,array($total));
                                  }

                                  // Jp Column
                                  elseif($row['Months'] == 'January'  && $row['locode'] == 'L003'){
                                      $january_count3 = array_replace($january_count3,array($total));
                                  }elseif($row['Months'] == 'February'  && $row['locode'] == 'L003'){
                                      $feb_count3 = array_replace($feb_count3,array($total));
                                  }elseif($row['Months'] == 'March'  && $row['locode'] == 'L003'){
                                      $mar_count3 = array_replace($mar_count3,array($total));
                                  }elseif($row['Months'] == 'April'  && $row['locode'] == 'L003'){
                                      $apr_count3 = array_replace($apr_count3,array($total));
                                  }elseif($row['Months'] == 'May'  && $row['locode'] == 'L003'){
                                      $may_count3 = array_replace($may_count3,array($total));
                                  }elseif($row['Months'] == 'June'  && $row['locode'] == 'L003'){
                                      $june_count3 = array_replace($june_count3,array($total));
                                  }elseif($row['Months'] == 'July'  && $row['locode'] == 'L003'){
                                      $july_count3 = array_replace($july_count3,array($total));
                                  }elseif($row['Months'] == 'August'  && $row['locode'] == 'L003'){
                                      $aug_count3 = array_replace($aug_count3,array($total));
                                  }elseif($row['Months'] == 'September'  && $row['locode'] == 'L003'){
                                      $sept_count3 = array_replace($sept_count3,array($total));
                                  }elseif($row['Months'] == 'October'  && $row['locode'] == 'L003'){
                                      $oct_count3 = array_replace($oct_count3,array($total));
                                  }elseif($row['Months'] == 'November'  && $row['locode'] == 'L003'){
                                      $nov_count3 = array_replace($nov_count3,array($total));
                                  }elseif($row['Months'] == 'December'  && $row['locode'] == 'L003'){
                                      $dec_count3 = array_replace($dec_count3,array($total));
                                  }

                                  // NEDS Column
                                  elseif($row['Months'] == 'January'  && $row['locode'] == 'L005'){
                                      $january_count4 = array_replace($january_count4,array($total));
                                  }elseif($row['Months'] == 'February'  && $row['locode'] == 'L005'){
                                      $feb_count4 = array_replace($feb_count4,array($total));
                                  }elseif($row['Months'] == 'March'  && $row['locode'] == 'L005'){
                                      $mar_count4 = array_replace($mar_count4,array($total));
                                  }elseif($row['Months'] == 'April'  && $row['locode'] == 'L005'){
                                      $apr_count4 = array_replace($apr_count4,array($total));
                                  }elseif($row['Months'] == 'May'  && $row['locode'] == 'L005'){
                                      $may_count4 = array_replace($may_count4,array($total));
                                  }elseif($row['Months'] == 'June'  && $row['locode'] == 'L005'){
                                      $june_count4 = array_replace($june_count4,array($total));
                                  }elseif($row['Months'] == 'July'  && $row['locode'] == 'L005'){
                                      $july_count4 = array_replace($july_count4,array($total));
                                  }elseif($row['Months'] == 'August'  && $row['locode'] == 'L005'){
                                      $aug_count4 = array_replace($aug_count4,array($total));
                                  }elseif($row['Months'] == 'September'  && $row['locode'] == 'L005'){
                                      $sept_count4 = array_replace($sept_count4,array($total));
                                  }elseif($row['Months'] == 'October'  && $row['locode'] == 'L005'){
                                      $oct_count4 = array_replace($oct_count4,array($total));
                                  }elseif($row['Months'] == 'November'  && $row['locode'] == 'L005'){
                                      $nov_count4 = array_replace($nov_count4,array($total));
                                  }elseif($row['Months'] == 'December'  && $row['locode'] == 'L005'){
                                      $dec_count4 = array_replace($dec_count4,array($total));
                                  }

                                  // Sucat Column
                                  elseif($row['Months'] == 'January'  && $row['locode'] == 'L006'){
                                      $january_count5 = array_replace($january_count5,array($total));
                                  }elseif($row['Months'] == 'February'  && $row['locode'] == 'L006'){
                                      $feb_count5 = array_replace($feb_count5,array($total));
                                  }elseif($row['Months'] == 'March'  && $row['locode'] == 'L006'){
                                      $mar_count5 = array_replace($mar_count5,array($total));
                                  }elseif($row['Months'] == 'April'  && $row['locode'] == 'L006'){
                                      $apr_count5 = array_replace($apr_count5,array($total));
                                  }elseif($row['Months'] == 'May'  && $row['locode'] == 'L006'){
                                      $may_count5 = array_replace($may_count5,array($total));
                                  }elseif($row['Months'] == 'June'  && $row['locode'] == 'L006'){
                                      $june_count5 = array_replace($june_count5,array($total));
                                  }elseif($row['Months'] == 'July'  && $row['locode'] == 'L006'){
                                      $july_count5 = array_replace($july_count5,array($total));
                                  }elseif($row['Months'] == 'August'  && $row['locode'] == 'L006'){
                                      $aug_count5 = array_replace($aug_count5,array($total));
                                  }elseif($row['Months'] == 'September'  && $row['locode'] == 'L006'){
                                      $sept_count5 = array_replace($sept_count5,array($total));
                                  }elseif($row['Months'] == 'October'  && $row['locode'] == 'L006'){
                                      $oct_count5 = array_replace($oct_count5,array($total));
                                  }elseif($row['Months'] == 'November'  && $row['locode'] == 'L006'){
                                      $nov_count5 = array_replace($nov_count5,array($total));
                                  }elseif($row['Months'] == 'December'  && $row['locode'] == 'L006'){
                                      $dec_count5 = array_replace($dec_count5,array($total));
                                  }

                                  
                              }

                              echo "
                              <tr>
                                  <td hidden>".$year."</td>
                                  <th scope='row'>January</th>
                                  <td>".$january_count[0]."</td>
                                  <td>".$january_count2[0]."</td>
                                  <td>".$january_count3[0]."</td>
                                  <td>".$january_count4[0]."</td>
                                  <td>".$january_count5[0]."</td>
                              </tr>
                              <tr>
                                  <td hidden>".$year."</td>
                                  <th scope='row'>February</th>
                                  <td>".$feb_count[0]."</td>
                                  <td>".$feb_count2[0]."</td>
                                  <td>".$feb_count3[0]."</td>
                                  <td>".$feb_count4[0]."</td>
                                  <td>".$feb_count5[0]."</td>
                              </tr>
                              <tr>
                                  <td hidden>".$year."</td>
                                  <th scope='row'>March</th>
                                  <td>".$mar_count[0]."</td>
                                  <td>".$mar_count2[0]."</td>
                                  <td>".$mar_count3[0]."</td>
                                  <td>".$mar_count4[0]."</td>
                                  <td>".$mar_count5[0]."</td>
                              </tr>
                              <tr>
                                  <td hidden>".$year."</td>
                                  <th scope='row'>April</th>
                                  <td>".$apr_count[0]."</td>
                                  <td>".$apr_count2[0]."</td>
                                  <td>".$apr_count3[0]."</td>
                                  <td>".$apr_count4[0]."</td>
                                  <td>".$apr_count5[0]."</td>
                              </tr>
                              <tr>
                              <td hidden>".$year."</td>
                                  <th scope='row'>May</th>
                                  <td>".$may_count[0]."</td>
                                  <td>".$may_count2[0]."</td>
                                  <td>".$may_count3[0]."</td>
                                  <td>".$may_count4[0]."</td>
                                  <td>".$may_count5[0]."</td>
                              </tr>
                              <tr>
                              <td hidden>".$year."</td>
                                  <th scope='row'>June</th>
                                  <td>".$june_count[0]."</td>
                                  <td>".$june_count2[0]."</td>
                                  <td>".$june_count3[0]."</td>
                                  <td>".$june_count4[0]."</td>
                                  <td>".$june_count5[0]."</td>
                              </tr>
                              <tr>
                              <td hidden>".$year."</td>
                                  <th scope='row'>July</th>
                                  <td>".$july_count[0]."</td>
                                  <td>".$july_count2[0]."</td>
                                  <td>".$july_count3[0]."</td>
                                  <td>".$july_count4[0]."</td>
                                  <td>".$july_count5[0]."</td>
                              </tr>
                              <tr>
                              <td hidden>".$year."</td>
                                  <th scope='row'>August</th>
                                  <td>".$aug_count[0]."</td>
                                  <td>".$aug_count2[0]."</td>
                                  <td>".$aug_count3[0]."</td>
                                  <td>".$aug_count4[0]."</td>
                                  <td>".$aug_count5[0]."</td>
                              </tr>
                              <tr>
                              <td hidden>".$year."</td>
                                  <th scope='row'>September</th>
                                  <td>".$sept_count[0]."</td>
                                  <td>".$sept_count2[0]."</td>
                                  <td>".$sept_count3[0]."</td>
                                  <td>".$sept_count4[0]."</td>
                                  <td>".$sept_count5[0]."</td>
                              </tr>
                              <tr>
                              <td hidden>".$year."</td>
                                  <th scope='row'>October</th>
                                  <td>".$oct_count[0]."</td>
                                  <td>".$oct_count2[0]."</td>
                                  <td>".$oct_count3[0]."</td>
                                  <td>".$oct_count4[0]."</td>
                                  <td>".$oct_count5[0]."</td>
                              </tr>
                              <tr>
                              <td hidden>".$year."</td>
                                  <th scope='row'>November</th>
                                  <td>".$nov_count[0]."</td>
                                  <td>".$nov_count2[0]."</td>
                                  <td>".$nov_count3[0]."</td>
                                  <td>".$nov_count4[0]."</td>
                                  <td>".$nov_count5[0]."</td>
                              </tr>
                              <tr>
                              <td hidden>".$year."</td>
                                  <th scope='row'>December</th>
                                  <td>".$dec_count[0]."</td>
                                  <td>".$dec_count2[0]."</td>
                                  <td>".$dec_count3[0]."</td>
                                  <td>".$dec_count4[0]."</td>
                                  <td>".$dec_count5[0]."</td>
                              </tr>
                              ";
                              
                              
                          ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include 'include/footer.php';?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>

</html>
  
