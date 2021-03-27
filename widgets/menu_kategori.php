<!-- widget Kategori-->
<div class="single_bottom_rightbar">
	<h2><i class="fas fa-list me-1"></i> Kategori</h2>
	<div class="m-2">
		<div id="ul-menu" class="list-group">
			<?php foreach($menu_kiri as $data):?>
				<a href="<?= site_url("artikel/kategori/$data[slug]"); ?>" class="list-group-item list-group-item-action">
					<i class="far fa-flag me-1"></i> <?= $data['kategori']; ?><?php (count($data['submenu'])>0) and print('<span class="caret"></span>');?>
				</a>
				<?php if(count($data['submenu'])>0 && false): ?>
					<ul class="nav submenu">
						<?php foreach($data['submenu'] as $submenu):?>
							<li><a href="<?= site_url("artikel/kategori/$submenu[slug]"); ?>"><?= $submenu['kategori']?></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			<?php endforeach;?>
		</div>
	</div>
</div>
