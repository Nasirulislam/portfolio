<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse " data-bs-parent="#users-nav">
                <li>
                    <a href="{{ route('list_users') }}">
                        <i class="bi bi-circle"></i><span>List All Users</span>
                    </a>
                </li>
            </ul>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#constant-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-sliders"></i><span>Constants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="constant-nav" class="nav-content collapse " data-bs-parent="#constant-nav">
                <li>
                    <a href="/constants/courses">
                        <i class="bi bi-circle"></i><span>Course Categories</span>
                    </a>
                </li>
                <li>
                    <a href="/constants/languages">
                        <i class="bi bi-circle"></i><span>Languages</span>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#payment-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-currency-euro"></i><span>Index</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="payment-nav" class="nav-content collapse " data-bs-parent="#payment-nav">
                <li>
                    <a href="{{ route('indexes.create') }}">
                        <i class="bi bi-circle"></i><span>Create Index</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('indexes.index') }}">
                        <i class="bi bi-circle"></i><span>All Indexes</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-exclamation-triangle"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="report-nav" class="nav-content collapse " data-bs-parent="#report-nav">
                <li>
                    <a href="{{ route('reports') }}">
                        <i class="bi bi-circle"></i><span>Manage Reports</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav --> --}}


        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('advertisements') }}">
                <i class="bi bi-easel2"></i><span>Advertisements</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('settings') }}">
                <i class="bi bi-gear-wide"></i><span>Setting</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('notify_users') }}">
                <i class="bi bi-bell"></i><span>Push Notification</span>
            </a>
        </li><!-- End Components Nav --> --}}



    </ul>

</aside><!-- End Sidebar-->
