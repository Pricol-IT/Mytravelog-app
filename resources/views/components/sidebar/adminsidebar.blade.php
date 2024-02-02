  <li class="nav-item">
      <a class="nav-link " href="{{ route('admin.dashboard') }}">
          <i class="bx bxs-home"></i>
          <span>Dashboard </span>
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link " href="{{ route('user.index') }}">
          <i class='bx bxs-group'></i>
          <span>All Users</span>
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link " href="{{ route('service_master.index') }}">
          <i class='bx bxs-plug'></i>
          <span>Service Master</span>
      </a>
  </li>

  <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-check-shield"></i><span>Grade & Policy</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item">
              <a class="nav-link " href="{{ route('domestic_policy.index') }}">
                  <i class="bi bi-circle"></i><span>Domestic policy</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link " href="{{ route('city_tier.index') }}">
                  <i class="bi bi-circle"></i><span>City Tier</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link " href="{{ route('grade.index') }}">
                  <i class="bi bi-circle"></i><span>Grade System</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link " href="{{ route('international_policy.index') }}">
                  <i class="bi bi-circle"></i><span>International Policy</span>
              </a>
          </li>
      </ul>
  </li>
