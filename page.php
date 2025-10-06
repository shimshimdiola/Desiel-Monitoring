<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/db/connection.php';
// Check if user is logged in
// ✅ Check if user_id exists in DB
include __DIR__ . '/api/check_session.php';
// If reached here → user is valid and logged in
require_once __DIR__ . '/include/functions.php';
// Determine which page to load
$page = $_GET['p'] ?? 'dashboard';
$file = __DIR__ . "/pages/$page/index.php"; ?>
<!-- Start header -->
<?php include 'layouts/header.php'; ?>
<div class="content-wrapper">
    <?php include 'partials/sidebar.php'; ?>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <!-- Top nav Start -->
            <?php include 'partials/nav.php' ?>
            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="btn-group float-right">
                                    <ol class="breadcrumb hide-phone p-0 m-0">
                                        <li class="breadcrumb-item"><a href="page.php?p=dashboard"><?php echo SITE_NAME; ?></a></li>
                                        <li class="breadcrumb-item active text-capitalize"><?php echo $page ?> </li>
                                    </ol>
                                </div>
                                <h4 class="page-title text-capitalize"> <?php echo $page ?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->
                    <!-- Page content here!! -->
                    <?php
                    // if (preg_match('/^[a-zA-Z0-9_-]+$/', $page) && file_exists($file)) {
                    //     include $file;
                    // } else {
                    //     include __DIR__ . '/pages/404.html';
                    // }



                    if (preg_match('/^[a-zA-Z0-9 _-]+$/', $page) && file_exists($file)) {
                        include $file;
                    } else {
                        include __DIR__ . '/pages/404.html';
                    }
                    
                    ?>
                </div><!-- container -->
            </div>
        </div><!-- content -->
        <footer class="footer">&copy; <?php echo getCurrentYear(); ?> <?php echo SITE_NAME; ?>. All rights reserved.</footer>
    </div><!-- End Right content here -->
</div>
<!-- Start footer -->
<?php include 'layouts/footer.php'; ?>