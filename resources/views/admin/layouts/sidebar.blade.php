<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <span class="brand-text font-weight-light">Job Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-briefcase"></i>
              <p>
                Job
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('job-type.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('job.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Job</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
                <a href="{{route('applicant.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                  <p>Applicant List </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/logout') }}" class="nav-link">
                    <i class="fas fa-sign-in-alt"></i>
                  <p>LogOut </p>
                </a>
            </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
