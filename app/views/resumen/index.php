<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Resumen</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>
<body>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>
<main>
    <section class="ledger-panel full">
        <div class="panel-head">
            <div>
                <p class="panel-tag">Consulta mensual</p>
                <h3>Ganancia por mes</h3>
            </div>
        </div>

        <form method="GET" action="<?php echo BASE_URL; ?>/resumen" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="mes" class="form-label">Selecciona un mes</label>
                <input type="month" id="mes" name="mes" class="form-control" value="<?php echo htmlspecialchars($mesSeleccionado); ?>">
            </div>
            <div class="col-md-2 d-grid">
                <label class="form-label d-none d-md-block">&nbsp;</label>
                <button class="btn btn-dark rounded-3">Consultar</button>
            </div>
        </form>

        <div class="balance-strip single">
            <article class="balance-card income">
                <small>Ingresos del mes</small>
                <h2>S/ <?php echo number_format((float) $resumen['ingresos'], 2); ?></h2>
            </article>
            <article class="balance-card expense">
                <small>Gastos del mes</small>
                <h2>S/ <?php echo number_format((float) $resumen['gastos'], 2); ?></h2>
            </article>
            <article class="balance-card profit">
                <small>Ganancia del mes</small>
                <h2>S/ <?php echo number_format((float) $resumen['ganancia'], 2); ?></h2>
            </article>
        </div>
    </section>
</main>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>
</html>
