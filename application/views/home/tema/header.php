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
    <link href="<?php echo base_url('assets/sb-admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/2475e3f323.js"></script>
    <!-- faveicon -->
    <link rel="icon" type="image/x-icon" href="<?php  echo base_url('assets/image/favicon.ico') ?>">
  </head>
  <body id="top">
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
            <a class="nav-link" href="<?php echo base_url('home'); ?>">Tour</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('home/promo'); ?>">Promo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('home/cara_pemesanan'); ?>">Cara Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('home/tentang_kami'); ?>">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('home/testimoni'); ?>">Testimoni</a>
          </li>
          <li class="nav-item">
            <div class="btn-group btn-group-toggle">
              <a href="<?php echo base_url('auth/login_member'); ?>" class="btn btn-info pb-2">Masuk</a>
              <a href="<?php echo base_url('auth/daftar'); ?>" class="btn btn-info">Daftar</a>
              </label>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->
  
  
    
    