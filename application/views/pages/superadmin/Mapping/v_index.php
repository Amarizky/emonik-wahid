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
                <h5 class="card-title">Data <?php echo $menu." Menu ".$check->name;?> </h5>
            </div>

            <div class="card-body">
                <?php echo $desc_menu;?>
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item"><a href="#highlighted-tab1" class="nav-link <?php echo $sub_menu == 'List' ? ' active' : '';?>" data-toggle="tab"><?php echo $sub_title == "Trash" ? 'Trash' : 'List Data';?></a></li>
                    <?php if($sub_title != "Trash") : ?>
                    <li class="nav-item"><a href="#highlighted-tab2" class="nav-link <?php echo $sub_menu == 'Add' ? ' active' : '';?>" data-toggle="tab">Add New</a></li>
                    <?php endif;?>
                </ul>

                <div class="tab-content">
                    <?php echo $sub_title == 'Trash' ? '<a href="#remove" id="remove_all" data-address="'.site_url(current_group().'/'.$menu.'/remove_all').'" class="btn bg-warning-300 mb-2"><i class="mi-delete-forever"></i> Kosongkan</a>' : '';?>

                    <div class="tab-pane fade <?php echo $sub_menu == 'List' ? 'show active' : '';?>" id="highlighted-tab1" style="margin-top:-20px;">
                        <table class="table datatable-button-html5-columns" >
                            <thead>
                                <tr>
                                    <th>Menu (Category)</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($datatable as $row) {
                                        $bt = '<div class="list-icons">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#remove" data-toggle="confirm-remove" data-address="'.site_url(current_group().'/'.$menu."/remove/$companyid/".$row->id).'" type="button" class="dropdown-item" ><i class="icon-cross3"></i> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>';
                                        echo "
                                        <tr>
                                            <td>$row->menuname ($row->category)</td>
                                            <td class='text-center'>$bt</td>
                                        </tr>
                                        ";   
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade <?php echo $sub_menu == 'Add' ? 'show active' : '';?>" id="highlighted-tab2">
                        <br/>
                        <?php echo $html_add_new;?>
                    </div>

                </div>

                
            </div>

        </div>
        <!-- /basic initialization -->
</div>
