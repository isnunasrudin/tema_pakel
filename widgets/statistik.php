<!-- widget Statistik Penduduk -->

<style type="text/css">
	.highcharts-xaxis-labels tspan {font-size: 8px;}
</style>
<div class="single_bottom_rightbar">
	<h2><a href="<?= site_url("first/statistik/4")?>"><i class="fas fa-chart-bar me-1"></i> Statistik Penduduk</a></h2>
	<div class="m-2">
		<canvas id="myChart" height="300"></canvas>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js" integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg==" crossorigin="anonymous"></script>
	<script>
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
					<?php foreach($stat_widget as $data): ?>
						<?php if ($data['jumlah'] != "-" AND $data['nama']!= "JUMLAH"): ?>
							'<?= $data['nama']?>',
						<?php endif; ?>
					<?php endforeach; ?>
				],
				datasets: [{
					label: 'Penduduk',
					data: [
						<?php foreach ($stat_widget as $data): ?>
							<?php if ($data['jumlah'] != "-" AND $data['nama']!= "JUMLAH"): ?>
								<?= $data['jumlah']?>,
							<?php endif; ?>
						<?php endforeach; ?>
					],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1
				}]
			}
		});
	</script>
</div>
