<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comenzile tale</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include '../views/nav.view.php'; ?>
    <div class="container">
        <h1>Comenzile tale</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Comandă</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                    <th scope="col">Acțiune</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order->id ?></td>
                    <td><?= $order->status ?></td>
                    <td><?= number_format($order->total_price, 2) ?> Lei</td>
                    <td><a href="/order/<?= $order->id ?>" class="btn btn-info">Vezi detalii</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>