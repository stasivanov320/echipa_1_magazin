<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coșul tău</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include '../views/nav.view.php'; ?>
    <div class="container">
        <h1>Coșul tău</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produs</th>
                    <th scope="col">Cantitate</th>
                    <th scope="col">Preț</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?= $item->product->name ?></td>
                    <td><?= $item->quantity ?></td>
                    <td><?= number_format($item->product->price, 2) ?> Lei</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/order" class="btn btn-primary">Plasează comanda</a>
    </div>
</body>

</html>