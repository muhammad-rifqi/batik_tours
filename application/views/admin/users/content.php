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
                         <h4>User Details</h4>
                         <p><a href="<?= base_url('admin/add_users')?>">Add New User</a></p>
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>ID user</th>
                                         <th>Email</th>
                                         <th>City</th>
                                         <th>Access Level</th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php 
                                        $jumlah = count($users);
                                        for($i=0;$i<$jumlah;$i++){
                                        $getfoto =  explode("/",$users[$i]['photo']);
                                        $foto = end($getfoto);
                                    ?>
                                     <tr>
                                         <td><span class="list-img"><img
                                                     src="<?= base_url()?>assets/backend/assets/images/comment.jpg"
                                                     alt=""></span>
                                         </td>
                                         <td><a href="#"><span class="list-name"><?= $users[$i]['id_user'];?></span></a>
                                         </td>
                                         <td><?= $users[$i]['email'];?></td>
                                         <td><?= $users[$i]['city'];?></td>
                                         <td><?= $users[$i]['access_level'];?></td>
                                         <td>
                                             <span class="badge badge-success" style="cursor:pointer"
                                                 onclick="window.location.href='<?= base_url('admin/edit_users/'.$users[$i]['id_user'])?>'"><i
                                                     class="far fa-edit"></i></span>
                                         </td>
                                         <td>
                                             <span class="badge badge-danger" style="cursor:pointer"
                                                 onclick="window.location.href='<?= base_url('admin/delete_users/'.$users[$i]['id_user'].'/'.$foto)?>'"><i
                                                     class="far fa-trash-alt"></i></span>
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