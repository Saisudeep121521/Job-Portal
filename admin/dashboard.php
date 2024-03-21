<!DOCTYPE html>
<html lang="en">

<?php
include ('./head.php');
session_start();
$adminId = $_SESSION["admin"];
?>


<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
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
      <a class="nav-link collapsed" href="jobs.php">
        <i class="bi bi-grid"></i>
        <span>Jobs List</span>
      </a>
    </li>
  </ul>
</aside>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Total Users <span></span></h5>

                <div class="d-flex align-items-center justify-content-center">
                  <div class="ps-3">
                    <h3 class="text-success pt-1 fw-bold">15</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Total Jobs <span></span></h5>

                <div class="d-flex align-items-center justify-content-center">
                  <div class="ps-3">
                    <h3 class="text-success pt-1 fw-bold">35</h3>
                  </div>
                </div>
              </div>
            </div>
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