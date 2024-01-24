<?php include APPPATH."views/layout/menu_user.php" ; ?>
      <main id="content" class="site-main">
            <div class="no-content-section 404-page" style="background-image: url(assets/images/404-img.jpg);">
               <div class="container">
                  <div class="no-content-wrap">
                     <span>404</span>
                     <h1>Oops! Sepertinya halaman yang anda cari tidak ditemukan</h1>
                     <h4>Cari ulang yuk, apa yang anda cari?</h4>
                     <div class="search-form-wrap">
                           <button class="button-primary" onclick="window.location.href='<?= base_url('/')?>'">Go to HomePage</button>
                     </div>
                  </div>
               </div>
               <div class="overlay"></div>
            </div>
         </main>