<!-- Page header -->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="" class="breadcrumb-item"><i class="<?php echo $icon;?> mr-2"></i> <?php echo $menu;?></a>
                <?php echo $sub_menu != "" ? '<a href="#" class="breadcrumb-item">'.$sub_menu.'</a>' : '';?>
                <?php echo $sub_title != "" ? '<span class="breadcrumb-item active">'.$sub_title.'</span>' : '';?>
            </div>

        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0"><?=@$companies;?></h3>
                        <span class="text-uppercase font-size-sm text-muted">total companies</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-office icon-3x text-blue-400"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0"><?=@$menus;?></h3>
                        <span class="text-uppercase font-size-sm text-muted">total menu(s)</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-grid icon-3x text-purple-400"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0"><?=@$admin;?></h3>
                        <span class="text-uppercase font-size-sm text-muted">total administrator(s)</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-users icon-3x text-danger-400"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0"><?=@$users;?></h3>
                        <span class="text-uppercase font-size-sm text-muted">total all users</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-users4 icon-3x text-primary-400"></i>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /main charts -->
</div>
<!-- /content area -->