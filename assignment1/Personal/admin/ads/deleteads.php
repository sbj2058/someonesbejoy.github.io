<?php
require('../connection/config.php');

if(isset($_GET['id'])) {
  $id=$_GET['id'];
        
  $query="DELETE FROM ads WHERE id='$id'";
  $result=mysqli_query($conn,$query);

  if($result)
  {
    ?>
    <meta http-equiv = "refresh" content = " 0 ; url = manageads.php?msg=dsuccess"/>
    <?php
  }
  else
  {
    ?>
    <meta http-equiv = "refresh" content = " 0 ; url = manageads.php?msg=derror"/>
    <?php
  }
}

 ?>








                        

