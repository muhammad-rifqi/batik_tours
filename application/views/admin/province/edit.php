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
                        <h4>Edit Province</h4>
                        <p>Please Fill Field Below</p>
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/update_province')?>">
                        <input type="hidden" name="id_province" value="<?= $province[0]['id_province']?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select name="id_country" class="form-control">
                                            <option value="0">Pilih Province</option>
                                            <?php
                                                for($i=0;$i<count($country);$i++){
                                                    if($country[$i]['id_country'] == $province[0]['id_country']){
                                                    ?>
                                                    <option value="<?= $country[$i]['id_country'] ?>" selected><?= $country[$i]['name'] ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <option value="<?= $country[$i]['id_country'] ?>"><?= $country[$i]['name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="name" class="form-control" type="text" value="<?= $province[0]['name']?>">
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