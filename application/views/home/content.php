
         <?php include APPPATH."views/layout/menu_user.php" ; ?>
         <main id="content" class="site-main">
            <!-- Home slider html start -->
            <section class="home-slider-section">
               <div class="home-slider">
                  <div class="home-banner-items">
                     <div class="banner-inner-wrap" style="background-image: url(<?=base_url()?>assets/frontend/assets/images/borobudur1.jpg);"></div>
                        <div class="banner-content-wrap">
                           <div class="container">
                              <div class="banner-content text-center">
                                 <h2 class="banner-title">SUNSET DI BOROBUDUR</h2>
                                 <p>Sunset di Borobudur, nikmatilah saat - saat dimana sinar matahari menelusup di antara lubang - lubang stupa terawang atau sinar keemasan yang menimpa wajah sang Buddha. Jangan lupa diabadikan dengan kamera, ya!</p>
                                 <!-- <a href="#" class="button-primary">PESAN SEKARANG</a> -->
                              </div>
                           </div>
                        </div>
                     <div class="overlay"></div>
                  </div>
                  <div class="home-banner-items">
                     <div class="banner-inner-wrap" style="background-image: url(<?=base_url()?>assets/frontend/assets/images/telag.jpg);"></div>
                        <div class="banner-content-wrap">
                           <div class="container">
                              <div class="banner-content text-center">
                                 <h2 class="banner-title">TELAGA BIRU CICEREM</h2>
                                 <p>Telaga Cicerem sangat sejuk dan dipenuhi berbagai jenis ikan didalamnya loh. Konon katanya air di Telaga Cicerem merupakan tempat berwudhu para Walisongo loh! Dan ada yang mengatakan airnya juga tak pernah surut meskipun musim kemarau! Penasaran? Yuk kesini!</p>
                                 <a href="#" class="button-primary">PESAN SEKARANG!</a>
                              </div>
                           </div>
                        </div>
                     <div class="overlay"></div>
                  </div>
               </div>
            </section>
            <!-- slider html start -->
            <!-- Home search field html start -->
            <div class="trip-search-section shape-search-section">
               <div class="slider-shape"></div>
               <div class="container">
               <form method="post" action="<?= base_url('user/searching')?>">
                  <div class="trip-search-inner white-bg d-flex">
                     <div class="input-group" style="width: 80%;">
                        <label> Cari Tujuan </label>
                        <input type="text" name="cari" placeholder="Masukkan tujuan anda">
                     </div>
                     <div class="input-group width-col-3">
                        <label class="screen-reader-text"> Search </label>
                        <input type="submit" name="travel-search" value="AJUKAN">
                     </div>
                  </div>
                  </form>
               </div>
            </div>
            <!-- search search field html end -->
            <section class="destination-section">
               <div class="container">
                  <div class="section-heading">
                     <div class="row align-items-end">
                        <div class="col-lg-7">
                           <h5 class="dash-style">DESTINASI POPULER</h5>
                           <h2>DESTINASI PILIHAN KAMI</h2>
                        </div>
                        <div class="col-lg-5">
                           <div class="section-disc">
                               Kami mengumpulkan destinasi populer kebanggaan kami. Untuk memudahkan anda mencari tempat berlibur dengan lebih mudah dan terpercaya.
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="destination-inner destination-three-column">
                     <div class="row">

                     <?php for($z=0;$z<6;$z++){ ?>
                        <div class="col-lg-4 col-md-6">
                           <div class="package-wrap">
                              <figure class="feature-image">
                                 <a href="<?= base_url('detail-package/'.$package[$z]['slug'])?>">
                                    <img src="<?=$package[$z]['photo'];?>" alt="<?=$package[$z]['package_name'];?>">
                                 </a>
                              </figure>
                              <div class="package-price">
                                 <h6>
                                    <span>IDR <?= number_format($package[$z]['price'],0,',','.')?> </span> / per pax
                                 </h6>
                              </div>
                              <div class="package-content-wrap">
                                 <div class="package-meta text-center">
                                    <ul>
                                       <li>
                                          <i class="far fa-clock"></i>
                                          <?=$package[$z]['day'];?>D/<?=$package[$z]['night'];?>N
                                       </li>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          <?=$package[$z]['cities'];?>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="package-content">
                                    <h3>
                                       <a href="<?= base_url('detail-package/'.$package[$z]['slug'])?>"><?=$package[$z]['cities'];?> Tour</a>
                                    </h3>
                                    <div class="review-area">
                                       <span class="review-text">(<?=$package[$z]['star'];?> ulasan)</span>
                                       <div class="rating-start" title="Rated 5 out of 5">
                                          <span style="width: 100%"></span>
                                       </div>
                                    </div>
                                    <p><?=$package[$z]['sub_package_name'];?></p>
                                    <div class="btn-wrap">
                                       <a href="<?= base_url('detail-package/'.$package[$z]['slug'])?>" class="button-text width-6">Pesan Sekarang<i class="fas fa-arrow-right"></i></a>
                                       <a href="<?= base_url('add_wishlist/'.$package[$z]['id_package'])?>" class="button-text width-6">Favoritkan<i class="far fa-heart"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>


                     </div>
                     <div class="btn-wrap text-center">
                        <a href="<?= base_url('international')?>" class="button-primary">LEBIH BANYAK</a>
                     </div>
                  </div>
               </div>
            </section>
            <!-- Home packages section html start -->
            <section class="package-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">JELAJAH WISATA</h5>
                           <h2>PAKET WISATA TERBARU</h2>
                           <p>Paket wisata terbaru dari kami. Kami bisa memastikan pengalaman tak terlupakan untuk anda bersama keluarga, teman - teman dan orang - orang tersayang anda.</p>
                        </div>
                     </div>
                  </div>
                  <div class="package-inner">
                     <div class="row">
                       <?php for($l=0;$l<6;$l++){ ?>
                        <div class="col-lg-4 col-md-6">
                           <div class="package-wrap">
                              <figure class="feature-image">
                                 <a href="<?= base_url('detail-package/'.$package[$l]['slug'])?>">
                                    <img src="<?=$package[$l]['photo'];?>" alt="<?=$package[$l]['package_name'];?>">
                                 </a>
                              </figure>
                              <div class="package-price">
                                 <h6>
                                    <span>IDR <?= number_format($package[$l]['price'],0,',','.')?> </span> / per pax
                                 </h6>
                              </div>
                              <div class="package-content-wrap">
                                 <div class="package-meta text-center">
                                    <ul>
                                       <li>
                                          <i class="far fa-clock"></i>
                                          <?=$package[$l]['day'];?>D/<?=$package[$l]['night'];?>N
                                       </li>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          <?=$package[$l]['cities'];?>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="package-content">
                                    <h3>
                                       <a href="<?= base_url('detail-package/'.$package[$l]['slug'])?>"><?=$package[$l]['cities'];?> Tour</a>
                                    </h3>
                                    <div class="review-area">
                                       <span class="review-text">(<?=$package[$l]['star'];?> ulasan)</span>
                                       <div class="rating-start" title="Rated 5 out of 5">
                                          <span style="width: 100%"></span>
                                       </div>
                                    </div>
                                    <p><?=$package[$l]['sub_package_name'];?></p>
                                    <div class="btn-wrap">
                                       <a href="<?= base_url('detail-package/'.$package[$l]['slug'])?>" class="button-text width-6">Pesan Sekarang<i class="fas fa-arrow-right"></i></a>
                                       <a href="<?= base_url('add_wishlist/'.$package[$l]['id_package'])?>" class="button-text width-6">Favoritkan<i class="far fa-heart"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                     <div class="btn-wrap text-center">
                        <a href="<?= base_url('domestic')?>" class="button-primary">LIHAT SEMUA PAKET</a>
                     </div>
                  </div>
               </div>
            </section>
            <!-- packages html end -->
            <!-- Home callback section html start -->
            <section class="callback-section">
               <div class="container">
                  <div class="row no-gutters align-items-center">
                     <div class="col-lg-5">
                        <!-- ukuran 480 x 540 -->
                        <div class="callback-img" style="background-image: url(<?=base_url()?>assets/frontend/assets/images/artis.jpg);">
                           <div class="video-button">
                              <a id="video-container" data-video-id="IUN664s7N-c">
                                 <i class="fas fa-play"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-7">
                        <div class="callback-inner">
                           <div class="section-heading section-heading-white">
                              <h5 class="dash-style">HUBUNGI KAMI</h5>
                              <h2>INGAT LIBURAN? INGAT BATIKTOURS!</h2>
                              <p>Percayakan kebutuhan liburan anda dan keluarga, teman - teman kantor anda maupun orang tersayang anda kepada kami. Kami menyediakan paket - paket yang bisa menjadi kenangan terbaik untuk anda!</p>
                           </div>
                           <div class="callback-counter-wrap">
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="<?=base_url()?>assets/frontend/assets/images/icon1.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no">
                                       <!-- <span class="counter">500</span>K+ -->
                                    </span>
                                    <span class="counter-text">
                                       Pelayanan No.1
                                    </span>
                                 </div>
                              </div>
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="<?=base_url()?>assets/frontend/assets/images/icon2.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no">
                                       <!-- <span class="counter">250</span>K+ -->
                                    </span>
                                    <span class="counter-text">
                                       Tersertifikasi
                                    </span>
                                 </div>
                              </div>
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="<?=base_url()?>assets/frontend/assets/images/icon3.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no">
                                       <!-- <span class="counter">15</span>K+ -->
                                    </span>
                                    <span class="counter-text">
                                       Keamanan dan Kenyamanan Terjamin
                                    </span>
                                 </div>
                              </div>
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="<?=base_url()?>assets/frontend/assets/images/icon4.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no">
                                       <!-- <span class="counter">10</span>K+ -->
                                    </span>
                                    <span class="counter-text">
                                       Lokasi - Lokasi Menarik
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <div class="support-area">
                              <div class="support-icon">
                                 <img src="<?=base_url()?>assets/frontend/assets/images/icon5.png" alt="">
                              </div>
                              <div class="support-content">
                                 <h4>Layanan Hotline Kami</h4>
                                 <h3>
                                    <a href="#">Hubungi: 123-456-7890</a>
                                 </h3>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- callback html end -->
            <!-- Home activity section html start -->
            <section class="activity-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">LIBURAN BERDASARKAN KEGIATAN</h5>
                           <h2>KEGIATAN LIBURAN PILIHAN</h2>
                           <p>Anda menyukai Trekking? Atau berkemah? kami menyediakan fasilitas liburan sesuai dengan minat anda. Langsung cek dibawah yuk!</p>
                        </div>
                     </div>
                  </div>
                  <div class="activity-inner row">
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="<?=base_url()?>assets/frontend/assets/images/icon10.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="<?= base_url('user/detail_package')?>">Trekking</a>
                              </h4>
                              <p>12 Destinasi</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="<?=base_url()?>assets/frontend/assets/images/icon8.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="<?= base_url('user/detail_package')?>">Off Road</a>
                              </h4>
                              <p>15 Destinasi</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="<?=base_url()?>assets/frontend/assets/images/icon7.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="<?= base_url('user/detail_package')?>">Berkemah</a>
                              </h4>
                              <p>13 Destinasi</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="<?=base_url()?>assets/frontend/assets/images/icon11.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="<?= base_url('user/detail_package')?>">Menjelajah</a>
                              </h4>
                              <p>25 Destinasi</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- activity html end -->
            <!-- Home special section html start -->
            <section class="special-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">PROMO</h5>
                           <h2>PROMO DARI KAMI</h2>
                           <p>Budget Trip? Oh tentu bisa, kami menyediakan Tur dengan diskon menarik spesial untuk kamu. Yuk langsung cek aja disini!</p>
                        </div>
                     </div>
                  </div>
                  <div class="special-inner">
                     <div class="row">
                     <?php for($k=0;$k<6;$k++){ 
                        $promo = floor(($package[$k]['promo'] * 100)/$package[$k]['price']);
                        $last = $package[$k]['price']-$package[$k]['promo'];
                        ?>
                        <div class="col-md-6 col-lg-4">
                           <div class="special-item">
                              <figure class="special-img">
                                 <!-- ukuran 360 x 450 -->
                                 <img src="<?=$package[$k]['photo']?>" alt="<?=$package[$k]['package_name']?>">
                              </figure>
                              <div class="badge-dis">
                                 <span>
                                    <strong><?= $promo; ?>%</strong>
                                    off
                                 </span>
                              </div>
                              <div class="special-content">
                                 <div class="meta-cat">
                                    <a href="<?= base_url('detail-package/'.$package[$k]['slug'])?>"><?=strtoupper($package[$k]['cities'])?></a>
                                 </div>
                                 <h3>
                                    <a href="<?= base_url('detail-package/'.$package[$k]['slug'])?>"><?=$package[$k]['package_name']?></a>
                                 </h3>
                                 <div class="package-price">
                                    Harga:
                                    <del>IDR <?= number_format($package[$k]['price'])?></del>
                                    <ins>IDR <?= number_format($last); ?></ins>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </section>
            <!-- special html end -->
            <!-- Home special section html start -->
            <section class="best-section">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-5">
                        <div class="section-heading">
                           <h5 class="dash-style">GALERI KAMI</h5>
                           <h2>TERIMAKASIH UNTUK KALIAN!</h2>
                           <p>Kirim foto liburan kalian dengan kami, dan dapatkan gift poin dari kami yang nantinya dapat kalian tukarkan dengan diskon untuk paket perjalanan loh!</p>
                        </div>
                        <figure class="gallery-img">
                           <!-- ukuran 455 x 330 -->
                           <img src="<?=base_url()?>assets/frontend/assets/images/galeri1.jpg" alt="">
                        </figure>
                     </div>
                     <div class="col-lg-7">
                        <div class="row">
                           <div class="col-sm-6">
                              <figure class="gallery-img">
                                 <!-- ukuran 315 x 250 -->
                                 <img src="<?=base_url()?>assets/frontend/assets/images/galeri2.jpg" alt="">
                              </figure>
                           </div>
                           <div class="col-sm-6">
                              <figure class="gallery-img">
                                 <!-- ukuran 315 x 250 -->
                                 <img src="<?=base_url()?>assets/frontend/assets/images/galeri3.jpg" alt="">
                              </figure>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <figure class="gallery-img">
                                 <!-- ukuran 655 x 350 -->
                                 <img src="<?=base_url()?>assets/frontend/assets/images/galeri4.jpg" alt="">
                              </figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- best html end -->
            <!-- Home client section html start -->
            <div class="client-section">
               <div class="container">
                  <div class="client-wrap client-slider secondary-bg">
                     <div class="client-item">
                        <figure>
                           <img src="<?=base_url()?>assets/frontend/assets/images/logo1.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="<?=base_url()?>assets/frontend/assets/images/logo2.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="<?=base_url()?>assets/frontend/assets/images/logo3.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="<?=base_url()?>assets/frontend/assets/images/logo4.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="<?=base_url()?>assets/frontend/assets/images/logo5.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="<?=base_url()?>assets/frontend/assets/images/logo2.png" alt="">
                        </figure>
                     </div>
                  </div>
               </div>
            </div>
            <!-- client html end -->
            <!-- Home subscribe section html start -->
            <section class="subscribe-section" style="background-image: url(<?=base_url()?>assets/frontend/assets/images/footer1.jpg);">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-7">
                        <div class="section-heading section-heading-white">
                           <h5 class="dash-style">SUBSCRIBE</h5>
                           <h2>DAPATKAN PROMO MENARIK!</h2>
                           <h4>Ayo ikuti kami sekarang untuk mendapatkan info - info dan promo - promo menarik dari kami!</h4>
                           <div class="newsletter-form">
                              <form action="<?=base_url('user/insert_subscriber')?>" method="post">
                                 <input type="email" name="email" placeholder="Masukkan Email Anda">
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
            <!-- Home blog section html start -->
            <section class="blog-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">FROM OUR BLOG</h5>
                           <h2>OUR RECENT POSTS</h2>
                           <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                   <?php for($j=0;$j<count($blog);$j++) { ?>
                     <div class="col-md-6 col-lg-4">
                        <article class="post">
                           <figure class="feature-image">
                              <a href="#">
                                 <!-- ukuran 365 x 305 -->
                                 <img src="<?=$blog[$j]['photo']?>" alt="">
                              </a>
                           </figure>
                           <div class="entry-content">
                              <h3>
                                 <a href="#"><?=$blog[$j]['title']?></a>
                              </h3>
                              <div class="entry-meta">
                                 <span class="byline">
                                    <a href="#">Admin</a>
                                 </span>
                                 <span class="posted-on">
                                    <a href="#"><?=$blog[$j]['date']?></a>
                                 </span>
                                 <span class="comments-link">
                                    <a href="#">Belum ada komentar</a>
                                 </span>
                              </div>
                           </div>
                        </article>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </section>
             <!-- blog html end -->
             <!-- Home testimonial section html start -->
            <div class="testimonial-section" style="background-image: url(<?=base_url()?>assets/frontend/assets/images/img23.jpg);">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-10 offset-lg-1">
                        <div class="testimonial-inner testimonial-slider">
                           <?php for($i=0;$i<count($testimonial);$i++) { ?>
                           <div class="testimonial-item text-center">
                              <figure class="testimonial-img">
                                 <!-- ukuran 100 x 100 -->
                                 <img src="<?= $testimonial[$i]['foto']?>" alt="">
                              </figure>
                              <div class="testimonial-content">
                                 <p>" <?= $testimonial[$i]['description'] ?> "</p>
                                 <cite>
                                    <?= $testimonial[$i]['name']; ?>
                                 </cite>
                              </div>
                           </div>
                        <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- testimonial html end -->
            <!-- Home contact details section html start -->
            <section class="contact-section">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-4">
                        <!-- ukuran 410 x 390 -->
                        <div class="contact-img" style="background-image: url(<?=base_url()?>assets/frontend/assets/images/footer2.jpg);">
                        </div>
                     </div>
                     <div class="col-lg-8">
                        <div class="contact-details-wrap">
                           <div class="row">
                              <div class="col-sm-4">
                                 <div class="contact-details">
                                    <div class="contact-icon">
                                       <img src="<?=base_url()?>assets/frontend/assets/images/icon12.png" alt="">
                                    </div>
                                    <ul>
                                       <li>
                                          <a href="#">support@batiktours.co.id</a>
                                       </li>
                                       <li>
                                          <a href="#">info@batiktours.co.id</a>
                                       </li>
                                       <li>
                                          <a href="#">inquiry@batiktours.co.id</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="contact-details">
                                    <div class="contact-icon">
                                       <img src="<?=base_url()?>assets/frontend/assets/images/icon13.png" alt="">
                                    </div>
                                    <ul>
                                       <li>
                                          <a href="#">(021) 254 669</a>
                                       </li>
                                       <li>
                                          <a href="#">(021) 255 587</a>
                                       </li>
                                       <li>
                                          <a href="#">+62 977 2599 12</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="contact-details">
                                    <div class="contact-icon">
                                       <img src="<?=base_url()?>assets/frontend/assets/images/icon14.png" alt="">
                                    </div>
                                    <ul>
                                       <li>
                                          Ruko Greenlake
                                       </li>
                                       <li>
                                          Blok H8, No. 88
                                       </li>
                                       <li>
                                          Jakarta Barat, Indonesia
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="contact-btn-wrap">
                           <h3>AYO RENCANAKAN LIBURAN KAMU BERSAMA KAMI !!</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!--  contact details html end -->
         </main>
       