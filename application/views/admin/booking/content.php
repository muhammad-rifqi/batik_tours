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

         <div class="db-info-wrap db-booking">
                <div class="dashboard-box table-opp-color-box">
                    <h4>Recent Booking</h4>
                    <p>Your Booking</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Id</th>
                                    <th>status</th>
                                    <th>Enquiry</th>
                                    <th>Address</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0;$i<count($booking);$i++){?>
                                <tr>
                                    <td>
                                        <span class="list-img"><img src="<?= base_url()?>assets/backend/assets/images/comment.jpg" alt="">
                                        </span><span class="list-enq-name"><?= $booking[$i]['firstname'];?>&nbsp;<?= $booking[$i]['lastname'];?></span>
                                    </td>
                                    <td>#<?= $booking[$i]['id'];?></td>
                                    <td><span class="badge badge-success"><?= $booking[$i]['approve'] == 'N' ? 'Not Approve': 'Approve';?></span></td>
                                    <td>
                                        <span class="badge badge-success">0</span>
                                    </td>
                                    <td><span class="badge badge-success"><?= $booking[$i]['address'];?></span></td>
                                    <td>
                                        <span style="cursor:pointer" class="badge badge-success" onclick="window.location.href='<?= base_url('admin/detail_booking/'.$booking[$i]['id'])?>'"><i class="far fa-eye"></i></span>
                                        <span style="cursor:pointer" class="badge badge-success" onclick="window.location.href='<?= base_url('admin/approve_booking/'.$booking[$i]['id'])?>'"><i class="far fa-check-square"></i></span>
                                        <span style="cursor:pointer" class="badge badge-danger" onclick="window.location.href='<?= base_url('admin/delete_booking/'.$booking[$i]['id'])?>'"><i class="far fa-trash-alt"></i></span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>