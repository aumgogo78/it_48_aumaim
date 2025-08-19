<?php
session_start();
//เพิ่มจำนวนสินค้าในตะกร้า
if (isset($_POST['action']) && $_POST['action'] == 'increase' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) { //ใช้ $key เพื่อไม่ให้มีการอ้างอิงโดยตรง
        if ($item['productId'] == $productId) {
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }
}

//ลดจำนวนสินค้าในตะกร้า
if (isset($_POST['action']) && $_POST['action'] == 'decrease' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productId'] == $productId && $item['quantity'] > 1) {
            $_SESSION['cart'][$key]['quantity'] -= 1;
            break;
        }
    }
}

//ลบสินค้าออกจากตะกร้า
if (isset($_POST['action']) && $_POST['action'] == 'remove' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productId'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

// คำนวณราคาทั้งหมด
$totalPrice = 0;
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $item) {
        $totalPrice += $item['productPrice'] * $item['quantity'];
    }
}

include './controls/fetchAddress.php';

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
                                            <p class="mb-0">Price : <?= htmlspecialchars($item['productPrice']); ?> ฿</p>
                                            <p>Quantity : <?= htmlspecialchars($item['quantity']); ?></p>
                                            <p>Total Price: <?= htmlspecialchars($item['productPrice'] * $item['quantity']) ?></p>
                                        </div>
                                    </div>

                                    <div class="btn-group gap-2" role="group" aria-label="Basic example">
                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="increase">
                                            <button type="submit" class="btn btn-success btn-lg">
                                                <i class="bi bi-plus-circle-fill"></i>
                                            </button>
                                        </form>

                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="decrease">
                                            <button type="submit" class="btn btn-warning btn-lg">
                                                <i class="bi bi-dash-circle-fill"></i>
                                            </button>
                                        </form>

                                        <form method="post" class="d-inline" onsubmit="return confirmDelete(event);">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="remove">
                                            <button type="submit" class="btn btn-danger btn-lg">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>

                                        <script>
                                            function confirmDelete(event) {
                                                event.preventDefault();
                                                const form = event.target;
                                                Swal.fire({
                                                    text: "คุณต้องการลบเมนูนี้ออกจากตะกร้าหรือไม่",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'ใช่, ลบเลย!',
                                                    cancelButtonText: 'ยกเลิก'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>

                                    </div>
                                <?php endforeach; ?>
                                </li>
                        </ul>

                        <div class="mt-4">
                            <h4><strong>Total Price: <?= number_format($totalPrice, 2) ?> ฿</strong></h4>
                        </div>

                    <?php else: ?>
                        <p class="text-center">ไม่มีสินค้าในตระกร้า</p>
                    <?php endif; ?>

                    <!-- ******** -->
                    <div class="mt-4 text-right">
                        <h4><strong>Address</strong></h4>
                        <hr>
                        <p><strong>Name: <?php echo htmlspecialchars($row['firstName'] ." ". $row['lastName']); ?></strong></p>
                        <p><strong>Email: <?php echo htmlspecialchars($row['email']); ?></strong></p>
                        <p><strong>Tel: <?php echo htmlspecialchars($row['phone']); ?></strong></p>
                        <p><strong>Address: <?php echo htmlspecialchars($row['address']); ?></strong></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php include './components/footer.php' ?>
</body>


</html>