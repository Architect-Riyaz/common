  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Habit App</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Habit App</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user4-128x128.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Welcome Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">

                <p>
                 Nina Mcintire
                 <small>Software Engineer</small>
                  <small>Member of Infant Studios</small>
                </p>
              </li>
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../adminLogout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!--<div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>HR</p>
          
        </div>
      </div>-->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Dashboard</li>      
        
     
        <li >
          <a href="../main/adminsInfo.php" >
            <i class="fa fa-user"></i> <span>Admin Info</span>
          </a>
        </li>
        <li >
          <a href="../appPages/addUser.php" >
            <i class="fa fa-users"></i> <span>Add User</span>
          </a>
        </li>
        <li >
          <a href="../appPages/listUsers.php" >
            <i class="fa fa-users"></i> <span>List Users</span>
          </a>
        </li>
        <li >
          <a href="../appPages/deleteUser.php" >
            <i class="fa fa-users"></i> <span>Delete User</span>
          </a>
        </li>
        <li >
          <a href="../appPages/assignData.php" >
            <i class="fa fa-th"></i> <span>Assign Data</span>
          </a>
        </li>
		 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>