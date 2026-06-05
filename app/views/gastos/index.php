<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Gastos</title>
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
                <p class="panel-tag">Registro de salidas</p>
                <h3>Gastos registrados</h3>
            </div>
            <a href="<?php echo BASE_URL; ?>/gastos/registro" class="btn btn-danger btn-sm rounded-3">
                <i class="fa-solid fa-plus me-1"></i> Registrar gasto
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Concepto</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Monto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($gastos)): ?>
                        <tr><td colspan="7" class="text-center py-4">No hay gastos registrados.</td></tr>
                    <?php else: ?>
                        <?php foreach ($gastos as $item): ?>
                            <tr>
                                <td>#<?php echo htmlspecialchars($item['id_gasto']); ?></td>
                                <td><?php echo htmlspecialchars($item['concepto']); ?></td>
                                <td><?php echo htmlspecialchars($item['descripcion'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($item['fecha']); ?></td>
                                <td><?php echo htmlspecialchars($item['nombre_usuario']); ?></td>
                                <td class="money-minus">S/ <?php echo number_format((float)$item['monto'], 2); ?></td>
                                <td>
                                    <a href="<?php echo BASE_URL; ?>/gastos/editar?id=<?php echo $item['id_gasto']; ?>"
                                       class="btn btn-sm btn-outline-primary rounded-3 me-1">
                                        <i class="fa-solid fa-pen"></i> Editar
                                    </a>
                                    <form method="POST" action="<?php echo BASE_URL; ?>/gastos/eliminar"
                                          style="display:inline"
                                          onsubmit="return confirm('¿Eliminar este gasto?')">
                                        <input type="hidden" name="id_gasto" value="<?php echo $item['id_gasto']; ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-3">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>
</html>
