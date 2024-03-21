<!DOCTYPE html>
<html lang="en">

<?php
include ('./head.php');
?>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link ">
                <i class="bi bi-grid"></i>
                <span>User's List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="jobs.php">
                <i class="bi bi-grid"></i>
                <span>Jobs</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End Sidebar-->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Home</a></li>
                <li class="breadcrumb-item   active">User's List</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total No.of users</h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Full Name</th>
                                    <th>UserId</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include ('../connection.php');
                                $sql = "SELECT * FROM `users`";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $counter . "</td>";
                                        echo "<td>" . $row["fullname"] . "</td>";
                                        echo "<td>" . $row["username"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>
                      <button type='button' class='btn btn-danger'>Remove</button>
                      </td>";
                                        echo "</tr>";
                                        $counter++;
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No records found</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                        <!-- <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            S.No
                                        </th>
                                        <th>User Name</th>
                                        <th>Full Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include ('../connection.php');
                                    $sql = "SELECT `id`, `fullname`, `username` FROM `users`";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $counter . "</td>";
                                            echo "<td>" . $row["username"] . "</td>";
                                            echo "<td>" . $row["fullname"] . "</td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No records found</td></tr>";
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table> -->
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

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