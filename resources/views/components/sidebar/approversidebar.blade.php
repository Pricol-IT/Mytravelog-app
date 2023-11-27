      <li class="nav-item">
        <a class="nav-link " href="{{route('approver.home')}}">
          <i class="bx bxs-home"></i>
          <span>Dashboard </span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-trip"></i><span>Trip</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('approver.home')}}">
              <i class="bi bi-circle"></i><span>Add Trip</span>
            </a>
          </li>
          <li>
            <a href="{{route('approver.mytrip')}}">
              <i class="bi bi-circle"></i><span>My Trip</span>
            </a>
          </li>
          <li>
            <a href="{{route('approver.alltrip')}}">
              <i class="bi bi-circle"></i><span>Trip Approvals</span>
            </a>
          </li>
        </ul>
      </li>
      