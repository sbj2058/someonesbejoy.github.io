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
            <h1>View Ads</h1>
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
                <h3 class="card-title">View ads</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT * FROM ads WHERE id='$id'";
                $show_result = mysqli_query($conn, $show_query);
                // To get only one row data
                $data = $show_result->fetch_assoc();
            }
            ?>

            <?php
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                

                if ($name != "" && $description != "" ) {

                    $query = "UPDATE users SET name='$name',  description='$description'";
                    $result = mysqli_query($conn, $query);
                    // echo"$result";
                    if ($result)
            ?>
                    <meta http-equiv="refresh" content=" 0 ; url = manageads.php?msg=usuccess" />
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
                        <input type="text" class="form-control" disabled name="title" value=" <?php echo $data['title'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="description" class="form-control" disabled  name="description" value="<?php echo $data['description'] ; ?>">
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