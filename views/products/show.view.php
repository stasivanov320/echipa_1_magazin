<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalii produs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include '../views/nav.view.php'; ?>
    <div class="container">
        <h1><?= $product->name ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $product->image ?>" class="img-fluid" alt="<?= $product->name ?>">
            </div>
            <div class="col-md-6">
                <h3>Preț: <?= number_format($product->price, 2) ?> RON</h3>
                <p><?= $product->description ?></p>
                <form action="/cart/add" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    <button type="submit" class="btn btn-success">Adaugă în coș</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>