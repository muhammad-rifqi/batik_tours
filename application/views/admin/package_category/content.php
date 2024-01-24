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
                     <div class="dashboard-box table-opp-color-box">
                         <h4>Package Category Details</h4>
                         <p><a href="<?= base_url('admin/add_package_category')?>">Add New Category</a></p> 
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Name</th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                        $jumlah = count($package_category);
                                        for($i=0;$i<$jumlah;$i++){
                                    ?>
                                     <tr>
                                         <td><?= $package_category[$i]['id_category'];?></td>
                                         <td><?= $package_category[$i]['name'];?></td>
                                         <td>
                                             <span class="badge badge-success" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/edit_package_category/'.$package_category[$i]['id_category'])?>'"><i class="far fa-edit"></i></span>
                                         </td>
                                         <td>
                                             <span class="badge badge-danger" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/delete_package_category/'.$package_category[$i]['id_category'])?>'"><i class="far fa-trash-alt"></i></span>
                                         </td>
                                     </tr>
                                     <?php }  ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>