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
                        <h4>Edit City</h4>
                        <p>Please Fill Field Below</p>
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/update_city')?>">
                        <input type="hidden" name="id_cities" value="<?= $city[0]['id_cities']?>">
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="form-group">
                                        <label>Province</label>
                                        <select name="id_province" class="form-control">
                                            <option value="0">Pilih Province</option>
                                            <?php
                                                for($i=0;$i<count($province);$i++){
                                                    if($province[$i]['id_province'] == $city[0]['id_province']){
                                                    ?>
                                                    <option value="<?= $province[$i]['id_province'] ?>" selected><?= $province[$i]['name'] ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <option value="<?= $province[$i]['id_province'] ?>"><?= $province[$i]['name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="cities_name" class="form-control" type="text" value="<?= $city[0]['cities_name']?>">
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