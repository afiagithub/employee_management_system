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
        <?php        
          if($_SESSION["role"] == 1 || $_SESSION["role"] == 2 || $_SESSION["role"] == 3){ ?>

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
                                  <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                              <?php

                                $sql = "SELECT * FROM users ORDER BY name ASC";

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
                                      <td>
                                        <div class="action-bar">
                                          <ul>
                                            <li>
                                              <a href="users.php?do=edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a>
                                            </li>
                                            <li>
                                              <a href="" data-toggle="modal" data-target="#deleteUser<?php echo $id; ?>"><i class="fa fa-trash"></i></a>
                                            </li>
                                          </ul>
                                        </div>
                        <!-- User delete Modal -->
                        <div class="modal fade" id="deleteUser<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this employee record?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body text-center">
                                <div class="modal-action-btn">
                                  <a href="users.php?do=delete&id=<?php echo $id; ?>" class="btn btn-danger">Confirm</a>
                                  <a href="" data-dismiss="modal" class="btn btn-success">Cancel</a>
                                </div>
                              </div>
                              <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" ><a href="">Confirm</a></button>
                                <button type="button" class="btn btn-success" data-dismiss="modal"><a href="">Cancel</a></button>
                              </div> -->
                            </div>
                          </div>
                        </div>
                                      </td>                               
                                    </tr>
                                    <?php
                                  }
                                }

                                ?>                     
                                
                            </tbody>
                          </table>

                        <?php
                      }

                      elseif ($do == 'add') { ?>
                        <?php

                          if(!empty($_SESSION['msg'])){
                            echo "<div class='alert alert-danger'> " . $_SESSION['msg'] . "</div>";
                            unset($_SESSION['msg']);
                          }

                        ?>
                        
                        <form action="users.php?do=store" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" required="required">
                              </div>
                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" required="required">
                              </div>
                              <div class="form-group">
                                <label>Password (Your Unique 5-digit employee code)</label>
                                <input type="password" name="password" class="form-control" required="required" minlength="5" maxlength="5">
                              </div>
                              <div class="form-group">
                                <label>Re-Type Password</label>
                                <input type="password" name="repassword" class="form-control" required="required" minlength="5" maxlength="5">
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label>Phone</label>
                                <input type="phone" name="phone" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Salary</label>
                                <input type="number" name="salary" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Position</label>
                                <select name="role" class="form-control">
                                  <option value="5">Please Select the User Role</option>
                                  <option value="1">Director</option>
                                  <option value="2">Manager</option>
                                  <option value="3">Assistent Manager</option>
                                  <option value="4">Executive Officer</option>
                                  <option value="5">Professional staff</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                  <option value="1">Please Select the User Status</option>
                                  <option value="0">Inactive</option>
                                  <option value="1">Active</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label>Image / Profile Picture</label>
                                <input type="file" name="image" class="form-control-file">
                              </div>
                              <div class="form-group">
                                <input type="submit" name="addUser" value="Add New User" class="btn btn-primary btn-block">
                              </div>
                            </div>
                          </div>
                        </form>
                      
                      <?php
                      }


                      elseif ($do == 'store') {
                        
                        if(isset($_POST['addUser'])){
                          $name         = mysqli_real_escape_string($db, $_POST["name"]);;
                          $email        = mysqli_real_escape_string($db, $_POST["email"]);;
                          $password     = mysqli_real_escape_string($db, $_POST["password"]);;
                          $repassword   = mysqli_real_escape_string($db, $_POST["repassword"]);;
                          $phone        = mysqli_real_escape_string($db, $_POST["phone"]);;
                          $address      = mysqli_real_escape_string($db, $_POST["address"]);;
                          $salary      = mysqli_real_escape_string($db, $_POST["salary"]);;
                          $role         = $_POST['role'];
                          $status       = $_POST['status'];

                          $image        = $_FILES['image']['name'];
                          $imageTmp     = $_FILES['image']['tmp_name'];
                          $imageSize    = $_FILES['image']['size'];
                          $imageType    = $_FILES['image']['type'];

                          if( $password == $repassword)
                          {
                            //Encrypted password
                            $haspassed = sha1($password);

                            if(!empty($image)){
                              //add user With image
                              $img_extension = strtolower(end(explode('.', $image)));

                              $def_extens = array("jpeg", "jpg", "png");

                              if( in_array($img_extension, $def_extens) === true && $imageSize <= 2097152){
                                //Change img file name
                                $img = rand(1,9999999). '-img'. $image;

                                //Move the img from the temp folder to our project folder
                                move_uploaded_file($imageTmp, "dist/img/users/".$img);

                                $sql = "INSERT INTO users (name, email, password, phone, address, role, status, image, salary, join_date) VALUES('$name', '$email', '$haspassed', '$phone', '$address', '$role', '$status', '$img', $salary, now())";
                                $addUser = mysqli_query($db, $sql);

                                if( $addUser )
                                {
                                  header("Location: users.php?do=manage");
                                }
                                else{
                                  die("Something went wrong!!".mysqli_error($db));
                                }
                              }
                              else{
                                $_SESSION['msg'] = "Sorry! You've uploaded a wrong file as image OR the image size is too large.";
                                header("Location: users.php?do=add");
                              }                              
                            }

                            else{
                              //add user Without image
                              $sql = "INSERT INTO users (name, email, password, phone, address, role, status, salary, join_date) VALUES('$name', '$email', '$haspassed', '$phone', '$address', '$role', '$status', '$salary', now())";
                              $addUser = mysqli_query($db, $sql);

                              if( $addUser )
                              {
                                header("Location: users.php?do=manage");
                              }
                              else{
                                die("Something went wrong!!".mysqli_error($db));
                              }
                            }
                          }
                          else{
                            $_SESSION['msg'] = "Sorry! password and retype password doesn't match.";
                            header("Location: users.php?do=add");
                          }
                        }
                      }


                      elseif ($do == 'edit') {?>
                        <?php

                          if(!empty($_SESSION['msg'])){
                            echo "<div class='alert alert-danger'> " . $_SESSION['msg'] . "</div>";
                            unset($_SESSION['msg']);
                          }

                        ?>
                        <?php
                        if (isset($_GET["id"])) {
                          $userID = $_GET["id"];
                          
                          $sql = "SELECT * FROM users WHERE id = '$userID'";
                          $userData = mysqli_query($db, $sql);

                          while($row = mysqli_fetch_assoc($userData)){
                              $uid       = $row['id'];
                              $name     = $row['name'];
                              $e        = $row['email'];
                              $password = $row['password'];
                              $phone    = $row['phone'];
                              $address  = $row['address'];
                              $salary   = $row['salary'];
                              $role     = $row['role'];
                              $status   = $row['status'];
                              $image    = $row['image'];

                              ?>

                              <form action="users.php?do=update" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="userId" value="<?php echo $uid; ?>">
                                <div class="row">
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                      <label>Full Name</label>
                                      <input type="text" name="name" class="form-control" required="required" value="<?php echo $name; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Email Address</label>
                                      <input type="text" name="email" class="form-control" required="required" value="<?php echo $e; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Password</label>
                                      <input type="password" name="password" class="form-control" placeholder="******">
                                    </div>
                                    <div class="form-group">
                                      <label>Re-Type Password</label>
                                      <input type="password" name="repassword" class="form-control" placeholder="******">
                                    </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                      <label>Phone</label>
                                      <input type="phone" name="phone" class="form-control" value="<?php echo $phone; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Address</label>
                                      <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Salary</label>
                                      <input type="number" name="salary" class="form-control" value="<?php echo $salary; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Position</label>
                                      <select name="role" class="form-control">
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
                                      <select name="status" class="form-control">
                                        <option value="1">Please Select the User Status</option>
                                        <option value="0" <?php if($status == 0 ){ echo 'selected'; } ?> >Inactive</option>
                                        <option value="1" <?php if($status == 1 ){ echo 'selected'; } ?> >Active</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                      <label>Image / Profile Picture</label> <br>
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
                                      <br><br>
                                      <input type="file" name="image" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                      <input type="submit" name="updateUser" value="Save Changes" class="btn btn-primary btn-block">
                                    </div>
                                  </div>
                                </div>
                              </form>
                              
                              <?php      
                        }
                      }
                    }


                    elseif ($do == 'update') {
                      if (isset($_POST["updateUser"])) {
                        $userId       = $_POST['userId']; 
                        $name         = $_POST['name'];
                        $email        = $_POST['email'];
                        $password     = $_POST['password'];
                        $repassword   = $_POST['repassword'];
                        $phone        = $_POST['phone'];
                        $address      = $_POST['address'];
                        $salary       = $_POST['salary'];
                        $role         = $_POST['role'];
                        $status       = $_POST['status'];

                        $image        = $_FILES['image']['name'];
                        $imageTmp     = $_FILES['image']['tmp_name'];
                        $imageSize    = $_FILES['image']['size'];
                        $imageType    = $_FILES['image']['type'];



                        //Just the profile content update
                        if ( empty($password) && empty($image) ) {                          
                          $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', role='$role', status='$status', salary='$salary' WHERE id = '$userId' ";

                          $updateUser = mysqli_query($db, $sql);

                          if ($updateUser) {
                            header("Location: users.php?do=manage");
                          }
                          else
                          {
                            die("Something went wrong ". mysqli_error($db));
                          }
                        }

                        //Update content with password and image
                        else if( !empty($password) && !empty($image)){
                          if($password == $repassword){
                            $haspassed = sha1($password);

                            $img_extension = strtolower(end(explode('.', $image)));

                            $def_extens = array("jpeg", "jpg", "png");

                            if( in_array($img_extension, $def_extens) === true && $imageSize <= 2097152){
                              //Identify the existing image
                              $query = "SELECT * FROM users WHERE id = '$userId'";
                              $userImage = mysqli_query($db, $query);

                               while($row = mysqli_fetch_assoc($userImage)){
                                $userImg = $row['image'];
                               }

                               //to delete any file fom the server 
                               unlink("dist/img/users/". $userImg);

                                //add user With image
                                //Change img file name
                                $imgs = rand(1,9999999). '-img'. $image;

                                //Move the img from the temp folder to our project folder
                                move_uploaded_file($imageTmp, "dist/img/users/".$imgs);

                                $sql = "UPDATE users SET name='$name', email='$email', password = '$haspassed', phone='$phone', address='$address', role='$role', status='$status', image = '$imgs', salary='$salary' WHERE id = '$userId' ";

                              $updateUser = mysqli_query($db, $sql);

                              if ($updateUser) {
                                header("Location: users.php?do=manage");
                              }
                              else
                              {
                                die("Something went wrong ". mysqli_error($db));
                              }
                            }
                            else{
                                $_SESSION['msg'] = "Sorry! You've uploaded a wrong file as image OR the image size is too large.";
                                header("Location: users.php?do=edit; ?>");
                              }
                          }

                          
                        }

                        //Update content without password and with image
                        else if( empty($password) && !empty($image)){
                            $img_extension = strtolower(end(explode('.', $image)));

                            $def_extens = array("jpeg", "jpg", "png");

                            if( in_array($img_extension, $def_extens) === true && $imageSize <= 2097152){
                              //Identify the existing image
                              $query = "SELECT * FROM users WHERE id = '$userId'";
                              $userImage = mysqli_query($db, $query);

                               while($row = mysqli_fetch_assoc($userImage)){
                                $userImg = $row['image'];
                               }

                               //to delete any file fom the server 
                               unlink("dist/img/users/". $userImg);

                                //add user With image
                                //Change img file name
                                $imgs = rand(1,9999999). '-img'. $image;

                                //Move the img from the temp folder to our project folder
                                move_uploaded_file($imageTmp, "dist/img/users/".$imgs);

                                $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', role='$role', status='$status', image = '$imgs', salary='$salary' WHERE id = '$userId' ";

                              $updateUser = mysqli_query($db, $sql);

                              if ($updateUser) {
                                header("Location: users.php?do=manage");
                              }
                              else
                              {
                                die("Something went wrong ". mysqli_error($db));
                              }
                            }
                            else{
                                $_SESSION['msg'] = "Sorry! You've uploaded a wrong file as image OR the image size is too large.";
                                header("Location: users.php?do=edit");
                              }                            
                        }

                        //Update content with password and without image
                        else if( !empty($password) && empty($image)){
                            if($password == $repassword){
                              $haspassed = sha1($password);
                            }
                          
                            $sql = "UPDATE users SET name='$name', email='$email', password = '$haspassed', phone='$phone', address='$address', role='$role', status='$status', salary='$salary' WHERE id = '$userId' ";

                            $updateUser = mysqli_query($db, $sql);

                            if ($updateUser) {
                              header("Location: users.php?do=manage");
                            }
                            else
                            {
                              die("Something went wrong ". mysqli_error($db));
                            }
                        }
                      }
                    }


                    elseif ($do == 'delete') {
                      if (isset($_GET["id"])){
                        $delUser = $_GET["id"];
                        $sql1 = "DELETE FROM users WHERE id = '$delUser'";
                        $removeUser = mysqli_query($db, $sql1);

                        if ($removeUser) {
                          header("Location: users.php?do=manage");
                        }
                        else
                        {
                          die("Something went wrong ". mysqli_error($db));
                        }
                      }
                    }


                  ?>
                  </div>
                  <!-- /.card-body -->
                </div>

           <?php }

           else{ ?>

            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Manage All Employee</h3>                
                </div>
                <div class="card-body">
                  <div class="alert alert-warning">
                    Sorry! you are not allowed in this page.
                  </div>
                </div>
            </div>

           <?php }

        ?>
        
      </div>
    </div>
  </div>
  
</section>


  </div>

  <!--Main body content start-->


<!--Main body content end-->

<?php include "inc/footer.php"; ?>