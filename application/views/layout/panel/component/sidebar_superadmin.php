<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md bg-<?=APP_THEME;?>-800">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center bg-<?=APP_THEME;?>-800">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="<?php echo base_url('assets/avatar/'.current_ses('avatar'));?>" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold"><?php echo current_ses('name');?></div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-user-tie font-size-sm"></i> &nbsp;<?php echo current_ses('roledesc');?>
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="<?php echo site_url('auth/logout');?>" title="logout" class="text-white"><i class="icon-switch2"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                
                <li class="nav-item">
                    <a href="<?php echo site_url(current_role().'/dashboard');?>" class="nav-link <?php echo $menu == 'Dashboard' ? 'active' : '';?>">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Master Data</div> <i class="icon-menu" title="Main"></i></li>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>