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

         <div class="db-info-wrap db-comment-wrap">
             <h4>Comments List</h4>
             <p>Your Comments</p>

             <div class="dashboard-box">
                 <div class="comment-area">
                     <div class="comment-area-inner">
                        <?php 
                        $j = count($comments);
                        for($i=0;$i<$j;$i++){                       
                        ?>
                         <ol>
                             <li>
                                 <figure class="comment-thumb">
                                     <img src="<?= base_url()?>assets/backend/assets/images/testi-img1-150x150.jpg" alt="">
                                 </figure>
                                 <div class="comment-content">
                                     <div class="comment-header">
                                         <h4 class="author-name"><?= $comments[$i]['email']?></h4>
                                         <span class="post-on"><?= $comments[$i]['date']?></span>
                                     </div>
                                     <h5 class="comment-title"><span>comment on:</span>Batiktours.com</h5>
                                     <p><?= $comments[$i]['description']?></p>
                                     <div class="comment-detail">
                                         <a href="<?= base_url('admin/delete_comment/'.$comments[$i]['id_comment'])?>" class="reply"><i class="far fa-trash-alt"></i>Remove</a>
                                         <a href="mailto:<?=$comments[$i]['email'];?>" class="reply"><i class="fas fa-reply"></i>Mailto</a>
                                     </div>
                                 </div>
                             </li>
                         </ol>
                        <?php } ?>
                     </div>
                 </div>
             </div>


             <!-- pagination html -->
             <div class="pagination-wrap" style="background-color:white; font-family: calibri; font-size: 18px">
                 <nav class="pagination-inner">
                     <?php echo $this->pagination->create_links(); ?>
                 </nav>
             </div>
         </div>