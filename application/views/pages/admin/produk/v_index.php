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
                <h5 class="card-title">Data <?php echo $menu; echo $sub_title == "Trash" ? ' - Data Sampah' : '';?> </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <?php if($sub_title != "Trash") : ?>
                            <a class="list-icons-item mr-2"  href="<?php echo site_url(current_group().'/'.$menu_alias.'/trash');?>" data-popup="tooltip" title="See Trash"><i class="icon-trash-alt"></i> <?=@$trash_count > 0 ? '<span class="badge bg-warning-400 align-self-center ml-auto">'.@$trash_count.'</span>' : '';?></a>
                        <?php else:?>
                            <a class="list-icons-item mr-2"  href="<?php echo site_url(current_group().'/'.$menu_alias);?>" data-popup="tooltip" title="Kembali ke Semua Data"><i class="icon-circle-left2 "></i></a>
                        <?php endif;?>
                        <!-- <a class="list-icons-item" data-action="collapse"></a> -->
                    </div>
                </div>
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
                    <?php echo $sub_title == 'Trash' ? '<a href="#remove" id="remove_all" data-address="'.site_url(current_group().'/'.$menu_alias.'/remove_all').'" class="btn bg-warning-300 mb-2"><i class="mi-delete-forever"></i> Kosongkan</a>' : '';?>

                    <div class="tab-pane fade <?php echo $sub_menu == 'List' ? 'show active' : '';?>" id="highlighted-tab1" style="margin-top:-20px;">
                        <table class="table datatable-button-html5-columns" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>produk</th>
                                    <th>jumlah produk</th>
                                    <th>Tanggal Produksi</th>
                                    
                                    <th>mitra</th>
                                   
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($datatable as $row) {
                                            $bt = '<a href="'.site_url(current_group().'/'.$menu_alias."/edit/".$row->kode_produksi).'" class="dropdown-item"><i class="icon-pencil5"></i> Edit</a>';
                                        
                                        echo "
                                            <tr>
                                                <td>$i</td>
                                                <td>$row->kode_produksi</td>
                                                <td>" . ($row->jumlah_produksi?? '-') . "</td>
                                                <td>" . ($row->tanggal_produksi?? '-') . "</td>
                                        
                                                
                                                <td>" . ($row->createby?? '-') . "</td>
                                                <td class='text-center'>$bt</td>
                                            </tr>
                                        "; 
                                        $i++;  
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
