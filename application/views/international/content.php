<?php include APPPATH."views/layout/menu_user.php" ; ?>
<main id="content" class="site-main">
    <!-- Inner Banner html start-->
    <section class="inner-banner-wrap">
        <div class="inner-baner-container"
            style="background-image: url(<?= base_url()?>assets/frontend/assets/images/destinasi.jpg);">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">Paket Tur international</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <!-- Inner Banner html end-->
    <!-- packages html start -->
    <div class="package-section">
        <div class="container">
            <div class="package-inner">
                <div class="row">
                    <?php 
                    // list($width, $height) = getimagesize($file);

                    // if ($width > $height) {
                    //     $orientation = "Landscape"; }
                    //  else {
                    //     $orientation = "Portrait"; }
                    for($i=0;$i<count($international);$i++){ ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="package-wrap">
                            <figure class="feature-image">
                                <a href="<?= base_url('detail-package/'.$international[$i]['slug'])?>">
                                    <!-- ukuran 365 x 305 -->
                                    <img src="<?= $international[$i]['photo']?>" alt="">
                                </a>
                            </figure>
                            <div class="package-price">
                                <h6>
                                    <span>IDR <?= number_format($international[$i]['price'],0,',','.')?> </span> / per pax
                                </h6>
                            </div>
                            <div class="package-content-wrap">
                                <div class="package-meta text-center">
                                    <ul>
                                        <li>
                                            <i class="far fa-clock"></i>
                                            <?= $international[$i]['day']?>D/<?= $international[$i]['night']?>N
                                        </li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?= $international[$i]['cities']?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="package-content">
                                    <h3>
                                        <a href="<?= base_url('detail-package/'.$international[$i]['slug'])?>">Paket Hemat Liburan di <?= $international[$i]['cities']?></a>
                                    </h3>
                                    <div class="review-area">
                                        <span class="review-text">(<?= $international[$i]['star']?> ulasan)</span>
                                        <div class="rating-start" title="Rated 5 out of 5">
                                            <span style="width: 100%"></span>
                                        </div>
                                    </div>
                                    <p><?= substr($international[$i]['description'],0,200)?>....</p>
                                    <div class="btn-wrap">
                                        <a href="<?= base_url('detail-package/'.$international[$i]['slug'])?>" class="button-text width-6">Pesan Sekarang<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="#" class="button-text width-6">Favoritkan<i
                                                class="far fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- packages html end -->
    <!-- Home activity section html start -->
    <section class="activity-section">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5 class="dash-style">LIBURAN BERDASARKAN KEGIATAN</h5>
                        <h2>KEGIATAN LIBURAN PILIHAN</h2>
                        <p>Anda menyukai Trekking? Atau berkemah? kami menyediakan fasilitas liburan sesuai dengan minat
                            anda. Langsung cek dibawah yuk!</p>
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
                                <img src="<?= base_url()?>assets/frontend/assets/images/icon10.png" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Trekking</a>
                            </h4>
                            <p>12 Destinasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="<?= base_url()?>assets/frontend/assets/images/icon8.png" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Off Road</a>
                            </h4>
                            <p>15 Destinasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="<?= base_url()?>assets/frontend/assets/images/icon7.png" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Berkemah</a>
                            </h4>
                            <p>13 Destinasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="<?= base_url()?>assets/frontend/assets/images/icon11.png" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Menjelajah</a>
                            </h4>
                            <p>25 Destinasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- activity html end -->
</main>