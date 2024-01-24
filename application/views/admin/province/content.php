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
                         <h4>Province Details</h4>
                         <p><a href="<?= base_url('admin/add_province')?>">Add New Province</a></p>
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Country</th>
                                         <th>Province</th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                        $jumlah = count($province);
                                        for($i=0;$i<$jumlah;$i++){
                                    ?>
                                     <tr>
                                         <td><?= $province[$i]['id_province'];?></td>
                                         <td><?= $province[$i]['id_country'];?></td>
                                         <td><?= $province[$i]['name'];?></td>
                                         <td>
                                             <span class="badge badge-success" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/edit_province/'.$province[$i]['id_province'])?>'"><i class="far fa-edit"></i></span>
                                         </td>
                                         <td>
                                             <span class="badge badge-danger" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/delete_province/'.$province[$i]['id_province'])?>'"><i class="far fa-trash-alt"></i></span>
                                         </td>
                                     </tr>
                                     <?php }  ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="pagination-wrap" style="background-color:white; font-family: calibri; font-size: 18px">
                 <nav class="pagination-inner">
                     <?php echo $this->pagination->create_links(); ?>
                 </nav>
             </div>
         </div>