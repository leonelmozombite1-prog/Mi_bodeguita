<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Acceso</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background:
                linear-gradient(180deg, rgba(14, 116, 144, 0.12), rgba(20, 83, 45, 0.06)),
                repeating-linear-gradient(0deg, #f7f4ea, #f7f4ea 34px, #efe8d5 35px);
            display: grid;
            place-items: center;
            color: #1f2937;
        }

        .sheet-login {
            width: min(100%, 860px);
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 22px 60px rgba(20, 83, 45, 0.16);
            border: 1px solid rgba(20, 83, 45, 0.12);
        }

        .sheet-side {
            padding: 3rem;
            background: linear-gradient(180deg, #14532d 0%, #1f6b43 100%);
            color: #ecfdf5;
        }

        .sheet-side h1 {
            font-size: clamp(2rem, 4vw, 3.6rem);
            line-height: 0.95;
            margin: 1rem 0;
        }

        .sheet-side p {
            color: rgba(236, 253, 245, 0.82);
            line-height: 1.8;
        }

        .ledger-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.7rem 1rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.14);
            font-weight: 600;
        }

        .sheet-form {
            padding: 3rem 2.4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-control {
            border-radius: 12px;
            padding: 0.9rem 1rem;
            border: 1px solid #d1d5db;
        }

        .form-control:focus {
            border-color: #15803d;
            box-shadow: 0 0 0 0.25rem rgba(21, 128, 61, 0.15);
        }

        .btn-login {
            border: 0;
            border-radius: 12px;
            padding: 0.95rem 1rem;
            font-weight: 700;
            background: #14532d;
        }

        @media (max-width: 820px) {
            .sheet-login {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="sheet-login">
        <section class="sheet-side">
            <span class="ledger-badge"><i class="fa-solid fa-book"></i> Registro financiero mensual</span>
            <h1>Controla lo que entra y sale.</h1>
        </section>

        <section class="sheet-form">
            <h2 class="fw-bold mb-2">Acceso del administrador</h2>

            <?php if(isset($error) && $error): ?>
                <div class="alert alert-danger rounded-4 border-0"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="POST" class="d-grid gap-3" autocomplete="off">
                <div>
                    <label for="user" class="form-label fw-medium">Usuario</label>
                    <input id="user" type="text" name="user" class="form-control" autocomplete="new-password" required>
                </div>
                <div>
                    <label for="pass" class="form-label fw-medium">Contraseña</label>
                    <input id="pass" type="password" name="pass" class="form-control" autocomplete="new-password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-login">Entrar al panel</button>
            </form>
        </section>
    </div>
</body>
</html>