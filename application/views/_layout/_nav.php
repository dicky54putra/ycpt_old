<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="<?php echo base_url(); ?>assets/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="<?php echo base_url(); ?>assets/#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->

          <?php
          if ($this->session->userdata("level") == 0) { ?>
            <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="user-image" alt="User Image">
          <?php
          } else { ?>
            <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="user-image" alt="User Image">
          <?php
          }
          ?>
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">
            <?php
            if ($this->session->userdata("level") == 0) {
              echo $userdata->nama;
            } else {
              echo $userdata->nama;
            }
            ?>
          </span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <?php
            if ($this->session->userdata("level") == 0) { ?>
              <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
            <?php
            } else { ?>
              <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
            <?php
            }
            ?>

            <p>
              <?php
              if ($this->session->userdata("level") == 0) {
                echo $userdata->nama;
                echo "<small>Admin</small>";
              } else {
                echo $userdata->nama;
                echo "<small>User</small>";
              }
              ?>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="<?php echo base_url('Profile'); ?>" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-eye-open"></i> Profile</a>
            </div>
            <div class="pull-right">
              <a href="<?php echo base_url('Auth/logout'); ?>" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-log-out"></i> Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>