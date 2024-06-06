<div class="left-side-bar">
  <div class="brand-logo">
    <a href="<?= route_to('admin.profile') ?>">
      <img src="/images/ffihris-logo-light.png" alt="" class="dark-logo" />
      <img src="/images/ffihris-logo-light.png" alt="" class="light-logo" />
      <!-- <img src="/images/<?php // get_settings()->blog_logo ?>" alt="" class="dark-logo" />
      <img src="/images/<?php // get_settings()->blog_logo ?>" alt="" class="light-logo" /> -->
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
            <span class="micon dw dw-user-2"></span><span class="mtext"> 201 File</span>
          </a>
          <ul class="submenu">
            <li><a href="<?= route_to('employee') ?>"><span class="micon dw dw-user"></span>&nbsp; Employee </a></li>
            <li><a href="<?= route_to('department') ?>"><span class="micon dw dw-user-3"></span> Department </a></li>
            <li><a href="<?= route_to('organization') ?>"><span class="micon dw dw-user-11"></span> Organization </a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon bi bi-currency-dollar"></span><span class="mtext"> Payrolls & Slips </span>
          </a>
          <ul class="submenu">
            <li><a href="javascript:;"><span class="micon dw dw-reload"></span> Regular Cycle</a></li>
            <li><a href="javascript:;"><span class="micon dw dw-recycle-1"></span> Off-Cycle Reports</a></li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle">
                <span class="micon bi bi-bank2"></span><span class="mtext">Gov't Routines</span>
              </a>
              <ul class="submenu child">
                <li><a href="javascript:;"><span class="micon bi bi-bank2"></span> SSS</a></li>
                <li><a href="javascript:;"><span class="micon bi bi-bank2"></span> PhilHealth</a></li>
                <li><a href="javascript:;"><span class="micon bi bi-bank2"></span> HDMF (Pag-Ibig)</a></li>
                <li><a href="javascript:;"><span class="micon bi bi-bank2"></span> GSIS</a></li>
              </ul>
            </li>
            <li><a href="javascript:;"><span class="micon dw dw-analytics-22"></span> Payroll Reports</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon dw dw-time-management"></span><span class="mtext"> Time & Attendance</span>
          </a>
          <ul class="submenu">
            <li><a href="#attendance"><span class="micon dw dw-time-management"></span> Attendance</a></li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle">
                <span class="micon dw dw-logout1"></span><span class="mtext">Leaves</span>
              </a>
              <ul class="submenu child">
                <li><a href="#Bleave"> Bereavement Leave</a></li>
                <li><a href="#bdayleave"> Birthday Leave</a></li>
                <li><a href="#eleave"> Emergency Leave</a></li>
                <li><a href="#lwop"> Leave WithOut Pay</a></li>
                <li><a href="#matleave"> Maternity Leave</a></li>
                <li><a href="#patleave"> Paternity Leave</a></li>
                <li><a href="#sleave"> Sick Leave</a></li>
                <li><a href="#vacleave"> Vacation Leave</a></li>
              </ul>
            </li>
            <li><a href="#overtime"><span class="micon dw dw-counterclockwise"></span> Overtime</a></li>
            <li><a href="#addcor"><span class="micon dw dw-checked"></span> Add & Corrections</a></li>
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
            <li><a href="<?= route_to('admin.profile') ?>"><span class="micon dw dw-user-2"></span> User Profile</a></li>
            <li><a href="<?= route_to('settings') ?>"><span class="micon dw dw-settings1"></span> Settings</a></li>
            <li><a href="<?= route_to('users-page') ?>"><span class="micon dw dw-user-11"></span> Users</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>