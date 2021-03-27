<!-- widget Aparatur Desa -->
<style>
	#aparatur .splide__slide{
		position: relative;
	}
	#aparatur img{
		height: 220px;
		width: 100%;
		object-fit: cover;
	}
	#aparatur .keterangan{
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		background: #00000079;
		text-align: center;
		color: #fff;
	}
	#aparatur .splide__pagination{
		display: none;
	}
	#aparatur h5{
		font-weight: bold;
		margin: 0;
		background: rgba(0, 0, 0, 0.459);
		padding: 5px 0;
	}
	#aparatur .jabatan{
		padding: 3px 0;
		font-size: 13px;
	}
</style>
<div class="single_bottom_rightbar" id="aparatur">
	<h2 class="box-title"><i class="fas fa-user me-1"></i> Aparatur <?= ucwords($this->setting->sebutan_desa)?></h2>
	<div class="box-body m-2">
		<div class="splide">
			<div class="splide__track">
				<ul class="splide__list">
				<?php foreach($aparatur_desa['daftar_perangkat'] as $data) : ?>
					<li class="splide__slide">
						<img src="<?= $data['foto'] ?>" alt="" class="img-fluid">
						<div class="keterangan">
							<h5 class="nama"><?= $data['nama'] ?></h5>
							<div class="jabatan"><?= $data['jabatan'] ?></div>
						</div>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>