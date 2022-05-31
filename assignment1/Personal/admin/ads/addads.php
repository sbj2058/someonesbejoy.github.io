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
            <h1>Add Ads</h1>
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
                <h3 class="card-title">Add Ads</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php

                if(isset($_POST['submit'])){
                  $title= $_POST['title'];
                  $description= $_POST['description'];

                  if($title !="" && $description!=""){
                    $query= "INSERT INTO ads (title, description)
                    VALUES('$title','$description')";
                    $result= mysqli_query($conn, $query);
                    if($result){
                      
                      
        

                    
                      echo header("Location: manageads.php");   
                    } 
                    else{
                      echo "Data is not submited";
                    }
                  }else{
                    echo "Title and Description are required";
                  }

                }

                ?>

                <form action="#" method="POST" enctype="multipart">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter ..."name="title"value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="email" class="form-control" placeholder="Enter ..."name="description"value="" >
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