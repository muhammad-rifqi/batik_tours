<?php include APPPATH."views/layout/menu_user.php" ; ?>
<main id="content" class="site-main">
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
               <!-- ukuran 1920 x 800 -->
               <div class="inner-baner-container" style="background-image: url(<?= base_url()?>/assets/frontend/assets/images/cart-background.jpg);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">Keranjang Pesanan</h1>
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
                     <div class="step-item">
                        Detail Pesanan
                        <a href="#" class="step-icon"></a>
                     </div>
                     <div class="step-item">
                        Pembayaran
                        <a href="#" class="step-icon"></a>
                     </div>
                  </div>
                  <!-- step one form html start -->
                  <div class="cart-list-inner">
                     <form action="<?= base_url('user/update_quantity')?>" method="POST">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah Peserta</th>
                                <th>Sub Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $subtotal = 0;
                              for($i=0;$i<count($cart);$i++){
                              $sub = ($cart[$i]['price'] * $cart[$i]['person']);  
                              $subtotal += $sub; 
                              echo "<input type='hidden' name='id[]' value='".$cart[$i]['id']."'>";
                              ?>
                              <tr>
                                <td class="">
                                  <button class="close" data-dismiss="alert" aria-label="Close" onclick="window.location.href='<?= base_url('user/delete_cart/'.$cart[$i]['id'])?>'"><span aria-hidden="true">×</span></button>
                                  <!-- ukuran 365 x 305 -->
                                  <span class="cartImage"><img src="<?= $cart[$i]['foto']?>" alt="image"></span>
                                </td>
                                <td data-column="Product Name"><?= $cart[$i]['package_name']?></td>
                                <td data-column="Price">Rp <?= number_format($cart[$i]['price'],0,',','.')?></td>
                                <td data-column="Quantity" class="count-input">
                                    <div>
                                       <input name="quantity[]" type="text" value="<?= $cart[$i]['person']?>">
                                    </div>
                                </td>
                                <td data-column="Sub Total">Rp <?= number_format($cart[$i]['price'] * $cart[$i]['person']); ?></td>
                              </tr>
                            </tbody>
                           <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="updateArea">
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="Masukkan kode kupon disini">
                              <button" class="outline-primary">Gunakan Kupon</button>
                          </div>
                           <button type="submit" class="outline-primary update-btn text-right">Update Keranjang</button>
                        </div>
                        <div class="totalAmountArea">
                           <ul class="list-unstyled">
                              <li><strong>Sub Total</strong> <span>Rp <?= number_format($subtotal);?></span></li>
                              <li><strong>Tax</strong> <span>Rp 180.000</span></li>
                              <li><strong>Grand Total</strong> <span class="grandTotal">Rp <?= number_format($subtotal + 180000)?></span></li>
                           </ul>
                        </div>
                        <div class="checkBtnArea text-right">
                          <a href="<?= base_url('order');?>" class="button-primary">CHECKOUT</a>
                        </div>
                      </form>
                  </div>
                  <!-- step one form html end -->
               </div>
            </div>
         </main>