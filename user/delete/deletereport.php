<?php

$img=$_REQUEST['img'];
$R_ID=$_REQUEST['R_ID'];

include '../../connection.php';
$delete=$db->query("DELETE FROM reports WHERE R_ID='$R_ID'");
if ($delete){
    unlink("../../reportimages/".$img);
    $ms = "Successfully Deleted";
    echo "<script>window.top.location='../index.php?msg=$ms'</script>";
}else{
    $ms = "something was wrong,please try again";
    echo "<script>window.top.location='../index.php?msg=$ms'</script>";
}
?>