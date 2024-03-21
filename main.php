<?php
session_start();

if (!isset ($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$userId = $_SESSION["username"];

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST["job_id"])) {
    $jobId = $_POST["job_id"];

    // Check if the user has already applied for this job
    $query = "SELECT COUNT(*) AS count FROM applied_jobs WHERE username = '$userId' AND jobId = $jobId";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["count"] > 0) {
            echo "You have already applied for this job.";
        } else {
            // Insert the applied job into the database
            $insertQuery = "INSERT INTO applied_jobs (username, jobId, date) VALUES ('$userId', $jobId, NOW())";
            if ($conn->query($insertQuery) === true) {
                echo "Job application successful.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        echo "Error: " . $conn->error;
    }
    exit(); // Exit after processing the job application
}

$query = "SELECT `id`, `title`, `location`, `role`, `period`, `description`, `lpa`,`skills` FROM `jobslist`";
$result = $conn->query($query);
if ($result) {
    $jobsList = [];
    while ($row = $result->fetch_assoc()) {
        $jobsList[] = $row;
    }
} else {
    echo "Error: " . $conn->error;
}

function isJobApplied($jobId, $userId, $conn)
{
    $query = "SELECT COUNT(*) AS count FROM applied_jobs WHERE username = '$userId' AND jobId = '$jobId'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["count"] > 0;
    } else {
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="assets/css/stylecd4e.css?version=4.1" rel="stylesheet" />
    <title>PROCOM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo">
                        <a class="d-flex">
                            <h1 style="color: #3c65f5"><b>PROCOM</b></h1>
                        </a>
                    </div>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu">
                        <ul class="main-menu d-flex" style="justify-content: center; align-items: center">
                            <li class="dashboard">
                                <a style="text-transform: capitalize;">
                                    Hello
                                    <?php echo $userId; ?>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span
                            class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-right">
                    <div class="block-signin">
                        <a class="text-link-bd-btom hover-up" href="appliedJobs.php">Applied Jobs</a>
                        <a href="logout.php" class="btn btn-default btn-shadow ml-40 hover-up">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main ">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-single banner-single-bg">
                    <div class="block-banner text-center">
                        <h3 class="wow animate__animated animate__fadeInUp">
                            <span class="color-brand-2">
                                <?php echo count($jobsList); ?> Jobs
                            </span> Available Now
                        </h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                            data-wow-delay=".1s">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
                            repellendus magni, <br class="d-none d-xl-block" />atque
                            delectus molestias quis?
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-30">
            <div class="container ">
                <div class="row flex-row-reverse mt-10">

                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="row">
                                <?php foreach ($jobsList as $job) {
                                    echo '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">';
                                    echo '<div class="card-grid-2 hover-up" style="height:40vh">';
                                    echo '<div class="card-grid-2-image-left">';
                                    echo '<span class="flash"></span>';
                                    echo '<div class="right-info">';
                                    echo '<a class="name-job"  style="color:#4265f5;font-size: 2em;">' . $job["title"] . "</a>";
                                    echo '<span class="location-small">' . $job["location"] . "</span>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo '<div class="card-block-info">';
                                    echo "<h6><a>" . $job["role"] . "</a></h6>";
                                    echo '<div class="">';
                                    echo '<span class="card-briefcase">' . $job["period"] . "</span>";
                                    echo "</div>";
                                    echo '<p class="font-sm color-text-paragraph mt-15">';
                                    echo strlen($job["description"]) > 100 ? substr($job["description"], 0, 100) . '...' : $job["description"];
                                    echo "</p>";
                                    echo '<div class="card-2-bottom mt-30">';
                                    echo '<div class="row">';
                                    echo '<div class="col-lg-7 col-7">';
                                    echo '<span class="card-text-price">' . $job["lpa"] . "</span>";
                                    echo '<span class="text-muted">/LPA</span>';
                                    echo "</div>";
                                    echo '<div class="col-lg-5 col-5 text-end">';
                                    echo '<form method="post" action="applingJobs.php">';
                                    echo '<input type="hidden" name="job_id" value="' . $job["id"] . '">';
                                    if (isJobApplied($job['id'], $userId, $conn)) {
                                        echo '<button type="button" class="btn btn-success apply-job-btn" >
                                        Applied
                                      </button>';
                                    } else {
                                        echo '<button type="button" class="btn btn-primary apply-job-btn" 
            data-bs-toggle="modal" data-bs-target="#applyJob' . $job["id"] . '">
            Apply
          </button>';
                                    }
                                    echo "</form>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo '
      <div class="modal fade" id="applyJob' . $job["id"] . '" tabindex="-1" aria-labelledby="applyJob" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="box-border-single container" >
                <div class="row mt-10">
                  <div class="col-lg-8 col-md-12">
                    <h6 class="fw-bold" style="color:#4265f5;font-size: 2em;">' . $job["title"] . '</h6>
                  </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
                <div class="banner-hero banner-image-single mt-10 mb-20 text-center"><img src="https://t4.ftcdn.net/jpg/02/30/96/79/360_F_230967964_xFC1kprDsCejznb1CFb8yPV6KL4NV6kI.jpg" alt="jobBox"></div>
                <div class="job-overview">
                  <h5 class="border-bottom pb-15 mb-30" style="color:grey">Overview</h5>
                  <div class="row">
                    <div class="col-md-6 d-flex">
                      <div class="sidebar-icon-item"><img src="assets/imgs/page/job-single/industry.svg" alt="jobBox"></div>
                      <div class="sidebar-text-info ml-10"><span class="text-description industry-icon mb-10">Role: </span><strong class="small-heading"> ' . $job["title"] . '</strong></div>
                    </div>
                    <div class="col-md-6 d-flex mt-sm-15">
                      <div class="sidebar-icon-item"><img src="assets/imgs/page/job-single/job-level.svg" alt="jobBox"></div>
                      <div class="sidebar-text-info ml-10"><span class="text-description joblevel-icon mb-10">Job type: </span><strong class="small-heading">' . $job["period"] . '</strong></div>
                    </div>
                  </div>
                  <div class="row mt-25">
                    <div class="col-md-6 d-flex mt-sm-15">
                      <div class="sidebar-icon-item"><img src="assets/imgs/page/job-single/salary.svg" alt="jobBox"></div>
                      <div class="sidebar-text-info ml-10"><span class="text-description salary-icon mb-10">Salary: </span><strong class="small-heading">' . $job["lpa"] . ' LPA</strong></div>
                    </div>
                    <div class="col-md-6 d-flex mt-sm-15">
                      <div class="sidebar-icon-item"><img src="assets/imgs/page/job-single/deadline.svg" alt="jobBox"></div>
                      <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Deadline: </span><strong class="small-heading">10/08/2022</strong></div>
                    </div>
                  </div>
                  <div class="row mt-25">
                    <div class="col-md-6 d-flex mt-sm-15">
                      <div class="sidebar-icon-item"><img src="assets/imgs/page/job-single/location.svg" alt="jobBox"></div>
                      <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Location: </span><strong class="small-heading">' . $job["location"] . ' </strong></div>
                    </div>
                  </div>
                </div>
                <div class="content-single">
                  <h4 style="color:green;margin-top:40px">Welcome to <span class="fw-bold" style="color:#4265f5;"> ' . $job["title"] . '</span></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                ';

                                    echo '<form method="post" action="applingJobs.php">';
                                    echo '<input type="hidden" name="job_id" value="' . $job["id"] . '">';

                                    if (isJobApplied($job['id'], $userId, $conn)) {
                                        echo '<button class="btn btn-apply-now bg-success text-white" disabled>Applied</button>';
                                    } else {
                                        echo '<button class="btn btn-apply-now bg-primary text-white" onclick="applyJob(' . $job['id'] . ')">Apply</button>';
                                    }

                                    echo '
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>';


                                    echo '
              </div>
            </div>
          </div>
        </div>
      </div>';
                                } ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block head-border mb-30">
                                    <h5>Filter <a class="link-reset" href="#">Reset</a></h5>
                                </div>
                                <div class="filter-block mb-30">
                                    <div class="form-group select-style select-style-icon">
                                        <select class="form-control form-icons select-active">
                                            <option>India</option>
                                            <option>London</option>
                                            <option>Paris</option>
                                            <option>Berlin</option>
                                        </select><i class="fi-rr-marker"></i>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Industry</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked" /><span
                                                        class="text-small">All</span><span class="checkmark"></span>
                                                </label><span class="number-item">180</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" /><span
                                                        class="text-small">Software</span><span
                                                        class="checkmark"></span> </label><span
                                                    class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" /><span
                                                        class="text-small">Finance</span><span class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" /><span
                                                        class="text-small">Recruting</span><span
                                                        class="checkmark"></span> </label><span
                                                    class="number-item">43</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" /><span
                                                        class="text-small">Management</span><span
                                                        class="checkmark"></span> </label><span
                                                    class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" /><span
                                                        class="text-small">Advertising</span><span
                                                        class="checkmark"></span> </label><span
                                                    class="number-item">76</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-20">
            <div class="container">
                <div class="box-newsletter">
                    <div class="row">
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block">
                            <img src="assets/imgs/template/newsletter-left.png" alt="joxBox" />
                        </div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <h2 class="text-md-newsletter text-center">
                                New Things Will Always<br />
                                Update Regularly
                            </h2>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                        placeholder="Enter your email here" />
                                    <button class="btn btn-default font-heading icon-send-letter">
                                        Subscribe
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block">
                            <img src="assets/imgs/template/newsletter-right.png" alt="joxBox" />
                        </div>
                    </div>
                </div>
            </div>
        </section>






        <!-- Modal -->


    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    <!-- Add jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>