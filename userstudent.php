<?php include 'connection.php';
require 'session.php';
confirm_logged_in();
  ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Information System</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top" style="background-image: linear-gradient(gray,#2144);">

      <a class="navbar-brand mr-1" href="index.php" style="text-shadow: 0px 1px 5px black;">StudentMan System CWY</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
     <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
<ul class="navbar-nav ml-auto ml-md-0">
<li class="nav-item dropdown no-arrow">
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fas fa-user-circle fa-fw"></i>
 <?php
                echo " ".$_SESSION['fname'];
                 echo " ".$_SESSION['lname'];
                ?>
                
<i class="fas fa-sign-out-alt fa-fw" href="#" data-toggle="modal" data-target="#logoutModal" style="color: red">logout</i>
</a>
</div>
</li>
</ul>
</form>

    </nav>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav" style="background-image: linear-gradient(#22c1c3, #fdbb2d);">
        <li class="nav-item">
          <a class="nav-link"href="homepage.php">
            <i class="fas fa-fw fa-home"></i>
            <span> HOMEPAGE</span>
          </a>
        </li>
       <!--<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw  fa-cloud"></i>
            <span>SERVICES</span>
         </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item " href="urns.php">URNS</a> 
            <a class="dropdown-item " href="caskets.php">CASKETS</a>
            <a class="dropdown-item " href="vehicles.php">VEHICLES</a>
          </div>-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userstudent.php">
            <i class="fas fa-fw fa-users  "></i>
            <span style="text-shadow: 0px 1px 5px black;">STUDENT</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userenrollment.php">
            <i class="fas fa-fw fa-fill  "></i>
            <span style="text-shadow: 0px 1px 5px black;">Enrollment</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

           <div class="col-lg-12">

            <div>
            <i class="fas fa-table"></i>

            Student Records <br></br> 
            <a>Add New</a>
            <a href="userstudentadd.php?action=add"  type="button" class="btn btn-xs fa fa-user-plus"></a>
            </div>   
          <br> </br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Student id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Course</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php                  
                $query = 'SELECT a.`STUDENT_ID`, a.`FIRST_NAME`, a.`Last_Name`, a.`EMAIL`, b.`NAME`,b.`COURSE_ID`, c.`year_level`, d.`status_name` FROM `student`a, `course`b, `level`c, `status`d where a.`COURSE_ID`=b.`COURSE_ID` and a.`level_id`=c.`level_id` AND a.`Status_id`=d.`Status_id`';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['STUDENT_ID'].'</td>';
                            echo '<td>'. $row['FIRST_NAME'].'</td>';
                            echo '<td>'. $row['Last_Name'].'</td>';
                            echo '<td>'. $row['EMAIL'].'</td>';
                            echo '<td>'. $row['NAME'].'</td>';
                            echo '<td>'. $row['year_level'].'</td>';
                            echo '<td>'. $row['status_name'].'</td>';
                            echo '<td>';
                           
                }
            ?> 
                                    
                                </tbody>
                            </table>
                        </div>
<?php include 'footer.php'; ?>