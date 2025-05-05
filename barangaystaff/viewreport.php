<?php
session_start();
if(!$_SESSION['id'])
{
    $msg="Session Not Started";
    echo "<script>window.top.location='../login.php?msg=$msg'</script>";

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Report</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"  />


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Barangay Staff</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="index.php">New Reports</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="mycomplete.php">My Completed Reports</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="changesettings.php">Change Settings</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../logout.php">Sign out</a>
            </li>
        </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <h2 class="mb-4 text-center">View Report</h2>
    <?php
$R_ID = $_REQUEST['R_ID'];
$U_ID = $_SESSION['id'];

include '../connection.php';
$check_query = $db->query("SELECT reports.*, users.F_Name, users.L_Name FROM reports INNER JOIN users ON users.U_ID = reports.Upload_U_ID WHERE R_ID='$R_ID'");
$check_query_Run = $check_query->fetch_assoc();
?>


    <div class="form bg-light p-3 rounded shadow-sm">
        <div class="form-group">
            <a href="../reportimages/<?php echo $check_query_Run['R_URL']; ?>" target="_blank">
                <img src="../reportimages/<?php echo $check_query_Run['R_URL']; ?>" class="img-fluid rounded" alt="Report Image" style="max-width: 100%; height: auto;">
            </a>
            <label class="d-block mt-2 font-weight-bold">Uploaded Image</label>
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Name:</label>
            <div class="form-control-plaintext"><?php echo $check_query_Run['F_Name']." ".$check_query_Run['L_Name']; ?></div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Location:</label>
            <div class="form-control-plaintext"><?php echo $check_query_Run['Location']; ?></div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Description:</label>
            <div class="form-control-plaintext"><?php echo $check_query_Run['Desciption']; ?></div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script></body>
</html>
