<?php include("../connection/config.php"); ?>

<?php include("../inc/toppart.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("../inc/navbar.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  <?php include("../inc/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
        <div class="container">
                <div class="title">
                    <h2 class="mb-3 p-2">Add Services</h2>
                </div>
                <?php
                if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT * FROM aboutus WHERE id='$id'";
                $show_result = mysqli_query($conn, $show_query);
                // To get only one row data
                $data = $show_result->fetch_assoc();    
            }
            ?>
            <?php
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $title_description = $_POST['title_description'];
                    $info_title= $_POST['info_title'];
                    $description=$_POST['description'];

                    $dataFile = $_FILES['dataFile']['name'];
                    $filesize = $_FILES['dataFile']['size'];
                    $explode_values = explode('.', $dataFile);
                    $name = $explode_values[0];
                    $fname = str_replace(' ', '', $name);
                    $finalname = strtolower($fname . time());   
                    $extention = $explode_values[1];
                    $finalfile = $finalname . "." . $extention;

                      if ($filesize <= 3000000) {
                          if ($extention == 'jpg' ||  $extention == 'JPG' || $extention == 'pdf' || $extention == 'PNG' || $extention == 'png' || $extention == 'gif' || $extention == 'jpeg') {
                              if (move_uploaded_file($_FILES['dataFile']['tmp_name'], "../uploads/about_us/" . $finalfile)) 
                              {
                                  $query = "INSERT INTO aboutus (title,title_description,info_title,description,img) VALUES ('$title','$title_description','$info_title','$description','$finalfile')";
                                  $result = mysqli_query($conn, $query);
                                  if ($result) {
                  ?>
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong>File is added successfully.</strong>
                              </div>
                              <meta http-equiv="refresh" content=" 0 ; url = manageabout_us.php" />
                              <script>
                              $(".alert").alert();
                              </script>
                              <?php
                                  } else {
                                  ?>
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong>File couldn't be added.</strong>
                              </div>
                              <?php
                                  }
                              } else {
                                  echo "File couldn't be uploaded successfully.";
                              }
                          } else {
                              echo "File format not accepted.";
                          }
                      } else {
                          echo "File size exceeded. Limited to 2MB.";
                      }
                  }
                  ?>

                  <form action="#" Method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-6">
                                <div class="card card-danger m-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>About Us Title:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                                <input disabled type="text" class="form-control" name="title"
                                                    value="<?php echo $data['title']; ?>" placeholder="Service Title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-danger m-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>About Us Title description:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                                <textarea disabled name="title_description" cols="45" rows="3" value="">="<?php echo $data['title_description']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-danger m-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>About Us Info title:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="text" disabled class="form-control" id="text" name="info_title"
                                                    value="<?php echo $data['info_title']; ?>" placeholder="Service Title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-danger m-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Info description:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                                <textarea disabled  name="description" cols="45" rows="3" value=""><?php echo $data['description']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-danger m-3">
                                    <div class="card-body ">
                                        <div class="form-group">
                                            <label>Icon:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-address-card"></i></span>
                                                </div>
                                                <img src= "<?php echo "../uploads/about_us/". $data['img'];?>" height="200px;" width="200px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       
                    </form>
                    </section>
    <!-- /.content -->
  <?php include("../inc/footer.php");?>