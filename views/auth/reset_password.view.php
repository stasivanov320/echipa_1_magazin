<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetare parolă</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include '../views/nav.view.php'; ?>
    <div class="container">
        <h1>Resetare parolă</h1>
        <form action="/reset_password" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Adresă email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Trimite instrucțiuni de resetare</button>
        </form>
    </div>
</body>

</html>