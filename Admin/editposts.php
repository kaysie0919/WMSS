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
    <title>Edit Posts</title>


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
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Dashboard</a>
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
                            Green Task Force
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
                            Green Managers
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="changesettings.php">
                            <span data-feather="settings"></span>
                            Change Settings
                        </a>
                    </li>

                    <li class="nav-item active">
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
                <h1 class="h2">Dashboard</h1>

            </div>

            <div class="container">
                <h2>Edit Post</h2>
                <?php
                $Blog_ID=$_REQUEST ['Blog_ID'];
                $U_ID=$_SESSION['id'];

                include '../connection.php';
                $check_query=$db->query("SELECT * FROM blog WHERE Blog_ID='$Blog_ID'");
                $check_query_Run=$check_query->fetch_assoc();
                $img_url=$check_query_Run['img_url'];
                ?>
                <form  action="edit/editblog.php?img=<?php echo $img_url;?>&&Blog_ID=<?php echo $Blog_ID;?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <img src="../reportimages/blog/<?php echo $img_url;?>" width="150" height="150"/>
                        <br>
                        <label>Uploaded Image:</label>
                    </div>
                    <div class="form-group">
                        <label>Title :</label>
                        <input type="text" class="form-control" value="<?php echo $check_query_Run['Blog_Title'];?>"  name="title">
                    </div>
                    <div class="form-group">
                        <label>Title Description :</label>
                        <textarea class="form-control" name="title_desc"><?php echo $check_query_Run['Title_desc'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Select the Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Main Description :</label>
                        <textarea class="form-control" name="main_desc"><?php echo $check_query_Run['Main_Desc'];?></textarea>
                    </div>



                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
                <span id="result"></span>
            </div>
            <br>


        </main>

        <script src="../js/jquery-2.2.3.min.js"></script>


    </div>
</div>

<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script></body>
</html>
