<!-- widget SocMed -->
<div class="single_bottom_rightbar">
	<h2><i class="fas fa-globe me-1"></i> Info Media Sosial</h2>
	<div class="box-body m-2">
		<?php foreach ($sosmed As $data): ?>
			<?php if (!empty($data["link"])): ?>
				<div class="col text-center">
					<a href="<?= $data['link']?>" rel="noopener noreferrer" target="_blank">
						<img src="<?= base_url().'assets/front/'.$data['gambar'] ?>" alt="<?= $data['nama'] ?>" style="width:50px;height:50px;"/>
					</a>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
