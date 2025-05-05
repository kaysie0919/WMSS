<?php
$R_ID=$_REQUEST['R_ID'];
$proceed=$_POST['proceed'];

if ($proceed=="4"){
    $ms = "Please select the Proceed";
    echo "<script>window.top.location='../index.php?msg=$ms'</script>";
}else{
    include '../../connection.php';
    $insert=$db->query("UPDATE reports SET Post_Status='$proceed' WHERE R_ID='$R_ID'");

    if ($insert) {
        $ms = "Report Updated Successfully";
        echo "<script>window.top.location='../index.php?msg=$ms'</script>";
    } else {
        $ms = "Something was Wrong! Please Contact System Developer";
        echo "<script>window.top.location='../index.php?msg=$ms'</script>";
    }
}

?>