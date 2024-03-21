<?php
session_start();

if (!isset ($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$userId = $_SESSION['username'];
include ('connection.php');
$query = "SELECT `id`, `title`, `location`, `role`, `period`, `description`, `lpa` FROM `jobslist`";
$result = $conn->query($query);
if ($result) {
    $jobsList = array();
    while ($row = $result->fetch_assoc()) {
        $jobsList[] = $row;
    }
} else {
    echo "Error: " . $conn->error;
}

$appliedQuery = "SELECT *
                FROM applied_jobs aj
                INNER JOIN jobslist jl ON aj.jobId = jl.id
                WHERE aj.username = '$userId'";
$appliedResult = mysqli_query($conn, $appliedQuery);

$totalJobsAppliedQuery = "SELECT COUNT(*) AS total_jobs_applied FROM applied_jobs where username='$userId'";
$totalJobsResult = $conn->query($totalJobsAppliedQuery);

if ($totalJobsResult && $totalJobsResult->num_rows > 0) {
    $row = $totalJobsResult->fetch_assoc();
    $totalJobsApplied = $row['total_jobs_applied'];
} else {
    $totalJobsApplied = 0;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="assets/css/stylecd4e.css?version=4.1" rel="stylesheet" />
    <title>PROCOM</title>
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
                <!-- <div class="header-right">
                    <div class="block-signin">
                    </div>
                </div> -->
                <div class="header-right">
                    <div class="block-signin">
                        <a class="text-link-bd-btom hover-up">Applied Jobs</a>
                        <a href="logout.php" class="btn btn-default btn-shadow ml-40 hover-up">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-single banner-single-bg">
                    <div class="block-banner text-center">
                        <h3 class="wow animate__animated animate__fadeInUp">
                            <span class="color-brand-2">
                                <?php echo $totalJobsApplied; ?> Jobs
                            </span> Applied
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
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="row display-list">

                                <?php
                                if (mysqli_num_rows($appliedResult) > 0) {
                                    while ($row = mysqli_fetch_assoc($appliedResult)) {
                                        // Generating HTML for each applied job
                                        echo '<div class="col-xl-12 col-12">';
                                        echo '<div class="card-grid-2 hover-up"><span class="flash"></span>';
                                        echo '<div class="row">';
                                        echo '  <div class="col-lg-6 col-md-6 col-sm-12">';
                                        echo '    <div class="card-grid-2-image-left">';
                                        echo '      <div class="right-info"><a class="name-job" href="#" style="font-size:1.5em;color:#0039ff">' . $row['title'] . '</a><span class="location-small">' . $row['location'] . '</span></div>';
                                        echo '    </div>';
                                        echo '  </div>';
                                        echo '</div>';

                                        // Looping card-block-info for each applied job
                                        echo '<div class="card-block-info">';
                                        echo '    <p><a href="job-details.html">' . $row['role'] . '</a></p>';
                                        echo '    <div class="mt-5"><span class="card-briefcase">Fulltime</span></div>';
                                        echo '    <p class="font-sm color-text-paragraph mt-10">' . $row['description'] . '</p>';
                                        echo '    <div class="card-2-bottom mt-20">';
                                        echo '        <div class="row">';
                                        echo '            <div class="col-lg-7 col-7 mt-4"><span class="card-text-price">' . $row['lpa'] . '</span><span class="text-muted">/Lpa</span></div>';
                                        echo '            <div class="col-lg-5 col-5 text-end">';
                                        echo '                <div class="btn btn-success text-white">Applied</div>';
                                        echo '            </div>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "No applied jobs found.";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block head-border mb-30">
                                    <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>
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
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">All</span><span class="checkmark"></span>
                                                </label><span class="number-item">180</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Software</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Finance</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Recruting</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">43</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Management</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Advertising</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">76</span>
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
    </main>
</body>

</html>