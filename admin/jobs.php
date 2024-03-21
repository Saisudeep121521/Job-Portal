<?php
session_start();
$adminId = $_SESSION["admin"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <!-- Add this line before your custom script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-center">
            <a class="logo d-flex align-items-center  justify-content-center fw-bold">
                <span class="d-none d-lg-block  fw-bold">
                    <b>PROCOM</b>
                </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
                <button type="submit" title="Search">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php echo $adminId ?>
                        </span> </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                <?php echo $adminId ?>
                            </h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="usersList.php">
                    <i class="bi bi-grid"></i>
                    <span>User's List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="jobs.php">
                    <i class="bi bi-grid"></i>
                    <span>Jobs</span>
                </a>
            </li>
        </ul>
    </aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Jobs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>Home</a></li>
                    <li class="breadcrumb-item   active">Jobs</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Job Details</h5>
                            <form method="post" action="add_job.php">
                                <div class="row mb-3">
                                    <label for="Title" class="col-sm-2 col-form-label">Job Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Title" name="Title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Location" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Location" name="Location">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Role" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Role" name="Role">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="input-group mb-3">
                                        <label for="LPA" class="col-sm-2 col-form-label">LPA</label>
                                        <input type="text" class="form-control" placeholder="" id="LPA" name="LPA">
                                        <span class="input-group-text" id="basic-addon1">/LPA</span>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Job Period</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                id="gridRadios1" value="Full Time" checked="">
                                            <label class="form-check-label" for="gridRadios1">
                                                Full Time
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                id="gridRadios2" value="Part Time">
                                            <label class="form-check-label" for="gridRadios2">
                                                Part Time
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-3">
                                    <label for="Description" class="col-sm-3 col-form-label">Job Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" style="height: 100px" id="Description"
                                            name="Description"></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Add Job</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jobs</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Role</th>
                                        <th>Description</th>
                                        <th>LPA</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include ('../connection.php');
                                    $sql = "SELECT * FROM `jobslist`";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            // Display each column with editable fields
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td contenteditable='true' onBlur=\"updateJob(" . $row["id"] . ", 'title', this.innerText)\">" . $row["title"] . "</td>";
                                            echo "<td contenteditable='true' onBlur=\"updateJob(" . $row["id"] . ", 'location', this.innerText)\">" . $row["location"] . "</td>";
                                            echo "<td contenteditable='true' onBlur=\"updateJob(" . $row["id"] . ", 'role', this.innerText)\">" . $row["role"] . "</td>";
                                            echo "<td contenteditable='true' onBlur=\"updateJob(" . $row["id"] . ", 'description', this.innerText)\">" . $row["description"] . "</td>";
                                            echo "<td contenteditable='true' onBlur=\"updateJob(" . $row["id"] . ", 'lpa', this.innerText)\">" . $row["lpa"] . "</td>";
                                            // Action column
                                            echo "<td>";
                                            // No need for edit button
                                            echo "<button type='button' class='btn btn-danger' style='margin-right: 5px;' onclick='confirmDelete(" . $row["id"] . ")'>X</button>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No records found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        function updateJob(id, field, value) {
            // Send AJAX request to update_job.php
            $.ajax({
                type: "POST",
                url: "update_job.php",
                data: {
                    id: id,
                    field: field,
                    value: value
                },
                success: function (response) {
                    if (response === "success") {
                        // Success message or handling
                    } else {
                        // Error message or handling
                    }
                },
                error: function (xhr, status, error) {
                    alert("AJAX request failed. Status: " + status + ", Error: " + error);
                }
            });
        }

        function confirmDelete(jobId) {
            if (confirm("Are you sure you want to delete this job?")) {
                // Send AJAX request to delete_job.php
                $.ajax({
                    type: "POST",
                    url: "delete_job.php",
                    data: {
                        id: jobId
                    },
                    success: function (response) {
                        if (response === "success") {
                            $("#row_" + jobId).remove();
                            location.reload();
                        } else { }
                    },
                    error: function (xhr, status, error) {
                        alert("AJAX request failed. Status: " + status + ", Error: " + error);
                    }
                });
            }
        }
    </script>

    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>