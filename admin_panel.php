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
          <a class="btn btn-primary d-flex align-items-center justify-content-center" href="/TimeTable/timetable.php">
            Check TimeTable
          </a>
          <a class="btn btn-primary d-flex align-items-center justify-content-center" href="/TimeTable/admin_profile.php">
            Admin Profile
          </a>
        </div>
      </div>
       
    </header>
    <!-- End Header -->

    <main id="main" class="w-100">
      <div id="adminsection" class="d-flex overflow-auto w-100" style="height:620px">
        <div class="bg-light d-lg-block d-none" style="width: 20%;">
          <div class="h-75">
            <div class="py-3 border-bottom border-dark">
              <h4 class="text-center">Admin Panel</h4>
            </div>
            
            <div class="p-2">  
              <div class="d-flex justify-content-between align-items-center">
                <span class="text-primary">Timetable</span>
              </div>       
              <hr class="m-0">   
              <div class="d-flex justify-content-center py-2 sidebar_class sidebar_active" style="cursor:pointer;" onclick="handleTab('Timetable List')">
                  <span class="fs-5">Timetable List</span>
              </div>
              <div class="d-flex justify-content-center py-2 sidebar_class" style="cursor:pointer;" onclick="handleTab('Add Lecture')">
                  <span class="fs-5">Add Lecture</span>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <span class="text-primary">Faculty</span>
              </div>       
              <hr class="m-0">
              <div class="d-flex justify-content-center py-2 sidebar_class" style="cursor:pointer;" onclick="handleTab('Faculty List')">
                <span class="fs-5">Faculty List</span>
              </div>
              <div class="d-flex justify-content-center py-2 sidebar_class" style="cursor:pointer;" onclick="handleTab('New Faculty')">
                <span class="fs-5">New Faculty</span>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <span class="text-primary">Subject</span>
              </div>       
              <hr class="m-0">
              <div class="d-flex justify-content-center py-2 sidebar_class" style="cursor:pointer;" onclick="handleTab('Subject List')">
                <span class="fs-5">Subject List</span>
              </div>
              <div class="d-flex justify-content-center py-2 sidebar_class" style="cursor:pointer;" onclick="handleTab('Add Subject')">
                <span class="fs-5">Add Subject</span>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <span class="text-primary">Classroom</span>
              </div>       
              <hr class="m-0">
              <div class="d-flex justify-content-center py-2 sidebar_class" style="cursor:pointer;" onclick="handleTab('Classroom List')">
                <span class="fs-5">Classroom List</span>
              </div>
              <div class="d-flex justify-content-center py-2 sidebar_class" style="cursor:pointer;" onclick="handleTab('Create Classroom')">
                <span class="fs-5">Create Classroom</span>
              </div>

            </div>
          </div>
          <div class="h-25">
            <div class="d-flex align-items-end h-100">
              <a href="logout.php" class="btn btn-outline-primary my-3 w-100 mx-2">
                Log Out
              </a>
            </div>
          </div>
        </div>        
        <div class="w-100">
          <div class="bg-light d-lg-none">
            <div class="d-flex justify-content-center align-items-center p-3 flex-wrap gap-2 overflow-auto">
              <button class="btn btn-outline-primary" onclick="handleTab('Faculty List')">Faculty List</button>
              <button class="btn btn-outline-primary" onclick="handleTab('New Faculty')">New Faculty</button>
              <button class="btn btn-outline-primary" onclick="handleTab('Subject List')">Subject List</button>
              <button class="btn btn-outline-primary" onclick="handleTab('Add Subject')">Add Subject</button>
              <button class="btn btn-outline-primary" onclick="handleTab('Classroom List')">Classroom List</button>
              <button class="btn btn-outline-primary" onclick="handleTab('Create Classroom')">Create Classroom</button>
              <button class="btn btn-outline-primary" onclick="handleTab('Timetable List')">Timetable List</button>
              <button class="btn btn-outline-primary" onclick="handleTab('Add Lecture')">Add Lecture</button>
              <a href="logout.php" class="btn btn-outline-danger">Log Out</a>
            </div>
          </div>



          <!-- Timetable List -->
          <div id="timetable" class="bg-white w-100 p-3">
            <div class="d-flex align-items-center justify-content-between py-1">
              <h2 id="dynamicTitle">TimeTable</h2>
              <button class="btn btn-outline-primary my-3 mx-2 btn-sm" onclick="handleTab('Add Lecture')">Add Lecture</button>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Subject Name</th>
                    <th>Faculty Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Day</th>
                    <th>Date</th>
                    <th>Faculty Number</th>
                    <th>Class</th>
                    <th>SMS Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="TimeTableBody">
                  <!-- Dynamic rows will be inserted here -->
                </tbody>
              </table>
            </div>
          </div>   

          <!-- TimeTable Form -->
          <div id="timetableForm" class="overflow-auto mt-2" style="display: none; scrollbar-width: none;">
            <div class="d-flex justify-content-between align-items-center my-4 px-4">
              <h2 class="mb-0" id="dynamicTitle">Add Lecture</h2>
              <!-- Back to Faculty List -->
              <button class="btn btn-outline-primary" onclick="handleTab('Timetable List')">Back</button>
            </div>

            <div class="row justify-content-center">
              <div class="col-md-11">
                <div class="card shadow-lg border-0 rounded">
                  <div class="card-body p-4">
                    <form action="backend/timetable_register.php" method="POST" enctype="multipart/form-data" class="row">

                      <div class="mb-3 col-lg-6">
                        <label for="subjectName" class="form-label">Subject Name <span class="text-danger">*</span></label>
                        <select name="subjectname" class="form-select" id="subjectName" required>
                          <option value="">Select Subject</option>
                          <?php
                            $conn = new mysqli("localhost", "root", "", "timetable_db");
                            if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT name FROM subject_records";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                $subjectName = htmlspecialchars($row['name']);
                                echo "<option value=\"$subjectName\">$subjectName</option>";
                              }
                            } else {
                              echo '<option value="">No subjects found</option>';
                            }

                            $conn->close();
                          ?>
                        </select>
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="facultyName" class="form-label">Faculty Name <span class="text-danger">*</span></label>
                        <select name="facultyname" class="form-select" id="facultyName" required>
                          <option value="">Select Faculty</option>
                          <?php
                            $conn = new mysqli("localhost", "root", "", "timetable_db");
                            if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT name, phone FROM faculty_records";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                $facultyName = htmlspecialchars($row['name']);
                                $facultyPhone = htmlspecialchars($row['phone']);
                                echo "<option value=\"$facultyName\" data-phone=\"$facultyPhone\">$facultyName</option>";
                              }
                            } else {
                              echo '<option value="">No faculty found</option>';
                            }

                            $conn->close();
                          ?>
                        </select>
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="daytask" class="form-label">Day <span class="text-danger">*</span></label>
                        <select name="daytask" class="form-control" id="daytask" required>
                          <option value="">Select day</option>
                          <option value="Monday">Monday</option>
                          <option value="Tuesday">Tuesday</option>
                          <option value="Wednesday">Wednesday</option>
                          <option value="Thursday">Thursday</option>
                          <option value="Friday">Friday</option>
                          <option value="Saturday">Saturday</option>
                        </select>
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="taskdate" class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" name="taskdate" class="form-control" id="taskdate" required />
                      </div>     
                      
                      
                      <div class="mb-3 col-lg-6">
                        <label for="startTime" class="form-label">Start Time <span class="text-danger">*</span></label>
                        <input type="time" id="startTime" name="startTime" class="form-control" required>
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="endTime" class="form-label">End Time <span class="text-danger">*</span></label>
                        <input type="time" id="endTime" name="endTime" class="form-control" required>
                      </div>                  
                      <script>
                        document.addEventListener('DOMContentLoaded', function () {
                          const form = document.querySelector('form');
                          const startTimeInput = document.getElementById('startTime');
                          const endTimeInput = document.getElementById('endTime');

                          // Function to validate times
                          function validateTimes() {
                            const startTime = startTimeInput.value;
                            const endTime = endTimeInput.value;

                            if (!startTime || !endTime) {
                              return; // Skip validation if one field is empty
                            }

                            const [startHours, startMinutes] = startTime.split(':').map(Number);
                            const [endHours, endMinutes] = endTime.split(':').map(Number);

                            const startTotal = startHours * 60 + startMinutes;
                            const endTotal = endHours * 60 + endMinutes;

                            const minTime = 9 * 60;  // 9:00 AM in minutes
                            const maxTime = 16 * 60; // 4:00 PM in minutes

                            // Reset previous messages
                            startTimeInput.setCustomValidity('');
                            endTimeInput.setCustomValidity('');

                            // Validation rules
                            if (startTotal < minTime || startTotal > maxTime) {
                              startTimeInput.setCustomValidity('Start time must be between 9:00 AM and 4:00 PM.');
                              startTimeInput.reportValidity();
                              return false;
                            }

                            if (endTotal < minTime || endTotal > maxTime) {
                              endTimeInput.setCustomValidity('End time must be between 9:00 AM and 4:00 PM.');
                              endTimeInput.reportValidity();
                              return false;
                            }

                            if (startTotal >= endTotal) {
                              endTimeInput.setCustomValidity('End time must be greater than start time.');
                              endTimeInput.reportValidity();
                              return false;
                            }

                            const difference = endTotal - startTotal;
                            if (difference < 60) {
                              endTimeInput.setCustomValidity('The difference between start time and end time atleast 1 hour.');
                              endTimeInput.reportValidity();
                              return false;
                            }

                            // Clear all custom validations if everything is fine
                            startTimeInput.setCustomValidity('');
                            endTimeInput.setCustomValidity('');
                            return true;
                          }

                          // Validate on input
                          startTimeInput.addEventListener('input', validateTimes);
                          endTimeInput.addEventListener('input', validateTimes);

                          // Validate on submit
                          form.addEventListener('submit', function (event) {
                            if (!validateTimes()) {
                              event.preventDefault();
                            }
                          });
                        });
                      </script>


                      <div class="mb-3 col-lg-6">
                        <label for="facultyPhone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="number" name="phone" class="form-control" id="facultyPhone" placeholder="Phone Number" readonly required />
                      </div>
                      <script>
                        document.addEventListener('DOMContentLoaded', function() {
                          const facultySelect = document.getElementById('facultyName');
                          const phoneInput = document.getElementById('facultyPhone');

                          facultySelect.addEventListener('change', function() {
                            const selectedOption = this.options[this.selectedIndex];
                            const phone = selectedOption.getAttribute('data-phone');
                            phoneInput.value = phone || '';
                          });
                        });
                      </script>

                      <div class="mb-3 col-lg-6">
                        <label for="facultyClass" class="form-label">Class <span class="text-danger">*</span></label>
                        <select name="classroom" class="form-control" id="facultyClass" required>
                          <option value="">Select Class</option>
                          <?php
                          // Connect to database
                          $conn = new mysqli("localhost", "root", "", "timetable_db");

                          // Check connection
                          if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                          }

                          // Fetch classroom records
                          $sql = "SELECT name FROM classroom_records";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                              $classroomName = htmlspecialchars($row['name']);
                              echo "<option value=\"$classroomName\">$classroomName</option>";
                            }
                          } else {
                            echo '<option value="">No classroom found</option>';
                          }

                          $conn->close();
                          ?>
                        </select>
                      </div>


                      <div class="text-center">
                        <button type="submit" id="submitButton" class="btn btn-primary w-50">Add Lecture</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <!-- Faculty Form -->
          <div id="facultyForm" class="overflow-auto mt-2" style="display: none; scrollbar-width: none;">
            <div class="d-flex justify-content-between align-items-center my-4 px-4">
              <h2 class="mb-0" id="dynamicTitle">New Faculty</h2>
              <!-- Back to Faculty List -->
              <button class="btn btn-outline-primary" onclick="handleTab('Faculty List')">Back</button>
            </div>

            <div class="row justify-content-center">
              <div class="col-md-11">
                <div class="card shadow-lg border-0 rounded">
                  <div class="card-body p-4">
                    <form action="backend/faculty_register.php" method="POST" enctype="multipart/form-data" class="row">
                      <!-- Hidden Field Example -->
                      <input type="hidden" name="faculty_id" id="facultyId" value="">

                      <div class="mb-3 col-lg-6">
                        <label for="facultyName" class="form-label">Faculty Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="facultyName" placeholder="Enter Faculty Name" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="facultyEmail" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="facultyEmail" placeholder="Enter Email" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="facultyPhone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" id="facultyPhone" placeholder="Enter Phone Number" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="education" class="form-label">Education <span class="text-danger">*</span></label>
                        <select name="education" class="form-control" id="education" required>
                          <option value="">Select Degree</option>
                          <option value="B.Ed">B.Ed (Bachelor of Education)</option>
                          <option value="M.Ed">M.Ed (Master of Education)</option>
                          <option value="B.A">B.A (Bachelor of Arts)</option>
                          <option value="M.A">M.A (Master of Arts)</option>
                          <option value="B.Sc">B.Sc (Bachelor of Science)</option>
                          <option value="M.Sc">M.Sc (Master of Science)</option>
                          <option value="BCA">BCA (Bachelor of Computer Applications)</option>
                          <option value="MCA">MCA (Master of Computer Applications)</option>
                          <option value="Diploma">Diploma</option>
                          <option value="Ph.D in Computer Science">Ph.D in Computer Science</option>
                          <option value="Ph.D in Physics">Ph.D in Physics</option>
                          <option value="Ph.D in Chemistry">Ph.D in Chemistry</option>
                          <option value="Ph.D in Mathematics">Ph.D in Mathematics</option>
                          <option value="Ph.D in Biotechnology">Ph.D in Biotechnology</option>
                          <option value="Ph.D in English Literature">Ph.D in English Literature</option>
                          <option value="Ph.D in Economics">Ph.D in Economics</option>
                          <option value="Ph.D in History">Ph.D in History</option>
                          <option value="Ph.D in Political Science">Ph.D in Political Science</option>
                          <option value="Ph.D in Mechanical Engineering">Ph.D in Mechanical Engineering</option>
                          <option value="Ph.D in Civil Engineering">Ph.D in Civil Engineering</option>
                          <option value="Ph.D in Electrical Engineering">Ph.D in Electrical Engineering</option>
                          <option value="Ph.D in Psychology">Ph.D in Psychology</option>
                          <option value="Ph.D in Sociology">Ph.D in Sociology</option>
                          <option value="Ph.D in Management">Ph.D in Management</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="subjectName" class="form-label">Subject Name <span class="text-danger">*</span></label>
                        <input type="text" name="subject" class="form-control" id="subjectName" placeholder="Enter Subject Name" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select name="gender" class="form-control" id="gender" required>
                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>

                      <div class="mb-3 col-lg-12">
                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea name="address" id="address" class="form-control" rows="4" placeholder="Enter Address" required></textarea>
                      </div>

                      <div class="text-center">
                        <button type="submit" id="submitButton" class="btn btn-primary w-50">Add Faculty</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Faculty List -->
          <div id="facultyList" class="bg-white w-100 p-3">
            <div class="d-flex align-items-center justify-content-between py-1">
              <h2 id="dynamicTitle">Faculty List</h2>
              <button class="btn btn-outline-primary my-3 mx-2 btn-sm" onclick="handleTab('New Faculty')">Add Faculty</button>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Faculty Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Gender</th>
                    <th>Education</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="facultyTableBody">
                  <!-- Dynamic rows will be inserted here -->
                </tbody>
              </table>
            </div>
          </div>



          <!-- Subject List -->
          <div id="subjectList" class="bg-white w-100 p-3">
            <div class="d-flex align-items-center justify-content-between py-1">
              <h2 id="dynamicTitle">Subject List</h2>
              <button class="btn btn-outline-primary my-3 mx-2 btn-sm" onclick="handleTab('Add Subject')">Add Subject</button>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="subjectTableBody">
                  <!-- Dynamic rows will be inserted here -->
                </tbody>
              </table>
            </div>
          </div>

          <!-- Subject Form -->
          <div id="subjectForm" class="overflow-auto mt-2" style="display: none; scrollbar-width: none;">
            <div class="d-flex justify-content-between align-items-center my-4 px-4">
              <h2 class="mb-0" id="dynamicTitle">Add Subject</h2>
              <!-- Back to Faculty List -->
              <button class="btn btn-outline-primary" onclick="handleTab('Subject List')">Back</button>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-11">
                <div class="card shadow-lg border-0 rounded">
                  <div class="card-body p-4">
                    <form action="backend/subject_register.php" method="POST">
                      <div class="row">
                        <!-- First Column -->
                        <div class="col-md-6 mb-3">
                          <label for="subjectName" class="form-label">
                            Subject Name <span class="text-danger">*</span>
                          </label>
                          <input type="text" name="subject_name" class="form-control" id="subjectName" placeholder="Enter Subject Name" required />
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6 mb-3">
                          <label for="subjectCode" class="form-label">
                            Subject Code <span class="text-danger">*</span>
                          </label>
                          <input type="text" name="subject_code" class="form-control" id="subjectCode" placeholder="Enter Subject Code" required />
                        </div>
                      </div>

                      <!-- Full-Width Description -->
                      <div class="mb-3">
                        <label for="subjectDescription" class="form-label">
                          Subject Description
                        </label>
                        <textarea name="subject_description" class="form-control" id="subjectDescription" placeholder="Enter Subject Description"></textarea>
                      </div>

                      <!-- Submit Button -->
                      <div class="text-center">
                        <button type="submit" onclick="handleTab('Subject List')" id="submitButton" class="btn btn-primary w-50">
                          Add Subject
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Subject Modal -->
          <div class="modal fade" id="editSubjectModal" tabindex="-1" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editSubjectModalLabel">Edit Subject</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editSubjectForm">
                    <input type="hidden" id="editSubjectId">

                    <div class="mb-3">
                      <label for="editSubjectName" class="form-label">Name:</label>
                      <input type="text" id="editSubjectName" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label for="editSubjectCode" class="form-label">Code:</label>
                      <input type="text" id="editSubjectCode" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label for="editSubjectDescription" class="form-label">Description:</label>
                      <input type="text" id="editSubjectDescription" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>



          <!-- Classroom List -->
          <div id="classroomList" class="bg-white w-100 p-3">
            <div class="d-flex align-items-center justify-content-between py-1">
              <h2 id="dynamicTitle">Classroom List</h2>
              <button class="btn btn-outline-primary my-3 mx-2 btn-sm" onclick="handleTab('Create Classroom')">Add Classroom</button>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Capacity</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="classroomTableBody">
                  <!-- Dynamic rows will be inserted here -->
                </tbody>
              </table>
            </div>
          </div>

          <!-- Classroom Form -->
          <div id="classroomForm" class="overflow-auto mt-2" style="display: none; scrollbar-width: none;">
            <div class="d-flex justify-content-between align-items-center my-4 px-4">
              <h2 class="mb-0" id="dynamicTitle">Create Classroom</h2>
              <!-- Back to Faculty List -->
              <button class="btn btn-outline-primary" onclick="handleTab('Classroom List')">Back</button>
            </div>

            <div class="row justify-content-center">
              <div class="col-md-11">
                <div class="card shadow-lg border-0 rounded">
                  <div class="card-body p-4">
                    <form action="backend/classroom_register.php" method="POST" enctype="multipart/form-data" class="row">

                      <div class="mb-3 col-lg-6">
                        <label for="classroomName" class="form-label">Classroom Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="classroomName" placeholder="Enter Classroom Name" required />
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="classroomCapacity" class="form-label">Classroom Capacity <span class="text-danger">*</span></label>
                        <input type="number" name="capacity" class="form-control" id="classroomCapacity" placeholder="Enter capacity" required />
                      </div>

                      <div class="text-center">
                        <button type="submit" id="submitButton" class="btn btn-primary w-50">Add Classroom</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Classroom Modal -->
          <div class="modal fade" id="editClassroomModal" tabindex="-1" aria-labelledby="editClassroomModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editClassroomModalLabel">Edit Classroom</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editClassroomForm">
                    <input type="hidden" id="editClassroomId">

                    <div class="mb-3">
                      <label for="editClassroomName" class="form-label">Name:</label>
                      <input type="text" id="editClassroomName" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label for="editClassroomCapacity" class="form-label">Capacity:</label>
                      <input type="text" id="editClassroomCapacity" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </main>

    <!-- faculty List Code -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        let facultyData = [];
        const facultyTableBody = document.getElementById("facultyTableBody");
        const dynamicTitle = document.getElementById("dynamicTitle");

        // Fetch Faculty Records
        function fetchFacultyData() {
          fetch("backend/faculty_list.php")
            .then(response => response.json())
            .then(data => {
              facultyData = data;
              displayFaculty();
            })
            .catch(error => {
              console.error("Error fetching faculty data:", error);
              facultyTableBody.innerHTML = `
                <tr>
                  <td colspan="7" class="text-center text-danger">Error loading faculty records</td>
                </tr>
              `;
            });
        }

        // Display Faculty Records
        function displayFaculty() {
          facultyTableBody.innerHTML = "";

          if (facultyData.length === 0) {
            facultyTableBody.innerHTML = `
              <tr>
                <td colspan="7" class="text-center text-muted">No faculty records found</td>
              </tr>
            `;
            return;
          }

          facultyData.forEach((faculty, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
              <td>${index + 1}</td>                         
              <td>${faculty?.name || "N/A"}</td>
              <td>${faculty?.email || "N/A"}</td>
              <td>${faculty?.phone || "N/A"}</td>
              <td>${faculty?.subject || "N/A"}</td>
              <td>${faculty?.gender || "N/A"}</td>
              <td>${faculty?.education || "N/A"}</td>
              <td>${faculty?.address || "N/A"}</td>
              <td>
                <button class="btn btn-outline-danger btn-sm" onclick="deleteFaculty(${faculty?.id}, this)">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </td>
            `;
            facultyTableBody.appendChild(row);
          });

          dynamicTitle.textContent = "Faculty Records";
        }

        // Delete Faculty Record
        function deleteFaculty(facultyId, button) {
          if (confirm("Are you sure you want to delete this faculty member?")) {
            fetch("backend/delete_faculty_record.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/x-www-form-urlencoded"
              },
              body: `id=${facultyId}`
            })
              .then(response => response.json())
              .then(data => {
                if (data.success) {
                  const row = button.closest("tr");
                  row.remove();
                  alert(data?.message);
                } else {
                  alert("Error: " + data?.message);
                }
              })
              .catch(error => console.error("Error deleting faculty:", error));
          }
        }

        window.deleteFaculty = deleteFaculty;

        fetchFacultyData();
      });
    </script>

   <!-- classroom List Code -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        let classroomData = [];
        const classroomTableBody = document.getElementById("classroomTableBody");
        const dynamicTitle = document.getElementById("dynamicTitle");

        // Fetch Classroom Records
        function fetchClassroomData() {
          fetch("backend/classroom_list.php")
            .then(response => response.json())
            .then(data => {
              classroomData = data;
              displayClassrooms();
            })
            .catch(error => {
              console.error("Error fetching classroom data:", error);
              classroomTableBody.innerHTML = `
                <tr>
                  <td colspan="4" class="text-center text-danger">Error loading classroom records</td>
                </tr>
              `;
            });
        }

        // Display Classroom Records
        function displayClassrooms() {
          classroomTableBody.innerHTML = "";

          if (classroomData.length === 0) {
            classroomTableBody.innerHTML = `
              <tr>
                <td colspan="4" class="text-center text-muted">No classroom records found</td>
              </tr>
            `;
            return;
          }

          classroomData.forEach((classroom, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
              <td>${index + 1}</td>                         
              <td>${classroom?.name || "N/A"}</td>
              <td>${classroom?.capacity || "N/A"}</td>
              <td>
                <button class="btn btn-outline-warning btn-sm" onclick="editClassroom(${classroom?.id}, this)">
                  <i class="bi bi-pencil-square"></i> Edit
                </button>
                <button class="btn btn-outline-danger btn-sm ms-2" onclick="deleteClassroom(${classroom?.id}, this)">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </td>
            `;
            classroomTableBody.appendChild(row);
          });

          dynamicTitle.textContent = "Classroom Records";
        }

        // Delete Classroom Record
        function deleteClassroom(classroomId, button) {
          if (confirm("Are you sure you want to delete this classroom?")) {
            fetch("backend/delete_classroom_record.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/x-www-form-urlencoded"
              },
              body: `id=${classroomId}`
            })
              .then(response => response.json())
              .then(data => {
                if (data.success) {
                  const row = button.closest("tr");
                  row.remove();
                  alert(data?.message);
                } else {
                  alert("Error: " + data?.message);
                }
              })
              .catch(error => console.error("Error deleting classroom:", error));
          }
        }

        window.deleteClassroom = deleteClassroom;

        function editClassroom(classroomId) {
        fetch(`http://localhost/TimeTable/backend/get_classroom_edit.php?id=${classroomId}`)
          .then(response => response.json())
          .then(classroom => {
            if (classroom.error) {
              alert(classroom.error);
              return;
            }

            // Populate form fields
            document.getElementById("editClassroomId").value = classroom?.id;
            document.getElementById("editClassroomName").value = classroom?.name;
            document.getElementById("editClassroomCapacity").value = classroom?.capacity;

            // Show the edit form
            // Show the Bootstrap Modal
            var editModal = new bootstrap.Modal(document.getElementById('editClassroomModal'));
            editModal.show();
          })
          .catch(error => console.error("Error fetching subject:", error));
        }

        window.editClassroom = editClassroom;

        document.getElementById("editClassroomForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

          // Collect form data
          const id = document.getElementById("editClassroomId").value;
          const name = document.getElementById("editClassroomName").value;
          const capacity = document.getElementById("editClassroomCapacity").value;

          // Send update request to backend
          fetch("http://localhost/TimeTable/backend/update_classroom.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json"
              },
              body: JSON.stringify({
                id: id,
                name: name,
                capacity: capacity,
              })
            })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                alert("Classroom updated successfully!");
                location.reload(); // Refresh the page or reload the subject list
              } else {
                alert(data.error || "Failed to update classroom");
              }
            })
            .catch(error => console.error("Error updating classroom:", error));
          });



        fetchClassroomData();
      });
    </script>
    

   <!-- Timetable List Code -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        let timetableData = [];
        const timetableTableBody = document.getElementById("TimeTableBody");
        const dynamicTitle = document.getElementById("dynamicTitle");

        // Fetch Timetable Records
        function fetchTimetableData() {
          // Show loading while fetching data
          timetableTableBody.innerHTML = `
            <tr>
              <td colspan="4" class="text-center text-info">Loading timetable records...</td>
            </tr>
          `;

          fetch("backend/timetable_list.php")
            .then(response => response.json())
            .then(data => {
              timetableData = data;
              displayTimetables();
            })
            .catch(error => {
              console.error("Error fetching timetable data:", error);
              timetableTableBody.innerHTML = `
                <tr>
                  <td colspan="10" class="text-center text-danger">Error loading timetable records</td>
                </tr>
              `;
            });
        }

        // Display Timetable Records
        function displayTimetables() {
          timetableTableBody.innerHTML = "";

          if (!timetableData.length) {
            timetableTableBody.innerHTML = `
              <tr>
                <td colspan="10" class="text-center text-muted">No timetable records found</td>
              </tr>
            `;
            return;
          }

          timetableData.forEach((timetable, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
              <td>${index + 1}</td>                         
              <td>${timetable?.subject_name || "N/A"}</td>
              <td>${timetable?.faculty_name || "N/A"}</td>
              <td>${timetable?.start_time || "N/A"}</td>
              <td>${timetable?.end_time || "N/A"}</td>
              <td>${timetable?.day || "N/A"}</td>
              <td>${timetable?.date || "N/A"}</td>
              <td>${timetable?.faculty_number || "N/A"}</td>
              <td>${timetable?.class || "N/A"}</td>
              <td>${timetable?.notify === "1" ? "Sent" : "Not Sent" || "N/A"}</td>
              <td>
                <button class="btn btn-outline-danger btn-sm" onclick="deleteTimetable(${timetable?.id}, this)">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </td>
            `;
            timetableTableBody.appendChild(row);
          });

          dynamicTitle.textContent = "Timetable Records";
        }

        // Delete Timetable Record
        function deleteTimetable(timetableId, button) {
          if (!confirm("Are you sure you want to delete this timetable record?")) return;

          // Disable button and show loader
          button.disabled = true;
          button.innerHTML = `<span class="spinner-border spinner-border-sm"></span> Deleting...`;

          fetch("backend/delete_timetable_record.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id=${timetableId}`
          })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                const row = button.closest("tr");
                row.remove();
                alert(data?.message || "Timetable record deleted successfully!");
              } else {
                alert("Error: " + (data?.message || "Failed to delete timetable record."));
                // Restore button state on failure
                button.disabled = false;
                button.innerHTML = `<i class="bi bi-trash"></i> Delete`;
              }
            })
            .catch(error => {
              console.error("Error deleting timetable record:", error);
              alert("An unexpected error occurred while deleting.");
              button.disabled = false;
              button.innerHTML = `<i class="bi bi-trash"></i> Delete`;
            });
        }

        window.deleteTimetable = deleteTimetable;

        // Initial fetch
        fetchTimetableData();
      });
    </script>

    <!-- Subject List Code -->
    <script>
      function fetchSubjects() {
        fetch("backend/get_subjects.php") // Adjust path based on your project structure
          .then(response => response.json())
          .then(data => {
            if (Array.isArray(data)) {
              renderSubjects(data);
            } else {
              console.error("Error fetching subjects:", data);
            }
          })
          .catch(error => console.error("Fetch error:", error));
      }
      fetchSubjects();

      function deleteSubject(subjectId) {
        if (confirm("Are you sure you want to delete this subject?")) {
          fetch("backend/delete_subject.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json", // Correct content type
              },
              body: JSON.stringify({
                id: subjectId
              }), // Send JSON data
            })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                alert("Subject deleted successfully!");
                fetchSubjects(); // Refresh the table after deletion
              } else {
                alert("Failed to delete subject: " + data.message);
              }
            })
            .catch((error) => console.error("Error deleting subject:", error));
        }
      }


      function renderSubjects(subjects) {
        const tableBody = document.getElementById("subjectTableBody");
        tableBody.innerHTML = ""; // Clear previous content

        subjects.forEach((subject, index) => {
          const row = document.createElement("tr");
          row.innerHTML = `
            <td>${index + 1}</td>
            <td>${subject?.name}</td>
            <td>${subject?.code}</td>
            <td>${subject?.description || "N/A"}</td>
            <td>
              <button class="btn btn-outline-warning btn-sm" onclick="editSubject(${subject?.id})"><i class="bi bi-pencil-square"></i> Edit</button>
              <button class="btn btn-outline-danger btn-sm" onclick="deleteSubject(${subject?.id})"><i class="bi bi-trash"></i> Delete</button>
            </td>
            `;

            tableBody.appendChild(row);
          });
          
      }


      function editSubject(subjectId) {

        // fetch(/get_subject_edit.php?id=${subjectId})
        fetch(`http://localhost/TimeTable/backend/get_subject_edit.php?id=${subjectId}`)
          .then(response => response.json())
          .then(subject => {
            if (subject.error) {
              alert(subject.error);
              return;
            }

            // Populate form fields
            document.getElementById("editSubjectId").value = subject.id;
            document.getElementById("editSubjectName").value = subject.name;
            document.getElementById("editSubjectCode").value = subject.code;
            document.getElementById("editSubjectDescription").value = subject.description || "";

            // Show the edit form
            // Show the Bootstrap Modal
            var editModal = new bootstrap.Modal(document.getElementById('editSubjectModal'));
            editModal.show();
          })
          .catch(error => console.error("Error fetching subject:", error));
      }

      document.getElementById("editSubjectForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        // Collect form data
        const id = document.getElementById("editSubjectId").value;
        const name = document.getElementById("editSubjectName").value;
        const code = document.getElementById("editSubjectCode").value;
        const description = document.getElementById("editSubjectDescription").value;

        // Send update request to backend
        fetch("http://localhost/TimeTable/backend/update_subject.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify({
              id: id,
              name: name,
              code: code,
              description: description
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert("Subject updated successfully!");
              location.reload(); // Refresh the page or reload the subject list
            } else {
              alert(data.error || "Failed to update subject");
            }
          })
          .catch(error => console.error("Error updating subject:", error));
      });

    </script>


    <script>
      document.querySelectorAll(".sidebar_class").forEach(item => {
        item.addEventListener("click", function () {
          document.querySelectorAll(".sidebar_class").forEach(el => el.classList.remove("sidebar_active"));
          this.classList.add("sidebar_active");
        });
      });

      function handleTab(tabTitle) {
        localStorage.setItem("activeTab", tabTitle);
        document.getElementById("dynamicTitle").innerText = tabTitle;

        document.querySelectorAll(".sidebar_class").forEach(item => {
        item.classList.remove("sidebar_active");
      });

      // Find the clicked sidebar item and add the active class
      document.querySelectorAll(".sidebar_class").forEach(item => {
        if (item.textContent.trim() === tabTitle) {
          item.classList.add("sidebar_active");
        }
      });

      // Update the section display
      document.getElementById("dynamicTitle").innerText = tabTitle;

        const sections = [
        "facultyList",
        "facultyForm",
        "subjectList",
        "subjectForm",
        "classroomList",
        "classroomForm",
        "timetable",
        "timetableForm"
      ];

      sections.forEach(section => {
        document.getElementById(section).style.display = "none";
      });

        switch (tabTitle) {
          case "Faculty List":
            facultyList.style.display = "block";
            break;
          case "New Faculty":
            facultyForm.style.display = "block";
            break;
          case "Subject List":
            subjectList.style.display = "block";
            break;
          case "Add Subject":
            subjectForm.style.display = "block";
            break;
          case "Classroom List":
            classroomList.style.display = "block";
            break;
          case "Create Classroom":
            classroomForm.style.display = "block";
            break;
          case "Timetable List":
            timetable.style.display = "block";
            break;
          case "Add Lecture":
            timetableForm.style.display = "block";
            break;  
          default:
            console.log("Unknown tab title:", tabTitle);
        }
      }
      window.onload = function() {
      const savedTab = localStorage.getItem("activeTab") || "Timetable List";
      handleTab(savedTab);
    };
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