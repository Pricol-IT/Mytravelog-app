<li>
    <a class="nav-link " href="{{ route('accountant.home') }}">
        <i class="bx bxs-home"></i>
        <span>Dashboard </span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-approve" data-bs-toggle="collapse" href="#">
        <i class="bi bi-clipboard2-check"></i><span>Advance Requests</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-approve" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('accountant.allrequests') }}">
                <i class="bi bi-circle"></i><span>All Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.notprocessed') }}">
                <i class="bi bi-circle"></i><span>Not Processed Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.inprogress') }}">
                <i class="bi bi-circle"></i><span>In-progress Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.completed') }}">
                <i class="bi bi-circle"></i><span>Completed Requests</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-approve1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-clipboard2-check"></i><span>Expenses Requests</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-approve1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('accountant.expenses_allrequests') }}">
                <i class="bi bi-circle"></i><span>All Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.expenses_notprocessed') }}">
                <i class="bi bi-circle"></i><span>Not Processed Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.expenses_inprogress') }}">
                <i class="bi bi-circle"></i><span>In-progress Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.expenses_completed') }}">
                <i class="bi bi-circle"></i><span>Completed Requests</span>
            </a>
        </li>
    </ul>
</li>
