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
    <title>My Completed Reports</title>

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
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Location</th>
          <th>Status</th>
          <th>User Name</th>
          <th>Date</th>
          <th>View</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $U_ID = $_SESSION['id'];
        include '../connection.php';
        $query = $db->query("SELECT * FROM reports INNER JOIN users ON users.U_ID=reports.Upload_U_ID WHERE Post_Status='1' ORDER BY R_ID DESC");

        while ($query_run = $query->fetch_assoc()) {
            $R_ID = $query_run['R_ID'];
            $Post_Status = $query_run['Post_Status'];
        ?>
        <tr>
          <td><?php echo $R_ID; ?></td>
          <td><?php echo $query_run['Location']; ?></td>
          <td>
            <?php
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
          <td><?php echo $query_run['F_Name'] . ' ' . $query_run['L_Name']; ?></td>
          <td><?php echo $query_run['Post_Date']; ?></td>

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
      <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"></script>')
       <script src="js/bootstrap.bundle.min.js" ></script>
        <script src="js/feather.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/dashboard.js"></script></body>
</html>
