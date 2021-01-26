<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kerabat Jalan</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/sb-admin/css/sb-admin.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/sweetalert2.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css"> 
    <!-- faveicon -->
    <link rel="icon" type="image/x-icon" href="<?php  echo base_url('assets/image/favicon.ico') ?>">
  </head>
  <body>
  <!-- awal navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
    <div class="container">
      <img src="<?php echo base_url('assets/image/logo.jpg'); ?>">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('member'); ?>">Tour</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('member/promo'); ?>">Promo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('member/cara_pemesanan'); ?>">Cara Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('member/tentang_kami'); ?>">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('member/testimoni'); ?>">Testimoni</a>
          </li>
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $this->session->userdata('pengguna')['nama']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url('auth/ubah_password'); ?>">Ubah Password</a>
              <a class="dropdown-item" href="<?php echo base_url('auth/keluar_member'); ?>">Keluar</a>
            </div>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  
    
    