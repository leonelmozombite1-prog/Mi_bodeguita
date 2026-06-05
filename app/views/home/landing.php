<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/landing.css">
</head>
<body>
    <div id="fadeOverlay"></div>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <section class="stage" style="background-image: url('https://i.pinimg.com/originals/62/12/91/621291172239d23589310065b03d0026.gif'); background-size: cover; background-position: center;">

        <nav class="navbar" id="navbar">
            <a class="brand" href="#"><?php echo TITLE_BUSINESS; ?></a>

            <button class="menu-btn" id="menuBtn" aria-label="Abrir menu">
                <i class="bi bi-list"></i>
            </button>
        </nav>

        <div class="hero-content">
            <a href="<?php echo BASE_URL; ?>/login" class="cta-btn demo-trigger" id="verDemo" style="text-decoration: none; display: inline-block; text-align: center;">Ver demo</a>
        </div>

        <div class="scroll-indicator" id="scrollIndicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div> </section>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="<?php echo BASE_URL; ?>/public/js/landing.js"></script>
</body>
</html>