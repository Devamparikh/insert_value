<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Scheduler | Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
<?php

include './themepart/header.php'

?>
<?php include 'db.php'; ?>
<?php include 'function.php'; ?>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Scheduler</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class='fas fa-user-circle' style='font-size:32px;color:white'></i>
        </div>
        <div class="info">
            <a href="profile.php" class="d-block">Admin Profile</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
              <a href="admin-panel.php" class="nav-link active">
              <i class='fas fa-calendar-alt' style='font-size:20px'></i>
              <p>
                Time Table Update
              </p>
            </a>
            
          </li>
          
          <li class="nav-item">
              <a href="make-announcement.php" class="nav-link">
              <i class="fa fa-bullhorn" style="font-size:18px"></i>
              <p>
                Make Announcement
              </p>
            </a>
          </li>
          
          <li class="nav-item">
              <a href="reminders.php" class="nav-link">
             <i class="fa fa-print" style="font-size:20px"></i>
              <p>
                Data Base
              </p>
            </a>
          </li>
          
        <li class="nav-header">SCHEDULER</li>
          <li class="nav-item">
              <a href="http://localhost/project/calender.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt" style="font-size:22px"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/project/weekly-tt.php" class="nav-link">
              <i class='fas fa-chalkboard-teacher' style='font-size:20px'></i>
              <p>
                Weekly Time Table
              </p>
            </a>
          </li>
          
        <li class="nav-header">EXIT</li>
           <li class="nav-item">
               <a href="http://localhost/project/login.php" class="nav-link">
              <i class='fas fa-sign-out-alt' style='font-size:20px'></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Time Table</h1>
          </div>
                <!-- Main content -->
                <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-header">
             <form action="" method="post">
             <?php
                if(isset($_POST['submit'])){
                 $dept = $_POST['dept'];
                 $sem = $_POST['sem'];


                  // Monday
                 
                 $s1_m_f = $_POST['s1_m_f'];
                 $s1_m_s = $_POST['s1_m_s'];
                 $faculty_short = faculty_short($s1_m_f);
                 $subject_short = subject_short($s1_m_s);
                 $conca = $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `monday` = '$conca' WHERE `5_it`.`slot` = 1";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }
                 $professor_table = strtolower($faculty_short);
                 echo $professor_table;
                // $professor_table = "p p tank";
                 $conca_faculty = $subject_short . " - 5th IT";
                 echo $conca_faculty;
                 $query = "UPDATE `".$professor_table."` SET `Monday` = '$conca_faculty' WHERE `".$professor_table."`.`slot` = 1";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error($connection));
                 }




                 $s2_m_f = $_POST['s2_m_f'];
                 $s2_m_s = $_POST['s2_m_s'];
                 $faculty_short = faculty_short($s2_m_f);
                 $subject_short = subject_short($s2_m_s);
                 $conca = $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Monday` = '$conca' WHERE `5_it`.`slot` = 2";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }
                
                
                 $s3_m_f = $_POST['s3_m_f'];
                 $s3_m_s = $_POST['s3_m_s'];
                 $faculty_short = faculty_short($s3_m_f);
                 $subject_short = subject_short($s3_m_s);
                 $conca = $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Monday` = '$conca' WHERE `5_it`.`slot` = 3";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }




                 $s4_m_f = $_POST['s4_m_f'];
                 $s4_m_s = $_POST['s4_m_s'];
                 $faculty_short = faculty_short($s4_m_f);
                 $subject_short = subject_short($s4_m_s);
                 $conca = $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Monday` = '$conca' WHERE `5_it`.`slot` = 4";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }

                
                 $s5_m_s_d1 = $_POST['s5_m_s_d1'];
                 $s6_m_f_d1 = $_POST['s6_m_f_d1'];
                 $faculty_short = faculty_short($s6_m_f_d1);
                 $subject_short = subject_short($s5_m_s_d1);
                 $conca = "D1 - " . $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Monday` = '$conca' WHERE `5_it`.`slot` = 5";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }




                 $s5_m_s_d2 = $_POST['s5_m_s_d2'];
                 $s6_m_f_d2 = $_POST['s6_m_f_d2'];
                 $faculty_short = faculty_short($s6_m_f_d2);
                 $subject_short = subject_short($s5_m_s_d2);
                 $conca = "D2 - " . $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Monday` = '$conca' WHERE `5_it`.`slot` = 6";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }
                
                
                 // tuesday
                 $s1_t_f = $_POST['s1_t_f'];
                 $s1_t_s = $_POST['s1_t_s'];
                 $faculty_short = faculty_short($s1_t_f);
                 $subject_short = subject_short($s1_t_s);
                 $conca = $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Tuesday` = '$conca' WHERE `5_it`.`slot` = 1";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }





                 $s2_t_f = $_POST['s2_t_f'];
                 $s2_t_s = $_POST['s2_t_s'];
                 $faculty_short = faculty_short($s2_t_f);
                 $subject_short = subject_short($s2_t_s);
                 $conca = $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Tuesday` = '$conca' WHERE `5_it`.`slot` = 2";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }
                
                
                 $s3_t_f = $_POST['s3_t_f'];
                 $s3_t_s = $_POST['s3_t_s'];
                 $faculty_short = faculty_short($s3_t_f);
                 $subject_short = subject_short($s3_t_s);
                 $conca = $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Tuesday` = '$conca' WHERE `5_it`.`slot` = 3";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }




                 $s4_t_f = $_POST['s4_t_f'];
                 $s4_t_s = $_POST['s4_t_s'];
                 $faculty_short = faculty_short($s4_t_f);
                 $subject_short = subject_short($s4_t_s);
                 $conca = $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Tuesday` = '$conca' WHERE `5_it`.`slot` = 4";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }

                
                 $s5_t_s_d1 = $_POST['s5_t_s_d1'];
                 $s6_t_f_d1 = $_POST['s6_t_f_d1'];
                 $faculty_short = faculty_short($s6_t_f_d1);
                 $subject_short = subject_short($s5_t_s_d1);
                 $conca = "D1 - " . $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Tuesday` = '$conca' WHERE `5_it`.`slot` = 5";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }




                 $s5_t_s_d2 = $_POST['s5_t_s_d2'];
                 $s6_t_f_d2 = $_POST['s6_t_f_d2'];
                 $faculty_short = faculty_short($s6_t_f_d2);
                 $subject_short = subject_short($s5_t_s_d2);
                 $conca = "D2 - " . $subject_short . " - " . $faculty_short;
                 $query = "UPDATE `5_it` SET `Tuesday` = '$conca' WHERE `5_it`.`slot` = 6";
                 $result = mysqli_query($connection,$query);
                 if(!$result){
                 die('Query Failed' . mysqli_error());
                 }









                
                }
                ?>
             <select style="text-align:center;" name="dept">
              <option value="" disabled selected hidden >Department</option>
              <?php select_dept();?>
             </select>
             <br>
                <select name="sem">
              <option value="" disabled selected hidden >Semester</option>
              <?php select_sem();?>
             </select>
             </div>
              <!-- /.card-header -->
              <div>
                
                
                <table style="text-align:center" id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>TIME</th>
                    <th colspan="2">MONDAY</th>
                    <th colspan="2">TUESDAY</th>
                    <th colspan="2">WEDNESDAY</th>
                    <th colspan="2">THURSDAY</th>
                    <th colspan="2">FRIDAY</th>
                    <th colspan="2">SATURDAY</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <tr>
                    <th>8:00 - 8:45</th>
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s1_m_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                <?php 
                               // $query = UPDATE `5_it` SET `monday` = '' WHERE `5_it`.`slot` = 1;
                                
                                ?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s1_m_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s1_t_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;"name="s1_t_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s1_w_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s1_w_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s1_th_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s1_th_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s1_f_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s1_f_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin" name="s1_s_f">
                    <div class="form-group">
                                <select style="max-width:48%;">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s1_s_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                  </tr>
                  
                  
                  <tr>
                    <th>8:55 - 9:40</th>
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s2_m_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s2_m_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s2_t_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s2_t_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s2_w_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s2_w_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s2_th_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s2_th_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s2_f_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s2_f_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s2_s_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s2_s_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                  </tr>
                  
                  
                  <tr>
                    <tr>
                    <th>10:00 - 10:45</th>
                    <td colspan="2"><div class="margin" >
                    <div class="form-group">
                                <select style="max-width:48%;" name='s3_m_f'>
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s3_m_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s3_t_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s3_t_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s3_w_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s3_w_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s3_th_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s3_th_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s3_f_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s3_f_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin" name="s3_s_f">
                    <div class="form-group">
                                <select style="max-width:48%;">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s3_s_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <th>10:55 - 11:40</th>
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s4_m_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s4_m_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s4_t_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s4_t_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s4_w_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s4_w_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s4_th_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s4_th_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s4_f_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s4_f_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                    
                    
                    <td colspan="2"><div class="margin">
                    <div class="form-group">
                                <select style="max-width:48%;" name="s4_s_f">
                                <option value="" disabled selected hidden>Faculty</option>
                                <?php faculty();?>
                                </select>
                              </div>
                        </button>
                    </div>
                      
                    <div class="form-group">
                                <select style="max-width:23%;" name="s4_s_s">
                                <option value="" disabled selected hidden >Subject</option>
                                <?php subject();?>
                                </select>
                    </div>
                    </td>
                  </tr>
                  
                  
                  
                  <tr>
                    <th>12:10 - 12:55</th>
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_m_s_d1">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_m_s_d2">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_t_s_d1">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_t_s_d2">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_w_s_d1">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_w_s_d2">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_th_s_d1">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_th_s_d2">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_f_s_d1">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_f_s_d2">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_s_s_d1">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s5_s_s_d2">
                    <option value="" disabled selected hidden >Subject</option>
                    <?php subject();?>
                    </select>
                        
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <th>12:55 - 1:40</th>
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_m_f_d1">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_m_f_d2">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_t_f_d1">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_t_f_d2">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_w_f_d1">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_w_f_d2">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_th_f_d1">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_th_f_d2">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_f_f_d1">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_f_f_d2">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_s_f_d1">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                    
                    
                    <td>
                    <div class="form-group">
                    <select style="max-width:48%;" name="s6_s_f_d2">
                    <option value="" disabled selected hidden >Faculty</option>
                    <?php faculty();?>
                    </select>
                        
                    </div>
                    </td>
                  </tr>
                </table>
                <div  class="card-body" align="center">
                <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               
            </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



  <!-- /.content-wrapper -->
  <?php
  
  include './themepart/footer.php'
  
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
