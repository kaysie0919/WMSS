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
    <title>Add New Report</title>

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
<div class="container my-4 ">
    
    <h2>New Report</h2>
    <?php $U_ID = $_SESSION['id']; ?>
    <form action="add/addnewreport.php?U_ID=<?php echo $U_ID; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group my-4 ">
            <label>Select the Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label>Location:</label>
            <input type="text" class="form-control" placeholder="Enter Place Name" name="location">
        </div>

        <!-- Responsive Map Embed -->
        <div class="embed-responsive embed-responsive-16by9 mb-3">
            <iframe class="embed-responsive-item"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15433.364507925004!2d121.04050608697835!3d14.74980127206797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b03eb2eaea6f%3A0x7bd1ffce5186e31f!2sBarangay%20177%2C%20Caloocan%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1715440565963!5m2!1sen!2sph"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea name="desc" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Upload</button>

    </form>
</div>

<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script></body>
</html>

