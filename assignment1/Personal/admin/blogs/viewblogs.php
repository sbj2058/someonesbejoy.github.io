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
            <h1>View Blogs</h1>
            <a href="manageblogs.php" class="btn btn-primary "> Back</a>
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
                <h3 class="card-title">Add Blogs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT * FROM blogs WHERE id='$id'";
                $show_result = mysqli_query($conn, $show_query);
                // To get only one row data
                $data = $show_result->fetch_assoc();
            }
            ?>
            <?php
            if(isset($_POST['submit'])){
                  $title= $_POST['title'];
                  $sub_title= $_POST['sub_title'];
                  $blog_title= $_POST['blog_title'];
                  $blog_subtitle= $_POST['blog_subtitle'];
                 

                  if($sub_title !="" && $title!="" && $blog_title!=""){
                    $query= "INSERT INTO blogs (title, sub_title, blog_title,blog_subtitle)
                    VALUES('$title','$sub_title', '$blog_title', '$blog_subtitle')";
                    $result= mysqli_query($conn, $query);
                    if($result){
                      ?>
                      
                      <meta http-equiv="refresh" content="0; URL=manageblogs.php">

                      <?php 
                    } 
                    else{
                      echo "Data is not submited";
                    }
                  }else{
                    echo "sub_title and title are required";
                  }

                }

                ?>

                <form action="#" method="POST" enctype="multipart">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" disabled class="form-control" placeholder="Enter ..."name="title"value="<?php echo $data['title'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Sub Title</label>
                        <input type="text" disabled class="form-control" placeholder="Enter ..."name="sub_title"value="<?php echo $data['sub_title'] ; ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Blog</label>
                        <input type="text" disabled class="form-control" name="blog_title"value="<?php echo $data['blog_title'] ; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label>Blog Subtitle</label>
                        <input type="text" disabled class="form-control" name="blog_subtitle"value="<?php echo $data['blog_subtitle'] ; ?>">
                      </div>
                    </div>
                  </div>
                 
                </form>
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