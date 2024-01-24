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
            $location = explode(",",$detail[0]['location']);
            $lat = $location[0];
            $long = $location[1];
        ?>

        <div class="db-info-wrap db-add-tour-wrap">
            <form method="post" action="<?= base_url('admin/update_package')?>" enctype="multipart/form-data">
                <input type="hidden" name="id_package" value="<?= $detail[0]['id_package']?>">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <div class="dashboard-box">
                            <?php if ($this->session->flashdata('msg')) { ?>
                            <div class="alert alert-success alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                                <p class="mb-0"><?= $this->session->flashdata('msg') ?> </p>
                            </div>
                            <?php } ?>
                            <h4>Edit Package</h4>
                            <div class="custom-field-wrap">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="package_name" value="<?= $detail[0]['package_name']?>">
                                </div>
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" name="sub_package_name"
                                        value="<?= $detail[0]['sub_package_name']?>">
                                </div>
                                <div class="form-group">
                                    <label>Category Package</label>
                                    <select name="package_category_id">
                                        <?php
                                            $j = count($cp);
                                            for($i=0;$i<$j;$i++){
                                            if($cp[$i]['id_category'] == $detail[0]['package_category_id']){
                                        ?>
                                        <option value="<?= $cp[$i]['id_category'];?>" selected><?= $cp[$i]['name'];?>
                                        </option>
                                        <?php }else{ ?>
                                        <option value="<?= $cp[$i]['id_category'];?>"><?= $cp[$i]['name'];?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description"><?= $detail[0]['description']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Itinerary</label>
                                    <textarea name="itinerary"><?= $detail[0]['itinerary']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Reviews</label>
                                    <textarea name="reviews"><?= $detail[0]['reviews']?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-box">
                            <div class="custom-field-wrap">
                                <h4>Dates and Prices</h4>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Group Size</label>
                                            <input type="number" name="pax" placeholder="No of Pax"
                                                value="<?= $detail[0]['pax']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Date leave</label>
                                            <input type="date" name="date" placeholder="Date Leave"
                                                value="<?= $detail[0]['date']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Trip Duration</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Days" name="day"
                                                        value="<?= $detail[0]['day']?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Nights" name="night"
                                                        value="<?= $detail[0]['night']?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Person Category</label>
                                            <select name="family">
                                                <option value="Adult">Adult</option>
                                                <option value="Child">Child</option>
                                                <option value="Couple">Couple</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Sale Price</label>
                                            <input type="text" name="promo" value="<?= $detail[0]['promo']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Regular Price</label>
                                            <input type="text" name="price" value="<?= $detail[0]['price']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Discount</label>
                                            <input type="text" name="discount" value="<?= $detail[0]['discount']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-box">
                            <h4>Location</h4>
                            <p> <button onclick="getLocation()" type="button">Actived Your Location</button> </p>
                            <div class="custom-field-wrap">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" name="latitude" id="latitude" value="<?= $lat; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Longitude </label>
                                            <input type="text" name="longitude" id="longitude" value="<?= $long; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country">
                                            <option value="0">Choose Country</option>
                                                <?php
                                            $c = count($country);
                                                for($d=0;$d<$c;$d++){
                                                    if($country[$d]['id_country'] == $detail[0]['country']){
                                            ?>
                                                <option value="<?= $country[$d]['id_country'];?>" selected>
                                                    <?= $country[$d]['name'];?> </option>
                                                <?php }else{ ?>
                                                    <option value="<?= $country[$d]['id_country'];?>">
                                                    <?= $country[$d]['name'];?> </option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <select name="province">
                                            <option value="0">Choose Province</option>
                                                <?php
                                            $a = count($province);
                                                for($b=0;$b<$a;$b++){
                                                if($province[$b]['id_province'] == $detail[0]['province']){
                                            ?>
                                                <option value="<?= $province[$b]['id_province'];?>" selected>
                                                    <?= $province[$b]['name'];?> </option>
                                                <?php }else{ ?>
                                                    <option value="<?= $province[$b]['id_province'];?>">
                                                    <?= $province[$b]['name'];?> </option>
                                                <?php    
                                                }} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Cities</label>
                                            <select name="cities">
                                                <?php
                                            $k = count($cities);
                                                for($l=0;$l<$k;$l++){
                                                if($cities[$l]['id_cities'] == $detail[0]['cities']){
                                            ?>
                                                <option value="<?= $cities[$l]['id_cities'];?>" selected>
                                                    <?= $cities[$l]['cities_name'];?> </option>
                                                <?php }else{  ?>
                                                <option value="<?= $cities[$l]['id_cities'];?>">
                                                    <?= $cities[$l]['cities_name'];?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="dashboard-box">
                            <div class="custom-field-wrap db-cat-field-wrap">
                                <h4>Package Status</h4>
                                <div class="form-group">
                                    <label class="custom-input">
                                        <select name="package_status">
                                            <?php
                                                    $array = array(
                                                        array(
                                                            "id"=>"1",
                                                            "status"=>"Active"
                                                        ),array(
                                                            "id"=>"2",
                                                            "status"=>"Pending"
                                                        ),array(
                                                            "id"=>"3",
                                                            "status"=>"Expired"
                                                        )
                                                    );
                                                for($i=0;$i<count($array);$i++){
                                                    if($array[$i]['id'] == $detail[0]['package_status']){
                                                ?>
                                            <option value="<?= $array[$i]['id']?>" selected><?= $array[$i]['status'] ?>
                                            </option>
                                            <?php 
                                                    }else{
                                                        ?>
                                            <option value="<?= $array[$i]['id']?>"><?= $array[$i]['status'] ?></option>
                                            <?php
                                                    }}
                                                ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="custom-field-wrap db-media-field-wrap">
                                <h4>Change image</h4>
                                <div class="upload-input">
                                    <div class="form-group">
                                        <span class="upload-btn">Upload a image</span>
                                        <input type="file" name="foto" onchange="loadFile(event)">
                                    </div>
                                    <img id="output" width="100%" /><hr>
                                     <p><img src="<?= $detail[0]['photo']?>" width="100%" /></p>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-box">
                            <div class="custom-field-wrap">
                                <h4>Publish</h4>
                                <div class="publish-btn">
                                    <div class="form-group">
                                        <input type="submit" name="post_status" value="Draft">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="post_status" value="Preview" disabled>
                                    </div>
                                </div>
                                <div class="publish-status">
                                    <span>
                                        <strong>Status:</strong>
                                        <?= $detail[0]['post_status'];?>
                                    </span>
                                </div>
                                <div class="publish-status">
                                    <span>
                                        <strong>Visibility:</strong>
                                        <?= $detail[0]['post_status'];?>
                                    </span>
                                </div>
                                <div class="publish-action">
                                    <input type="submit" name="post_status" value="Publish">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>