<!-- widget Komentar-->
<style>
	.link-comment{
		vertical-align: middle;
		font-size: 3rem;
		margin: auto 0 auto 10px;
		line-height: 0;
		color: var(--bs-orange);
	}
	.link-comment:hover, .link-comment:active{
		color: var(--bs-yellow);
	}
	#mostPopular2 .name, #mostPopular2 .icon{
		color: #0ba360;
		font-weight: bolder;
	}
</style>
<div class="single_bottom_rightbar">
	<h2><i class="fas fa-comments me-1"></i> Komentar Terbaru</h2>
	<div id="mostPopular2" class="tab-pane in active" role="tabpanel">
		<div class="box-body my-2 mx-3">
			<marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" direction="up" width="100%" align="center" behavior=”alternate”>
					<?php foreach($komen As $data): ?>
					<div class="d-flex border-bottom mb-2 pb-1">
							<i class="fas fa-comments me-2 icon"></i>
							<div class="isi">
								<span class="d-block name"><?= $data['owner']?> : </span>
								<span>
									<?= $data['komentar_short'] ?>
								</span>
							</div>
							<a href="<?= site_url('artikel/' . buat_slug($data)); ?>" class="link-comment"><i class="fas fa-angle-right"></i></a>
					</div>
					<?php endforeach; ?>
			</marquee>
		</div>
	</div>
</div>