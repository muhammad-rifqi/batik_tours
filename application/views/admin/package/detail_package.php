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
                        <h4>Detail Package</h4>
                        <div class="custom-field-wrap">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="package_name" value="<?= $detail[0]['package_name']?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input type="text" name="package_sub_name" value="<?= $detail[0]['sub_package_name']?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label>Category Package</label>
                                <input type="text" name="package_category_id" value="<?= $detail[0]['package_category_id'] == 1 ? "Domestik":"International"; ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea readonly><?= $detail[0]['description']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Itinerary</label>
                                <textarea readonly><?= $detail[0]['itinerary']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Reviews</label>
                                <textarea readonly><?= $detail[0]['reviews']?></textarea>
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
                                        <input type="text" name="size" placeholder="No of Pax"
                                            value="<?= $detail[0]['pax']?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Date leave</label>
                                        <input type="text" name="date" placeholder="Date Leave"
                                            value="<?= $detail[0]['date']?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Trip Duration</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Days" value="<?= $detail[0]['day']?>"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Nights"
                                                    value="<?= $detail[0]['night']?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" placeholder="Nights" value="<?= $detail[0]['night']?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Sale Price</label>
                                        <input type="text" name="name" value="<?= $detail[0]['promo']?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Regular Price</label>
                                        <input type="text" name="name" value="<?= $detail[0]['price']?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="text" name="name" value="<?= $detail[0]['discount']?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-box">
                        <h4>Gallery</h4>
                        <div class="custom-field-wrap">
                            <div class="dragable-field">
                                <div class="dragable-field-inner">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $j = count($photo);
                                            for($i=0;$i<$j;$i++){
                                        ?>
                                            <div class="col-md-4">
                                                <div class="card" style="width: 200px; background-color:#FFF; color:black">
                                                    <img class="card-img-top" src="<?= $photo[$i]['photo']?>"
                                                        alt="Card image cap">
                                                    <div class="card-body">
                                                        <p class="card-text"><a onclick="return confirm('Are you sure ?')" href="<?= base_url('admin/delete_gallery/'.$this->uri->segment(3).'/'.$photo[$i]['id_photo'].'/'.$photo[$i]['origin'].'/'.$photo[$i]['thumbnail'])?>">Delete</a></p>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-box">
                        <h4>Location</h4>
                        <div class="custom-field-wrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" value="<?= $lat?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> Longitude </label>
                                        <input type="text" name="longitude" value="<?= $long?>"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div id="map" class="map"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Cities</label>
                                        <input type="text" name="cities" value="<?= $detail[0]['cities']?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="dashboard-box">
                        <div class="custom-field-wrap db-cat-field-wrap">
                            <h4>Category</h4>
                            <div class="form-group">
                                <label class="custom-input">
                                    <input type="text" name="category_package"
                                        value="<?= $detail[0]['package_category_id'] == 1 ? "Domestik":"International"; ?>"
                                        readonly>
                                </label>
                            </div>
                        </div>
                        <div class="custom-field-wrap db-media-field-wrap">
                            <h4>Add image</h4>
                            <div class="upload-input">
                                <div class="form-group">
                                    <img src="<?= $detail[0]['photo'];?>" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
        var map = new ol.Map({
            target: 'map',
            layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
            ],
            view: new ol.View({
            center: ol.proj.fromLonLat([<?= $long;?>, <?= $lat;?>]),
            zoom: 15,
            maxZoom: 18,
            constrainOnlyCenter: true,
            })
        });
    </script>