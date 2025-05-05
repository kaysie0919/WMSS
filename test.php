<?php
$a = $_POST['username'];
$p = $_POST['password'];
$px = md5($p);

if (empty($a) || empty($p)) {
    echo "<div class='alert alert-danger text-center' role='alert'>";
    echo "<strong>Please enter both username and password.</strong>";
    echo "</div>";
} else {
    include 'connection.php';
    $find = $db->query("SELECT COUNT(U_ID) AS ro FROM users WHERE U_Name = '$a' AND password = '$px'");
    $x = $find->fetch_assoc();
    $cou = $x['ro'];

    if ($cou == 0) {
        echo "<div class='alert alert-danger text-center' role='alert'>";
        echo "<strong>Incorrect username or password. Please try again.</strong>";
        echo "</div>";
    } else {
        $getdetails = $db->query("SELECT * FROM users WHERE U_Name = '$a' AND password = '$px'");
        $row = $getdetails->fetch_assoc();

        if ($row['Active'] == "1") {
            session_start();

            if ($_SESSION['id'] = $row['U_ID']) {
                echo "<script language='javascript'>window.location.href='home.php'</script>";
            } else {
                $msg = "Session not started. Please try again.";
                echo "<script>window.top.location='login.php?msg=$msg'</script>";
            }
        } else {
            echo "<div class='alert alert-warning text-center' role='alert'>";
            echo "<strong>You are an offline user. Please contact your administrator.</strong>";
            echo "</div>";
        }
    }
}
?>
