<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Javascript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 800px;">
        <div class="card" style="width: 100%;">
            <div class="row g-0 shadow">

                <!-- ฟอร์มด้านซ้าย -->
                <div class="col-md-6 d-none d-md-block">
                    <img src="assets/imgs/img2.jpg" alt="" class="img-fluid" style="object-fit: cover; height: 100%;">
                </div>

                <!-- ฟอร์มด้านขวา -->
                <div class="col-md-6">
                    <div class="card-body p-4 justify-content-center align-items-center">
                        <!-- สมัครสมาชิก -->
                        <h2 class="text-center">SignUP Page</h2>.
                        <form method="POST" action="controls/createUsers.php">
                            <div class="mb-3">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" name="firstName" class="form-control" required>
                            </div>

                            <div>
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" name="lastName" class="form-control">
                            </div>

                            <div>
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div>
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control">
                            </div>

                            <div>
                                <label for="" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                            <div>
                                <label for="" class="form-label">Address</label>
                                <textarea name="address" id="" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                            <div class="text-center mt-3"></div>
                            <div class="text-center">
                                <span>Do you have an account?</span>
                                <a href="signin.php">SignIn</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>