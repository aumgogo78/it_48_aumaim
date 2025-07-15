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
    <!-- icon boostrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <div class="d-flex justify-content-between mb-3">
                <h2>เมนูอาหาร</h2>
                <button class="btn btn-outline-danger rounded-4">
                    <a href="addmenu.php" class="nav-link">เพิ่มเมนู</a>
                </button>
            </div>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Food</th>
                        <th>Description</th>
                        <th>Price / THB.</th>
                        <th>Created Date</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td class="text-center"><?= htmlspecialchars($row['id']); ?></td>
                        <td class="text-center px-0">
                            <img style="max-width: 200px;" src="../assets/imgs/<?= htmlspecialchars($row['product_image']); ?>" alt="">
                        </td>
                        <td class="text-left"><?= htmlspecialchars($row['product_name']); ?></td>
                        <td class="text-left"><?= htmlspecialchars($row['description']); ?></td>
                        <td class="text-left"><?= htmlspecialchars($row['price']); ?> บาท.</td>
                        <td class="text-center"><?= htmlspecialchars($row['created_at']); ?></td>
                        <td class="text-center">
                            <a href="editmenu.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['id'] ?>)">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                            <script>
                            function confirmDelete(id) {
                                Swal.fire({
                                    title: 'คุณแน่ใจหรือไม่?',
                                    text: "คุณต้องการลบผู้ใช้งานนี้หรือไม่?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'ใช่, ลบเลย!',
                                    cancelButtonText: 'ยกเลิก'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = `controls/deleteMenu.php?id=${id}`;
                                    }
                                });
                            }
                            </script>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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