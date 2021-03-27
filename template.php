<?php if(!defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <?php $this->load->view("$folder_themes/partials/meta.php"); ?>
    <title>Desa Pakel - Watulimo</title>
</head>
<body>
    <?php $this->load->view("$folder_themes/partials/header.php") ?>

    <div id="home">
        <img src="<?= base_url("$this->theme_folder/$this->theme/images/pemandangan.jpg") ?>" alt="" class="background">
        <div class="keterangan">
            <div class="my-auto w-100">
                <div class="container">
                    <p class="h5">Selamat Datang di Website Resmi</p>
                    <img src="<?= gambar_desa('desa_pakel.svg') ?>" alt="Tulisan Desa Pakel" height="95"class="my-3" style="max-width: 100%;">
                    <p class="h3">Kec. Watulimo Kab. Trenggalek</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        
        <div class="card andalan no-radius mb-2">
            <div class="card-body">
                <div class="row justify-content-center g-5">
                    <div class="col-6 col-md-3">
                        <a href="#">
                            <img src="<?= base_url("$this->theme_folder/$this->theme/images/logo.svg") ?>" alt="" height="50">
                            <div class="d-block">APBDesa</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="#">
                            <img src="<?= base_url("$this->theme_folder/$this->theme/images/logo.svg") ?>" alt="" height="50">
                            <div class="d-block">SDGs Desa</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="#">
                            <img src="<?= base_url("$this->theme_folder/$this->theme/images/logo.svg") ?>" alt="" height="50">
                            <div class="d-block">Bantuan</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="#">
                            <img src="<?= base_url("$this->theme_folder/$this->theme/images/logo.svg") ?>" alt="" height="50">
                            <div class="d-block">Kontak Desa</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <div class="d-block bg-success p-1 text-white fw-bold h4 text-center mb-2">Artikel Terkini</div>
                <?php if(preg_match(
                    "/^". preg_quote(base_url(), '/') ."(index.php\/)?(index\/1)?$/",
                    current_url()
                )) array_unshift($artikel, $headline) ?>
                <?php foreach($artikel as $data) : ?>
                <div class="col mb-3">
                    <div class="card shadow-sm artikel">
                        <div class="card-horizontal">
                            <div class="img-artikel">
                                <?php if (is_file(LOKASI_FOTO_ARTIKEL."kecil_".$data['gambar'])): ?>
                                <img src="<?= AmbilFotoArtikel($data['gambar'],'sedang') ?>" alt="...">
                                <?php else: ?>
                                <img src="<?= base_url("$this->theme_folder/$this->theme/images/noimage.png") ?>" alt="...">
                                <?php endif; ?>
                            </div>
                            <div class="d-block w-100">
                                <div class="card-header">
                                    <a class="h5 judul" href="<?= site_url('artikel/'.buat_slug($data))?>"><?= $data["judul"] ?></a>
                                    <div class="d-block ket mt-1">
                                        <i class="far fa-calendar"></i> <span class="me-2"><?= tgl_indo($data['tgl_upload']) ?></span>
                                        <i class="far fa-user"></i> <span><?= $data['owner'] ?></span>
                                    </div>
                                </div>
                                <div class="card-body text-justify mb-3 isi-artikel">
                                    <p class="card-text"><?= potong_teks($data['isi'], 200) ?>...</p>
                                </div>
                                <div class="small card-footer ket text-right d-flex text-secondary">
                                    <i class="fas fa-comment me-1"></i> <span class="me-2"><?php
                                        $baca_komentar = $this->db->query("SELECT * FROM komentar WHERE id_artikel = '".$data['id']."'"); $komentarku = $baca_komentar->num_rows();
                                        echo number_format($komentarku,0,',','.');
                                    ?> Komentar</span>
                                    <?php if( $data['kategori'] != null ) : ?>
                                    <i class="far fa-flag me-1"></i><?= $data['kategori'] ?></span>
                                    <?php endif; ?>
                                    <div class="ms-auto">
                                        <i class="far fa-eye me-1"></i> <span><?= $data['hit'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="d-flex">
                    <?php if ($artikel AND $paging->num_rows > $paging->per_page): ?>
                    <nav aria-label="Page navigation example" class="mx-auto">
                        <ul class="pagination">
                            <li class="page-item me-2 <?= $paging->page == $paging->start_link ? 'disabled' : '' ?>"><a class="page-link" href="#">Previous</a></li>
                            <?php foreach ($pages as $i): ?>
                            <li class="page-item <?= ($p == $i) ? 'active' : "" ?>">
                                <a class="page-link" href="<?= site_url($paging_page."/$i" . $paging->suffix) ?>" title="Halaman <?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php endforeach; ?>
                            <li class="page-item ms-2 <?= $paging->page == $paging->end_link ? 'disabled' : '' ?>"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                <?php endif; ?>
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