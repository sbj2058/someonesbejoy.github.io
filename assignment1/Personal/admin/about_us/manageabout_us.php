<?php include('../connection/config.php'); ?>

<?php include('../inc/toppart.php');?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
    <?php include('../inc/sidebar.php');?>

<?php include('../inc/navbar.php');?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manage About US</h1>
                            <a href="addabout_us.php" class="btn btn-primary mt-2">Add About Us</a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
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
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="bg-warning">
                                                <th>S.N</th>
                                                <th>About Us Title</th>
                                                <th>About Us Description</th>
                                                <th>Info Title</th>
                                                <th>Info Description</th>
                                                <th>Image</th>
                                                

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                 $query= "SELECT * FROM aboutus";
                 $result= mysqli_query($conn, $query);
                 $i=0;
                 while ($data= mysqli_fetch_array($result)){
                   ?>
                                            <tr>
                                                <th scope="row"><?php echo ++$i; ?></th>
                                                <td><?php echo $data['title'];?></td>
                                                <td><?php echo $data['title_description'];?></td>
                                                <td><?php echo $data['info_title'];?></td>
                                                <td><?php echo $data['description'];?></td>

                                                <td><img src="<?php echo "../uploads/about_us/". $data['img'];?>"
                                                        height="100px;" width="200px;"></td>
                                                
                                                <td>
                                                <a href="viewabout_us.php?id=<?php echo $data['id'];?>"><button
                                                        type="button"
                                                        class="btn btn-sm btn-info float-left m-1">View</button></a>
                                                <a href="editabout_us.php?id=<?php echo $data['id']; ?>"><button
                                                        type="button"
                                                        class="btn btn-sm btn-primary float-left m-1">Edit</button></a>
                                                <a href="deleteabout_us.php?id=<?php echo $data['id']; ?>"><button
                                                        type="button"
                                                        class="btn btn-sm btn-danger float-left m-1">Delete</button></a>
                                                </td>
                                            </tr>

                                            <?php
                 }
                  
                
               
                
              ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-warning">
                                                <th scope="col">S.N</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">About Us Description</th>
                                                <th scope="col">Info title</th>
                                                <th scope="col">Info Description</th>
                                                <th scope="col">Image</th>
                                                

                                                <th scope="col">Action</th>
                                            </tr>

                                        </tfoot>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->




        <?php include('../inc/footer.php');?>