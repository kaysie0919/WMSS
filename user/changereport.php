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
    <title>Edit Report</title>

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
    <a class="navbar-brand" href="#">User Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav">
        <li class="nav-item text-nowrap">
                <a class="nav-link" href="index.php">All Sent Reports</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="newreport.php">New Report</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="changesettings.php">Change Settings</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="fb.php">Feedback</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../logout.php">Sign out</a>
            </li>
            
        </ul>
    </div>
</nav>

<main role="main" class="container mt-5 pt-4">
<div class="container my-4">
    <h2>Change Report</h2>

    <?php
    $R_ID = $_REQUEST['R_ID'];
    $U_ID = $_SESSION['id'];

    include '../connection.php';
    $check_query = $db->query("SELECT * FROM reports WHERE R_ID='$R_ID'");
    $check_query_Run = $check_query->fetch_assoc();
    ?>

    <form action="edit/editreport.php?R_ID=<?php echo $R_ID; ?>&img=<?php echo $check_query_Run['R_URL']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <a href="../reportimages/<?php echo $check_query_Run['R_URL']; ?>" target="_blank">
                <img src="../reportimages/<?php echo $check_query_Run['R_URL']; ?>" class="img-fluid rounded mb-2" alt="Report Image" style="max-width: 150px; height: auto;">
            </a>
            <br>
            <label>Uploaded Image:</label>
        </div>

        <div class="form-group">
            <label>Select the New Image:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label>Location:</label>
            <input type="text" class="form-control" value="<?php echo $check_query_Run['Location']; ?>" name="location">
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea name="desc" class="form-control" rows="4"><?php echo $check_query_Run['Desciption']; ?></textarea>
        </div>

        <button type="submit" class="btn btn-warning btn-sm mb-3">Update</button>
    </form>

    <form action="delete/deletereport.php?R_ID=<?php echo $R_ID; ?>&img=<?php echo $check_query_Run['R_URL']; ?>" method="post">
        <button type="submit" class="btn btn-danger btn-sm">Remove Report</button>
    </form>
</div>

<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script></body>
</html>
