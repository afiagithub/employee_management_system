<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Employee Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">        
        <div class="info">
          <a href="#" class="d-block"> <h5>Welcome,</h5> <strong><?php echo $_SESSION["name"]; ?></strong></a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>            
          </li>

         
          
          <li class="nav-header">USER MANAGEMENT</li>
          <?php

          if($_SESSION["role"] == 1 || $_SESSION["role"] == 2 || $_SESSION["role"] == 3){ ?> 

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  All Employee Data
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="users.php?do=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New Employee</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="users.php?do=manage" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage All Employee</p>
                  </a>
                </li>              
              </ul>
            </li>
          
          <?php
          }
          else if($_SESSION["role"] == 4){?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  All Employee Data
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="separate.php?do=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New Employee</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="separate.php?do=manage" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage All Employee</p>
                  </a>
                </li>              
              </ul>
            </li>

          <?php
          }

          else if($_SESSION["role"] == 5){?>
            <li class="nav-item">
            <a href="profile.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                View Profile
              </p>
            </a>
          </li>

          <?php
          }

          ?>
          

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-exit"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>