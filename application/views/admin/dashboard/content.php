 <!-- start Container Wrapper -->
 <div id="container-wrapper">
        <!-- Dashboard -->
        <div id="dashboard" class="dashboard-container">
            <div class="dashboard-header sticky-header">
                <div class="content-left  logo-section pull-left">
                    <h1><a href="<?= base_url()?>/admin/dashboard"><img src="<?= base_url()?>assets/backend/assets/images/logo.png" alt=""></a></h1>
                </div>
                <?php include APPPATH."views/layout/notif.php" ; ?>
            </div>
            <?php include APPPATH."views/layout/menu_admin.php" ; ?>
            <div class="db-info-wrap">
                <div class="row">
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="db-info-list">
                            <div class="dashboard-stat-icon bg-blue">
                                <i class="far fa-chart-bar"></i>
                            </div>
                            <div class="dashboard-stat-content">
                                <h4>Today Views</h4>
                                <h5>22,520</h5> 
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="db-info-list">
                            <div class="dashboard-stat-icon bg-green">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="dashboard-stat-content">
                                <h4>Earnings</h4>
                                <h5>16,520</h5> 
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="db-info-list">
                            <div class="dashboard-stat-icon bg-purple">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="dashboard-stat-content">
                                <h4>Users</h4>
                                <h5>18,520</h5> 
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="db-info-list">
                            <div class="dashboard-stat-icon bg-red">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <div class="dashboard-stat-content">
                                <h4>Enquiry</h4>
                                <h5>19,520</h5> 
                            </div>
                        </div>
                    </div>
                </div>
            
            
                
                <div class="row">
                    <!-- site traffic -->
                    <div class="col-lg-4">
                        <div class="dashboard-box chart-box">
                           <h4>Site Traffic</h4>
                           <div id="chartContainer" style="height: 250px; width: 100%;"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="dashboard-box chart-box">
                           <h4>Bar Chart</h4>
                           <div id="barchart" style="height: 250px; width: 100%;"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 chart-box">
                        <div class="dashboard-box">
                           <h4>Search Engine</h4>
                           <div id="piechart" style="height: 250px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>