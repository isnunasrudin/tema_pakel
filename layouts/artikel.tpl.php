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
                <div class="card h-100 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title"><?= $single_artikel["judul"]?></h5>
                    </div>
                    <div class="card-body">
                        
                        <?php if( !$single_artikel["id"] ) : ?>
                        <?php $this->load->view("$folder_themes/partials/404.php") ?>

                        <?php else : ?>
                        <?php if ($single_artikel['gambar']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$single_artikel['gambar'])): ?>
                            <a data-fancybox="gallery" href="<?= AmbilFotoArtikel($single_artikel['gambar'],'sedang')?>">
                                <img width="270px" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="<?= AmbilFotoArtikel($single_artikel['gambar'],'sedang')?>"/>
                            </a>
                        <?php endif;?>
                        <?= trim($single_artikel["isi"]) ?>
                        <?php endif; ?> 

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