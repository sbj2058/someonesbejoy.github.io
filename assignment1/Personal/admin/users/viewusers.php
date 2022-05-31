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
            <h1>View User</h1>
            <a href="manageusers.php" class="btn btn-primary "> Back</a>
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
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT * FROM users WHERE id='$id'";
                $show_result = mysqli_query($conn, $show_query);
                // To get only one row data
                $data = $show_result->fetch_assoc();
            }
            ?>

            <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = addslashes(md5($_POST['password']));
                $conform_passwird = addslashes(md5($_POST['confirm_password']));

                if ($name != "" && $email != ""  && $password != "") {

                    $query = "UPDATE users SET name='$name',  email='$email', password='$password',confirm_password='$confirm_password' WHERE id='$id'";
                    $result = mysqli_query($conn, $query);
                    // echo"$result";
                    if ($result)
            ?>
                    <meta http-equiv="refresh" content=" 0 ; url = manageusers.php?msg=usuccess" />
            <?php
            } else {
                echo "Update Failed.";
            }
        }
            ?>


                <form action="#" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" disabled name="name" value=" <?php echo $data['name'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" disabled  name="email" value="<?php echo $data['email'] ; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" disabled value="<?php echo $data['password'] ; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" disabled value="<?php echo $data['confirm_password'] ; ?>">
                      </div>
                    </div>
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