<?php
$F_Name = $_POST['F_Name'];
$L_Name = $_POST['L_Name'];
$Email = $_POST['Email'];
$Username = $_POST['Username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$Added_ID = "0";
$Status = "GTF";
$Active = "1";

$pass = md5($cpassword);

if (empty($F_Name) || empty($L_Name) || empty($Email) || empty($Username) || empty($password) || empty($cpassword)) {
    echo "Cannot save empty data";
} else {
    if ($password == $cpassword) {
        include '../connection.php';

        $query = $db->query("INSERT INTO users (U_ID, U_Name, F_Name, L_Name, Email, password, Active, Status, Added_ID)
                             VALUES ('', '$Username', '$F_Name', '$L_Name', '$Email', '$pass', '$Active', '$Status', '$Added_ID')");
                             
        if ($query) {
            $msg = "Successfully registered";
            echo $msg;
            echo "<script>window.top.location='login.php?msg=$msg'</script>";
        } else {
            echo "Cannot save data in database";
        }
    } else {
        echo "Passwords do not match";
    }
}
?>
