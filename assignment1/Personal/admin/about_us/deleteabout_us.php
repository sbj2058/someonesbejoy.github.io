<?php
include("../connection/config.php");
if(isset($_GET['id'])){
    $id =$_GET['id'];

    $newquery ="DELETE FROM aboutus where id= '$id'";
    $show_result = mysqli_query($conn, $newquery);
    if($show_result){
        ?>
        <meta http-equiv = "refresh" content = " 0 ; url = manageabout_us.php?msg=dsuccess"/>
        <?php
    }else{
        ?>
        <meta http-equiv = "refresh" content = " 0 ; url = manageabout_us.php?msg=error"/>
        <?php
    }
}

?>