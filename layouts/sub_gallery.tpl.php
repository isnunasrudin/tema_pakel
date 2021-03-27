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
                <div class="card h-100 shadow-sm single-artikel">
                    <div class="card-header d-flex">
                        <div class="d-block">
                            <h1 class="card-title"><?= $single_artikel["judul"]?></h1>
                            <?= tgl_indo2($single_artikel['tgl_upload']);?>&nbsp;
                            <i class="fa fa-user"></i><?= $single_artikel['owner']?>&nbsp;
                            <i class="fa fa-eye"></i><?= hit($single_artikel['hit']) ?> Dibaca&nbsp;
                            <?php if (trim($single_artikel['kategori']) != '') : ?>
                                <a href="<?= site_url('first/kategori/'.$single_artikel['id_kategori'])?>"><i class='fa fa-tag'></i><?= $single_artikel['kategori']?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ($single_artikel['gambar']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$single_artikel['gambar'])): ?>
                            <a data-fancybox="gallery" href="<?= AmbilFotoArtikel($single_artikel['gambar'],'sedang')?>">
                                <img width="270px" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="<?= AmbilFotoArtikel($single_artikel['gambar'],'sedang')?>"/>
                            </a>
                        <?php endif;?>
                        <?= trim($single_artikel["isi"]) ?>

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