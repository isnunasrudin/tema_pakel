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

                <?php if( $single_artikel["id"] ) : ?>

                <div class="card h-100 shadow-sm single-artikel">
                    <div class="card-header d-flex">
                        <i class="fas fa-globe text-secondary my-auto me-3 h1"></i>
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
                        
                        <!-- BAGIAN SHARE -->
                        <div class="d-block text-muted fw-bold">Bagikan ke :</div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="http://www.facebook.com/sharer.php?u=<?= "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Facebook' class="btn btn-primary"><i class="fab fa-facebook-f"></i></a>
                            <a href="http://twitter.com/share?source=sharethiscom&text=<?= htmlspecialchars($single_artikel["judul"]);?>%0A&url=<?= "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Twitter' class="btn btn-info"><i class="fab fa-twitter"></i></a>
                            <a href="mailto:?subject=<?= htmlspecialchars($single_artikel["judul"]);?>&body=<?= potong_teks($single_artikel["isi"], 1000);?> ... Selengkapnya di <?= "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]?>" title='Email' class="btn btn-danger"><i class="fas fa-envelope"></i></a>
                            <a href="https://telegram.me/share/url?url=<?= "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]?>&text=<?= htmlspecialchars($single_artikel["judul"]);?>%0A" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Telegram' class="btn btn-dark"><i class="fab fa-telegram"></i></a>
                            <a href="https://api.whatsapp.com/send?text=<?= htmlspecialchars($single_artikel["judul"]);?>%0A<?= "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='WhatsApp' class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
                        </div>

                        <!-- BAGIAN KOMENTAR -->
                        <?php if ($single_artikel['boleh_komentar'] == 1): ?>
                            <div class="box box-default mt-5">
                                <div class="box-header">
                                    <h2 class="box-title">Kirim Komentar</h2>
                                </div><hr />
                                <?php
                                    $notif = $this->session->flashdata('notif');
                                    $label = ($notif['status'] == -1) ? 'label-danger' : 'label-info';
                                ?>
                                <?php if ($notif): ?>
                                    <div class="box-header <?= $label; ?>"><?= $notif['pesan']; ?></div>
                                <?php endif; ?>
                                <div class="contact_bottom">
                                    <form class="contact_form form-komentar" id="validasi" name="form" action="<?= site_url("add_comment/$single_artikel[id]"); ?>" method="POST" onSubmit="return validasi(this);">
                                        <table width="100%">
                                            <tr class="komentar nama">
                                                <td width="20%">Nama</td>
                                                <td>
                                                    <input class="form-group required" type="text" name="owner" maxlength="100" placeholder="ketik di sini" value="<?= $notif['data']['owner']; ?>">
                                                </td>
                                            </tr>
                                            <tr class="komentar alamat">
                                                <td>No. Hp</td>
                                                <td>
                                                    <input class="form-group number required" type="text" name="no_hp" maxlength="15" placeholder="ketik di sini" value="<?= $notif['data']['no_hp']; ?>">
                                                </td>
                                            </tr>
                                            <tr class="komentar alamat">
                                                <td>E-mail</td>
                                                <td>
                                                    <input class="form-group email" type="text" name="email" maxlength="100" placeholder="email@gmail.com" value="<?= $notif['data']['email']; ?>">
                                                </td>
                                            </tr>
                                            <tr class="komentar pesan">
                                                <td valign="top">Isi Pesan</td>
                                                <td>
                                                    <textarea class="required" name="komentar"><?= $notif['data']['komentar']; ?></textarea>
                                                </td>
                                            </tr>
                                            <tr class="captcha"><td>&nbsp;</td>
                                                <td>
                                                    <img id="captcha" src="<?= base_url('securimage/securimage_show.php'); ?>" alt="CAPTCHA Image"/>
                                                    <a href="#" onclick="document.getElementById('captcha').src = '<?= base_url()."securimage/securimage_show.php?"?>' + Math.random(); return false" style="color: #000000;">[ Ganti gambar ]</a>
                                                </td>
                                            </tr>
                                            <tr class="captcha_code">
                                                <td>&nbsp;</td>
                                                <td>
                                                    <input type="text" name="captcha_code" class="required" maxlength="6" value="<?= $notif['data']['captcha_code']; ?>"/> Isikan kode di gambar
                                                </td>
                                            </tr>
                                            <tr class="submit">
                                                <td>&nbsp;</td>
                                                <td><input type="submit" value="Kirim"></td>
                                            </tr>
                                            <tr class="submit">
                                                <td><br><br></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    
                </div>

                <?php else : ?>

                    <div class="card">
                        <div class="card-body text-center">
                            <div class="h4">Halaman Tidak Ditemukan</div>
                            <a href="<?= base_url() ?>" class="btn btn-success mt-1 btn-sm">Ke Beranda</a>
                        </div>
                    </div>

                <?php endif; ?>
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