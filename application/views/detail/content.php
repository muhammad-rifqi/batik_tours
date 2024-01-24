<?php include APPPATH."views/layout/menu_user.php" ; ?>
<main id="content" class="site-main">
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
               <!-- ukuran 1920 x 800 -->
               <div class="inner-baner-container" style="background-image: url(<?= base_url()?>assets/frontend/assets/images/detail1.jpg);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title"><?= $detail[0]['package_name'];?></h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>
            <!-- Inner Banner html end-->
            <div class="single-tour-section">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="single-tour-inner">
                           <h2><?= $detail[0]['sub_package_name'];?></h2>
                           <figure class="feature-image">
                              <!-- ukuran 1200 x 700 -->
                              <img src="<?= $detail[0]['photo'];?>" alt="" width="100%">
                              <div class="package-meta text-center">
                                 <ul>
                                    <li>
                                       <i class="far fa-clock"></i>
                                       <?= $detail[0]['day'];?> Hari / <?= $detail[0]['night'];?> Malam
                                    </li>
                                    <li>
                                       <i class="fas fa-map-marked-alt"></i>
                                       <?= $detail[0]['cities'];?>
                                    </li>
                                 </ul>
                              </div>
                           </figure>
                           <div class="tab-container">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">TENTANG PAKET</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">ITINERARY</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">ULASAN</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">LOKASI</a>
                                 </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="overview-content">
                                    <?= nl2br($detail[0]['description']);?>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="program" role="tabpanel" aria-labelledby="program-tab">
                                    <div class="itinerary-content">
                                       <h3>Jadwal Kegiatan <span>( 3 Hari )</span></h3>
                                       <p>Berikut adalah jadwal kegiatan dalam paket liburan <?= $detail[0]['cities'];?> selama <?= $detail[0]['day']?> Hari <?= $detail[0]['night']?> Malam</p>
                                    </div>
                                    <div class="itinerary-timeline-wrap">
                                    <?= nl2br($detail[0]['itinerary']);?>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="summary-review">
                                       <div class="review-score">
                                          <span><?= $detail[0]['star'] ?></span>
                                       </div>
                                       <div class="review-score-content">
                                       <?= nl2br($detail[0]['reviews']);?>
                                       </div>
                                    </div>
                                    <!-- review comment html -->
                                    <div class="comment-area">
                                       <h3 class="comment-title"><?= count($comment); ?> Ulasan</h3>
                                       <div class="comment-area-inner">
                                          <ol>

                                          <?php for($t=0;$t<count($comment);$t++){?>
                                             <li>
                                                <figure class="comment-thumb">
                                                   <img src="<?= base_url()?>assets/frontend/assets/images/ulasan1.jpg" alt="">
                                                </figure>
                                                <div class="comment-content">
                                                   <div class="comment-header">
                                                      <h5 class="author-name"><?= $comment[$t]['name'];?></h5>
                                                      <span class="post-on"><?= $comment[$t]['date'];?></span>
                                                      <div class="rating-wrap">
                                                         <div class="rating-start" title="Rated 5 out of 5">
                                                            <span style="width: 90%;"></span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <p>"..<?= $comment[$t]['description'];?>.."</p>
                                                </div>
                                             </li>
                                             <?php } ?>
                                          </ol>
                                       </div>
                                       <div class="comment-form-wrap">
                                          <h3 class="comment-title">Tinggalkan Review</h3>
                                          <form class="comment-form" method="post" action="<?= base_url('user/insert_comment');?>">
                                          <input type="hidden" name="id_package" value="<?= $detail[0]['id_package']?>">
                                          <input type="hidden" name="slug" value="<?= $detail[0]['slug']?>">
                                             <div class="full-width rate-wrap">
                                                <label>Berikan Rating</label>
                                                <div class="procduct-rate">
                                                   <span></span>
                                                </div>
                                             </div>
                                             <p>
                                                <input type="text" name="name" placeholder="Nama">
                                             </p>
                                             <p>
                                                <input type="email" name="email" placeholder="Email">
                                             </p>
                                             <p>
                                                <textarea rows="6" placeholder="Your review" name="description"></textarea>
                                             </p>
                                             <p>
                                                <input type="submit" name="submit" value="Kirim">
                                             </p>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                 $latlong = explode(",",$detail[0]['location']);
                                 ?>
                                 <div class="tab-pane" id="map" role="tabpanel" aria-labelledby="map-tab">
                                    <div class="map-area">
                                       <iframe src="https://maps.google.com/maps?q=<?=$latlong[0]?>,<?=$latlong[1]?>&hl=en&z=14&amp;output=embed" height="450" allowfullscreen=""></iframe>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="single-tour-gallery">
                              <h3>GALERI LIBURAN</h3>
                              <div class="single-tour-slider">
                                 <?php 
                                    for($g=0;$g<count($gallery);$g++){
                                 ?>
                                 <div class="single-tour-item">
                                    <figure class="feature-image">
                                       <img src="<?= $gallery[$g]['photo'];?>" alt="" width="100%">
                                    </figure>
                                 </div>
                                <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="sidebar">
                           <div class="package-price">
                              <h5 class="price">
                                 <span>IDR <?= number_format($detail[0]['price'])?></span> / per pax
                              </h5>
                              <div class="start-wrap">
                                 <div class="rating-start" title="Rated 5 out of 5">
                                    <span style="width: 100%"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="widget-bg booking-form-wrap">
                              <h4 class="bg-title">Order</h4>
                              <form class="booking-form" method="post" action="<?= base_url('user/insert_cart');?>">
                              <input type="hidden" name="id_package" value="<?= $detail[0]['id_package']?>">
                              <input type="hidden" name="package_name" value="<?= $detail[0]['package_name']?>">
                              <input type="hidden" name="price" value="<?= $detail[0]['price']?>">
                              <input type="hidden" name="token" value="<?= session_id(); ?>">
                              <input type="hidden" name="foto" value="<?= $detail[0]['photo']?>">
                              <input type="hidden" name="date" value="<?= $detail[0]['date']?>">
                              <input type="hidden" name="destination" value="<?= $detail[0]['cities']?>">
                                 <div class="row">
                                    <!-- <div class="col-sm-12">
                                       <div class="form-group">
                                          <input name="fullname" type="text" placeholder="Nama Lengkap">
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <input name="email" type="text" placeholder="Email">
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <input name="phone" type="text" placeholder="No Telp">
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                           <input class="input-date-picker" type="text" name="date" autocomplete="off" readonly="readonly" placeholder="Date"> 
                                          <input type="date" name="date"  placeholder="Date">
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <h4 class="">Fasilitas Tambahan</h4>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="checkbox-list">
                                             <input type="checkbox" name="pemandu" value="pemandu">
                                             <span class="custom-checkbox"></span>
                                             Pemandu
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="checkbox-list">
                                             <input type="checkbox" name="asuransi" value="asuransi">
                                             <span class="custom-checkbox"></span>
                                             Asuransi 
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="checkbox-list">
                                             <input type="checkbox" name="makmal" value="makan malam">
                                             <span class="custom-checkbox"></span>
                                             Makan Malam
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="checkbox-list">
                                             <input type="checkbox" name="rental" value="rental sepeda">
                                             <span class="custom-checkbox"></span>
                                             Rental Sepeda
                                          </label>
                                       </div>
                                    </div> -->
                                    <div class="col-sm-12">
                                       <div class="form-group submit-btn">
                                          <input type="submit" name="submit" value="Add To Cart" style="width:100%">
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div class="widget-bg information-content text-center">
                              <h5>INFO</h5>
                              <h3>BUTUH INFORMASI LEBIH LANJUT?</h3>
                              <p>Hai! Kalo kamu mau nanya - nanya tentang paket ini bisa banget kok! Cukup hubungi kita melalui tombol dibawah ya! Nanti kamu akan langsung terhubung ke kami :)</p>
                              <a href="#" class="button-primary">TANYA PAKET INI</a>
                           </div>
                           <div class="travel-package-content text-center" style="background-image: url(<?= base_url()?>assets/frontend/assets/images/img11.jpg);">
                              <h5>PAKET LAINNYA</h5>
                              <h3>PAKET LAIN YANG TERSEDIA</h3>
                              <p>Kamu mau nyari yang lebih spesifik? Yuk langsung aja klik link dibawah ya kak! :)</p>
                              <ul>
                                 <li>
                                    <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Paket Liburan Hemat</a>
                                 </li>
                                 <li>
                                    <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Paket Bulan Madu</a>
                                 </li>
                                 <li>
                                    <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Paket Tahun Baru</a>
                                 </li>
                                 <li>
                                    <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Paket Sabtu Minggu</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- subscribe section html start -->
            <section class="subscribe-section" style="background-image: url(<?= base_url()?>assets/frontend/assets/images/footer1.jpg);">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-7">
                        <div class="section-heading section-heading-white">
                           <h5 class="dash-style">SUBSCRIBE</h5>
                           <h2>DAPATKAN PROMO MENARIK!</h2>
                           <h4>Ayo ikuti kami sekarang untuk mendapatkan info - info dan promo - promo menarik dari kami!</h4>
                           <div class="newsletter-form">
                              <form>
                                 <input type="email" name="s" placeholder="Masukkan Email Anda">
                                 <input type="submit" name="signup" value="DAFTAR SEKARANG!">
                              </form>
                           </div>
                           <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Eaque adipiscing, luctus eleifend temporibus occaecat luctus eleifend tempo ribus.</p> -->
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- subscribe html end -->