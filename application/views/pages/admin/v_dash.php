<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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

<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-xl-12">
            <h5>Selamat Datang <?= current_ses('name'); ?> <br /><small>Anda terdaftar sebagai <b><?= current_ses('roledesc'); ?></b> </small></h5>
        </div>
        <div class="col-xl-12">
            <div class="card card-body">
                <canvas id="dashboardChart"></canvas>
                <div class="row">
                    <?php foreach ($dataset['realLabel'] as $label) : ?>
                        <div class="col-3 text-center my-2">
                            <a href="Bahanbaku/details/<?= $label; ?>" class="btn btn-primary w-75"><?= $label; ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a href="<?= site_url(current_role() . '/bahanbaku'); ?>" title="See Detail">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="font-weight-semibold text-dark mb-0"><?= @$total_emp; ?></h3>
                            <span class=" font-size-sm text-muted">Bahan Baku</span>
                        </div>
                        <div class="ml-3 align-self-center">
                            <i class="icon-users4 icon-3x text-blue-400"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a href="<?= site_url(current_role() . '/users'); ?>" title="See Detail">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="font-weight-semibold text-dark mb-0"><?= @$total_users; ?></h3>
                            <span class=" font-size-sm text-muted">Total User Accounts</span>
                        </div>
                        <div class="ml-3 align-self-center">
                            <i class="icon-user-lock icon-3x text-danger-400"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a href="<?= site_url(current_role() . '/produk'); ?>" title="See Detail">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="font-weight-semibold text-dark mb-0"><?= @$total_orgs; ?></h3>
                            <span class=" font-size-sm text-muted">produk Mitra</span>
                        </div>
                        <div class="ml-3 align-self-center">
                            <i class="icon-briefcase icon-3x text-primary-400"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a href="<?= site_url(current_role() . '/posts'); ?>" title="See Detail">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="font-weight-semibold text-dark mb-0"><?= @$total_posts; ?></h3>
                            <span class=" font-size-sm text-muted">Total Jabatan</span>
                        </div>
                        <div class="ml-3 align-self-center">
                            <i class="icon-list2 icon-3x text-success-400"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<script>
    const labels = [<?= $dataset['labels']; ?>];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Data Bahan Baku Mitra <?= ucwords($dataset['mitra']); ?> (<?= $dataset['satuan']; ?>)',
            data: [<?= $dataset['data']; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    var myChart = new Chart(
        document.getElementById('dashboardChart'), {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        }
    )
</script>
<!-- /content area -->