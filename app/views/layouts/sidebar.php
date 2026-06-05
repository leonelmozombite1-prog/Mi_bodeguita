<?php
$rutaActual = explode('/', trim($_GET['url'] ?? 'dashboard', '/'))[0] ?: 'dashboard';
?>

<div class="topbar">
    <button class="hamburger" aria-label="Abrir menu">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="topbar-title"><?php echo htmlspecialchars(TITLE_BUSINESS); ?></div>
</div>

<div class="overlay"></div>

<aside class="sidebar">
    <div class="sidebar-head">
        <div class="brand-box">
            <span class="brand-mark">MB</span>
            <div>
                <strong><?php echo htmlspecialchars(TITLE_BUSINESS); ?></strong>
                <small><?php echo htmlspecialchars($usuario['nombre_usuario'] ?? 'Administrador'); ?></small>
            </div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <a href="<?php echo BASE_URL; ?>/dashboard" class="<?php echo $rutaActual === 'dashboard' ? 'activo' : ''; ?>">
            <i class="fa-solid fa-chart-pie"></i>
            <span>Dashboard</span>
        </a>
        <a href="<?php echo BASE_URL; ?>/ingresos" class="<?php echo $rutaActual === 'ingresos' ? 'activo' : ''; ?>">
            <i class="fa-solid fa-arrow-trend-up"></i>
            <span>Ingresos</span>
        </a>
        <a href="<?php echo BASE_URL; ?>/gastos" class="<?php echo $rutaActual === 'gastos' ? 'activo' : ''; ?>">
            <i class="fa-solid fa-arrow-trend-down"></i>
            <span>Gastos</span>
        </a>
        <a href="<?php echo BASE_URL; ?>/logout" id="btn-logout" class="logout-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Cerrar sesion</span>
        </a>
    </nav>
</aside>
