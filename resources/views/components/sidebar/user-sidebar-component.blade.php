      <li class="nav-item">
        <a class="nav-link " href="{{route('user.home')}}">
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
            <a href="{{route('user.home')}}">
              <i class="bi bi-circle"></i><span>Add Trip</span>
            </a>
          </li>
          <li>
            <a href="{{route('user.mytrip')}}">
              <i class="bi bi-circle"></i><span>My Trip</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#document" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-file-blank"></i><span>Documents</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="document" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Add Trip</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>My Trip</span>
            </a>
          </li>
          
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#expense" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-wallet"></i><span>Expenses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="expense" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Add Trip</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>My Trip</span>
            </a>
          </li>
          
        </ul>
      </li>