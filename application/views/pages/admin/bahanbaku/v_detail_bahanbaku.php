<!-- Page header -->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="" class="breadcrumb-item"><i class="<?php echo $icon; ?> mr-2"></i> <?php echo $menu; ?></a>
                <?php echo $sub_menu != "" ? '<a href="#" class="breadcrumb-item">' . $sub_menu . '</a>' : ''; ?>
                <?php echo $sub_title != "" ? '<span class="breadcrumb-item active">' . $sub_title . '</span>' : ''; ?>
            </div>

        </div>
    </div>
</div>
<!-- /page header -->


<div class="content">
    <!-- Basic initialization -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Detail <?= $label; ?></h5>
            <div class="header-elements">
                <div class="list-icons">
                    <?php if ($sub_title != "Trash") : ?>
                        <a class="list-icons-item mr-2" href="<?php echo site_url(current_group() . '/' . $menu_alias . '/trash'); ?>" data-popup="tooltip" title="See Trash"><i class="icon-trash-alt"></i> <?= @$trash_count > 0 ? '<span class="badge bg-warning-400 align-self-center ml-auto">' . @$trash_count . '</span>' : ''; ?></a>
                    <?php else : ?>
                        <a class="list-icons-item mr-2" href="<?php echo site_url(current_group() . '/' . $menu_alias); ?>" data-popup="tooltip" title="Kembali ke Semua Data"><i class="icon-circle-left2 "></i></a>
                    <?php endif; ?>
                    <!-- <a class="list-icons-item" data-action="collapse"></a> -->
                </div>
            </div>
        </div>

        <div class="card-body">
            <?php echo $desc_menu; ?>
            <table class="table datatable-button-html5-columns">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mitra</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><?= $mitra; ?></td>
                        <td><?= $stok; ?></td>
                    </tr>
                </tbody>
            </table>

        </div>


    </div>

</div>
<!-- /basic initialization -->
</div>