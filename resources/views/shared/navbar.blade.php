<nav class="navbar bg-white border-bottom sticky-top navbar-expand-md">
    <div class="container">
        <!-- Branding Image -->
        <a href="{{ route('home') }}" class="navbar-brand">
            {{ config('app.name', 'Laravel') }}
        </a>

        <!-- Collapsed Hamburger -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            @admin
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            @lang('dashboard.dashboard')
                        </a>
                    </li>
                </ul>
            @endadmin

            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            @lang('auth.login')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            @lang('auth.register')
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('users.show', Auth::user()) }}" class="dropdown-item">
                                @lang('users.public_profile')
                            </a>

                            <a href="{{ route('users.edit') }}" class="dropdown-item">
                                @lang('users.settings')
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="{{ url('/logout') }}"
                                class="dropdown-item"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                @lang('auth.logout')
                            </a>

                            <form id="logout-form" class="d-none" action="{{ url('/logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

