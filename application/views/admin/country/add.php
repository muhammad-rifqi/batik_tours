<!-- start Container Wrapper -->
<div id="container-wrapper">
    <!-- Dashboard -->
    <div id="dashboard" class="dashboard-container">
        <div class="dashboard-header sticky-header">
            <div class="content-left  logo-section pull-left">
                <h1><a href="<?= base_url()?>/admin/dashboard"><img
                            src="<?= base_url()?>assets/backend/assets/images/logo.png" alt=""></a></h1>
            </div>
            <?php include APPPATH."views/layout/notif.php" ; ?>
        </div>
        <?php include APPPATH."views/layout/menu_admin.php" ; ?>
        <div class="db-info-wrap">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dashboard-box">
                        <h4>Add Province</h4>
                        <p>Please Fill Field Below</p>
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/insert_country')?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input name="name" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input type="submit" name="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>