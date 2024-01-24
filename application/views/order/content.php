<script>

  
window.addEventListener("load",(event)=>{
         document.getElementById("buttonss").disabled = true;
      });
  
      
 function showProvince(idp) {
        if (idp == "") {
            alert('please choose data!');
            return false;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("provinced").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "<?= base_url('user/provinced/')?>" + idp, true);
            xmlhttp.send();
        }
    }

    function showCities(id) {
        if (id == "") {
            alert('please choose data!');
            return false;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("listcities").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "<?= base_url('user/listcities/')?>" + id, true);
            xmlhttp.send();
        }
    }



</script>
<?php include APPPATH."views/layout/menu_user.php" ; ?>
<main id="content" class="site-main">
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
               <!-- ukuran 1920 x 800 -->
               <div class="inner-baner-container" style="background-image: url(<?= base_url()?>/assets/frontend/assets/images/cart-background.jpg);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">Detail Pesanan</h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>
            <!-- Inner Banner html end-->
            <div class="step-section booking-section">
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
                     <div class="step-item">
                        Pembayaran
                        <a href="#" class="step-icon"></a>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-8 right-sidebar">
                        <!-- step one form html start -->
                        <form method="POST" action="<?= base_url('user/insert_customer')?>">
                        <input type="hidden" name="token" value="<?=session_id();?>">
                        <div class="booking-form-wrap">
                           <div class="booking-content">
                              <div class="form-title">
                                 <span>1</span>
                                 <h3>Detail Pemesan</h3>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>Nama Depan*</label>
                                       <input type="text" class="form-control" name="firstname">
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>Nama Belakang*</label>
                                       <input type="text" class="form-control" name="lastname">
                                    </div>
                                 </div>
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <label>Email*</label>
                                       <input type="email" class="form-control" name="email">
                                    </div>
                                 </div>
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <label>No Hp / Wa Aktif*</label>
                                       <input type="text" class="form-control" name="phone">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="booking-content">
                              <div class="form-title">
                                 <span>2</span>
                                 <h3>Alamat & Informasi Tambahan</h3>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <label>Negara*</label>
                                       <select class="form-control" name="country" id="country" onchange="showProvince(this.value)">
                                          <option value="" selected="">Pilih Negara</option>
                                          <?php 
                                          for($i=0;$i<count($country);$i++){
                                             echo "<option value='".$country[$i]['id_country']."'>".$country[$i]['name']."</option>";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <label>Alamat 1*</label>
                                       <input type="text" name="address">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                              <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                       <label>Provinsi*</label>
                                       <select class="form-control" name="provinced" id="provinced" onchange="showCities(this.value)">
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                       <label>Kota*</label>
                                       <select class="form-control" name="listcities" id="listcities">
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                       <label>Kode Wilayah*</label>
                                       <input type="text" name="postal_code">
                                    </div>
                                 </div>
                              </div>
                              <!--End row -->
                           </div>
                           <div class="form-policy">
                              <h3>Book Policy</h3>
                              <div class="form-group">
                                 <label class="checkbox-list">
                                    <input type="checkbox" id="checkboxs" name="checkboxs" value="ss">
                                    <span class="custom-checkbox"></span>
                                    Saya setuju dengan Syarat & Ketentuan yang berlaku di BatikTours
                                 </label>
                              </div>
                              <button  class="button-primary" id="buttonss" type="submit">Bayar Sekarang</button>
                           </div>
                        </div>
                        </form>
                        <!-- step one form html end -->
                     </div>
                     <div class="col-lg-4">
                        <aside class="sidebar">
                           <!-- <div class="widget-bg widget-table-summary">
                              <h4 class="bg-title">Total Biaya</h4>
                              <table>
                                 <tbody>
                                    <tr>
                                       <td>
                                          <strong>Biaya Paket </strong>
                                       </td>
                                       <td class="text-right">
                                          Rp 3000.000
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <strong>Tour Guide</strong>
                                       </td>
                                       <td class="text-right">
                                          Rp 340.000
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <strong>Asuransi</strong>
                                       </td>
                                       <td class="text-right">
                                          Rp 340.000
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <strong>Pajak</strong>
                                       </td>
                                       <td class="text-right">
                                          11%
                                       </td>
                                    </tr>
                                    <tr class="total">
                                       <td>
                                          <strong>Total Biaya</strong>
                                       </td>
                                       <td class="text-right">
                                          <strong>Rp 3.680.000</strong>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div> -->
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
         </main>

<script>

const cb =  document.getElementById("checkboxs");
   if(cb){
      cb.addEventListener("change",(event)=>{
         if(event.target.checked == true){
            document.getElementById("buttonss").disabled = false;
         }
      });
   }



</script>