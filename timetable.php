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
        <div class="d-flex align-items-center gap-1">
          <a class="btn btn-primary d-flex align-items-center justify-content-center" href="/TimeTable/admin_panel.php">
            Admin Panel
          </a>
          <a class="btn btn-primary d-flex align-items-center justify-content-center" href="/TimeTable/admin_profile.php">
            Admin Profile
          </a>
        </div>
      </div>       
    </header>
    <!-- End Header -->

    <div id="facultyList" class="bg-white w-100 p-3">
        <div class="d-flex align-items-center justify-content-between py-1">
            <h2 id="dynamicTitle">Weekly TimeTable</h2>
            <button class="btn btn-outline-primary" onclick="classModel()">Select Class</button>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>Time Slot</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                  </tr>
                </thead>
                <tbody id="classTableBody">
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="chktimetablemodule" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="classModalLabel">Select Classroom To See Their TimeTable</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="chktimetableForm">
              <div class="mb-3">
                <label for="" class="form-label">Classname:</label>
                <select name="classroomvalue" id="classroomvalue" class="form-control">
                  <option value="">Select</option>
                  <?php
                    $conn = new mysqli("localhost", "root", "", "timetable_db");
                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT name FROM classroom_records";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $className = htmlspecialchars($row['name']);
                        echo "<option value=\"$className\">$className</option>";
                      }
                    } else {
                      echo '<option value="">No Classroom Found</option>';
                    }

                    $conn->close();
                  ?>        
                </select>
              </div>
              

              <button type="submit" class="btn btn-primary">Check</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </form>
          </div>
        </div>      
      </div>
    </div>     

    <script>
      function classModel() {
        const classModule = new bootstrap.Modal(document.getElementById('chktimetablemodule'));
        classModule.show();
      }

      function classModelHide() {
          const classModule = document.getElementById('chktimetablemodule'); 
          const modalInstance = bootstrap.Modal.getInstance(classModule); 
          if (modalInstance) modalInstance.hide();
      }

      document.getElementById("chktimetableForm").addEventListener("submit", function(event) {
          event.preventDefault();

          const classroomvalue = document.getElementById("classroomvalue").value;
          if (!classroomvalue) {
              alert("Select Class!");
              return;
          }

          fetch("http://localhost/TimeTable/backend/fetch_timetable_class_list.php", {
              method: "POST",
              headers: {
                  "Content-Type": "application/json"
              },
              body: JSON.stringify({ class: classroomvalue })
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  classModelHide(); // ✅ Close Modal Properly
                  alert(`${classroomvalue} TimeTable Loaded!`);
                  updateTable(data.timetable); // ✅ Pass `data.timetable`
              } else {
                  alert(data.error || "Failed to fetch timetable");
              }
          })
          .catch(error => console.error("Error fetching timetable:", error));
      });

      function updateTable(timetable) {
          const tableBody = document.getElementById("classTableBody");
          tableBody.innerHTML = ""; // Clear existing content

          if (!timetable || Object.keys(timetable).length === 0) {
              tableBody.innerHTML = `
                  <tr>
                      <td colspan="7" class="text-center text-danger">No timetable records found.</td>
                  </tr>
              `;
              return;
          }

          for (let i = 0; i < 6; i++) {
              let row = `<tr><td>Period ${i + 1}</td>`;

              ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"].forEach(day => {
                  if (timetable[day] && timetable[day][i]) {
                      row += `<td>
                                  <span class="fw-bold">Subject:</span> ${timetable[day][i].subject_name} <br>
                                  <span class="fw-bold">Faculty:</span> ${timetable[day][i].faculty_name} <br>
                                  <span class="fw-bold">Notify Status:</span> 
                                  <span class="badge bg-${timetable[day][i].notify == "1" ? "success" : "danger"}">
                                      ${timetable[day][i].notify == "1" ? "Sent" : "Not Sent"}
                                  </span>
                              </td>`;
                  } else {
                      row += `<td>-</td>`;
                  }
              });

              row += `</tr>`;
              tableBody.innerHTML += row;
          }
      }

    </script>

    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>