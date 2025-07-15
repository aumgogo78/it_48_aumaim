<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Website</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include './components/header.php'; ?>

    <!-- <h1>Hello Robolx Yonger</h1> -->
    <!-- <p><?php echo htmlspecialchars($_SESSION['name']);?></p>
    <p><?php echo htmlspecialchars($_SESSION['email']);?></p>
    <a href="controls/signout.php">SignOut</a> -->
    <script>
    <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'You have signed in successfully!',
        footer: 'Go Away Teen'
    });
    <?php endif; ?>
    </script>

    <!-- Hero Sction -->
    <section class="hero text-white text-center py-5"
        style="background: linear-gradient(to right, #290054, #00b2ff); height: 100vh;">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <h1 class="display-4">ยินดีต้อนรับสู่เว็บไซต์ของเรา</h1>
            <p class="lead">ค้นพบโลกแห่งเทคโนโลยีสารสนเทศและข่าวสารล่าสุดเกี่ยวกับการพัฒนาเทคโนโลยี</p>
            <a href="#content" class="btn btn-light btn-lg mx-auto">เริ่มต้นตอนนี้</a>
        </div>
    </section>

    <!-- Content Section -->
    <section id="content" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">เกี่ยวกับเทคโนโลยีสารสนเทศ</h2>
            <p>
                เทคโนโลยีสารสนเทศ (Information Technology หรือ IT)
                เป็นการใช้เทคโนโลยีสารสนเทศในการจัดการกับข้อมูลและสารสนเทศเพื่อสนับสนุนการทำงานทางธุระกิจและองค์กรต่างๆ
                ไม่ว่าจะเป็นการพัฒนาโปรแกรมคอมพิวเตอร์ การจัดการข้อมูลฐานข้อมูลการสื่อสารผ่านเครือข่าย
                หรือการป้องกันข้อมูลทางไซเบอร์
                เทคโนโลยีสารสนเทศมีบทบาทสำคัญในการพัฒนาและขับเคลื่อนองค์กรสู่ความสำเร็จในยุคดิจิทัล.
            </p>
            <p>
                เทคโนโลยีสารสนเทศได้มีการพัฒนาอย่างรวดเร็วในช่วงไม่กี่ปีที่ผ่านมาและสามารถปรับตัวให้เข้ากับความต้องการของธุระกิจและผู้ใช้การได้อย่างมีประสิทธิภาพ
                เช่น การพัฒนาโปรแกรมหรือแอปพลิเคชันใหม่ๆที่ช่วยเพิ่มประสิทธิภาพในการทำงาน เช่น การใช้ระบบคลาวด์ (Cloud
                Computing) หรือการใช้ Big Data ในการวิเคราะห์ข้อมูลเพื่อสนับสนุนการตัดสินใจ.
            </p>
        </div>
    </section>

    <?php include './components/footer.php'; ?>

</body>
</html>