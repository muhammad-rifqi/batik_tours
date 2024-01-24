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
        <?php
            $explode = explode("-",$detail[0]['birthdate']);
        ?>
        <div class="db-info-wrap">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dashboard-box">
                        <h4>Edit User</h4>
                        <p>Please Fill Your Data</p>
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/update_users')?>" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= $detail[0]['id_user'];?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input name="firstname" class="form-control" type="text"
                                            value="<?= $detail[0]['firstname'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input name="lastname" class="form-control" type="text"
                                            value="<?= $detail[0]['lastname'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" class="form-control" type="text"
                                            value="<?= $detail[0]['phone'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select name="city" class="form-control">
                                            <option value="">Choose City</option>
                                            <?php
                                            $j = count($city);
                                            for($i=0;$i<$j;$i++){
                                            if($city[$i]['id_cities'] == $detail[0]['city']){                                                
                                            ?>
                                            <option value="<?= $city[$i]['id_cities'];?>" selected>
                                                <?= $city[$i]['cities_name'];?></option>
                                            <?php
                                            }else{
                                            ?>
                                            <option value="<?= $city[$i]['id_cities'];?>">
                                                <?= $city[$i]['cities_name'];?></option>
                                            <?php    
                                            }}
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
                                        <input name="email" class="form-control" type="email"
                                            value="<?= $detail[0]['email'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control"><?= $detail[0]['address'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input name="photo" class="form-control" type="file" accept="image/jpg">
                                    </div>
                                    <p><img src="<?= $detail[0]['photo'];?>" width="100%"></p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Birth Date</label>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select name="days">
                                                    <option value="0">Day</option>
                                                    <?php for($i=1;$i<32;$i++){
                                                    if($i == $explode[2]){
                                                    ?>
                                                    <option value="<?=$i?>" selected><?=$i?></option>
                                                    <?php }else{ ?>
                                                    <option value="<?=$i?>"><?=$i?></option>
                                                    <?php
                                                    }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select name="month">
                                                <?php
                                                    $months = array(
                                                        array(
                                                            "id"=>"1",
                                                            "month"=>"January",
                                                        ),
                                                        array(
                                                            "id"=>"2",
                                                            "month"=>"February",
                                                        ),array(
                                                            "id"=>"3",
                                                            "month"=>"March",
                                                        ),array(
                                                            "id"=>"4",
                                                            "month"=>"April",
                                                        ),array(
                                                            "id"=>"5",
                                                            "month"=>"May",
                                                        ),array(
                                                            "id"=>"6",
                                                            "month"=>"June",
                                                        ),array(
                                                            "id"=>"7",
                                                            "month"=>"July",
                                                        ),array(
                                                            "id"=>"8",
                                                            "month"=>"August",
                                                        ),array(
                                                            "id"=>"9",
                                                            "month"=>"September",
                                                        ),array(
                                                            "id"=>"10",
                                                            "month"=>"October",
                                                        ),array(
                                                            "id"=>"11",
                                                            "month"=>"November",
                                                        ),array(
                                                            "id"=>"12",
                                                            "month"=>"December",
                                                        ),
                                                    );

                                                    for($k=0;$k<count($months);$k++){ 
                                                    if($k == $explode[1]){
                                                    ?>
                                                    <option value="<?= $months[$k]['id'] ?>" selected><?= $months[$k]['month']?></option>
                                                    <?php 
                                                    } else{ ?>
                                                    <option value="<?= $months[$k]['id'] ?>"><?= $months[$k]['month']?></option>
                                                <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select name="years">
                                                    <option value="0">Years</option>
                                                    <?php for($j=1920;$j<2015;$j++){
                                                    if($j == $explode[0]){
                                                    ?>
                                                    <option value="<?=$j?>" selected><?=$j?></option>
                                                    <?php }else{ ?>
                                                    <option value="<?=$j?>"><?=$j?></option>
                                                    <?php } } ?>
                                                </select>
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