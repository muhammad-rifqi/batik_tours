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
                        <h4>Add New User</h4>
                        <p>Please Fill Your Data</p>
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/insert_users')?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input name="firstname" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input name="lastname" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select name="city" class="form-control" required>
                                            <option value="">Choose City</option>
                                            <?php
                                            $j = count($city);
                                            for($i=0;$i<$j;$i++){
                                            ?>
                                                <option value="<?= $city[$i]['id_cities'];?>"><?= $city[$i]['cities_name'];?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>password</label>
                                        <input name="password" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input name="photo" class="form-control" type="file" accept="image/jpg" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                <label>Birth Date</label>
                                <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <select name="days">
                                                        <option value="0">Day</option>
                                                        <?php for($i=1;$i<32;$i++){?>
                                                            <option value="<?=$i?>"><?=$i?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <select name="month">
                                                        <option value="0">Month</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <select name="years">
                                                        <option value="0">Years</option>
                                                        <?php for($j=1920;$j<2015;$j++){?>
                                                            <option value="<?=$j?>"><?=$j?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
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