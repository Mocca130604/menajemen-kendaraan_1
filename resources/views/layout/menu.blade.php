<li class="nav-item">
    <a href="{{ url('home')}}" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Home
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('agreement')}}" class="nav-link">
    <i class="nav-icon fas fa-tasks"></i>
        <p>
            Agreement
        </p>
    </a>
</li>

@if ($user->role == 'admin')
<li class="nav-header">Data Admin</li>
    <li class="nav-item">
        <a href="{{ url('driver')}}" class="nav-link">
        <i class="nav-icon fa fa-user"></i>
            <p>
                Drivers
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('cars')}}" class="nav-link">
        <i class="nav-icon fa fa-car"></i>
            <p>
                Cars
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('type')}}" class="nav-link">
        <i class="nav-icon fa fa-car"></i>
            <p>
                Type
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('brand')}}" class="nav-link">
        <i class="nav-icon fa fa-car"></i>
            <p>
                Brands
            </p>
        </a>
    </li>
@endif
