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
          
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#document" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-file-blank"></i><span>Documents</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="document" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Add Documents</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>My Documents</span>
            </a>
          </li>
          
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#expense" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-wallet"></i><span>Expenses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="expense" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <!-- <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Add Trip</span>
            </a>
          </li> -->
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>My Trip Expenses</span>
            </a>
          </li>
          
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-approve" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard2-check"></i><span>Approvals</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-approve" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('approver.alltrip')}}">
              <i class="bi bi-circle"></i><span>All Approvals</span>
            </a>
          </li>
          <li>
            <a href="{{route('approver.pendingtrip')}}">
              <i class="bi bi-circle"></i><span>Pending Approvals</span>
            </a>
          </li>
          <li>
            <a href="{{route('approver.clarificationtrip')}}">
              <i class="bi bi-circle"></i><span>Clarification Approvals</span>
            </a>
          </li>
          <li>
            <a href="{{route('approver.approvedtrip')}}">
              <i class="bi bi-circle"></i><span>Approved Approvals</span>
            </a>
          </li>
          <li>
            <a href="{{route('approver.rejecttrip')}}">
              <i class="bi bi-circle"></i><span>Rejected Approvals</span>
            </a>
          </li>
        </ul>
      </li>
      