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
                         <h4>Testimonial Details</h4>
                         <p><a href="<?= base_url('admin/add_testimonial')?>">Add New Testimonial</a></p>
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Name</th>
                                         <th>Description</th>
                                         <th>Foto</th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                        $jumlah = count($testimonial);
                                        for($i=0;$i<$jumlah;$i++){
                                        $getfoto =  explode("/",$testimonial[$i]['foto']);
                                        $foto = end($getfoto);
                                    ?>
                                     <tr>
                                         <td><?= $testimonial[$i]['id_testimonial'];?></td>
                                         <td><?= $testimonial[$i]['name'];?></td>
                                         <td><?= nl2br($testimonial[$i]['description']);?></td>
                                         <td><img src="<?= $testimonial[$i]['foto'];?>" width="100"></td>
                                         <td>
                                             <span class="badge badge-success" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/edit_testimonial/'.$testimonial[$i]['id_testimonial'])?>'"><i class="far fa-edit"></i></span>
                                         </td>
                                         <td>
                                             <span class="badge badge-danger" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/delete_testimonial/'.$testimonial[$i]['id_testimonial'].'/'.$foto)?>'"><i class="far fa-trash-alt"></i></span>
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