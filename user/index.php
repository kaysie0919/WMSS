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
    <title>Sent Reports</title>

<link href="css/bootstrap.min.css" rel="stylesheet"  />


    <style>
      body, html {
    height: 100%;
    margin: 0;
  }

  .center-viewport {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 1rem;
    background-color: #f8f9fa;
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




<div class="center-viewport">
  <div class="table-responsive">
    <table class="table table-striped table-bordered text-center">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Location</th>
          <th>Status</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $U_ID = $_SESSION['id'];
        include '../connection.php';
        $query = $db->query("SELECT * FROM reports WHERE Upload_U_ID='$U_ID' ORDER BY R_ID DESC");
        while ($query_run = $query->fetch_assoc()) {
          $R_ID = $query_run['R_ID'];
          $Post_Status = $query_run['Post_Status'];
          ?>
          <tr>
            <td><?php echo $R_ID; ?></td>
            <td><?php echo $query_run['Location']; ?></td>
            <td>
              <?php
              switch ($Post_Status) {
                case "0": echo '<span class="badge badge-warning">Pending</span>'; break;
                case "1": echo '<span class="badge badge-success">Completed</span>'; break;
                case "2": echo '<span class="badge badge-danger">Rejected</span>'; break;
                case "3": echo '<span class="badge badge-info">Importance</span>'; break;
              }
              ?>
            </td>
            <td><?php echo $query_run['Post_Date']; ?></td>
            <td>
              <?php if (in_array($Post_Status, ['1', '2', '3'])): ?>
                <button disabled class="btn btn-sm btn-secondary">Settings</button>
              <?php else: ?>
                <form action="changereport.php?R_ID=<?php echo $R_ID; ?>" method="post">
                  <button type="submit" class="btn btn-sm btn-warning">Settings</button>
                </form>
              <?php endif; ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script src="js/jquery-3.3.1.slim.min.js" ></script>
       <script src="js/bootstrap.bundle.min.js" ></script>
        <script src="js/feather.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/dashboard.js"></script></body>
</html>
