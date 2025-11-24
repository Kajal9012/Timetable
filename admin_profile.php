<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Faculty TimeTable</title>
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
      <div class="d-flex align-items-center justify-content-between w-100 mx-5">
        <h1 class="logo">
          <a href="/TimeTable/admin_panel.php">Faculty TimeTable<span>.</span></a>
        </h1>        
      </div>
    </header>
    <!-- End Header -->

    <main id="main"> 
        <!-- Admin Form -->
        <div id="facultyForm" class="mt-2">
            <div class="d-flex justify-content-between align-items-center my-4 px-5">
              <h2 class="mb-0" id="dynamicTitle">Admin Profile</h2>
              <!-- Back to Faculty List -->
              <a class="btn btn-outline-primary" href="/TimeTable/admin_panel.php">Back To Admin Panel</a>
            </div>

            <div class="card shadow-lg border-0 h-auto rounded mx-5">
                <div class="card-body p-4">
                    <form action="backend/admin_profile_register.php" method="POST" enctype="multipart/form-data" class="row">
                      <!-- Hidden Field Example -->
                      <input type="hidden" name="admin_id" id="adminId" value="">

                      <div class="mb-3 col-lg-6">
                        <label for="adminName" class="form-label">Admin Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="adminName" placeholder="Enter Admin Name" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="userName" class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" id="userName" placeholder="Enter Username" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="adminEmail" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="adminEmail" placeholder="Enter Email" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="phoneNumber" class="form-label">Phone<span class="text-danger">*</span></label>
                        <input type="number" name="phone" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="passwordId" class="form-label">Password<span class="text-danger">*</span></label>
                        <div class="d-flex" style="position:relative">
                            <input type="password" name="password" class="form-control" id="passwordId" placeholder="Enter Password" required />
                            <span onclick="vissiblePwd()" style="position:absolute; top:20%; left:95%; cursor:pointer;"><i class="bi bi-eye-fill fs-4" id="pwd"></i></span>
                        </div>
                      </div>
                      
                      <div class="mb-3 col-lg-6">
                        <label for="confirmpasswordId" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                        <div class="d-flex" style="position:relative">
                            <input type="password" name="confirmpassword" class="form-control" id="confirmpasswordId" placeholder="Enter Confirm Password" required />
                            <span onclick="cfvissiblePwd()" style="position:absolute; top:20%; left:95%;"><i class="bi bi-eye-fill fs-4" id="cfpwd"></i></span>
                        </div>
                      </div>

                      <script>
                        document.addEventListener('DOMContentLoaded', function () {
                          const form = document.querySelector('form');
                          const passwordId = document.getElementById('passwordId');
                          const confirmpasswordId = document.getElementById('confirmpasswordId');

                          // Function to validate times
                          function validateTimes() {
                            const pwd = passwordId.value;
                            const cfpwd = confirmpasswordId.value;

                            confirmpasswordId.setCustomValidity('');
                            passwordId.setCustomValidity('');

                            // Validation rules
                            if (pwd !== cfpwd) {
                                confirmpasswordId.setCustomValidity('Password and Confirm Password is not matched');
                                // confirmpasswordId.reportValidity();
                              return false;
                            }                           

                            // Clear all custom validations if everything is fine
                            confirmpasswordId.setCustomValidity('');
                            passwordId.setCustomValidity('');
                            return true;
                          }

                          // Validate on input
                          passwordId.addEventListener('input', validateTimes);
                          confirmpasswordId.addEventListener('input', validateTimes);

                          // Validate on submit
                          form.addEventListener('submit', function (event) {
                            if (!validateTimes()) {
                              event.preventDefault();
                            }
                          });
                        });
                      </script>

                      <script>
                        function vissiblePwd(){
                            const passwordField = document.getElementById('passwordId');
                            const pwdIcon = document.getElementById('pwd');

                            if (passwordField.type === "password") {
                                passwordField.type = "text";
                                pwdIcon.classList.remove('bi-eye-fill');
                                pwdIcon.classList.add('bi-eye-slash-fill');
                                } else {
                                passwordField.type = "password";
                                pwdIcon.classList.remove('bi-eye-slash-fill');
                                pwdIcon.classList.add('bi-eye-fill');
                            }
                        }

                        function cfvissiblePwd(){
                            const passwordField = document.getElementById('confirmpasswordId');
                            const pwdIcon = document.getElementById('cfpwd');

                            if (passwordField.type === "password") {
                                passwordField.type = "text";
                                pwdIcon.classList.remove('bi-eye-fill');
                                pwdIcon.classList.add('bi-eye-slash-fill');
                                } else {
                                passwordField.type = "password";
                                pwdIcon.classList.remove('bi-eye-slash-fill');
                                pwdIcon.classList.add('bi-eye-fill');
                            }
                        }
                      </script>

                      <div class="text-center mt-2">
                        <button type="submit" id="submitButton" class="btn btn-primary w-25">Save</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const adminIdInput = document.getElementById('adminId');
                const adminNameInput = document.getElementById('adminName');
                const userNameInput = document.getElementById('userName');
                const facultyEmailInput = document.getElementById('adminEmail');
                const phoneNumberInput = document.getElementById('phoneNumber');
                const passwordInput = document.getElementById('passwordId');

                fetch("backend/admin_profile_list.php")
                .then(response => {
                    if (!response.ok) {
                    throw new Error('Network response was not ok');
                    }
                    return response.json(); 
                })
                .then(data => {
                    adminIdInput.value = data?.[0]?.id || '';
                    adminNameInput.value = data?.[0]?.name || '';
                    userNameInput.value = data?.[0]?.username || '';
                    facultyEmailInput.value = data?.[0]?.email || '';
                    phoneNumberInput.value = data?.[0]?.phone || '';                    
                    passwordInput.value = data?.[0]?.password || '';
                })
                .catch(error => {
                    console.error('Error fetching admin profile:', error);
                });
            });
        </script>
          
      </div>
    </main>
  </body>
  </html>