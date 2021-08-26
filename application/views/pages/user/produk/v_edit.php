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

<div class="content">
    <!-- Basic initialization -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Edit <?php echo $menu;?></h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <?php echo $desc_menu;?>
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item"><a href="<?php echo site_url(current_group().'/'.$menu_alias.'/index');?>" class="nav-link " >List Data</a></li>
                    <li class="nav-item"><a href="<?php echo site_url(current_group().'/'.$menu_alias.'/index/Add');?>" class="nav-link " >Add New</a></li>
                    <li class="nav-item dropdown"><a href="#highlighted-tab1" class="nav-link active" data-toggle="tab">Edit</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="highlighted-tab1">
                        <h6>Edit Data <?php echo $menu;?></h6>
                        <?php echo $html_form;?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /basic initialization -->
</div>
