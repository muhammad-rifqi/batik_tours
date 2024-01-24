        <div class="copyrights">
            Copyright © 2021 Travele. All rights reserveds.
        </div>
        </div>
        <!-- Dashboard / End -->
        </div>
        <!-- end Container Wrapper -->
        <!-- *Scripts* -->
        <script src="<?= base_url()?>assets/backend/assets/js/jquery-3.2.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="<?= base_url()?>assets/backend/assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>assets/backend/assets/js/canvasjs.min.js"></script>
        <script src="<?= base_url()?>assets/backend/assets/js/chart.js"></script>
        <script src="<?= base_url()?>assets/backend/assets/js/counterup.min.js"></script>
        <script src="<?= base_url()?>assets/backend/assets/js/jquery.slicknav.js"></script>
        <script src="<?= base_url()?>assets/backend/assets/js/dashboard-custom.js"></script>

        <script>
            function loadFile(event) {
                const output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        </body>

        </html>