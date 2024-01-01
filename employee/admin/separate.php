<?php include "inc/header.php"; ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employee Management System</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Employee Management</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <!-- <?php
            echo $_SESSION['id'];
            ?> -->
            <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Manage All Employee</h3>                
                  </div>
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <?php

                      if (isset($_GET['do'])) {
                        $do = $_GET['do'];
                      }
                      else
                      {
                        $do = 'manage';
                      }

                      //$do = isset($_GET['do']) : $_GET['do'] ? 'manage';

                      if ($do == 'manage') {
                        ?>

                          <table id="manage" class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                  <th scope="col">SL.</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email Address</th>
                                  <th scope="col">Phone No.</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Salary</th>
                                  <th scope="col">User Role</th>
                                  <th scope="col">Account Status</th>
                                  <th scope="col">Join Date</th>
                                  <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>

                              <?php
                              $id = $_SESSION['id'];

                                $sql = "SELECT * FROM users WHERE status = 1";

                                $allUsers = mysqli_query($db, $sql);

                                $countUser = mysqli_num_rows($allUsers);

                                if( $countUser == 0 ){
                                  echo '

                                  <tr>
                                    <div class="alert alert-info">Sorry!!! No user found in the database...</div>
                                  </tr>

                                  ';
                                }
                                else
                                { $i=0;
                                  while($row = mysqli_fetch_assoc($allUsers)){
                                    $id       = $row['id'];
                                    $name     = $row['name'];
                                    $e        = $row['email'];
                                    $password = $row['password'];
                                    $phone    = $row['phone'];
                                    $address  = $row['address'];
                                    $salary   = $row['salary'];
                                    $role     = $row['role'];
                                    $status   = $row['status'];
                                    $image    = $row['image'];
                                    $join_date = $row['join_date'];
                                    $i++;
                                  

                                  ?>

                                  <tr>
                                      <th scope="row"><?php echo $i; ?></th>
                                      <td>
                                        <?php
                                            if( is_null($image) )
                                              { ?>
                                                <img src="dist/img/users/avatar.png" class="pro-picture">

                                              <?php
                                              }
                                              else{?>
                                                <img src="dist/img/users/<?php echo $image; ?>" class="pro-picture">

                                              <?php
                                              }                                          

                                        ?>
                                      </td>                                
                                      <td><?php echo $name; ?></td>
                                      <td><?php echo $e; ?></td>
                                      <td><?php echo $phone; ?></td>
                                      <td><?php echo $address; ?></td>
                                      <td><?php echo $salary; ?></td>
                                      <td>
                                        <?php
                                          if($role == 1){
                                            echo '<span class="badge badge-success">Director</span>';
                                          }
                                          elseif ($role == 2) {
                                            echo '<span class="badge badge-primary">Manager</span>';
                                          }
                                          elseif ($role == 3) {
                                            echo '<span class="badge badge-info">Assistent Manager</span>';
                                          }
                                          elseif ($role == 4) {
                                            echo '<span class="badge badge-info">Executive Officer</span>';
                                          }
                                          elseif ($role == 5) {
                                            echo '<span class="badge badge-info">Professional staff</span>';
                                          }
                                          else
                                          {
                                            echo '<span class="badge badge-danger">Unidentified</span>';
                                          }

                                        ?>
                                          
                                      </td>
                                      <td>
                                        <?php
                                          if($status == 0){
                                            echo '<span class="badge badge-danger">Inactive</span>';
                                          }
                                          elseif ($status == 1) {
                                            echo '<span class="badge badge-success">Active</span>';
                                          }
                                          

                                        ?>                                      
                                      </td>
                                      <td><?php echo $join_date; ?></td>                               
                                    </tr>
                                    <?php
                                  }
                                }

                                ?>                     
                                
                            </tbody>
                          </table>

                        <?php
                      }

                      elseif ($do == 'add') {
                        echo '
                              <tr>
                                <div class="alert alert-info">Sorry!!! You are not allowed to add any employee records</div>
                              </tr>

                              ';
                      }

                  ?>
                  </div>
                  <!-- /.card-body -->
                </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include "inc/footer.php"; ?>