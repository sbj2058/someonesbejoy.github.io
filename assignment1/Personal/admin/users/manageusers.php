<?php include("../connection/config.php");?>
<?php include("../inc/toppart.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("../inc/navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("../inc/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage User</h1>
            <a href="addusers.php" class="btn btn-primary btn-sm mt-3"> Add users</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $query ="SELECT * FROM users";
                    $result= mysqli_query($conn, $query);
                    $i=0;
                     while($data= mysqli_fetch_array($result)){
                      ?>
                  <tr>
                  <td><?php echo ++$i; ?></td>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['email']; ?>
                  <td><?php echo $data['status']; ?>
                  <td>
                      <a href="editusers.php?id=<?php echo $data['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                      <a href="viewusers.php?id=<?php echo $data['id']; ?>" class="btn btn-secondary btn-sm">View</a>
                      <a href="deleteusers.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                  <?php
                     }

                    ?>

                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <?php include("../inc/footer.php");?>