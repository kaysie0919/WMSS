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
    <title>View Reports</title>
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
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">User Dashboard</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../logout.php">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">
                            <span data-feather="file"></span>
                            Pending Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="all_reports.php">
                            <span data-feather="file"></span>
                            All Reports
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">
                            <span data-feather="users"></span>
                            Administrators
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">
                            <span data-feather="users"></span>
                            User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="garbagestaff.php">
                            <span data-feather="users"></span>
                            Waste Collector
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="barangaystaff.php">
                            <span data-feather="users"></span>
                            Barangay Staff
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="changesettings.php">
                            <span data-feather="settings"></span>
                            Change Settings
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="newusers.php">
                            <span data-feather="users"></span>
                            Add New Users
                        </a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link" href="adminfb.php">
                    <span data-feather="users"></span>
                    Feedback
                </a>
            </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container mt-4">
    <h2 class="mb-4 text-center">View Report</h2>
    <?php
$R_ID = $_REQUEST['R_ID'];
$U_ID = $_SESSION['id'];

include '../connection.php';
$check_query = $db->query("SELECT reports.*, users.F_Name, users.L_Name FROM reports INNER JOIN users ON users.U_ID = reports.Upload_U_ID WHERE R_ID='$R_ID'");
$check_query_Run = $check_query->fetch_assoc();
?>


    <div class="p-3 rounded shadow-sm">
            <a href="../reportimages/<?php echo $check_query_Run['R_URL']; ?>" target="_blank">
                <img src="../reportimages/<?php echo $check_query_Run['R_URL']; ?>" class="img-fluid rounded" alt="Report Image" style="max-width: 100%; height: auto;">
            </a>
            <label class="d-block mt-2 font-weight-bold">Uploaded Image</label>


            <label class="font-weight-bold">Name:</label>
            <div class="form-control-plaintext"><?php echo $check_query_Run['F_Name']." ".$check_query_Run['L_Name']; ?></div>


            <label class="font-weight-bold">Location:</label>
            <div class="form-control-plaintext"><?php echo $check_query_Run['Location']; ?></div>



            <label class="font-weight-bold">Description:</label>

    </div>
</div>
<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script></body>
</html>
