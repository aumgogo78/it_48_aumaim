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
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 600px;">
        <div class="card" style="width: 100%;">

                <a href="menu.php" class="btn btn-close p-3"></a>

            <div class="row g-0 shadow">

                <!-- ฟอร์มด้านขวา -->
                <div class="col-md-12 ">
                    <div class="card-body p-4 justify-content-center align-items-center">
                        <!-- สมัครสมาชิก -->
                        <h2 class="text-center">Add Menu</h2>
                        <form method="POST" action="./controls/createMenu.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="" class="form-label">Food Name</label>
                                <input type="text" name="product_name" class="form-control" required>
                            </div>

                            <div>
                                <label for="" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>

                            <div>
                                <label for="" class="form-label">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>

                            <div>
                                <label for="" class="form-label">Product Image</label>
                                <input type="file" name="product_image" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                            <div class="text-center mt-3"></div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>