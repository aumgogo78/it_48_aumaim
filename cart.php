<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- icon boostrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <?php include './components/header.php' ?>

    <section id="cart_product" class="py-5">
        <div class="container">
            <h2 class="mb-4 mt-5">แสดงข้อมูลตระกร้าสินค้า</h2>

            <div class="container mt-5">
                <div class="row">

                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                        <ul class="list-group">
                            <?php foreach ($_SESSION['cart'] as $item): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center rounded-3">
                                    <div class="d-flex w-100">
                                        <img src="./assets/imgs/<?= htmlspecialchars($item['productImage']); ?>" alt="" style="height:150px; width: 150px; object-fit: cover;" class="rounded-3">
                                        <div class="ms-4">
                                            <h3 class="mb-3 mt-2"><?= htmlspecialchars($item['productName']); ?></h3>
                                            <p class="mb-0">Price : <?= htmlspecialchars($item['productPrice']); ?></p>
                                            <p>Quantity : <?= htmlspecialchars($item['quantity']); ?></p>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-success"><i class="bi bi-plus-circle-fill"></i></button>
                                        <button class="btn btn-warning"><i class="bi bi-dash-circle-fill"></i></button>
                                        <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                </li>
                        </ul>
                        <p class="text-center">ไม่มีสินค้าในตระกร้า</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <?php include './components/footer.php' ?>
</body>

</html>