<div class="py-3">
    <div class="container-fluid">
    <div class="row" id="transparansi-footer">
        <?php extract($transparansi); foreach ($data_widget as $subdata_name => $subdatas): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                <div class="card-header bg-success text-white fw-bold text-center">
                    <span class="card-title"><?= ($subdatas['laporan'])?></span>
                </div>
                    <div class="card-body">
                        <?php foreach ($subdatas as $key => $subdata): ?>
                            <?php if($subdata['judul'] != NULL and $key != 'laporan' and $subdata['realisasi'] != 0 or $subdata['anggaran'] != 0): $i = true; ?>
                                <div class="progress-group">
                                    <div class="d-block fw-bold text-center mb-1"><?= $subdata['judul'] ?></div>
                                    <div class="d-flex small">
                                        Realisasi : Rp. <?= number_format($subdata['realisasi']); ?>
                                        <div class="ms-auto">
                                            Anggaran : Rp. <?= number_format($subdata['anggaran']); ?>
                                        </div>
                                    </div>
                                    <div class="progress progress-bar-striped" align="right" style="background-color: #27c8a2"><small></small>
                                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width: <?= $subdata['persen'] ?>%" aria-valuenow="<?= $subdata['persen'] ?>" aria-valuemin="0" aria-valuemax="100"><span><?= $subdata['persen'] ?> %</span></div>
                                    </div>
                                </div>
                                <hr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if( empty($i) ) : ?>
                            <div class="d-block small text-muted text-center">Data Kosong</div>
                        <?php else : unset($i); endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>