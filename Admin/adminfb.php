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
    <title>Feedback</title>
    <style>
      #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #customers tr:hover {
    background-color: #ddd;
  }

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }
    </style>


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
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Feedback</a>
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
            <a class="nav-link" href="index.php">
              <span data-feather="file"></span>
              Pending Reports <span class="sr-only">(current)</span>
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
            <li class="nav-item active">
                <a class="nav-link" href="user.php">
                    <span data-feather="users"></span>
                    User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="garbagestaff.php">
                    <span data-feather="users"></span>
                    Garbage Staff
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
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Feedback</h1>

          </div>




 <?php
@session_start();
if(isset($_GET['msg'])) {
    echo "<div class='alert alert-info'>" . $_GET['msg'] . "</div>";
}

require 'config.php';
if (isset($_SESSION['id'])) {
    $userLoggedIn = $_SESSION['id'];
    $result = mysqli_query($con,"SELECT * FROM poll");

    echo "<table border='1' id='customers'>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Feedback</th>
    <th>Suggestions</th>
    <th>Action</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['feedback'] . "</td>";
        echo "<td>" . $row['suggestions'] . "</td>";
        echo "<td>
                <form method='post' action='delete_feedback.php'>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <input type='submit' value='Delete'>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Handle the case where the session is not set
}

?>



      </main>
  </div>
</div>
<script src="js/jquery-3.3.1.slim.min.js" ></script>
      <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"></script>')
       <script src="js/bootstrap.bundle.min.js" ></script>
        <script src="js/feather.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/dashboard.js"></script></body>
</html>
