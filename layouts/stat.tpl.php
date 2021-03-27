<!DOCTYPE html>
<html lang="id">
<head>
    <?php $this->load->view("$folder_themes/partials/meta.php"); ?>
    <title>Desa Pakel - Watulimo</title>
</head>
<body>
    <?php $this->load->view("$folder_themes/partials/header.php") ?>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-9 pb-3">

                    <div class="card">
                        <div class="card-body text-center">
                            <div class="h4">Sedang Dalam Pengembangan...</div>
                            <a href="<?= base_url() ?>" class="btn btn-success mt-1 btn-sm">Ke Beranda</a>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3">
                <?php $this->load->view("$folder_themes/partials/widgets.php") ?>
            </div>
        </div>
    </div>

    <?php $this->load->view("$folder_themes/partials/footer_transparansi.php") ?>
    <?php $this->load->view("$folder_themes/partials/footer_meta.php") ?>
</body>
</html>