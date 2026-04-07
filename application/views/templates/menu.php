<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li><a href="<?= base_url(); ?>" class="waves-effect"><i class="ion-md-speedometer"></i><span>  Dashboard  </span></a></li>
                <li><a href="<?= base_url(); ?>Pages/patient_list" class="waves-effect"><i class=" ion ion-md-people"></i><span>  Patients </span></a></li>
                <li><a href="<?= base_url(); ?>Pages/patient_queue" class="waves-effect"><i class="fab fa-accessible-icon"></i><span>Patient's Queue</span></a></li>
                <li><a href="<?= base_url(); ?>Pages/pay" class="waves-effect"><i class="mdi mdi-folder-open-outline "></i><span>  Patient's Bill </span></a></li>
                
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-settings"></i>
                        <span> Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="<?= base_url(); ?>Pages/item_list" class="waves-effect">Items</a>
                        <li><a href="<?= base_url(); ?>Pages/referral_list" class="waves-effect">Referrals</a></li>
                        <li><a href="<?= base_url(); ?>Pages/stock_code" class="waves-effect">Purchases</a></li>
                        <li><a href="<?= base_url(); ?>Pages/expenses_list" class="waves-effect">Expenses</a></li>
                        <li><a href="<?= base_url(); ?>Pages/users_list" class="waves-effect">Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fas fa-book-open"></i>
                        <span>Reports</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="<?= base_url(); ?>Pages/sales_summary">Sales Summary</a></li>
						<li><a href="<?= base_url(); ?>Pages/purchases_summary">Purchases Summary</a></li>
						<li><a href="<?= base_url(); ?>Pages/patient_summary">Patient Summary</a></li>
                        <li><a href="<?= base_url(); ?>Pages/expenses_summary">Expenses Summary</a></li>
                        <?php if($this->session->position != "admin"){ ?>
						<li><a href="<?= base_url(); ?>Pages/income_statement">Income Statement</a></li>
                        <?php } ?>
                    </ul>
                </li>
                
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->

                    <div class="container-fluid">

 
