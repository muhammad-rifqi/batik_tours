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
                         <h4>Blog Content</h4>
                         <p><a href="<?= base_url('admin/add_blog')?>">Add New Blog</a></p>
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Title</th>
                                         <th>Photo</th>
                                         <th>Publish</th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                        $jumlah = count($blog);
                                        for($i=0;$i<$jumlah;$i++){
                                        $getfoto =  explode("/",$blog[$i]['photo']);
                                        $foto = end($getfoto);
                                    ?>
                                     <tr>
                                         <td><?= $blog[$i]['id_blog'];?></td>
                                         <td><?= $blog[$i]['title'];?></td>
                                         <td><img src="<?= $blog[$i]['photo'];?>" width="120"></td>
                                         <td><?= $blog[$i]['date'];?></td>
                                         <td>
                                             <span class="badge badge-success" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/edit_blog/'.$blog[$i]['id_blog'])?>'"><i class="far fa-edit"></i></span>
                                         </td>
                                         <td>
                                             <span class="badge badge-danger" style="cursor:pointer" onclick="window.location.href='<?= base_url('admin/delete_blog/'.$blog[$i]['id_blog'].'/'.$foto)?>'"><i class="far fa-trash-alt"></i></span>
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