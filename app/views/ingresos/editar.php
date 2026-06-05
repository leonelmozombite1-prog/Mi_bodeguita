<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Editar Ingreso</title>
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
                <p class="panel-tag">Modificar entrada</p>
                <h3>Editar Ingreso #<?php echo htmlspecialchars($ingreso['id_ingreso']); ?></h3>
            </div>
            <a href="<?php echo BASE_URL; ?>/ingresos" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Volver
            </a>
        </div>
        <form method="POST" action="<?php echo BASE_URL; ?>/ingresos/actualizar" class="row g-3 mt-1">
            <input type="hidden" name="id_ingreso" value="<?php echo htmlspecialchars($ingreso['id_ingreso']); ?>">
            <div class="col-md-6">
                <label class="form-label fw-medium">Concepto</label>
                <input type="text" name="concepto" class="form-control rounded-3"
                       value="<?php echo htmlspecialchars($ingreso['concepto']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-medium">Monto (S/)</label>
                <input type="number" name="monto" step="0.01" min="0" class="form-control rounded-3"
                       value="<?php echo htmlspecialchars($ingreso['monto']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-medium">Fecha</label>
                <input type="date" name="fecha" class="form-control rounded-3"
                       value="<?php echo htmlspecialchars($ingreso['fecha']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-medium">Descripción</label>
                <input type="text" name="descripcion" class="form-control rounded-3"
                       value="<?php echo htmlspecialchars($ingreso['descripcion'] ?? ''); ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary rounded-3 px-4">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Actualizar
                </button>
            </div>
        </form>
    </section>
</main>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>
</html>
