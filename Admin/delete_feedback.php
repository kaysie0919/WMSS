<?php
session_start();
require 'config.php';

if(isset($_SESSION['id']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM poll WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        $msg = "Record deleted successfully";
    } else {
        $msg = "Failed to delete the record";
    }
    $stmt->close();
    $con->close();
} else {
    $msg = "Unauthorized access or invalid request";
}

echo "<script>window.top.location='user.php?msg=$msg'</script>";
?>
