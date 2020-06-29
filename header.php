<?php
session_start();
if(!isset($_SESSION['admin']))
echo"<script>window.location='../index.php'</script>"; 
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title> Dashboard  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <link href="../assets/css/demo.css" rel="stylesheet" />
  <link href="../assets/css/icofont.css" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-active-color="warning">
    
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="data/admin.jpg">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
Skill Share

        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="dashboard.php">
              <i class="icofont icofont-dashboard"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="course.php">
              <i class="icofont icofont-plus"></i>
                
              <p>  New Course</p>
            </a>
          </li>
            <li>
            <a href="courseseldel.php">
              <i class="icofont icofont-page"></i>
            <p>  Manage Courses</p>
            </a>
          </li>
          <li>
            <a href="selectcourse.php">
              <i class="icofont icofont-video"></i>
              <p>Upload Videos</p>
            </a>
          </li>
          <li>
            <a href="selectcourse.php">
              <i class="icofont icofont-file-pdf"></i>
              <p>Study Material</p>
            </a>
          </li>
          <li>
           <a href="managequiz.php">
              <i class="icofont icofont-question"></i>
              <p>ManageQuiz</p>
            </a>
          </li>
          <li>
            <a href="showregister.php">
              <i class="icofont icofont-user-alt-2"></i>
              <p> Students<p>
            </a>
          </li>
          <li>
            <a href="showenroll.php">
              <i class="icofont icofont-list"></i>
              <p>Enrollments</p>
            </a>
          </li>
            <li>
            <a href="articleseldel.php">
              <i class="icofont icofont-book"></i>
              <p>Articles</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Admin Panel</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
             <ul class="navbar-nav">
              <li class="nav-item">
               
              </li>
                 
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icofont icofont-ui-message"></i>
                  <p>
                    <span class="d-lg-none d-md-block"> Messages </span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="showtalkus.php">Web Enquires</a>
                  <a class="dropdown-item" href="reviews.php">Site Reviews</a>
                  <a class="dropdown-item" href="creview.php">Course Reviews</a>
                  <a class="dropdown-item" href="userque.php">User Questions</a>

                </div>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icofont icofont-plus"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Add </span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="category.php">Category</a>
                  <a class="dropdown-item" href="article.php">Articles</a>

                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="logout.php">
                  <i class="icofont icofont-logout"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      