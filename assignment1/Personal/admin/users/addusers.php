<?php include("../connection/config.php"); ?>
<?php include("../inc/toppart.php"); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("../inc/navbar.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  <?php include("../inc/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">

            
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add user</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php

                if(isset($_POST['submit'])){
                  $name= $_POST['name'];
                  $email= $_POST['email'];
                  $password= addslashes(md5($_POST['password']));
                  $confirm_password= addslashes(md5($_POST['confirm_password']));

                  if($email !="" && $password!="" && $confirm_password!=""){
                    $query= "INSERT INTO users (name, email, password, confirm_password)
                    VALUES('$name','$email', '$password', '$confirm_password')";
                    $result= mysqli_query($conn, $query);
                    if($result){
                      ?>
                      
                      <meta http-equiv="refresh" content="0; URL=manageusers.php">

                      <?php 
                    } 
                    else{
                      echo "Data is not submited";
                    }
                  }else{
                    echo "email and password are required";
                  }

                }

                ?>

                <form action="#" method="POST" enctype="multipart">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..."name="name"value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter ..."name="email"value="" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password"value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password"value="">
                      </div>
                    </div>
                  </div>
                  <div class="button">
                      <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include("../inc/footer.php"); ?>