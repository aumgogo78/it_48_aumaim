<?php
session_start();
    if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("location: /it48_Aumaim/index.php");
        exit;
    }
    include './controls/idMenu.php'
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
    <!-- icon boostrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>แก้ไขเมนูอาหาร</h2>
            <form action="controls/editMenu.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                <div class="mb-3">
                    <label for="">Food</label>
                    <input type="text" name="product_name" class="form-control" value="<?= htmlspecialchars($user['product_name']); ?>">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" value="<?= htmlspecialchars($user['description']); ?>">
                </div>

                <div class="mb-3">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control" value="<?= htmlspecialchars($user['price']) ?>">
                </div>

                <div class="mb-3">
                    <label for="">Picture</label>
                    <input type="file" name="product_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                <button type="reset" class="btn btn-danger">รีเซ็ต</button>
                <a href="menu.php" class="btn btn-secondary">ย้อนกลับ</a>
            </form>
        </main>
    </div>

    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: '<?= $_SESSION['success']; ?>',
                confirmButtonText: 'ตกลง'
            });
        </script>
    <?php unset($_SESSION['success']);
    endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'ผิดพลาด',
                text: '<?= $_SESSION['error']; ?>',
                confirmButtonText: 'ตกลง'
            });
        </script>
    <?php unset($_SESSION['error']);
    endif; ?>
</body>

</html>