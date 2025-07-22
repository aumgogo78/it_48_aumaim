<?php
include './controls/fetchFood.php'
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

    <section id="fetch_user">
        <div class="container">
            <h2 class="mb-4 mt-5">แสดงข้อมูลสินค้า</h2>
            <?php if ($stmt->rowCount() > 0) : ?>
                <div class="container mt-5">
                    <div class="row">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="col-md-4 mb-4">
                                <div class="card rounded-4">

                                <img style="max-width: 450px;" src="./assets/imgs/<?= htmlspecialchars($row['product_image']); ?>" alt="">
                                    <div class="card-body" style="overflow: hidden;">
                                        
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['product_name']); ?></h5>

                                        <p class="card-text"><strong>เพิ่มเมื่อ : </strong><?= htmlspecialchars($row['created_at']); ?></p>
                                        <div class="text-center">
                                            <button class="btn btn-primary" id="add-to-cart"
                                                data-id="<?= htmlspecialchars($row['id']); ?>"
                                                data-name="<?= htmlspecialchars($row['product_name']); ?>"
                                                data-price="<?= htmlspecialchars($row['price']); ?>"
                                                data-image="<?= htmlspecialchars($row['product_image']); ?>">
                                                เพิ่มสินค้า</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>

    <?php include './components/footer.php' ?>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('#add-to-cart');

        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');
                const productImage = this.getAttribute('data-image');

                fetch('./controls/addToCart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            productId: productId,
                            productName: productName,
                            productPrice: productPrice,
                            productImage: productImage
                        })
                    })
                    .then(response => response.text())
                    .then(data => {
                        Swal.fire({
                            title: 'สำเร็จ',
                            text: `${productName} ได้ถูกเพิ่มลงในตะกร้าแล้ว!`,
                            icon: 'success',
                            confirmButtonText: 'ตกลง'
                        });
                    }).catch(error => {
                        Swal.fire({
                            title: 'เกิดข้อผิดพลาด',
                            text: `${error.message} ไม่สามารถเพิ่มสินค้าได้ กรุณาลองใหม่อีกครั้ง`,
                            icon: 'error',
                            confirmButtonText: 'ตกลง'
                        });
                    });

            });
        });
    });
</script>