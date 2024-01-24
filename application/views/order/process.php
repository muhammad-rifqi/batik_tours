<?php include APPPATH."views/layout/menu_user.php" ; ?>
<main id="content" class="site-main">
    <!-- Inner Banner html start-->
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url(<?= base_url()?>/assets/frontend/assets/images/cart-background.jpg);">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">Pembayaran</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <!-- Inner Banner html end-->
    <div class="step-section cart-section">
        <div class="container">
            <div class="step-link-wrap">
                <div class="step-item active">
                    Keranjang Anda
                    <a href="#" class="step-icon"></a>
                </div>
                <div class="step-item active">
                    Detail Pesanan
                    <a href="#" class="step-icon"></a>
                </div>
                <div class="step-item active">
                    Pembayaran
                    <a href="#" class="step-icon"></a>
                </div>
            </div>
            <!-- step three form html start -->
            <div class="confirmation-outer">
                <div class="success-notify">
                    <div class="success-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="success-content">
                        <h3>PESANAN TERKONFIRMASI</h3>
                        <p>Silahkan cek data pesanan anda dibawah ini. Jika sudah, anda bisa membayar melalui metode
                            pembayaran yang kami berikan di bawah.</p>
                    </div>
                </div>
                <div class="confirmation-inner">
                    <div class="row">
                        <div class="col-lg-8 right-sidebar">
                            <div class="confirmation-details">
                                <h3>DETAIL PESANAN</h3>

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>ID BOOKING :</td>
                                            <td>#<?= $detail[0]['id']?></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA :</td>
                                            <td><?= $detail[0]['firstname']?> <?= $detail[0]['lastname']?></td>
                                        </tr>
                                        <tr>
                                            <td>EMAIL :</td>
                                            <td><?= $detail[0]['email']?></td>
                                        </tr>
                                        <tr>
                                            <td>TELEPON :</td>
                                            <td><?= $detail[0]['phone']?></td>
                                        </tr>
                                        <tr>
                                            <td>KOTA :</td>
                                            <td><?= $detail[0]['address']?></td>
                                        </tr>
                                        <tr>
                                            <td>KODEPOS</td>
                                            <td><?= $detail[0]['postal_code']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table class="table">
                                    <tr>
                                        <td>Package Name</td>
                                        <td>Price</td>
                                        <td>Person</td>
                                        <td>SubTotal</td>
                                    </tr>
                                    <?php
                                        $subtotal = 0;
                                        for($i=0;$i<count($data);$i++){
                                            $harga = ($data[$i]['person'] * $data[$i]['price']);
                                            $subtotal += $harga;
                                            echo "
                                            <tr>
                                                <td>".substr($data[$i]['package_name'],0,70)."</td>
                                                <td>".number_format($data[$i]['price'])."</td>
                                                <td>".$data[$i]['person']."</td>
                                                <td>".number_format(floor($data[$i]['person'] * $data[$i]['price']))."</td>
                                            </tr>";
                                        }
                                    ?>
                                </table>
                                <p>SubTotal : <b> <?= number_format($subtotal) ?> </b> dan Pajak <b> 180.000 </b>
                                    Menjadi <b><?= number_format($subtotal + 180000) ?> </b></p>

                                <div class="details payment-details">
                                    <h3>PEMBAYARAN MELALUI</h3>
                                    <div class="details-desc">
                                        <p>Kamu dapat melakukan pembayaran ke rekening kami melalui Bank berikut :</p>
                                        <br>
                                        <h3>BCA</h3>
                                        <h4>NO REK XXXX-XXXX-XX A/N BATIKTOURS</h4>
                                    </div>
                                </div>

                                <div class="details">
                                    <h3>KONFIRMASI PEMBAYARAN</h3>
                                    <div class="details-desc">
                                        <p>Setelah pembayaran, kamu dapat langsung melakukan konfirmasi <a
                                                href="#"><b>DISINI</b></a>, atau bisa juga dengan mengirimkan ke
                                            whatsapp Customer Service kami dengan melampirkan detail pesanan kamu. </p>
                                    </div>
                                    <div class="details-desc">
                                        <p>
                                            Kamu juga dapat kembali ke halaman ini untuk mengecek pesanan kamu sewaktu -
                                            waktu. <strong> Segera simpan link pemesanan kamu dibawah ya! </strong> <br>
                                            <a href="<?= base_url('invoice/'.$detail[0]['id'])?>"><b style="color:red"><?= base_url('invoice/'.$detail[0]['id'])?></b></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside class="sidebar">
                                <div class="widget-bg widget-support-wrap">
                                    <div class="icon">
                                        <i class="fas fa-phone-volume"></i>
                                    </div>
                                    <div class="support-content">
                                        <h5>INFORMASI DAN BANTUAN</h5>
                                        <a href="telto:12345678" class="phone">+62 812 1234 5678</a>
                                        <small>Senin - Sabtu 9.00am - 7.30pm</small>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <!-- step three form html end -->
        </div>
    </div>
</main>