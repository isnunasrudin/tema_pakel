<!-- widget Galeri-->
<style>
	#wg-galeri .splide a{
		display: block;
	}
	#wg-galeri .splide a img{
		width: 100%;
		height: 100%;
	}
	#wg-galeri .splide a .nama{
		background: #00000085;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		text-align: center;
		padding: 2rem 3rem;
		color: #fff;
		font-size: 20px;
		font-weight: bold;
		display: flex;
	}
</style>
<div class="single_bottom_rightbar" id="wg-galeri">
	<h2 class="box-title"><i class="fas fa-book me-1"></i> <a href="<?= site_url();?>first/gallery">Galeri Foto</a></h2>
	<div class="m-2">
		<div class="splide">
			<div class="splide__track">
				<ul class="splide__list">
				<?php foreach($w_gal as $data) : ?>
				<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
					<li class="splide__slide">
						<!-- <a href="<?= site_url("first/sub_gallery/$data[id]"); ?>"> -->
						<a href="#">
							<img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" alt="" class="img-fluid">
							<div class="nama">
								<span class="m-auto"><?= $data['nama'] ?></span>
							</div>
						</a>
					</li>
				<?php endif; ?>
				<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
