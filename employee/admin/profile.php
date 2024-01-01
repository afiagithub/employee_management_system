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
                    <h3 class="card-title">Employee Profile</h3>                
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
                        
                        $id = $_SESSION['id'];

                        $sql = "SELECT * FROM users WHERE id = '$id'";

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

                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="userId" value="<?php echo $uid; ?>">
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                      <label>Image / Profile Picture</label> <br>
                                      <?php
                                          if( is_null($image) )
                                            { ?>
                                              <img src="dist/img/users/avatar.png" height="220" width="200">

                                            <?php
                                            }
                                            else{?>
                                              <img src="dist/img/users/<?php echo $image; ?>" height="220" width="200">

                                            <?php
                                            }                                          

                                      ?>
                                    </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                      <label>Full Name</label>
                                      <input type="text" name="name" class="form-control" required="required" value="<?php echo $name; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Email Address</label>
                                      <input type="text" name="email" class="form-control" required="required" value="<?php echo $e; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Phone</label>
                                      <input type="phone" name="phone" class="form-control" value="<?php echo $phone; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Address</label>
                                      <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-lg-4">                                    
                                    <div class="form-group">
                                      <label>Salary</label>
                                      <input type="number" name="salary" class="form-control" value="<?php echo $salary; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Position</label>
                                      <select name="role" class="form-control" disabled>
                                        <option value="5">Please Select the Employee Position</option>
                                        <option value="1" <?php if($role == 1 ){ echo 'selected'; } ?> >Director</option>
                                        <option value="2" <?php if($role == 2 ){ echo 'selected'; } ?> >Manager</option>
                                        <option value="3" <?php if($role == 3 ){ echo 'selected'; } ?> >Assistent Manager</option>
                                        <option value="4" <?php if($role == 4 ){ echo 'selected'; } ?> >Executive Officer</option>
                                        <option value="5" <?php if($role == 5 ){ echo 'selected'; } ?> >Professional staff</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Status</label>
                                      <select name="status" class="form-control" disabled>
                                        <option value="1">Please Select the User Status</option>
                                        <option value="0" <?php if($status == 0 ){ echo 'selected'; } ?> >Inactive</option>
                                        <option value="1" <?php if($status == 1 ){ echo 'selected'; } ?> >Active</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <?php
                            }
                        }

                        ?>                     
                        
                    </tbody>
                    </table>

                <?php
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