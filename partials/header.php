<div class="d-block" id="header">
    <?php foreach($teks_berjalan as $teks) : ?>
        <div id="info">
            <div class="container d-flex">
                <span class="badge bg-danger my-auto me-2">INFO!</span>
                <marquee onMouseOver="this.stop()" onMouseOut="this.start()">
                    <?= $teks['teks']?>
                    <?php if ($teks['tautan']): ?>
                        <a href="<?= $teks['tautan'] ?>" rel="noopener noreferrer" title="Baca Selengkapnya"><?= $teks['judul_tautan']?></a>
                    <?php endif; ?>
                </marquee>
            </div>
        </div>
    <?php endforeach; ?>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= gambar_desa('header_pakel.png') ?>" alt="Logo Desa" height="56">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= preg_match(
                        "/^". preg_quote(base_url(), '/') ."(index.php\/)?(index\/1)?$/",
                        current_url()
                    ) ? 'active' : '' ?>" aria-current="page" href="<?= site_url() ?>">Beranda</a>
                </li>
                <?php foreach($menu_atas as $data) : ?>
                <?php if( count($data['submenu']) < 1 ) : ?>
                <li class="nav-item">
                    <a class="nav-link <?= current_url() == $data['link'] ? 'active' : '' ?>" aria-current="page" href="<?= $data['link']?>"><?= $data['nama'] ?></a>
                </li>
                <?php else : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array(current_url(), array_column($data['submenu'], 'link')) ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $data['nama'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach($data['submenu'] as $submenu): ?>
                        <li><a class="dropdown-item" href="<?= $submenu['link'] ?>"><?= $submenu['nama'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>   
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url('siteman') ?>" class="dropdown-item">Login</a>
                            <a href="#" class="dropdown-item">WYSIWYG</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</div>