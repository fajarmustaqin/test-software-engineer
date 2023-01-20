<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Invoice | <?= $title ?></title>

        <link rel="stylesheet" href="<?= base_url('public') ?>/library/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
        <link href="<?php echo base_url('public/assets/app-template/css/styles.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('public/library/bootstrap-5/css/bootstrap.min.css') ?>" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet"/>

        <!-- datatabls -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

        <!-- select2 -->
        <link rel="stylesheet" href="<?= base_url('public') ?>/library/select2/select2.min.css">
        <link rel="stylesheet" href="<?= base_url('public') ?>/library/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- end select2 -->

        <!-- sweetalert2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- fontawesome -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <script>
            var site_url = "<?= site_url() ?>";
            var base_url = "<?= base_url() ?>";
        </script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Invoice</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a href="<?php echo base_url('invoice') ?>" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Data Invoice
                            </a>
                            <a href="<?php echo base_url('items') ?>" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Items
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
