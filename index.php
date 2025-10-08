<?php
require_once __DIR__ . '/config/config.php';
if (isset($_SESSION['user_id'])) {
    // already logged in → go straight to dashboard
    header("Location: page.php?p=dashboard");
    exit;
}
require_once __DIR__ . '/db/connection.php';
require_once __DIR__ . '/include/functions.php'; // make sure this connects $conn
// Call the function correctly
include 'layouts/header.php';
// Api to handle login
include 'api/login.php';
?>
<!-- HTML Login Form -->
<div class="wrapper-page">
    <div class="card">
        <div class="card-body">
            <div class="text-center m-b-15">
                <h2 class=""><?php echo SITE_NAME ?></h2>
            </div>
            <div class="p-3">
                <form class="form-horizontal" method="POST" action="">
                    <div class="user-thumb text-center m-b-30">
                        <img src="assets/images/logo.png" class="rounded-circle img-thumbnail" alt="thumbnail">
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="email" type="email" required placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="password" type="password" required placeholder="Password">
                        </div>
                    </div>
                    <?php if ($error): ?>
                        <p class="text-danger"><?= htmlspecialchars($error) ?><a target='_blank' href="https://github.com/shimshimdiola/PHP-Boilerplate?tab=readme-ov-file#-sql-snippet"> Find here.</a> </p>
                    <?php endif; ?>
                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>