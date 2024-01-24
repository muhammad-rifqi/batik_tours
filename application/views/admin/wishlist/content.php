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


         <div class="db-info-wrap db-wislist-wrap">
                <div class="dashboard-box ">
                <h4>WishList Details</h4>
                <p>Your WishList </p>
                    <div class="row">
                        <?php
                            $j = count($wishlist);
                            for($i=0;$i<$j;$i++){
                        ?>
                        <div class="grid-item col-md-6 col-lg-4">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="#">
                                        <img src="<?= $wishlist[$i]['photo'];?>" alt="" width="100%">
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>Rp. <?= number_format($wishlist[$i]['price']);?> </span> / per person
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-content">
                                        <h4>
                                            <a href="#"><?= $wishlist[$i]['package_name'];?></a>
                                        </h4>
                                        <div class="content-details">
                                           <div class="rating-start" title="Rated <?= $wishlist[$i]['star'];?> out of 5">
                                              <span></span>
                                           </div>
                                           <span class="review-text"><a href="#"><?= $wishlist[$i]['star'];?> review</a></span>
                                        </div>
                                        <div class="button-container">
                                            <a href="<?= base_url('admin/edit_package/'.$wishlist[$i]['id_package'])?>"><i class="far fa-edit"></i>Edit</a>
                                            <a href="<?= base_url('admin/package_active/')?>"><i class="far fa-trash-alt"></i> More..</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- pagination html -->
                <div class="pagination-wrap">
                    <nav class="pagination-inner">
                    <?php echo $this->pagination->create_links(); ?>
                    </nav>
                </div>
            </div>



        