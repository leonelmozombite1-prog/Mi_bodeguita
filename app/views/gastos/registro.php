<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registrar Gasto</title>
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
                <p class="panel-tag">Nueva salida</p>
                <h3>Registrar Gasto</h3>
            </div>
            <a href="<?php echo BASE_URL; ?>/gastos" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Volver
            </a>
        </div>
        <form method="POST" action="<?php echo BASE_URL; ?>/gastos/guardar">
            <div class="mb-3">
                <label class="form-label">Concepto</label>
                <input type="text" name="concepto" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Monto (S/)</label>
                <input type="number" name="monto" step="0.01" min="0" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Descripción <span class="text-muted">(opcional)</span></label>
                <input type="text" name="descripcion" class="form-control">
            </div>
            <button type="submit" class="btn btn-danger px-4">
                <i class="fa-solid fa-floppy-disk me-1"></i> Guardar
            </button>
        </form>
    </section>
</main>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>
</html>
