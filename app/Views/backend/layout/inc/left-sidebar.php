<div class="left-side-bar">
  <div class="brand-logo">
    <a href="<?= route_to('admin.home') ?>">
      <img src="/images/ffihris-logo-light.png" alt="" class="dark-logo" />
      <img src="/images/ffihris-logo-light.png" alt="" class="light-logo" />
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
        <li>
          <a href="<?= route_to('admin.home') ?>" class="dropdown-toggle no-arrow">
            <span class="micon bi bi-house"></span><span class="mtext">Home</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon dw dw-user-11"></span><span class="mtext"> 201 File</span>
            <!-- <i class="icon-copy bi bi-people"></i> -->
          </a>
          <ul class="submenu">
            <li><a href="#employee">Employees Profile</a></li>
            <li><a href="#department">Department</a></li>
            <li><a href="#organization">Organization</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon bi bi-currency-dollar"></span><span class="mtext"> Payrolls & Slips</span>
          </a>
          <ul class="submenu">
            <li><a href="javascript:;">Regular Cycle</a></li>
            <li><a href="javascript:;">Off-Cycle Reports</a></li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle">
                <span class="micon bi bi-bank2"></span><span class="mtext">Gov't Routines</span>
              </a>
              <ul class="submenu child">
                <li><a href="javascript:;">SSS</a></li>
                <li><a href="javascript:;">PhilHealth</a></li>
                <li><a href="javascript:;">HDMF (Pag-Ibig)</a></li>
                <li><a href="javascript:;">GSIS</a></li>
              </ul>
            </li>
            <li><a href="javascript:;">Payroll Reports</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon dw dw-time-management"></span><span class="mtext"> Time & Attendance</span>
          </a>
          <ul class="submenu">
            <li><a href="#attendance">Attendance</a></li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle">
                <span class="micon ti-time"></span><span class="mtext">Leaves</span>
                <!-- <span class="icon-copy"></span> -->
              </a>
              <ul class="submenu child">
                <li><a href="#Bleave">Bereavement Leave</a></li>
                <li><a href="#bdayleave">Birthday Leave</a></li>
                <li><a href="#eleave">Emergency Leave</a></li>
                <li><a href="#lwop">Leave WithOut Pay</a></li>
                <li><a href="#matleave">Maternity Leave</a></li>
                <li><a href="#patleave">Paternity Leave</a></li>
                <li><a href="#sleave">Sick Leave</a></li>
                <li><a href="#vacleave">Vacation Leave</a></li>
              </ul>
            </li>
            <li><a href="#overtime">Overtime</a></li>
            <li><a href="#addcor">Additional & Corrections</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="dropdown-toggle no-arrow">
            <span class="micon bi bi-diagram-3"></span><span class="mtext">Sitemap</span>
          </a>
        </li>

        <li>
          <div class="dropdown-divider"></div>
        </li>

        <li>
          <div class="sidebar-small-cap">General</div>
        </li>
        <li>
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon bi bi-file-person-fill"></span><span class="mtext">Profile</span>
          </a>
          <ul class="submenu">
            <li><a href="<?= route_to('admin.profile') ?>">User Profile</a></li>
            <li><a href="<?= route_to('settings') ?>">General Profile Settings</a></li>
          </ul>
        </li>
        <li>
          <a href="#settings" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-settings1"></span><span class="mtext">Settings</span>
          </a>
        </li>
        <!-- <li>
          <a href="https://dropways.github.io/deskapp-free-single-page-website-template/" target="_blank" class="dropdown-toggle no-arrow">
            <span class="micon bi bi-layout-text-window-reverse"></span>
            <span class="mtext">Landing Page
              <img src="/backend/vendors/images/coming-soon.png" alt="" width="25" /></span>
          </a>
        </li> -->
      </ul>
    </div>
  </div>
</div>