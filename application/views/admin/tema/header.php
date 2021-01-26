<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="<?php echo base_url('assets/sb-admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/sb-admin/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/sb-admin/css/sb-admin.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style-admin.css') ?>"> 
    <!-- faveicon -->
    <link rel="icon" type="image/x-icon" href="<?php  echo base_url('assets/image/favicon.ico') ?>">
</head>
 
<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Admin - Kerabat Jalan</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger"></span>
          <i class="fas fa-bell fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" id="dropdown" aria-labelledby="alertsDropdown">
          <!-- <a class="dropdown-item" href="#"></a> -->
          <div class="dropdown-divider"></div> 
          <a class="dropdown-item font-weight-bold" href="<?php echo base_url('notifikasi') ?>">Lihat Semua Pemberitahuan</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url('login_admin/ubah_password'); ?>">Ganti Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('data_perjalanan'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Perjalanan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('kelompok'); ?>">
            <i class="fas fa-users"></i>
            <span>Kelompok Keberangkatan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('data_member'); ?>">
            <i class="far fa-address-card"></i>
            <span>Member</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('order'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Order</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('rekening'); ?>">
            <i class="fas fa-money-check-alt"></i>
            <span>Info Rekening</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('testimoni'); ?>">
            <i class="far fa-comment-dots"></i>
            <span>Testimoni</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Navbar</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url('cara_pembayaran'); ?>">Cara Pembayaran</a>
            <a class="dropdown-item" href="<?php echo base_url('tentang'); ?>">Tentang Kami</a>
            <a class="dropdown-item" href="<?php echo base_url('promo'); ?>">Promo</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i>
            <span>Setting</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url('slider'); ?>">Slider</a>
            <a class="dropdown-item" href="<?php echo base_url('footer'); ?>">Footer</a>
            <a class="dropdown-item" href="<?php echo base_url('medsos'); ?>">Media Sosial</a>
          </div>
        </li>
    </ul>

    <!-- konten -->
    <div id="content-wrapper">
      <div class="container-fluid">





