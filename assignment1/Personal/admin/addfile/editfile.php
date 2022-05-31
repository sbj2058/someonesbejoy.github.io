        
<?php 
require ('../../connection/config.php');
?>
<?php include ('../../inc/toppart.php') ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include ('../../inc/navbar.php') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include ('../../inc/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
        <div class="container">
                <div class="title">
                    <h2 class="mb-3 p-2">Add Users</h2>
                </div>
                <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT * FROM filemanager WHERE id='$id'";
                $show_result = mysqli_query($conn, $show_query);
                // To get only one row data
                $data = $show_result->fetch_assoc();
                // $title=$data['title'];
                // $image=$data['image'];
                // $heading=$data['heading'];
                // $subheading=$data['subheading'];
                // $status=$data['status'];
            }
            ?>
            
        <?php
        if (isset($_POST['submit'])) {

            $firstname = $_POST['fname'];

            $dataFile = $_FILES['dataFile']['name'];
            $filesize = $_FILES['dataFile']['size'];
            $explode_values = explode('.', $dataFile);
            $name = $explode_values[0];
            $fname = str_replace(' ', '', $name);
            $finalname = strtolower($fname . time());   
            $extention = $explode_values[1];
            $finalfile = $finalname . "." . $extention;

            $ftype = $_POST['type'];

            if ($filesize <= 3000000) {
                if ($extention == 'jpg' || $extention == 'JPG' || $extention == 'pdf' || $extention == 'PNG' || $extention == 'png' || $extention == 'jpeg') {
                    if (move_uploaded_file($_FILES['dataFile']['tmp_name'], "../../uploads/" . $finalfile)) 
                    {
                        $query = "UPDATE filemanager SET fname='$firstname', link='$finalfile', type='$ftype' WHERE id='$id'";
                    $result = mysqli_query($conn, $query);
                        if ($result) {
        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>File is added successfully.</strong>
                            </div>
                            <meta http-equiv = "refresh" content = " 0 ; url = managefile.php"/>
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
                              <div class="card-body ">
                                <div class="form-group">
                                    <label> File Name:</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                                      </div>
                                      <input type="text" class="form-control" id="name" name="fname" value="<?php echo $data['fname']; ?>" placeholder="File name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Link:</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                      </div>
                                      <input type="file" class="form-control" id="Address" name="dataFile" value="<?php echo $data['link']; ?>" placeholder="File link">
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card card-danger m-3">
                              <div class="card-body">
                                <div class="form-group">
                                    <label>Type:</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input type="text" class="form-control" id="text" name="type" value="<?php echo $data['type']; ?>" placeholder="Type">
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
    </section>
    <!-- /.content -->

  <?php include ('../../inc/footer.php') ?>


            