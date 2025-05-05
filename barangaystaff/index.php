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
    <title>New Reports</title>

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

  <main role="main" class="container mt-5 pt-4">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15433.364507925004!2d121.04050608697835!3d14.74980127206797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b03eb2eaea6f%3A0x7bd1ffce5186e31f!2sBarangay%20177%2C%20Caloocan%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1715440565963!5m2!1sen!2sph" 
        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Update</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $U_ID = $_SESSION['id'];
            include '../connection.php';
            $query = $db->query("SELECT * FROM reports INNER JOIN users ON users.U_ID = reports.Upload_U_ID WHERE Post_Status='0' ORDER BY R_ID DESC");

            while ($query_run = $query->fetch_assoc()) {
                $R_ID = $query_run['R_ID'];
                ?>
                <tr>
                    <td><?php echo $R_ID; ?></td>
                    <td><?php echo $query_run['Location']; ?></td>
                    <td>
                        <?php 
                        $Post_Status = $query_run['Post_Status'];
                        if ($Post_Status == "0") {
                            echo '<span class="badge badge-warning">Pending</span>';
                        } elseif ($Post_Status == "1") {
                            echo '<span class="badge badge-success">Completed</span>';
                        } elseif ($Post_Status == "2") {
                            echo '<span class="badge badge-danger">Rejected</span>';
                        } elseif ($Post_Status == "3") {
                            echo '<span class="badge badge-info">Importance</span>';
                        }
                        ?>
                    </td>
                    <td><?php echo $query_run['F_Name'] . " " . $query_run['L_Name']; ?></td>
                    <td><?php echo $query_run['Post_Date']; ?></td>
                    <td>
                        <form action="edit/editreport.php?R_ID=<?php echo $R_ID; ?>" method="post">
                            <select class="form-control form-control-sm mb-2" name="proceed">
                                <option value="4">Select the Proceed</option>
                                <option value="3">Importance</option>
                                <option value="2">Reject</option>
                            </select>
                            <button type="submit" class="btn btn-info btn-sm btn-block">Update</button>
                        </form>
                    </td>
                    <td>
                        <form action="viewreport.php?R_ID=<?php echo $R_ID; ?>" method="post">
                            <button type="submit" class="btn btn-success btn-sm btn-block">View</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</main>

<script src="js/jquery-3.3.1.slim.min.js" ></script>
       <script src="js/bootstrap.bundle.min.js" ></script>
        <script src="js/feather.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/dashboard.js"></script></body>
</html>
