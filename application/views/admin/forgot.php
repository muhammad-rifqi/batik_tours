<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- favicon -->
      <link rel="icon" type="image/png" href="<?= base_url() ?>assets/backend/assets/images/favicon.png">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?= base_url() ?>assets/backend/assets/css/bootstrap.min.css" media="all">
      <!-- Fonts Awesome CSS -->
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/backend/assets/css/all.min.css">
      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/backend/style.css">
      <title>Travele | Travel & Tour HTML5 template </title>
</head>
<body>
    <div class="login-page" style="background-image: url(<?= base_url() ?>assets/backend/assets/images/bg.jpg);">
        <div class="login-from-wrap">
            <form class="login-from">
                <h1 class="site-title">
                    <a href="#">
                        <img src="<?= base_url() ?>assets/backend/assets/images/logo.png" alt="">
                    </a>
                </h1>
                <div class="form-group">
                    <label for="first_name1">Email</label>
                    <input type="email" class="validate" name="email">
                </div>
                <div class="form-group">
                    <a class="button-primary" href="<?= base_url('admin/updatepassword'); ?>">Submit</a>
                </div>
                <a href="<?= base_url('admin') ?>" class="for-pass">Login</a>
            </form>
        </div>
    </div>

    <!-- *Scripts* -->
    <script src="<?= base_url() ?>assets/backend/assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/canvasjs.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/jquery.slicknav.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/dashboard-custom.js"></script>
</body>
</html>