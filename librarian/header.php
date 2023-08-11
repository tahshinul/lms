<?php
$page =explode("/" , $_SERVER['PHP_SELF'] );
$page = end($page);

require_once '../dbcon.php';



session_start();

if (!isset($_SESSION['librarian_login'])){
  header('location: pages-sign-in.php');
}


$librarian_login = $_SESSION['librarian_login'];
$data = mysqli_query($con, query:" SELECT * FROM `librarian` WHERE `email` = '$librarian_login' ");
$li_info = mysqli_fetch_assoc($data);



?>








<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="AdminKit">
  <meta name="keywords"
    content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
  <link rel="stylesheet" href="../assets/css/data-table/media/css/dataTables.bootstrap.min.css">
  <link rel="canonical" href="https://demo-basic.adminkit.io/" />

  <title>Library management system</title>

  <link href="../assets/css/app.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <span class="align-middle"> <strong>ABC Library</strong> </span>
        </a>

        <ul class="sidebar-nav">
          <li class="sidebar-header">

          </li>

          <li class="<?= $page == 'index.php' ? 'sidebar-item active' : ''?> ">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <li class="<?= $page == 'students.php' ? 'sidebar-item active' : ''?>">
            <a class="sidebar-link" href="students.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Students</span>
            </a>
          </li>

          <li class="<?= $page == 'add-books.php' ? 'sidebar-item active' : ''?>">
            <a class="sidebar-link" href="add-books.php">
              <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Add books</span>
            </a>
          </li>
          <li class="<?= $page == 'manage-books.php' ? 'sidebar-item active' : ''?>">
            <a class="sidebar-link" href="manage-books.php">
              <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Manage books</span>
            </a>
          </li>

          <li class="<?= $page == 'issue-book.php' ? 'sidebar-item active' : ''?>">
            <a class="sidebar-link" href="issue-book.php">
              <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">Issue Book</span>
            </a>
          </li>

          <li class="<?= $page == 'return_book.php' ? 'sidebar-item active' : ''?>">
            <a class="sidebar-link" href="return_book.php">
              <i class="align-middle" data-feather="corner-down-left"></i> <span class="align-middle">Return Book</span>
            </a>
          </li>


      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <ul class="navbar-nav navbar-align">
            <!-- <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                <div class="position-relative">
                  <i class="align-middle" data-feather="bell"></i>
                  <span class="indicator">n</span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                <div class="dropdown-menu-header">
                  n New Notifications
                </div>
              </div> -->

            <li class="nav-item dropdown">



              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <span class="text-dark"> <strong> <?= ucwords($li_info['name']) ?> </strong></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- <a class="dropdown-item" href="profile.php"><i class="align-middle me-1" data-feather="user"></i>
                  Profile</a> -->
                <!-- <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="logout.php">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>