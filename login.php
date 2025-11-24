<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Alumni Connect</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon_img.png" rel="icon" />
    <link href="assets/img/favicon_img.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo">
          <a href="index.html">Alumni<span>.</span></a>
        </h1>
        <!-- navbar -->
      </div>
    </header>
    <!-- End Header -->

    <div class="container" style="height: 84vh">
      <div class="row h-100 d-flex align-items-center justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="card shadow-lg p-4">
            <h3 class="text-center mb-4">Alumni Login</h3>
            <form action="admin_login.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Enter your Username"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="position-relative">
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                  />
                  <span class="position-absolute top-50 end-0 translate-middle-y me-3" id="togglePassword" style="cursor: pointer;">
                    <i class="bi bi-eye-slash-fill text-muted"></i>
                  </span>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.getElementById("togglePassword").addEventListener("click", function () {
        let passwordField = document.getElementById("password");
        let icon = this.querySelector("i");

        if (passwordField.type === "password") {
          passwordField.type = "text";
          icon.classList.remove("bi-eye-slash-fill");
          icon.classList.add("bi-eye-fill");
        } else {
          passwordField.type = "password";
          icon.classList.remove("bi-eye-fill");
          icon.classList.add("bi-eye-slash-fill");
        }
      });
    </script>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
