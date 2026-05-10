<?php
$current_page = $this->router->fetch_method();
$settings_pages = array('item_list', 'referral_list', 'stock_code', 'expenses_list', 'users_list', 'clinic_list');
$report_pages = array('sales_summary', 'purchases_summary', 'patient_summary', 'expenses_summary', 'income_statement');

$settings_open = in_array($current_page, $settings_pages, true);
$reports_open = in_array($current_page, $report_pages, true);
?>

<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li><a href="<?= base_url(); ?>" class="waves-effect<?= $current_page === 'index' ? ' active' : ''; ?>"><i class="ph ph-gauge"></i><span>  Dashboard  </span></a></li>
                <li><a href="<?= base_url(); ?>Pages/patient_list" class="waves-effect<?= $current_page === 'patient_list' ? ' active' : ''; ?>"><i class="ph ph-users-three"></i><span>  Patients </span></a></li>
                <li><a href="<?= base_url(); ?>Pages/patient_queue" class="waves-effect<?= $current_page === 'patient_queue' ? ' active' : ''; ?>"><i class="ph ph-queue"></i><span>Patient's Queue</span></a></li>
                <li><a href="<?= base_url(); ?>Pages/pay" class="waves-effect<?= $current_page === 'pay' ? ' active' : ''; ?>"><i class="ph ph-receipt"></i><span>  Patient's Bill </span></a></li>
                
                <li class="<?= $settings_open ? 'mm-active' : ''; ?>">
                    <a href="javascript: void(0);" class="waves-effect<?= $settings_open ? ' active' : ''; ?>" aria-expanded="<?= $settings_open ? 'true' : 'false'; ?>">
                        <i class="ph ph-gear-six"></i>
                        <span> Settings </span>
                        <span class="menu-arrow"><i class="ph ph-caret-right"></i></span>
                    </a>
                    <ul class="nav-second-level<?= $settings_open ? ' mm-show' : ''; ?>" aria-expanded="<?= $settings_open ? 'true' : 'false'; ?>">
                        <li><a href="<?= base_url(); ?>Pages/item_list" class="waves-effect<?= $current_page === 'item_list' ? ' active' : ''; ?>"><i class="ph ph-package"></i>Items</a></li>
                        <li><a href="<?= base_url(); ?>Pages/referral_list" class="waves-effect<?= $current_page === 'referral_list' ? ' active' : ''; ?>"><i class="ph ph-handshake"></i>Referrals</a></li>
                        <li><a href="<?= base_url(); ?>Pages/stock_code" class="waves-effect<?= $current_page === 'stock_code' ? ' active' : ''; ?>"><i class="ph ph-shopping-cart"></i>Purchases</a></li>
                        <li><a href="<?= base_url(); ?>Pages/expenses_list" class="waves-effect<?= $current_page === 'expenses_list' ? ' active' : ''; ?>"><i class="ph ph-coins"></i>Expenses</a></li>
                        <li><a href="<?= base_url(); ?>Pages/users_list" class="waves-effect<?= $current_page === 'users_list' ? ' active' : ''; ?>"><i class="ph ph-user-circle-gear"></i>Users</a></li>
                        <?php if(is_superadmin()): ?>
                        <li><a href="<?= base_url(); ?>Pages/clinic_list" class="waves-effect text-primary<?= $current_page === 'clinic_list' ? ' active' : ''; ?>"><i class="ph ph-buildings"></i><strong>Clinic Management</strong></a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="<?= $reports_open ? 'mm-active' : ''; ?>">
                    <a href="javascript: void(0);" class="waves-effect<?= $reports_open ? ' active' : ''; ?>" aria-expanded="<?= $reports_open ? 'true' : 'false'; ?>">
                        <i class="ph ph-chart-bar"></i>
                        <span>Reports</span>
                        <span class="menu-arrow"><i class="ph ph-caret-right"></i></span>
                    </a>
                    <ul class="nav-second-level<?= $reports_open ? ' mm-show' : ''; ?>" aria-expanded="<?= $reports_open ? 'true' : 'false'; ?>">
                        <li><a href="<?= base_url(); ?>Pages/sales_summary" class="<?= $current_page === 'sales_summary' ? ' active' : ''; ?>"><i class="ph ph-chart-line-up"></i>Sales Summary</a></li>
						<li><a href="<?= base_url(); ?>Pages/purchases_summary" class="<?= $current_page === 'purchases_summary' ? ' active' : ''; ?>"><i class="ph ph-shopping-cart"></i>Purchases Summary</a></li>
						<li><a href="<?= base_url(); ?>Pages/patient_summary" class="<?= $current_page === 'patient_summary' ? ' active' : ''; ?>"><i class="ph ph-file-text"></i>Patient Summary</a></li>
                        <li><a href="<?= base_url(); ?>Pages/expenses_summary" class="<?= $current_page === 'expenses_summary' ? ' active' : ''; ?>"><i class="ph ph-coins"></i>Expenses Summary</a></li>
                        <?php if($this->session->position != "admin"){ ?>
						<li><a href="<?= base_url(); ?>Pages/income_statement" class="<?= $current_page === 'income_statement' ? ' active' : ''; ?>"><i class="ph ph-notebook"></i>Income Statement</a></li>
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

 
