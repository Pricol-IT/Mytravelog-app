<li>
    <a class="nav-link " href="{{ route('travels.home') }}">
        <i class="bx bxs-home"></i>
        <span>Dashboard </span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-approve" data-bs-toggle="collapse" href="#">
        <i class="bi bi-clipboard2-check"></i><span>Requests</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-approve" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('travels.allrequests') }}">
                <i class="bi bi-circle"></i><span>All Requests</span>
            </a>
        </li>
        <li>

            <a href="{{ route('travels.notprocessed') }}">
                <i class="bi bi-circle"></i><span>Not Processed Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('travels.inprogress') }}" title=" ">
                <i class="bi bi-circle"></i><span>In-progress Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('travels.completed') }}">
                <i class="bi bi-circle"></i><span>Completed Requests</span>
            </a>
        </li>
    </ul>
</li>
