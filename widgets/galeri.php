<!-- widget Galeri-->
<?php if( count($w_gal) > 0 ) : $i = 0; ?>
<div class="single_bottom_rightbar">
	<h2><i class="fas fa-book me-1"></i> <a href="<?= site_url();?>first/gallery">Galeri Foto</a></h2>
	<div class="latest_slider">
		<div class="slick_slider m-2">
			<?php foreach ($w_gal As $data): ?>
				<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): $i++; ?>
					<div class="single_iteam"><img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" alt="Album : <?= "$data[nama]" ?>">
						<h2><a class="slider_tittle" href="<?= site_url("first/sub_gallery/$data[id]"); ?>"><?= "$data[nama]" ?></a></h2>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			<?php if( $i < 1 ) : ?>
				<div class="text-center text-muted small">Galeri Foto Kosong</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php unset($i); endif; ?>