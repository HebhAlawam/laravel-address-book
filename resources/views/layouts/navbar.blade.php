<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top " >
    <a class="navbar-brand ps-4" href="{{ route('contacts.index') }}">
        <i class="fas fa-book"></i> Address Book
    </a>

    <div class="d-none d-md-inline-block form-inline ms-auto me-3 my-2 my-md-0">
  <ul class="navbar-nav d-md-inline-block me-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" data-bs-toggle="dropdown">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{route('contacts.index')}}">Contacts</a></li>
                <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    </div>



    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>
