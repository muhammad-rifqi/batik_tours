
<script type="text/javascript">
function handleConfirm(id){
    const conf = confirm('Are You Sure');
    if(conf){
        window.location ='<?= base_url('admin/delete_package/package_active/')?>'+id+'';
    }
}
</script>

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

        <div class="db-info-wrap db-package-wrap">
            <div class="dashboard-box table-opp-color-box">
                <h4>Packages List Active</h4>
                <p> Your Packages List Active </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Destination</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = count($package); 
                            for($i=0;$i<$j;$i++){
                            if($package[$i]['package_status'] == 1){
                                $status = "Actived";
                            }else if($package[$i]['package_status'] == 2){
                                $status = "Pending";
                            }else{
                                $status = "Expired";
                            }
                            ?>
                            <tr>
                                <td>
                                    </span><span class="package-name"><?= $package[$i]['package_name'];?></span>
                                </td>
                                <td><?= $package[$i]['date'];?></td>
                                <td><?= strtoupper($package[$i]['cities']);?></td>
                                <td><span class="badge badge-success"><?= $status;?></span></td>
                                <td>
                                    <span class="badge badge-primary" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/detail_package/'.$package[$i]['id_package'])?>'"><i class="far fa-eye"></i></span>
                                    <span class="badge badge-warning" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/add_photo_package/'.$package[$i]['id_package'])?>'"><i class="far fa-image"></i></span>
                                    <span class="badge badge-success" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/edit_package/'.$package[$i]['id_package'])?>'"><i class="far fa-edit"></i></span>
                                    <span class="badge badge-danger" style="cursor:pointer" onclick="handleConfirm(<?= $package[$i]['id_package']?>)"><i class="far fa-trash-alt"></i></span>
                                </td>
                            </tr>
                           <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- pagination html -->

            
            <div class="pagination-wrap" style="background-color:white; font-family: calibri; font-size: 18px">
                <nav class="pagination-inner">
                    <?php echo $this->pagination->create_links(); ?>
                </nav>
            </div>
        </div>