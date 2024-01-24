<div class="dashboard-navigation">
    <!-- Responsive Navigation Trigger -->
    <div id="dashboard-Navigation" class="slick-nav"></div>
    <div id="navigation" class="navigation-container">
        <ul>
            <li class="active-menu"><a href="<?= base_url()?>/admin/dashboard"><i class="far fa-chart-bar"></i>
                    Dashboard</a></li>
            <li><a href="<?= base_url('admin/users')?>"><i class="fas fa-user"></i>Users</a></li>
            <li>
                <a><i class="fas fa-hotel"></i></i>packages</a>
                <ul>
                    <li><a href="<?= base_url('admin/add_package');?>"><i class="fas fa-umbrella-beach"></i>Add Package</a></li>
                    <li><a href="<?= base_url('admin/package_active');?>"><i class="fas fa-umbrella-beach"></i>Active</a></li>
                    <li><a href="<?= base_url('admin/package_pending');?>"><i class="fas fa-umbrella-beach"></i>Pending</a></li>
                    <li><a href="<?= base_url('admin/package_expired');?>"><i class="fas fa-umbrella-beach"></i>Expired</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url('admin/booking');?>"><i class="fas fa-ticket-alt"></i> Booking & Enquiry</a></li>
            <li><a href="<?= base_url('admin/wishlist');?>"><i class="far fa-heart"></i>Wishlist</a></li>
            <li><a><i class="fas fa-book"></i>Module Pages</a>
                <ul>
                    <li><a href="<?= base_url('admin/package_category');?>"><i class="fas fa-cog"></i>Package Category</a></li>
                    <li><a href="<?= base_url('admin/country');?>"><i class="fas fa-map-marker"></i>Country</a></li>
                    <li><a href="<?= base_url('admin/province');?>"><i class="fas fa-map-marker"></i>Province</a></li>
                    <li><a href="<?= base_url('admin/city');?>"><i class="fas fa-map-marker"></i>City</a></li>
                    <li><a href="<?= base_url('admin/blog');?>"><i class="fas fa-podcast"></i>Blog</a></li>
                    <li><a href="<?= base_url('admin/comments');?>"><i class="fas fa-comments"></i>Comments</a></li>
                    <li><a href="<?= base_url('admin/testimonial');?>"><i class="fas fa-user"></i>Testimonial</a></li>
                    <li><a href="<?= base_url('admin/subscriber');?>"><i class="fas fa-user"></i>Subscriber</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url('admin/logout');?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
</div>