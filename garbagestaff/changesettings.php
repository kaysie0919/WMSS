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
    <title>Account Settings</title>

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
    <a class="navbar-brand" href="#">Garbage Staff</a>
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

  <div class="container my-4 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
        <h2 class="text-center mb-4">Change Details</h2>
        <?php
            $U_ID = $_SESSION['id'];
            include '../connection.php';
            $check_query = $db->query("SELECT * FROM users WHERE U_ID='$U_ID'");
            $check_query_Run = $check_query->fetch_assoc();
        ?>
        <form id="myform" action="edit/editdetails.php?U_ID=<?php echo $U_ID; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" class="form-control" value="<?php echo $check_query_Run['F_Name']; ?>" name="fname">
            </div>
            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" class="form-control" value="<?php echo $check_query_Run['L_Name']; ?>" name="lname">
            </div>
            <div class="form-group">
                <label>User Name:</label>
                <input type="text" class="form-control" value="<?php echo $check_query_Run['U_Name']; ?>" name="uname">
            </div>

            <button id="saveForm" type="button" class="btn btn-warning btn-block">Update</button>
        </form>
        <span id="result"></span>
    </div>
</div>

<script src="../js/jquery-2.2.3.min.js"></script>
<script>
    $("#saveForm").click(function(){
        $.post($("#myform").attr("action"), $("#myform :input").serializeArray(), function(info){
            $("#result").html(info);
        });
        clearInput();  // Clears input fields after submission
    });

    $("#myform").submit(function(){
        return false;
    });

    // Clear input fields function
    function clearInput() {
        $("#myform :input").val('');
    }
</script>

<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script></body>
</html>
