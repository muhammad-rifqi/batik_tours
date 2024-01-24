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
                        <h4>Detail Booking</h4>
                        <p>Please Check Your Data</p>
                        <?php for($i=0;$i<count($detail);$i++){?>
                        <div class="row" style="border:2px solid #000">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Package ID</label>
                                    <input class="form-control" type="text" 
                                    value="<?= $detail[$i]['id_package'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Package Name</label>
                                    <input  class="form-control" type="text"
                                        value="<?= $detail[$i]['package_name'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input  class="form-control" type="text"
                                        value="<?= $detail[$i]['price'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Person</label>
                                    <input class="form-control" type="text" value="<?= $detail[$i]['person'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control" type="text"
                                        value="<?= $detail[$i]['date'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Destination</label>
                                    <input class="form-control" type="text"
                                        value="<?= $detail[$i]['destination'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Photo</label>
                                </div>
                                <p><img src="<?= $detail[$i]['foto'];?>" width="100%"></p>
                            </div>
                        </div>
                        <hr style="border:2px solid #000">
                    <?php } ?>
                    
                    </div>
                </div>
            </div>