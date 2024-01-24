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

        <div class="db-info-wrap db-add-tour-wrap">
            <form method="post" action="<?= base_url('admin/insert_photo_package')?>" enctype="multipart/form-data">
                <input type="hidden" name="id_package" value="<?= $this->uri->segment(3);?>">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
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
                        <h4>Add Gallery</h4>
                        <div class="custom-field-wrap">
                            <div class="dragable-field">
                                <div class="dragable-field-inner">
                                    <div class="upload-input" id="upload-input">
                                        <div class="form-group">
                                            <span class="upload-btn">Upload a image</span>
                                            <input type="file" name="foto" accept="image/jpeg" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="publish-action">
                                        <input type="submit" value="Save">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>